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


// Select elements
const addButton = document.querySelector('.add-bttn');
const modal = document.querySelector('#add-modal');
const closeModalButton = document.querySelector('.close-modal');


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

const addTable = document.querySelector(".add-table");

if(addTable){

    addTable.addEventListener("click", (e) => {
        // Check if the clicked element is within a row
        const row = e.target.closest(".add-row");
        console.log(row);
        if (!row) return;

        const AddId = row.dataset.addid;
        const Advertisement_Title = row.dataset.advertisementtitle;
        const Advertisement_Description = row.dataset.advertisementdescription;
        const Advertisement_Image = row.dataset.advertisementimage;
        const Price = row.dataset.price;
        const Start_date = row.dataset.startdate;
        const End_date = row.dataset.enddate;

        console.log(AddId, Advertisement_Title, Advertisement_Description, Advertisement_Image, Price, Start_date, End_date)
        console.log(AddId);
        // Show update modal
        const updateModal = document.getElementById("update-add-modal");
        updateModal.querySelector("#update-add-id").value = AddId;
        updateModal.querySelector("#update-title").value = Advertisement_Title;
        updateModal.querySelector("#update-description").value = Advertisement_Description;
        updateModal.querySelector("#update-price").value = Price;
        updateModal.querySelector("#update-sdate").value = Start_date;
        updateModal.querySelector("#update-edate").value = End_date;
        updateModal.querySelector("#update-preview-image").src =  ROOT + "\\assets\\Images\\ads" + "\\" + Advertisement_Image;
        updateModal.classList.add('active');
    });
}
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


document.getElementById('start-date').addEventListener('change', function () {
    var startDate = new Date(this.value);
    var endDate = new Date(document.getElementById('end-date').value);
    if (endDate < startDate) {
        alert('End date must be later than Start date!');
    }
});



