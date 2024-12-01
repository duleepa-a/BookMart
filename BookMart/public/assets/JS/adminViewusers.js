//Logout Button
document.getElementById('logoutButton').addEventListener('click', function() {
    
    fetch('http://localhost/BookMart/public/user/logout', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json(); 
            throw new Error('Logout failed.');
        }
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


// deletion dialog box
document.addEventListener('DOMContentLoaded', function() {
    // Get the buttons and dialogs
    const deleteBtn = document.querySelector('.deleteUserBtn');
    const confirmDialog = document.getElementById('confirmationDialog');
    const successMessage = document.getElementById('successMessage');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    // Delete button click handler
    if(deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            confirmDialog.classList.add('show');
        });
    }

    // Cancel button click handler
    if(cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            confirmDialog.classList.remove('show');
        });
    }

    // Confirm delete button click handler
    if(confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
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

    // Close dialogs when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === confirmDialog) {
            confirmDialog.classList.remove('show');
        }
        if (event.target === successMessage) {
            successMessage.classList.remove('show');
        }
    });
});