document.addEventListener("DOMContentLoaded", function () {
    const chatMessages = document.getElementById("chatMessages");
    const chatInput = document.getElementById("chatInput");
    const chatSendButton = document.getElementById("chatSendButton");

    const receiverId = chatMessages.dataset.receiverId;
    const fetchMessagesUrl = `/BookMart/public/chat/fetchMessages/${receiverId}`;
    const sendMessageUrl = `/BookMart/public/chat/send`;

    function fetchMessages() {
        const isScrolledToBottom = chatMessages.scrollHeight - chatMessages.clientHeight <= chatMessages.scrollTop + 10;
        fetch(fetchMessagesUrl)
            .then(response => response.json())
            .then(messages => {
                chatMessages.innerHTML = "";
                messages.forEach(msg => {
                    const messageElement = document.createElement("div");
                    messageElement.classList.add("message");
    
                    if (msg.sender_id == receiverId) {
                        messageElement.classList.add("message-received");
                    } else { 
                        messageElement.classList.add("message-sent");
                    }
    
                    // Message content
                    const messageText = document.createElement("p");
                    messageText.classList.add("message-text");
                    messageText.textContent = msg.message;
    
                    // Timestamp
                    const messageTime = document.createElement("span");
                    if (msg.sender_id == receiverId) {
                        messageTime.classList.add("message-time");
                    } else { 
                        messageTime.classList.add("message-time-sent");
                    }
                    messageTime.textContent = formatTimestamp(msg.created_at);
    
                    // Append elements
                    messageElement.appendChild(messageText);
                    messageElement.appendChild(messageTime);
                    chatMessages.appendChild(messageElement);
                });
    
                if (isScrolledToBottom) {
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            })
            .catch(error => console.error("Error fetching messages:", error));
    }
    
    // Format timestamp function
    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleString("en-US", {
            day: "2-digit",
            month: "short",
            year: "numeric",
            hour: "2-digit",
            minute: "2-digit",
            hour12: true
        }); 
    }
    

    function sendMessage() {
        const message = chatInput.value.trim();
        if (message === "") return;

        fetch(sendMessageUrl, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ receiver_id: receiverId, message: message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                chatInput.value = ""; 
                fetchMessages(); 
                setTimeout(() => { chatMessages.scrollTop = chatMessages.scrollHeight; }, 100);
            } else {
                console.error("Message sending failed:", data.error);
            }
        
        })
        .catch(error => console.error("Error sending message:", error));
    }

    
    chatInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault(); // Prevents adding a new line
            sendMessage();
        }
    });

    chatSendButton.addEventListener("click", sendMessage);

    // Auto fetch messages every second
    setInterval(fetchMessages, 1000);
    fetchMessages();
});
