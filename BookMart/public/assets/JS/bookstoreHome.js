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

// Select elements
const addBookButton = document.querySelector('.add-book-bttn');
const modal = document.querySelector('.modal');
const closeModalButton = document.querySelector('.close-modal');

console.log(addBookButton);

// Show modal
addBookButton.addEventListener('click', () => {
    modal.classList.add('active');
});

// Hide modal
closeModalButton.addEventListener('click', () => {
    modal.classList.remove('active');
});

// Close modal when clicking on the overlay
modal.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal-overlay')) {
        modal.classList.remove('active');
    }
});


