<?php

class Notifications extends Controller{

    public function index(){

        $notifications = new NotificationModel();

        $user_id = $_SESSION['user_id'];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = $this->getSlicedNotifications($user_id, $page);
    
        $this->view('notifications', $data);

    }

    public function markAsRead() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $input = json_decode(file_get_contents("php://input"), true);
    
            $notification_id = (int)$input['id'];
            $user_id = $_SESSION['user_id'];
    
            $notifications = new NotificationModel();
    
            $notification = $notifications->first([
                'id' => $notification_id,
                'user_id' => $user_id
            ]);
    
            if ($notification) {
                $notifications->update($notification_id, ['is_read' => 1]);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Not found']);
            }
        }
    }

    public function deleteNotification() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $notifications = new NotificationModel();

            $id = htmlspecialchars(trim($_POST['notification_id']));
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $user_id = $_SESSION['user_id'];

            $notification = $notifications->first([
                'id' => $id,
                'user_id' => $user_id
            ]);
            
            if ($notification) {
                $notifications->deleteNotificationWithId($id);
            }

            $data = $this->getSlicedNotifications($user_id, $page);

            if (empty($data['notifications']) && $page > 1) {
                $page--;
            }
            redirect('notifications?page=' . $page); 
        }

        else {
            redirect('notifications'); 
        }
    }

    public function getSlicedNotifications($user_id, $page) {
        $notifications = new NotificationModel();
        
        $page = max(1, $page); 
        $perPage = 5;
    
        $fetchLimit = $page * $perPage + 1;
        $allNotifications = $notifications->getNotifications($user_id, $fetchLimit);
    
        if (!is_array($allNotifications) || empty($allNotifications)) {
            $data = [
                'notifications' => [],
                'page' => $page,
                'hasNext' => false,
                'hasPrevious' => false,
                'showPageControl' => false,
            ];
        } else {
            $start = ($page - 1) * $perPage;
            $pagedNotifications = array_slice($allNotifications, $start, $perPage);
            $hasNext = count($allNotifications) > $page * $perPage;
    
            $data = [
                'notifications' => $pagedNotifications,
                'page' => $page,
                'hasNext' => $hasNext,
                'hasPrevious' => $page > 1,
                'showPageControl' => count($allNotifications) > $perPage,
            ];
        }

        return $data;
    }

}