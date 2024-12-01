document.addEventListener('DOMContentLoaded', function() {
    const chatInput = document.getElementById('chatInput');
    const chatSendButton = document.getElementById('chatSendButton');
    const chatMessages = document.getElementById('chatMessages');

    function sendMessage() {
        const messageText = chatInput.value.trim();
        
        if (messageText === '') return;

        const messageElement = document.createElement('div');
        messageElement.classList.add('message', 'message-sent');
        messageElement.textContent = messageText;

        chatMessages.appendChild(messageElement);

        chatInput.value = '';

        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    chatSendButton.addEventListener('click', sendMessage);

    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});