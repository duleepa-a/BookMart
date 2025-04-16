document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.querySelector('.edit-button');
    const deleteButton = document.querySelector('.delete-button');
    const auctionButton = document.querySelector('.auction-button');
    const updateModal = document.getElementById('update-book-modal');
    const deleteModal = document.getElementById('delete-book-modal');
    const auctionModal = document.getElementById('create-auction-modal');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    const selectAllButton = document.querySelector('.select-all-button');
    const selectAllCheckbox = document.querySelector('.select-all-checkbox');
    const bookCheckboxes = document.querySelectorAll('.book-checkbox');
    
    let selectedBooks = new Set();

    function updateButtonStates() {
        const selectedArray = Array.from(selectedBooks);
        const selectedCount = selectedArray.length;

        const allAvailable = selectedArray.every(bookRow => bookRow.dataset.status === 'available');

        editButton.disabled = !(selectedCount === 1 && allAvailable);
        auctionButton.disabled = !(selectedCount === 1 && allAvailable);
        deleteButton.disabled = !(selectedCount > 0 && allAvailable);
    }

    function populateUpdateModal(bookRow) {
        const modalForm = updateModal.querySelector('.update-book-form');
        const bookData = bookRow.dataset;
        
        modalForm.querySelector('#update-book-id').value = bookData.book_id;
        
        const textFields = ['title', 'isbn', 'author', 'publisher', 'price', 
                          'discount', 'quantity', 'description'];
        textFields.forEach(field => {
            const input = modalForm.querySelector(`#update-${field}`);
            if (input) input.value = bookData[field] || '';
        });
        
        const selectFields = ['genre', 'condition', 'language'];
        selectFields.forEach(field => {
            const select = modalForm.querySelector(`#update-${field}`);
            if (select) select.value = bookData[field] || '';
        });
    }

    function populateAuctionModal(bookRow) {
        const modalForm = auctionModal.querySelector('.create-auction-form');
        const bookData = bookRow.dataset;
        
        modalForm.querySelector('#auction-book-id').value = bookData.book_id;
        
        document.getElementById('auction-book-title').textContent = bookData.title || 'Book Title';
        document.getElementById('auction-book-author').textContent = bookData.author || 'Author Name';
        
        const coverImg = document.getElementById('auction-book-cover');
        if (bookData.cover_image) {
            coverImg.src = bookData.cover_image;
        } 
        else {
            coverImg.src = '/images/default-book-cover.jpg';
        }

        document.getElementById('starting-price').value = bookData.price || '0.01';
        document.getElementById('buy-now-price').min = bookData.price || '0.01';
        
        setMinDateTime();

        document.getElementById('starting-price').addEventListener('change', function() {
            document.getElementById('buy-now-price').min = this.value;
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

    // Handle auction button click
    auctionButton.addEventListener('click', function() {
        if (selectedBooks.size !== 1) return;
        
        const selectedRow = selectedBooks.values().next().value;
        populateAuctionModal(selectedRow);
        auctionModal.classList.add('active');
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

    function setMinDateTime() {
        const now = new Date();
        // Format: YYYY-MM-DDThh:mm
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        
        const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        
        document.getElementById('start-time').min = formattedDateTime;
        
        // Set default value to current time
        document.getElementById('start-time').value = formattedDateTime;
        
        // Set end time min to be same as start time
        document.getElementById('end-time').min = formattedDateTime;
        
        // Set end time default to current time + 7 days
        const endDate = new Date(now);
        endDate.setDate(now.getDate() + 7);
        const endYear = endDate.getFullYear();
        const endMonth = String(endDate.getMonth() + 1).padStart(2, '0');
        const endDay = String(endDate.getDate()).padStart(2, '0');
        const endHours = String(endDate.getHours()).padStart(2, '0');
        const endMinutes = String(endDate.getMinutes()).padStart(2, '0');
        
        const formattedEndDateTime = `${endYear}-${endMonth}-${endDay}T${endHours}:${endMinutes}`;
        document.getElementById('end-time').value = formattedEndDateTime;
    }
    
    // Update end time minimum when start time changes
    document.getElementById('start-time').addEventListener('change', function() {
        document.getElementById('end-time').min = this.value;
        
        // If end time is now before start time, update it
        if (document.getElementById('end-time').value < this.value) {
            document.getElementById('end-time').value = this.value;
        }
    });

});