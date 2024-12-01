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


// Genre Pie Chart
const genreCtx = document.getElementById('genreChart').getContext('2d');
new Chart(genreCtx, {
    type: 'pie',
    data: {
        labels: ['Fiction', 'Non-Fiction', 'Mystery', 'Science Fiction', 'Romance'],
        datasets: [{
            data: [400, 300, 200, 150, 100],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: false
            }
        }
    }
});

// Monthly Sales Bar Chart
const salesCtx = document.getElementById('salesChart').getContext('2d');
new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Monthly Sales',
            data: [4000, 3000, 5000, 4500, 6000, 5500],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Top Selling Books
const topBooks = [
    { title: 'The Great Gatsby', author: 'F. Scott Fitzgerald', sales: 1200 },
    { title: 'To Kill a Mockingbird', author: 'Harper Lee', sales: 1100 },
    { title: '1984', author: 'George Orwell', sales: 1000 },
    { title: 'Pride and Prejudice', author: 'Jane Austen', sales: 900 },
    { title: 'The Hobbit', author: 'J.R.R. Tolkien', sales: 800 }
];

const topBooksBody = document.getElementById('topBooksBody');
topBooks.forEach((book, index) => {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${index + 1}</td>
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.sales}</td>
    `;
    topBooksBody.appendChild(row);
});