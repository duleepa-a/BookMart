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
    updateModal.querySelector("#update-start-date").value = start_date;
    updateModal.querySelector("#update-end-date").value = end_date
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
    const tableRows = document.querySelectorAll(".inventory-table tbody .book-row");

    searchBar.addEventListener("input", function () {
        const searchQuery = searchBar.value.toLowerCase();

        tableRows.forEach(row => {
            const title = row.dataset.title.toLowerCase();
            const author = row.dataset.author.toLowerCase();
            const genre = row.dataset.genre.toLowerCase();
            const publisher = row.dataset.publisher.toLowerCase();

            if (
                title.includes(searchQuery) || 
                author.includes(searchQuery) || 
                genre.includes(searchQuery) || 
                publisher.includes(searchQuery)
            ) {
                row.style.display = ""; 
            } else {
                row.style.display = "none"; 
            }
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

function formatDatetime(mysqlDatetime) {
    if (!mysqlDatetime || mysqlDatetime === "0000-00-00 00:00:00") return "";
    const [datePart, timePart] = mysqlDatetime.split(" ");
    const [year, month, day] = datePart.split("-");
    const [hours, minutes, seconds] = timePart.slice(0, 8).split(":");
    return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
}

