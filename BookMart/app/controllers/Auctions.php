<?php

class Auctions extends Controller {

    public function index() {
        $auctionModel = new AuctionModel();

        $view = isset($_GET['view']) ? $_GET['view'] : 'latest';
        $validViews = ['latest', 'myAuctions', 'participating'];
        if (! in_array($view, $validViews)) {
            $view = 'latest';
        }

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max(1, $page); 
        $perPage = 5;
        $fetchLimit = $page * $perPage + 1;

        switch ($view) {
            case 'myAuctions':
                $auctions = $auctionModel->getUserAuctions($_SESSION['user_id'], $fetchLimit);
                break;
    
            case 'participating':
                $auctions = $auctionModel->getParticipatingAuctions($_SESSION['user_id'], $fetchLimit);
                break;
    
            case 'latest':
            default:
                $auctions = $auctionModel->getActiveAuctions($fetchLimit);
                break;
        }
    
        if (!is_array($auctions) || empty($auctions)) {
            $data = [
                'auctions' => [],
                'page' => $page,
                'hasNext' => false,
                'hasPrevious' => false,
                'showPageControl' => false,
                'userid' => $_SESSION['user_id'] ?? null,
                'selectedTab' => $view,
            ];
        } else {
            $start = ($page - 1) * $perPage;
            $pagedAuctions = array_slice($auctions, $start, $perPage);
            $hasNext = count($auctions) > $page * $perPage;
    
            $data = [
                'auctions' => $pagedAuctions,
                'page' => $page,
                'hasNext' => $hasNext,
                'hasPrevious' => $page > 1,
                'showPageControl' => count($auctions) > $perPage,
                'userid' => $_SESSION['user_id'] ?? null,
                'selectedTab' => $view,
            ];
        }
    
        $this->view('auctions', $data);
    }

    public function details($id) {
        $auctionModel = new AuctionModel();
    
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    
        $mainAuction = $auctionModel->getAuctionWithBook($id);
        $is_early = 0;

        if ($mainAuction && !$mainAuction->is_closed) {
            $timeQuery = "SELECT NOW() as server_time";
            $result = $auctionModel->query($timeQuery);
            $db_time = $result[0]->server_time;
    
            if ($db_time >= $mainAuction->end_time) {
                $auctionData = [
                    'id' => $id,
                    'winner_user_id' => $mainAuction->current_bidder_id,
                    'is_closed' => 1,
                ];
                $auctionModel->updateAuction($auctionData);
                $mainAuction = $auctionModel->getAuctionWithBook($id);
                
                $notificationModel = new NotificationModel();
                $notificationModel->createNotification(
                    $mainAuction->seller_id,
                    'Auction Update',
                    'The auction for' . $mainAuction->title . ' has ended.',
                    '/auctions/details/' . $auctionData['id']
                );
                if($mainAuction->winner_user_id) {
                    $notificationModel->createNotification(
                        $mainAuction->winner_user_id,
                        'Auction Update',
                        'The auction has been completed. 
                        Congratulations!! You have won the auction.',
                        '/auctions/details/' . $auctionData['id']
                    );
                }
            }
        }
        else if ($mainAuction && $mainAuction->is_closed) {
            $timeQuery = "SELECT NOW() as server_time";
            $result = $auctionModel->query($timeQuery);
            $db_time = $result[0]->server_time;
    
            if ($db_time >= $mainAuction->start_time) {
                $auctionData = [
                    'id' => $id,
                    'is_closed' => 0,
                ];
                $auctionModel->updateAuction($auctionData);
                $mainAuction = $auctionModel->getAuctionWithBook($id);

                $notificationModel = new NotificationModel();
                $notificationModel->createNotification(
                    $mainAuction->seller_id,
                    'Auction Update',
                    'The auction for ' . $mainAuction->title . ' has started.',
                    '/auctions/details/' . $auctionData['id']
                );
            }
            else {
                $is_early = 1;
            }
        }

        if(!$mainAuction) {
            redirect('auctions');
        }

        $auctions = $auctionModel->getActiveAuctions($limit + 1);
    
        if (!empty($auctions)) {
            $recAuctions = array_filter($auctions, fn($a) => $a->id != $id);
            $recAuctions = array_slice($recAuctions, 0, $limit);
        }
        else {
            $recAuctions = [];
        }
    
        $data = [
            'auctions' => $mainAuction,
            'recAuctions' => $recAuctions,
            'limit' => $limit,
            'userid' => $_SESSION['user_id'] ?? null,
            'is_early' => $is_early,
        ];

        if (isset($_SESSION['original_book_details'])) {
            $originalDetails = $_SESSION['original_book_details'];
            $bookModel = new BookModel();
            $query = "UPDATE book SET price = :price, discount = :discount WHERE id = :id";
            $params = ['id' => $mainAuction->book_id, 'discount' => $originalDetails['discount'], 'price' => $originalDetails['price']];
            $bookModel->query($query, $params);
        }
    
        $this->view('auctionDetails', $data);
    }   

    public function createAuction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $is_closed = 0;

            $auctionModel = new AuctionModel();
            $timeQuery = "SELECT NOW() as server_time";
            $result = $auctionModel->query($timeQuery);
            $db_time = $result[0]->server_time;
            
            $serverTimestamp = strtotime($db_time);
            $postTimestamp = strtotime($_POST['start_time']);

            if ($serverTimestamp < $postTimestamp) {
                $is_closed = 1;
            }
            $auctionData = [
                'book_id' => trim($_POST['book_id']),
                'seller_id' => $_SESSION['user_id'],
                'starting_price' => filter_var(trim($_POST['starting_price']), FILTER_VALIDATE_FLOAT),
                'current_price' => filter_var(trim($_POST['starting_price']), FILTER_VALIDATE_FLOAT),
                'buy_now_price' => !empty(filter_var(trim($_POST['buy_now_price']))) ? filter_var(trim($_POST['buy_now_price']), FILTER_VALIDATE_FLOAT) : null,
                'start_time' => trim($_POST['start_time']),
                'end_time' => trim($_POST['end_time']),
                'is_closed' => $is_closed,
            ];  

            $auctionModel->createAuction($auctionData);
            
            redirect('auctions');
        } else {
            redirect('bookSellerController/listings');
        }
    }

    public function updateBid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'current_price' => filter_var(trim($_POST['bid-amount']), FILTER_VALIDATE_FLOAT),
                'previous_bid' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'current_bidder_id' => $_SESSION['user_id'],
                'winner_user_id' => null,
                'is_closed' => 0,
            ];
            
            $auction = new AuctionModel();
            if ($auction->first(['id' => $auctionData['id']])->current_price + 100 > $auctionData['current_price']) {
                redirect('auctions/details/' . trim($_POST['auction_id']));
            }
            $auction->updateAuction($auctionData);

            $notificationModel = new NotificationModel();
            $notificationModel->createNotification(
                trim($_POST['current_bidder_id']),
                'Auction Update',
                'You have been outbid.',
                '/auctions/details/' . $auctionData['id']
            );
            
            redirect('auctions/details/' . trim($_POST['auction_id']));
        } else {
            redirect('auctions/details/' . trim($_POST['auction_id']));
        }
    }

    public function buyNow() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_SESSION['auction_details'])) {
                unset($_SESSION['auction_details']);
            }
            
            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'book_id' => trim($_POST['book_id']),
                'current_price' => filter_var(trim($_POST['current_price']), FILTER_VALIDATE_FLOAT),
                'previous_bid' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'current_bidder_id' => $_SESSION['user_id'],
                'winner_user_id' => $_SESSION['user_id'],
                'is_closed' => 1,
            ];

            $_SESSION['auction_details'] = $auctionData;

            $bookModel = new BookModel();
            $bookDetails = $bookModel->first(['id' => $auctionData['book_id']]);
            $originalBookDetails = [
                'price' => $bookDetails->price,
                'discount' => $bookDetails->discount,
            ];
            $_SESSION['original_book_details'] = $originalBookDetails;

            $query = "UPDATE book SET price = :price, discount = :discount WHERE id = :id";
            $params = ['id' => $auctionData['book_id'], 'discount' => 0, 'price' => $auctionData['current_price']];
            $bookModel->query($query, $params);
            
            $qty = 1;
            redirect("payment/checkOut/{$auctionData['book_id']}/{$qty}");
        } else {
            redirect('auctions/details/' . trim($_POST['auction_id']));
        }
    }

    public function completeAuction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'winner_user_id' => trim($_POST['current_bidder_id']),
                'is_closed' => 1,
            ];
            
            $auction = new AuctionModel();
            $auction->updateAuction($auctionData);

            $notificationModel = new NotificationModel();
            $notificationModel->createNotification(
                $auctionData['winner_user_id'],
                'Auction Update',
                'The auction has been completed. 
                Congratulations!! You have won the auction.',
                '/auctions/details/' . $auctionData['id']
            );
            
            redirect('auctions/details/' . trim($_POST['auction_id']));
        } else {
            redirect('auctions/details/' . trim($_POST['auction_id']));
        }
    }

    public function cancelAuction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auctionId = trim($_POST['auction_id']);
            $bookId = trim($_POST['book_id']);

            $auction = new AuctionModel();
            $result = $auction->deleteAuction($auctionId);
            
            if (!$auction->first(['id' => $auctionId])) {
                $bookModel = new BookModel();
                $bookModel->update($bookId, ['status' => 'available']);
            }
    
            redirect('auctions');
        } 
        else {
            redirect('auctions');
        }
    }

    public function withdraw() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'current_price' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'previous_bid' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'current_bidder_id' => null,
                'winner_user_id' => null,
            ];
    
            $auction = new AuctionModel();
            $result = $auction->updateAuction($auctionData);
            $is_closed = trim($_POST['is_closed']);
    
            if ($is_closed == 1) {
                $notificationModel = new NotificationModel();
                $notificationModel->createNotification(
                    trim($_POST['seller_id']),
                    'Auction Update',
                    'The winner has withdrawn his bid from auction for book ' . trim($_POST['title']) . '.',
                    '/auctions/details/' . $auctionData['id']
                );
                redirect('auctions');
            }
            else {
                redirect('auctions/details/' . trim($_POST['auction_id']));
            }
        } 
        else {
            redirect('auctions');
        }
    }
    
}

     
