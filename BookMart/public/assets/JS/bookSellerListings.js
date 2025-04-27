document.addEventListener('DOMContentLoaded', function() {
    const updateModal = document.getElementById('update-book-modal');
    const deleteModal = document.getElementById('delete-book-modal');
    const auctionModal = document.getElementById('create-auction-modal');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    
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
    
    function setMinDateTime() {
        const now = new Date();     // Format: YYYY-MM-DDThh:mm
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
    
    // Update end time minimum when start time changes
    document.getElementById('start-time').addEventListener('change', function() {
        document.getElementById('end-time').min = this.value;
        
    });

    document.querySelector(".inventory-table").addEventListener("click", (e) => {
        // Check if the clicked element is within a row
        const row = e.target.closest(".book-row");
        if (!row) return;
        
        // Only proceed if the book status is 'available'
        if (row.dataset.status !== 'available') return;
        
        // Populate and show update modal
        populateUpdateModal(row);
        updateModal.classList.add('active');
    });

    document.querySelector(".delete-modal").addEventListener("click", (e) => {
        const bookId = document.getElementById("update-book-id").value;
        updateModal.classList.remove('active');
        
        const deleteModal = document.getElementById("delete-book-modal");
        deleteModal.querySelector("#delete-book-ids").value = bookId;
        
        // Get book title for confirmation message
        const bookTitle = document.getElementById("update-title").value;
        const booksToDeleteList = document.getElementById("books-to-delete-list");
        booksToDeleteList.innerHTML = `<div class="book-to-delete">${bookTitle}</div>`;
        
        deleteModal.classList.add('active');
    });

    document.querySelector(".create-auction-modal").addEventListener("click", (e) => {
        const bookId = document.getElementById("update-book-id").value;
        const row = document.querySelector(`.book-row[data-book_id="${bookId}"]`);
        if (!row) return;
        
        // Only proceed if the book status is 'available'
        if (row.dataset.status !== 'available') return;
        updateModal.classList.remove('active');
        
        populateAuctionModal(row);
        auctionModal.classList.add('active');
    });

    // Add search functionality
    const searchBar = document.querySelector(".search-bar");
    if (searchBar) {
        searchBar.addEventListener("input", function() {
            const searchQuery = searchBar.value.toLowerCase();
            const tableRows = document.querySelectorAll(".inventory-table tbody .book-row");

            tableRows.forEach(row => {
                const title = row.dataset.title.toLowerCase();
                const author = row.dataset.author.toLowerCase();
                const genre = row.dataset.genre.toLowerCase();
                const publisher = row.dataset.publisher.toLowerCase();

                if (
                    title.includes(searchQuery) || 
                    author.includes(searchQuery) || 
                    genre.includes(searchQuery) || 
                    publisher.includes(searchQuery)
                ) {
                    row.style.display = ""; 
                } else {
                    row.style.display = "none"; 
                }
            });
        });
    }
});