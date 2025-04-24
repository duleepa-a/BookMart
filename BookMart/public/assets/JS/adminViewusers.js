document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality - improved
    const tabs = document.querySelectorAll('.tab');
    
    // Get all the content sections
    const basicInfoBox = document.querySelector('.tabs').nextElementSibling;
    const sectionTitles = document.querySelectorAll('.section-title');
    
    // Initially show only the Basic Info tab content
    basicInfoBox.style.display = 'block';
    
    // Hide all other content sections initially
    sectionTitles.forEach(section => {
        section.style.display = 'none';
        if (section.nextElementSibling) {
            section.nextElementSibling.style.display = 'none';
        }
    });
    

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', function() {

            tabs.forEach(t => t.classList.remove('active'));
         
            this.classList.add('active');
            
            basicInfoBox.style.display = 'none';
            sectionTitles.forEach(section => {
                section.style.display = 'none';
                if (section.nextElementSibling) {
                    section.nextElementSibling.style.display = 'none';
                }
            });
            
            if (index === 0) {
                basicInfoBox.style.display = 'block';
            } else if (index === 1 && sectionTitles[0]) {
         
                sectionTitles[0].style.display = 'flex';
                if (sectionTitles[0].nextElementSibling) {
                    sectionTitles[0].nextElementSibling.style.display = 'block';
                }
            } else if (index === 2 && sectionTitles[1]) {
                sectionTitles[1].style.display = 'flex';
                if (sectionTitles[1].nextElementSibling) {
                    sectionTitles[1].nextElementSibling.style.display = 'block';
                }
            }
        });
    });

    // Status toggle button
    const statusToggle = document.getElementById("status-toggle");
    const confirmDialog = document.getElementById('confirmationDialog');
    const successMessage = document.getElementById('successMessage');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    
    if (statusToggle) {
        statusToggle.addEventListener("click", function(e) {
            e.preventDefault();
            confirmDialog.classList.add('show');
        });
    }
    
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            confirmDialog.classList.remove('show');
        });
    }
    
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const statusText = document.getElementById("status-text");
            const button = document.getElementById("status-toggle");
            const userId = getUserIdFromUrl();
            let newStatus;
            
            // Toggle status
            if (statusText.innerText.toLowerCase() === "active") {
                newStatus = "inactive";
                statusText.innerText = newStatus;
                statusText.classList.remove("status-active");
                statusText.classList.add("status-suspended");
                button.innerText = "Activate";
                button.classList.remove("suspend");
                button.classList.add("activate");
            } else {
                newStatus = "active";
                statusText.innerText = newStatus;
                statusText.classList.remove("status-suspended");
                statusText.classList.add("status-active");
                button.innerText = "Suspend";
                button.classList.remove("activate");
                button.classList.add("suspend");
            }
            

            if (userId) {
                updateUserStatus(userId, newStatus);
            }
          
            confirmDialog.classList.remove('show');
            
            successMessage.classList.add('show');
            
            setTimeout(function() {
                successMessage.classList.remove('show');
            }, 2000);
        });
    }
    
    function getUserIdFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }
    
    
function updateUserStatus(userId, status) {
    fetch(`${window.location.origin}/BookMart/public/adminViewbuyer/updateStatus`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            userId: userId,
            active_status: status  
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Status update failed');
        }
        return response.json();
    })
    .then(data => {
        console.log('Status updated successfully:', data);
    })
    .catch(error => {
        console.error('Error updating status:', error);
        alert('Failed to update user status. Please try again.');
    });
}
    
    window.addEventListener('click', function(event) {
        if (event.target === confirmDialog) {
            confirmDialog.classList.remove('show');
        }
        if (event.target === successMessage) {
            successMessage.classList.remove('show');
        }
    });

    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const tableContainer = this.closest('.box');
            const table = tableContainer.querySelector('.table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let visible = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        visible = true;
                        break;
                    }
                }
                
                rows[i].style.display = visible ? '' : 'none';
            }
        });
    }

    const reviewSearchInput = document.getElementById('reviewSearchInput');
    if (reviewSearchInput) {
        reviewSearchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const tableContainer = this.closest('.box');
            const table = tableContainer.querySelector('.table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let visible = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        visible = true;
                        break;
                    }
                }
                
                rows[i].style.display = visible ? '' : 'none';
            }
        });
    }
    
    const animateRows = () => {
        const tables = document.querySelectorAll('.table');
        tables.forEach(table => {
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.animation = `fadeIn 0.3s ease-in-out ${index * 0.05}s both`;
            });
        });
    };
    
    animateRows();
});


document.addEventListener('DOMContentLoaded', function() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});