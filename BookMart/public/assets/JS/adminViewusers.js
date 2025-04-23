document.addEventListener('DOMContentLoaded', function() {
    // Logout Button
    const logoutButton = document.getElementById('logoutButton');
    if (logoutButton) {
        logoutButton.addEventListener('click', function() {
            fetch('http://localhost/BookMart/public/user/logout', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json(); 
                }
                throw new Error('Logout failed.');
            })
            .then(data => {
                console.log(data); 
                if (data.status === 'success') {
                    window.location.href = 'http://localhost/BookMart/public/'; 
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error during logout:', error);
                alert('Logout failed. Please try again.');
            });
        });
    }

    // Tab functionality - improved
    const tabs = document.querySelectorAll('.tab');
    
    // Get all the content sections
    const basicInfoBox = document.querySelector('.tabs').nextElementSibling;
    const sectionTitles = document.querySelectorAll('.section-title');
    
    // Initially show only the Basic Info tab content
    basicInfoBox.style.display = 'block';
    
    // Hide all other content sections initially
    sectionTitles.forEach(section => {
        section.style.display = 'none';
        if (section.nextElementSibling) {
            section.nextElementSibling.style.display = 'none';
        }
    });
    
    // Add click event to tabs
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all content sections first
            basicInfoBox.style.display = 'none';
            sectionTitles.forEach(section => {
                section.style.display = 'none';
                if (section.nextElementSibling) {
                    section.nextElementSibling.style.display = 'none';
                }
            });
            
            // Show the selected content based on tab index
            if (index === 0) {
                // Show Basic Info
                basicInfoBox.style.display = 'block';
            } else if (index === 1 && sectionTitles[0]) {
                // Show Orders/Listings (first section)
                sectionTitles[0].style.display = 'flex';
                if (sectionTitles[0].nextElementSibling) {
                    sectionTitles[0].nextElementSibling.style.display = 'block';
                }
            } else if (index === 2 && sectionTitles[1]) {
                // Show Reviews/Ratings (second section)
                sectionTitles[1].style.display = 'flex';
                if (sectionTitles[1].nextElementSibling) {
                    sectionTitles[1].nextElementSibling.style.display = 'block';
                }
            }
        });
    });

    // Status toggle button
    const statusToggle = document.getElementById("status-toggle");
    const confirmDialog = document.getElementById('confirmationDialog');
    const successMessage = document.getElementById('successMessage');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    
    if (statusToggle) {
        statusToggle.addEventListener("click", function(e) {
            e.preventDefault();
            confirmDialog.classList.add('show');
        });
    }
    
    // Cancel button click handler
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            confirmDialog.classList.remove('show');
        });
    }
    
    // Confirm status change button click handler
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const statusText = document.getElementById("status-text");
            const button = document.getElementById("status-toggle");
            const userId = getUserIdFromUrl();
            let newStatus;
            
            // Toggle status
            if (statusText.innerText.toLowerCase() === "active") {
                newStatus = "suspended";
                statusText.innerText = newStatus;
                statusText.classList.remove("status-active");
                statusText.classList.add("status-suspended");
                button.innerText = "Activate";
                button.classList.remove("suspend");
                button.classList.add("activate");
            } else {
                newStatus = "active";
                statusText.innerText = newStatus;
                statusText.classList.remove("status-suspended");
                statusText.classList.add("status-active");
                button.innerText = "Suspend";
                button.classList.remove("activate");
                button.classList.add("suspend");
            }
            
            // Update the database
            if (userId) {
                updateUserStatus(userId, newStatus);
            }
            
            // Hide confirmation dialog
            confirmDialog.classList.remove('show');
            
            // Show success message
            successMessage.classList.add('show');
            
            // Hide success message after 2 seconds
            setTimeout(function() {
                successMessage.classList.remove('show');
            }, 2000);
        });
    }
    
    // Function to extract user ID from URL
    function getUserIdFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }
    
    // Function to update user status in the database
    // Function to update user status in the database
function updateUserStatus(userId, status) {
    fetch(`${window.location.origin}/BookMart/public/adminViewbuyer/updateStatus`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            userId: userId,
            active_status: status  // Changed from 'status' to 'active_status'
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Status update failed');
        }
        return response.json();
    })
    .then(data => {
        console.log('Status updated successfully:', data);
    })
    .catch(error => {
        console.error('Error updating status:', error);
        alert('Failed to update user status. Please try again.');
    });
}
    
    // Close dialogs when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === confirmDialog) {
            confirmDialog.classList.remove('show');
        }
        if (event.target === successMessage) {
            successMessage.classList.remove('show');
        }
    });

    // Search functionality for orders table
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const tableContainer = this.closest('.box');
            const table = tableContainer.querySelector('.table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let visible = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        visible = true;
                        break;
                    }
                }
                
                rows[i].style.display = visible ? '' : 'none';
            }
        });
    }

    // Search functionality for reviews table
    const reviewSearchInput = document.getElementById('reviewSearchInput');
    if (reviewSearchInput) {
        reviewSearchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const tableContainer = this.closest('.box');
            const table = tableContainer.querySelector('.table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let visible = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        visible = true;
                        break;
                    }
                }
                
                rows[i].style.display = visible ? '' : 'none';
            }
        });
    }
    
    // Add animation to table rows
    const animateRows = () => {
        const tables = document.querySelectorAll('.table');
        tables.forEach(table => {
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.animation = `fadeIn 0.3s ease-in-out ${index * 0.05}s both`;
            });
        });
    };
    
    // Call animation function
    animateRows();
});

// Add required animation keyframes
document.addEventListener('DOMContentLoaded', function() {
    // Create style element
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});