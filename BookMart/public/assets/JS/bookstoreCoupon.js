const addBookButton = document.querySelector('.add-book-bttn');
const modal = document.querySelector('#add-book-modal');
const closeModalButton = document.querySelector('.close-modal');


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

document.querySelector(".inventory-table").addEventListener("click", (e) => {
    const row = e.target.closest(".book-row");
    console.log(row);
    if (!row) return;

    const couponId = row.dataset.couponid;
    const code = row.dataset.code;
    const discount = row.dataset.discount;
    const Start_date = row.dataset.startdate;
    const End_date = row.dataset.enddate;

    let start_date = new Date(Start_date);
    let end_date = new Date(End_date);
    
    console.log(couponId);
    const updateModal = document.getElementById("update-book-modal");
    updateModal.querySelector("#update-coupon-id").value = couponId;
    updateModal.querySelector("#update-start-date").value = Start_date;
    updateModal.querySelector("#update-end-date").value = End_date
    updateModal.querySelector("#update-coupon-code").value = code;
    updateModal.querySelector("#update-discount").value = discount;
    updateModal.classList.add('active');

});


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
    const tableRows = document.querySelectorAll(".inventory-table tbody tr");

    searchBar.addEventListener("input", function () {
        const searchQuery = searchBar.value.toLowerCase();

        tableRows.forEach(row => {
            const cells = row.querySelectorAll("td");
            let matchFound = false;

            const searchableColumns = [0,1,2,3,4];

            searchableColumns.forEach(index => {
                const cellText = cells[index]?.textContent.toLowerCase();
                if (cellText && cellText.includes(searchQuery)) {
                    matchFound = true;
                }
            });

            row.style.display = matchFound ? "" : "none";
        });
    });
});

document.querySelector(".delete-modal").addEventListener("click", (e) => {
    
    const bookId = document.getElementById("update-coupon-id").value;
    const updateModal = document.getElementById("update-book-modal");
    console.log(updateModal)
    updateModal.classList.remove('active');
    const deleteModal = document.getElementById("delete-book-modal");
    deleteModal.querySelector("#delete-book-id").value = bookId;
    deleteModal.classList.add('active');
    
});

