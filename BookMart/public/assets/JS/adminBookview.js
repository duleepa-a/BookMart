document.addEventListener("DOMContentLoaded", function() {
    const deleteModal = document.getElementById("delete-book-modal");
    const deleteBtn = document.getElementById("deleteBtn");
    const closeModalBtn = document.querySelector(".close-modal");
    const confirmDeleteBtn = document.querySelector(".confirm-delete");

    // Hide modal on page load
    if (deleteModal) {
        deleteModal.style.display = "none";
    }

    // Delete button click handler
    if (deleteBtn) {
        deleteBtn.addEventListener("click", function(e) {
            e.preventDefault();
            if (deleteModal) {
                deleteModal.style.display = "flex"; // Changed from flex to block
                deleteModal.classList.add('active');
            }
        });
    }

    // Close modal button
    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", function(e) {
            e.preventDefault();
            if (deleteModal) {
                deleteModal.style.display = "none";
                deleteModal.classList.remove('active');
            }
        });
    }

    // Confirm delete button
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener("click", function() {
            document.querySelector(".delete-book-form").submit();
        });
    }

    // Close when clicking outside modal
    window.addEventListener("click", function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            deleteModal.style.display = "none";
            deleteModal.classList.remove('active');
        }
    });
   
});