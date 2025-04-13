document.addEventListener('DOMContentLoaded', function() {
    const deleteArticleTrigger = document.getElementById('delete-article-trigger');
    const deleteArticleModal = document.getElementById('delete-article-modal');
    const modalOverlay = deleteArticleModal.querySelector('.modal-overlay');
    const closeModalButtons = deleteArticleModal.querySelectorAll('.close-modal');
    
    function openModal() {
        deleteArticleModal.classList.add('active');
    }
    
    function closeModal() {
        deleteArticleModal.classList.remove('active');
    }
    
    if (deleteArticleTrigger) {
        deleteArticleTrigger.addEventListener('click', openModal);
    }
    
    if (modalOverlay) {
        modalOverlay.addEventListener('click', closeModal);
    }
    
    closeModalButtons.forEach(button => {
        button.addEventListener('click', closeModal);
    });
    
});