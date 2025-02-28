<?php

class ChatModel{
    use Model;

    protected $table = "messages";
    protected $allowedColumns = ["sender_id", "receiver_id", "message", "is_read", "created_at"];

    public function getMessages($user1, $user2) {
        $query = "SELECT * FROM messages WHERE (sender_id = :user1 AND receiver_id = :user2) 
                  OR (sender_id = :user2 AND receiver_id = :user1) ORDER BY created_at ASC";

        return $this->query($query, ["user1" => $user1, "user2" => $user2]);
    }

    public function sendMessage($sender_id, $receiver_id, $message) {
        return $this->insert(["sender_id" => $sender_id, "receiver_id" => $receiver_id, "message" => $message]);
    }

    public function markAsRead($receiver_id, $sender_id) {
        $query = "UPDATE messages SET is_read = 1 WHERE receiver_id = :receiver AND sender_id = :sender";
        $this->query($query, ["receiver" => $receiver_id, "sender" => $sender_id]);
    }

    public function getChatList($currentUserId)
    {
        $query = "
            SELECT 
                u.id AS user_id, 
                u.username, 
                latest_messages.last_message_time,
                latest_messages.last_message,
                COALESCE(unread.unread_count, 0) AS unread_count
            FROM user u
            INNER JOIN (
                -- Get the latest message for each user the current user has chatted with
                SELECT 
                    m1.sender_id,
                    m1.receiver_id,
                    m1.message AS last_message,
                    m1.created_at AS last_message_time
                FROM messages m1
                WHERE m1.created_at = (
                    -- Get the most recent message between current user and another user
                    SELECT MAX(m2.created_at) 
                    FROM messages m2 
                    WHERE (m2.sender_id = m1.sender_id AND m2.receiver_id = m1.receiver_id) 
                    OR (m2.sender_id = m1.receiver_id AND m2.receiver_id = m1.sender_id)
                )
            ) AS latest_messages 
            ON (u.id = latest_messages.sender_id OR u.id = latest_messages.receiver_id)
            AND u.id != :current_user_id

            LEFT JOIN (
                -- Count unread messages for each user
                SELECT 
                    m.sender_id, 
                    COUNT(*) AS unread_count
                FROM messages m
                WHERE m.is_read = 0 
                AND m.receiver_id = :current_user_id
                GROUP BY m.sender_id
            ) AS unread 
            ON u.id = unread.sender_id

            WHERE u.id IN (
                -- Only include users who have chatted with the current user
                SELECT DISTINCT 
                    CASE 
                        WHEN m.sender_id = :current_user_id THEN m.receiver_id
                        WHEN m.receiver_id = :current_user_id THEN m.sender_id
                    END 
                FROM messages m
                WHERE m.sender_id = :current_user_id OR m.receiver_id = :current_user_id
            )

            ORDER BY last_message_time DESC;

        ";

        return $this->query($query, ['current_user_id' => $currentUserId]);
    }

}
