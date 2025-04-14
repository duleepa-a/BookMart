<?php

class Auctions extends Controller {

    public function index() {
        $auctionModel = new AuctionModel();
        $bookModel = new BookModel();
        $userModel = new UserModel();

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;

        $auctions = $auctionModel->getActiveAuctions($limit+1);

        $displayAuctions = array_slice($auctions, 0, $limit);

        $data = [
            'auctions' => $displayAuctions,
            'recAuctions' => $displayAuctions,
            'limit' => $limit,
            'hasMore' => count($auctions) > $limit,
            'userid' => $_SESSION['user_id'] ?? null,
        ];

        $this->view('auctions', $data);
    }

    public function details($id) {
        $auctionModel = new AuctionModel();
    
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    
        $mainAuction = $auctionModel->getAuctionWithBook($id);
        $auctions = $auctionModel->getActiveAuctions($limit + 1);
    
        // Filter out the current auction
        $recAuctions = array_filter($auctions, fn($a) => $a->id != $id);
        $recAuctions = array_slice($recAuctions, 0, $limit);
    
        $data = [
            'auctions' => $mainAuction,
            'recAuctions' => $recAuctions,
            'limit' => $limit,
            'hasMore' => count($auctions) > $limit,
            'userid' => $_SESSION['user_id'] ?? null,
        ];
    
        $this->view('auctionDetails', $data);
    }   
}
    /* 
    // Show form to create new auction
    public function create($bookId = null) {
        if (!$bookId) {
            echo "Book ID required to start an auction.";
            return;
        }

        $bookModel = new BookModel();
        $book = $bookModel->where(['id' => $bookId])[0] ?? null;

        if (!$book) {
            echo "Book not found.";
            return;
        }

        $this->view('auctions/create', ['book' => $book]);
    }

    // Handle auction creation form submit
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auctionModel = new AuctionModel();

            $data = [
                'book_id'        => $_POST['book_id'],
                'seller_id'      => $_SESSION['user_id'],
                'starting_price' => $_POST['starting_price'],
                'current_price'  => $_POST['starting_price'],
                'buy_now_price'  => $_POST['buy_now_price'],
                'start_time'     => $_POST['start_time'],
                'end_time'       => $_POST['end_time'],
                'is_closed'      => 0,
                'created_at'     => date('Y-m-d H:i:s'),
            ];

            if ($auctionModel->insert($data)) {
                redirect('auctions/index');
            } else {
                echo "Failed to create auction.";
            }
        }
    }

    // View specific auction with bid form
    public function show($id) {
        $auctionModel = new AuctionModel();
        $bidModel = new BidModel();

        $auction = $auctionModel->getAuctionWithBook($id);
        if (!$auction) {
            echo "Auction not found.";
            return;
        }

        $bids = $bidModel->getBidsForAuction($id);

        $this->view('auctions/show', [
            'auction' => $auction,
            'bids'    => $bids
        ]);
    }

    // Place a bid
    public function bid() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auctionId = $_POST['auction_id'];
            $userId = $_SESSION['user_id'];
            $bidAmount = floatval($_POST['bid_amount']);

            $auctionModel = new AuctionModel();
            $bidModel = new BidModel();

            $auction = $auctionModel->where(['id' => $auctionId])[0] ?? null;

            if (!$auction || $auction['is_closed']) {
                echo "Auction not available.";
                return;
            }

            if ($bidAmount <= $auction['current_price']) {
                echo "Bid must be higher than current price.";
                return;
            }

            $bidData = [
                'auction_id' => $auctionId,
                'user_id'    => $userId,
                'bid_amount' => $bidAmount
            ];

            $bidModel->placeBid($bidData);

            $auctionModel->update($auctionId, ['current_price' => $bidAmount]);

            redirect("auctions/show/$auctionId");
        }
    }

    // Buy now – instantly win auction
    public function buyNow($id) {
        $userId = $_SESSION['user_id'];
        $auctionModel = new AuctionModel();

        $auction = $auctionModel->where(['id' => $id])[0] ?? null;

        if (!$auction || $auction['is_closed']) {
            echo "Auction not available.";
            return;
        }

        if (!$auction['buy_now_price']) {
            echo "Buy Now option is not available.";
            return;
        }

        // Set final price and close auction
        $auctionModel->update($id, [
            'current_price'   => $auction['buy_now_price'],
            'winner_user_id'  => $userId,
            'is_closed'       => 1
        ]);

        redirect("auctions/show/$id");
    } */
