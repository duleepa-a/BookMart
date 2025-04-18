<?php

class NotificationModel {
    use Model;

    protected $table = 'notifications';

    protected $allowedColumns = [
        'id',
        'user_id',
        'title',
        'content',
        'is_read',
        'created_at'
    ];

    public function getNotifications($userId, $limit = 5) {
        $this->setLimit($limit);
        return $this->where(['user_id' => $userId]);
    }

    public function deleteNotificationWithId($id) {
        $this->delete($id);
    }
}