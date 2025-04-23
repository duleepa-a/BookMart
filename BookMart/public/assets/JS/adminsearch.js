// Logout Button
document.getElementById('logoutButton').addEventListener('click', function () {
    fetch('http://localhost/BookMart/public/user/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Logout failed.');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            window.location.href = document.body.dataset.root + '/';
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error during logout:', error);
        alert('Logout failed. Please try again.');
    });
});

// View All Users - Live Search
document.getElementById('searchInput').addEventListener('keyup', function () {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('.table tbody tr');

    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});

// Filter by Role
function filterByRole() {
    const role = document.getElementById('roleFilter').value;
    const currentPath = window.location.pathname;
    const baseUrl = currentPath.substring(0, currentPath.lastIndexOf('/') + 1);
    let url = baseUrl + 'adminViewallusers';

    if (role) {
        url += '?role=' + encodeURIComponent(role);
    }

    window.location.href = url;
}
