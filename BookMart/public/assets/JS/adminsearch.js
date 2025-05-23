    // View All Users - Live Search
    
const searchInput = document.getElementById('searchInput');

if(searchInput){
    searchInput.addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('.table tbody tr');

        tableRows.forEach(row => {
            const userId = row.querySelector('.user-id')?.textContent.toLowerCase() || '';
            const userName = row.querySelector('.user-name')?.textContent.toLowerCase() || '';

            const match = userId.includes(searchValue) || userName.includes(searchValue);
            row.style.display = match ? '' : 'none';
        });
    });
}

// Filter by Role(View All Users)
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


// Filter by Status(Search Orders)
function filterByStatus() {
    const status = document.getElementById('statusFilter').value;
    const currentPath = window.location.pathname;
    const baseUrl = currentPath.substring(0, currentPath.lastIndexOf('/') + 1);
    let url = baseUrl + 'adminSearchorders';

    if (status) {  // Changed from 'role' to 'status'
        url += '?order_status=' + encodeURIComponent(status);
    }

    window.location.href = url;
}


// Filter by type(payment info)
function filterByType() {
    const type = document.getElementById('typeFilter').value;
    const currentPath = window.location.pathname;
    const baseUrl = currentPath.substring(0, currentPath.lastIndexOf('/') + 1);
    let url = baseUrl + 'adminPaymentInfo';

    if (type) {
        url += '?type=' + encodeURIComponent(type);
    }

    window.location.href = url;
}