// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    
    // Add click event listeners to each tab button
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get the tab to show from the button's onclick attribute
            const tabId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            
            // Show the selected tab
            showTab(tabId);
        });
    });
});

function showTab(tabId) {
    // Hide all tab contents and remove active-tab class
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(tab => {
        tab.style.display = 'none';
        tab.classList.remove('active-tab');
    });
    
    // Show the selected tab content and add active-tab class
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.style.display = 'block';
        selectedTab.classList.add('active-tab');
    }
    
    // Update active state on tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
        if (button.getAttribute('onclick').includes(tabId)) {
            button.classList.add('active');
        }
    });
}

function handleFormSubmit(event) {
    // Prevent default form submission
    event.preventDefault();
    
    // Get the active tab to determine which form data to validate and submit
    const activeTab = document.querySelector('.tab-content.active-tab');
    
    document.getElementById('registerForm').submit();
}

// Add form submission event listener
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }
});
