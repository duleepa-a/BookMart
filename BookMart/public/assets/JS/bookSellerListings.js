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
        const textFields = ['title', 'ISBN', 'author', 'publisher', 'price', 
                          'discount', 'quantity', 'description'];
        textFields.forEach(field => {
            const input = modalForm.querySelector(`#update-${field}`);
            if (input) input.value = bookData[field] || '';
        });
        
        // Populate select fields
        const selectFields = ['genre', 'book_condition', 'language'];
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
        
        // Create list of books to delete
        const bookIds = [];
        selectedBooks.forEach(bookRow => {
            const title = bookRow.dataset.title;
            const bookId = bookRow.dataset.book_id;
            bookIds.push(bookId);
            
            const bookItem = document.createElement('div');
            bookItem.className = 'book-to-delete';
            bookItem.textContent = title;
            booksToDeleteList.appendChild(bookItem);
        });
        
        // Set book IDs for form submission
        deleteBookIds.value = bookIds.join(',');
        
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

    // Handle update form submission
    const updateForm = document.querySelector('.update-book-form');
    updateForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch(`${ROOT}/bookSellerListings/updateBook`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            try {
                const result = JSON.parse(data);
                if (result.status === 'success') {
                    location.reload(); // Refresh to show updated data
                } else {
                    alert('Error updating book: ' + result.message);
                }
            } catch (e) {
                // Handle non-JSON response
                if (data.includes('redirect')) {
                    location.reload();
                } else {
                    alert('Error updating book. Please try again.');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the book');
        });
    });

    // Handle delete form submission
    const deleteForm = document.querySelector('.delete-book-form');
    deleteForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData();
        const bookIds = this.querySelector('#delete-book-ids').value;
        formData.append('book_id', bookIds);
        
        fetch(`${ROOT}/bookSellerListings/deleteBook`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            try {
                const result = JSON.parse(data);
                if (result.status === 'success') {
                    location.reload();
                } else {
                    alert('Error deleting books: ' + result.message);
                }
            } catch (e) {
                // Handle non-JSON response
                if (data.includes('redirect')) {
                    location.reload();
                } else {
                    alert('Error deleting books. Please try again.');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting books');
        });
    });

    // Other existing event listeners remain the same...
});