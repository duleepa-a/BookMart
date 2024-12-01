document.addEventListener('DOMContentLoaded', function() {
    const viewMoreButton = document.querySelector('.view-more-button');
    const notificationsContainer = document.querySelector('.notifications-container');
    let page = 1;

    viewMoreButton.addEventListener('click', function() {
        // Placeholder for AJAX call to load more notifications
        fetch(`/notifications/load-more?page=${page}`)
            .then(response => response.json())
            .then(data => {
                if (data.notifications && data.notifications.length > 0) {
                    data.notifications.forEach(notification => {
                        const notificationCard = createNotificationCard(notification);
                        notificationsContainer.appendChild(notificationCard);
                    });
                    page++;

                    // Disable view more button if no more notifications
                    if (data.isLastPage) {
                        viewMoreButton.style.display = 'none';
                    }
                } else {
                    viewMoreButton.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error loading notifications:', error);
            });
    });

    function createNotificationCard(notification) {
        const card = document.createElement('div');
        card.classList.add('notification-card');
        
        if (!notification.read) {
            card.classList.add('unread');
        }

        card.innerHTML = `
            <div class="notification-header">
                <h2>${notification.title}</h2>
                <span class="notification-meta">${notification.timestamp}</span>
            </div>
            <div class="notification-content">
                <p>${notification.message}</p>
            </div>
        `;

        return card;
    }

    // Mark notifications as read when clicked
    notificationsContainer.addEventListener('click', function(event) {
        const notificationCard = event.target.closest('.notification-card');
        if (notificationCard && notificationCard.classList.contains('unread')) {
            notificationCard.classList.remove('unread');
        }
    });
});