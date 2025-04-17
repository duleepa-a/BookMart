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
const modal = document.querySelector('#add-book-modal');
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

// Event delegation for handling row clicks
document.querySelector(".inventory-table").addEventListener("click", (e) => {
    // Check if the clicked element is within a row
    const row = e.target.closest(".book-row");
    console.log(row);
    if (!row) return;

    const bookId = row.dataset.book_id;
    const title = row.dataset.title;
    const ISBN = row.dataset.isbn;
    const author = row.dataset.author;
    const genre = row.dataset.genre;
    const publisher = row.dataset.publisher;
    const condition = row.dataset.book_condition;
    const price = row.dataset.price;
    const discount = row.dataset.discount;
    const quantity = row.dataset.quantity;
    const language = row.dataset.language;
    const description = row.dataset.description;
    
    console.log(bookId);
    // Show update modal
    const updateModal = document.getElementById("update-book-modal");
    updateModal.querySelector("#update-book-id").value = bookId;
    updateModal.querySelector("#update-title").value = title;
    updateModal.querySelector("#update-author").value = author;
    updateModal.querySelector("#update-genre").value = genre;
    updateModal.querySelector("#update-publisher").value = publisher;
    updateModal.querySelector("#update-price").value = price;
    updateModal.querySelector("#update-quantity").value = quantity;
    updateModal.querySelector("#update-ISBN").value = ISBN;
    updateModal.querySelector("#update-book_condition").value = condition;
    updateModal.querySelector("#update-discount").value = discount;
    updateModal.querySelector("#update-language").value = language;
    updateModal.querySelector("#update-description").value = description;
    updateModal.classList.add('active');
});

// Close modals on Cancel button or overlay click
document.querySelectorAll(".close-modal").forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        btn.closest(".modal").classList.remove('active');
    });
});

document.querySelectorAll(".modal-overlay").forEach((overlay) => {
    overlay.addEventListener("click", () => {
        overlay.closest(".modal").classList.remove('active');
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.querySelector(".inventory-search-bar");
    const tableRows = document.querySelectorAll(".inventory-table tbody .book-row");

    searchBar.addEventListener("input", function () {
        const searchQuery = searchBar.value.toLowerCase();

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
});

document.querySelector(".delete-modal").addEventListener("click", (e) => {
    
    const bookId = document.getElementById("update-book-id").value;
    const updateModal = document.getElementById("update-book-modal");
    console.log(updateModal)
    updateModal.classList.remove('active');
    const deleteModal = document.getElementById("delete-book-modal");
    deleteModal.querySelector("#delete-book-id").value = bookId;
    deleteModal.classList.add('active');
    
});