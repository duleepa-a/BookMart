document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const editButton = document.querySelector('.edit-button');
    const deleteButton = document.querySelector('.delete-button');
    const updateModal = document.getElementById('update-book-modal');
    const deleteModal = document.getElementById('delete-book-modal');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    const selectAllButton = document.querySelector('.select-all-button');
    const selectAllCheckbox = document.querySelector('.select-all-checkbox');
    const bookCheckboxes = document.querySelectorAll('.book-checkbox');
    
    // Track selected books
    let selectedBooks = new Set();

    // Function to update button states
    function updateButtonStates() {
        editButton.disabled = selectedBooks.size !== 1;
        deleteButton.disabled = selectedBooks.size === 0;
    }

    // Function to populate update modal with book data
    function populateUpdateModal(bookRow) {
        const modalForm = updateModal.querySelector('.update-book-form');
        const bookData = bookRow.dataset;
        
        // Set book ID
        modalForm.querySelector('#update-book-id').value = bookData.book_id;
        
        // Populate text fields
        const textFields = ['title', 'isbn', 'author', 'publisher', 'price', 
                          'discount', 'quantity', 'description'];
        textFields.forEach(field => {
            const input = modalForm.querySelector(`#update-${field}`);
            if (input) input.value = bookData[field] || '';
        });
        
        // Populate select fields
        const selectFields = ['genre', 'condition', 'language'];
        selectFields.forEach(field => {
            const select = modalForm.querySelector(`#update-${field}`);
            if (select) select.value = bookData[field] || '';
        });
    }

    // Handle individual checkbox changes
    bookCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const bookRow = this.closest('.book-row');
            
            if (this.checked) {
                selectedBooks.add(bookRow);
            } else {
                selectedBooks.delete(bookRow);
            }
            
            selectAllCheckbox.checked = selectedBooks.size === bookCheckboxes.length;
            updateButtonStates();
        });
    });

    // Handle select all checkbox
    selectAllCheckbox.addEventListener('change', function() {
        bookCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
            const bookRow = checkbox.closest('.book-row');
            
            if (this.checked) {
                selectedBooks.add(bookRow);
            } else {
                selectedBooks.delete(bookRow);
            }
        });
        
        updateButtonStates();
    });

    // Handle select all button
    selectAllButton.addEventListener('click', function() {
        selectAllCheckbox.checked = !selectAllCheckbox.checked;
        selectAllCheckbox.dispatchEvent(new Event('change'));
    });

    // Handle edit button click
    editButton.addEventListener('click', function() {
        if (selectedBooks.size !== 1) return;
        
        const selectedRow = selectedBooks.values().next().value;
        populateUpdateModal(selectedRow);
        updateModal.classList.add('active');
    });

    // Handle delete button click
    deleteButton.addEventListener('click', function() {
        if (selectedBooks.size === 0) return;
        
        const booksToDeleteList = deleteModal.querySelector('#books-to-delete-list');
        const deleteBookIds = deleteModal.querySelector('#delete-book-ids');
        
        // Clear previous list
        booksToDeleteList.innerHTML = '';
        
        // Get all selected books
        const selectedBooksArray = Array.from(selectedBooks);
        
        // Process each selected book
        selectedBooksArray.forEach(bookRow => {
            const title = bookRow.dataset.title;
            const bookId = bookRow.dataset.book_id;
            
            // Create confirmation message for each book
            const bookItem = document.createElement('div');
            bookItem.className = 'book-to-delete';
            bookItem.textContent = title;
            booksToDeleteList.appendChild(bookItem);
            
            // Add book ID to the list
            if (deleteBookIds.value) {
                deleteBookIds.value += ',' + bookId;
            } else {
                deleteBookIds.value = bookId;
            }
        });
        
        // Show delete modal
        deleteModal.classList.add('active');
    });
    
    // Handle modal closes
    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            modal.classList.remove('active');
        });
    });

    // Close modals when clicking overlay
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                this.classList.remove('active');
            }
        });
    });

});

document.getElementById('logoutButtonBookSeller').addEventListener('click', function() {
    
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