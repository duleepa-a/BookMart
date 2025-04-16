document.addEventListener('DOMContentLoaded', function () {
    const viewMoreBtn = document.getElementById('viewMoreBtn');
    const hiddenArticles = document.querySelectorAll('.article-card.hidden');
    let index = 0;
    const batchSize = 3;

    viewMoreBtn.addEventListener('click', () => {
        for (let i = index; i < index + batchSize && i < hiddenArticles.length; i++) {
            hiddenArticles[i].classList.remove('hidden');
        }
        index += batchSize;

        if (index >= hiddenArticles.length) {
            viewMoreBtn.style.display = 'none'; // Hide button if no more to show
        }
    });
});