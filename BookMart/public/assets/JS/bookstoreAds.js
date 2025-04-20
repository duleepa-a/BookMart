const addBookButton = document.querySelector('.add-book-bttn');
const modal = document.querySelector('.modal');
const closeModalButton = document.querySelector('.close-modal');

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

