<?php

class Chat extends Controller{
    public function index()
    {
        $currentUserId = $_SESSION['user_id']; 
        $chatModel = new ChatModel();
        $chatList = $chatModel->getChatList($currentUserId);
        
        $this->view('chat', ['chatList' => $chatList]);
    }

    public function chatbox($receiverId)
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("login"); 
        }

        $chatModel = new ChatModel();
        $userModel = new UserModel();

        $reciver= $userModel->first(["id"=>$receiverId]);
        $userId = $_SESSION['user_id'];

        $messages = $chatModel->getMessages($userId, $receiverId);

        $this->view("chatbox", ["messages" => $messages, "receiverId" => $receiverId,"reciverUsername"=> $reciver->username]);
    }

    public function send()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_SESSION['user_id'])) {
                http_response_code(401);
                echo json_encode(["error" => "Unauthorized"]);
                exit;
            }

            $data = json_decode(file_get_contents("php://input"), true);
            $senderId = $_SESSION['user_id'];
            $receiverId = $data['receiver_id'];
            $message = $data['message'];

            if (empty($message)) {
                http_response_code(400);
                echo json_encode(["error" => "Message cannot be empty"]);
                exit;
            }

            $chatModel = new ChatModel();
            $chatModel->sendMessage($senderId, $receiverId, $message);

            echo json_encode(["success" => true]);
            exit;
        }
    }

    public function fetchMessages($receiverId)
    {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit;
        }

        $chatModel = new ChatModel();
        $userId = $_SESSION['user_id'];

        $messages = $chatModel->getMessages($userId, $receiverId);

        echo json_encode($messages);
        exit;
    }

}