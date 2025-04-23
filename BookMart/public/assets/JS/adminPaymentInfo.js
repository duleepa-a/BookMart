// Admin Payments JS

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    
    // Payment search functionality
    const searchForm = document.querySelector('.card-tools form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchInput = this.querySelector('input[name="search"]');
            if (searchInput.value.trim() === '') {
                e.preventDefault();
                searchInput.focus();
            }
        });
    }
    
    // Handle print payment receipt
    const printReceiptBtn = document.getElementById('printReceipt');
    if (printReceiptBtn) {
        printReceiptBtn.addEventListener('click', function() {
            window.print();
        });
    }
    
    // Format currency values
    document.querySelectorAll('.format-currency').forEach(function(element) {
        const value = parseFloat(element.textContent);
        if (!isNaN(value)) {
            element.textContent = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(value);
        }
    });
    
    // Date formatting for better readability
    document.querySelectorAll('.format-date').forEach(function(element) {
        const dateString = element.textContent;
        if (dateString) {
            const date = new Date(dateString);
            element.textContent = date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    });
    
    // Payment method icon selection
    document.querySelectorAll('.payment-gateway').forEach(function(element) {
        const gateway = element.textContent.toLowerCase().trim();
        let iconClass = 'fa-credit-card'; // default
        
        if (gateway.includes('paypal')) {
            iconClass = 'fa-paypal';
        } else if (gateway.includes('stripe')) {
            iconClass = 'fa-cc-stripe';
        } else if (gateway.includes('bank')) {
            iconClass = 'fa-university';
        } else if (gateway.includes('cash') || gateway.includes('cod')) {
            iconClass = 'fa-money-bill';
        }
        
        // Add the appropriate icon
        const icon = document.createElement('i');
        icon.className = `fas ${iconClass} mr-1`;
        element.prepend(icon);
    });

    // Add this to your adminPaymentInfo.js file

document.addEventListener('DOMContentLoaded', function() {
    // Get system stats when the modal is opened
    const addButton = document.querySelector('.add-bttn');
    const modal = document.getElementById('add-modal');
    const closeModalButton = document.querySelector('.close-modal');
    const systemStatsForm = document.getElementById('system-stats-form');
    
    // Function to fetch system stats
    function fetchSystemStats() {
        fetch(`${ROOT}/AdminPaymentInfo/getSystemStats`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('systemfee_book').value = data.stats.systemfee_book;
                    document.getElementById('systemfee_add').value = data.stats.systemfee_add;
                    document.getElementById('deliveryfee').value = data.stats.deliveryfee;
                } else {
                    alert('Failed to load system statistics');
                }
            })
            .catch(error => {
                console.error('Error fetching system stats:', error);
                alert('An error occurred while loading system statistics');
            });
    }
    
    // Show modal
    if (addButton) {
        addButton.addEventListener('click', () => {
            modal.classList.add('active');
            fetchSystemStats();
        });
    }
    
    // Hide modal
    if (closeModalButton) {
        closeModalButton.addEventListener('click', () => {
            modal.classList.remove('active');
        });
    }
    
    // Close modal when clicking on the overlay
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    }
    
    // Handle form submission
    if (systemStatsForm) {
        systemStatsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(systemStatsForm);
            
            // Send AJAX request
            fetch(`${ROOT}/AdminPaymentInfo/updateSystemStats`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('System statistics updated successfully');
                    modal.classList.remove('active');
                    // Refresh the page to show updated stats
                    location.reload();
                } else {
                    alert('Failed to update system statistics: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error updating system stats:', error);
                alert('An error occurred while updating system statistics');
            });
        });
    }
});
});