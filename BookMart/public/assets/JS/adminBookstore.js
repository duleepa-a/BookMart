
function searchStores() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    var table = document.querySelector(".tab-content:not([style*='display: none']) table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { 
        var row = rows[i];
        var cells = row.getElementsByTagName("td");
        var matched = false;

        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell && cell.textContent.toLowerCase().indexOf(filter) > -1) {
                matched = true;
                break;
            }
        }

        if (matched) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

function showTab(tabId) {
    // Hide all tab contents
    var tabContents = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
    }

    // Remove 'active' class from all tab buttons
    var tabButtons = document.getElementsByClassName('tab-button');
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }

    // Show the selected tab content
    document.getElementById(tabId).style.display = 'block';

    // Add 'active' class to the clicked tab button
    event.currentTarget.classList.add('active');
}

// Initially display the first tab
document.getElementById('pending-stores').style.display = 'block';

document.getElementById('logoutButtonAdmin').addEventListener('click', function() {
    
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



