<?php

class NotificationModel {
    use Model;

    protected $table = 'notifications';

    protected $allowedColumns = [
        'id',
        'user_id',
        'title',
        'content',
        'link',
        'is_read',
        'created_at'
    ];

    public function createNotification($user_id, $title, $content, $link = null) {
        $data = [
            'user_id' => $user_id,
            'title' => $title,
            'content' => $content,
            'link' => $link,
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        return $this->insert($data);
    }

    public function getNotifications($userId, $limit = 5) {
        $this->setLimit($limit);
        return $this->where(['user_id' => $userId]);
    }

    public function deleteNotificationWithId($id) {
        $this->delete($id);
    }
}