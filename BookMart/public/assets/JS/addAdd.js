//Logout Button
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


function showTab(tabId) {
    event.preventDefault();
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
document.getElementById('new-add').style.display = 'block';


/*Advertisement Type*/
function showFields(value) {
    const imageField = document.getElementById('image-field');
    const textField = document.getElementById('text-field');
    const adTypeBox = document.getElementById('ad-type-box'); // Select advertisement type box

    if (value === 'image') {
        imageField.style.display = 'block';
        textField.style.display = 'none';
    } else if (value === 'text') {
        imageField.style.display = 'none';
        textField.style.display = 'block';
    } else if (value === 'both') {
        imageField.style.display = 'block';
        textField.style.display = 'block';
    }

    // Adjust ad type box size
    adTypeBox.style.width = '300px'; // Set increased width
    adTypeBox.style.height = '40px'; // Set reduced height
}

document.addEventListener('DOMContentLoaded', () => {
    showFields('image');
});


// Select elements
const addButton = document.querySelector('.add-bttn');
const modal = document.querySelector('#add-modal');
const closeModalButton = document.querySelector('.close-modal');

console.log(addButton);


// Show modal
addButton.addEventListener('click', () => {
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
document.querySelector(".add-table").addEventListener("click", (e) => {
    // Check if the clicked element is within a row
    const row = e.target.closest(".add-row");
    console.log(row);
    if (!row) return;

    const AddId = row.dataset.addid;
    const Advertisement_Title = row.dataset.advertisementtitle;
    const Advertisement_Description = row.dataset.advertisementdescription;
    const Advertisement_Type = row.dataset.advertisementtype;
    const Price = row.dataset.price;
    const Start_date = row.dataset.startdate;
    const End_date = row.dataset.enddate;

    console.log(AddId, Advertisement_Title, Advertisement_Description, Advertisement_Type, Price, Start_date, End_date)
    console.log(AddId);
    // Show update modal
    const updateModal = document.getElementById("update-add-modal");
    updateModal.querySelector("#update-add-id").value = AddId;
    updateModal.querySelector("#update-title").value = Advertisement_Title;
    updateModal.querySelector("#update-description").value = Advertisement_Description;
    updateModal.querySelector("#update-type").value = Advertisement_Type;
    updateModal.querySelector("#update-price").value = Price;
    updateModal.querySelector("#update-sdate").value = Start_date;
    updateModal.querySelector("#update-edate").value = End_date;
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
    // Get references to the search bar and table rows
    const searchBar = document.querySelector(".add-search-bar");
    const tableRows = document.querySelectorAll(".add-table tbody .add-row");

    // Listen for input on the search bar
    searchBar.addEventListener("input", function () {
        const searchQuery = searchBar.value.toLowerCase();

        // Loop through each row and check if it matches the search query
        tableRows.forEach(row => {
            const Advertisement_Title = row.dataset.Advertisement_Title.toLowerCase();
            const Advertisement_Type = row.dataset.Advertisement_Type.toLowerCase();
            const Start_date = row.dataset.Start_date.toLowerCase();
            const End_date = row.dataset.End_date.toLowerCase();

            // Check if any of the fields match the query
            if (
                Advertisement_Title.includes(searchQuery) || 
                Advertisement_Type.includes(searchQuery) || 
                Start_date.includes(searchQuery) || 
                End_date.includes(searchQuery)
            ) {
                row.style.display = ""; // Show matching row
            } else {
                row.style.display = "none"; // Hide non-matching row
            }
        });
    });
});


document.querySelector(".delete-modal").addEventListener("click", (e) => {
    
    const AddId = document.getElementById("update-add-id").value;
    const updateModal = document.getElementById("update-add-modal");
    console.log(updateModal)
    updateModal.classList.remove('active');
    const deleteModal = document.getElementById("delete-add-modal");
    deleteModal.querySelector("#delete-add-id").value = AddId;
    deleteModal.classList.add('active');
    
});



document.getElementById('text-input').addEventListener('input', function () {
    const output = document.getElementById('output'); // Output container
    const lines = this.value.split('\n'); // Split text into lines

    // Clear the output container
    output.innerHTML = '';

    // Append each line as a separate paragraph
    lines.forEach(line => {
        const p = document.createElement('p');
        p.textContent = line;
        output.appendChild(p);
    });
});

document.getElementById('start-date').addEventListener('change', function () {
    var startDate = new Date(this.value);
    var endDate = new Date(document.getElementById('end-date').value);
    if (endDate < startDate) {
        alert('End date must be later than Start date!');
    }
});



