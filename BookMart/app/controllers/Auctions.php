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

        if (!$mainAuction) {
            redirect('auctions');
        }

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
            }
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
        ];
    
        $this->view('auctionDetails', $data);
    }   

    public function createAuction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get form data
            $auctionData = [
                'book_id' => trim($_POST['book_id']),
                'seller_id' => $_SESSION['user_id'],
                'starting_price' => filter_var(trim($_POST['starting_price']), FILTER_VALIDATE_FLOAT),
                'current_price' => filter_var(trim($_POST['starting_price']), FILTER_VALIDATE_FLOAT),
                'buy_now_price' => !empty(filter_var(trim($_POST['buy_now_price']))) ? filter_var(trim($_POST['buy_now_price']), FILTER_VALIDATE_FLOAT) : null,
                'start_time' => trim($_POST['start_time']),
                'end_time' => trim($_POST['end_time']),
            ];
            
            // Create auction
            $auction = new AuctionModel();
            $auction->createAuction($auctionData);
            
            redirect('auctions');
        } else {
            redirect('bookSellerListings');
        }
    }

    public function updateBid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get form data
            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'current_price' => filter_var(trim($_POST['bid-amount']), FILTER_VALIDATE_FLOAT),
                'previous_bid' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'current_bidder_id' => $_SESSION['user_id'],
                'winner_user_id' => null,
                'is_closed' => 0,
            ];
            
            // Update auction
            $auction = new AuctionModel();
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
            
            $auctionData = [
                'id' => trim($_POST['auction_id']),
                'book_id' => trim($_POST['book_id']),
                'current_price' => filter_var(trim($_POST['current_price']), FILTER_VALIDATE_FLOAT),
                'previous_bid' => filter_var(trim($_POST['previous_bid']), FILTER_VALIDATE_FLOAT),
                'current_bidder_id' => $_SESSION['user_id'],
                'winner_user_id' => $_SESSION['user_id'],
                'is_closed' => 1,
            ];
  
            $auction = new AuctionModel();
            $auction->updateAuction($auctionData);

            //Buy now function

            $bookModel = new BookModel();
            $bookModel->update($auctionData['book_id'], ['status' => 'removed']);
            
            redirect('auctions/details/' . trim($_POST['auction_id']));
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

     
