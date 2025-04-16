const slider = document.querySelector('.slider');
const sliderImages = document.querySelectorAll('.slider-image');
const prevButton = document.querySelector('.slider-prev');
const nextButton = document.querySelector('.slider-next');
let currentSlide = 0;

function showSlide(index) {
    if (index >= sliderImages.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = sliderImages.length - 1;
    } else {
        currentSlide = index;
    }
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
}

nextButton.addEventListener('click', () => {
    showSlide(currentSlide + 1);
});

prevButton.addEventListener('click', () => {
    showSlide(currentSlide - 1);  // Move to the previous slide
});

// Automatic slide change every 3 seconds
setInterval(() => {
    showSlide(currentSlide + 1);
}, 3000);

// Carousel for the New Arrivals
const bookPrevButton = document.querySelector('.prev');
const bookNextButton = document.querySelector('.next');
const bookCards = document.querySelector('.book-cards');

let bookScrollAmount = 0;

bookNextButton.addEventListener('click', () => {
    const maxScrollLeft = bookCards.scrollWidth - bookCards.clientWidth; 
    if (bookScrollAmount < maxScrollLeft) { 
        bookScrollAmount += 300;
        if (bookScrollAmount > maxScrollLeft) { 
            bookScrollAmount = maxScrollLeft;
        }
        bookCards.scrollTo({
            top: 0,
            left: bookScrollAmount,
            behavior: 'smooth'
        });
    }
});

bookPrevButton.addEventListener('click', () => {
    if (bookScrollAmount > 0) {
        bookScrollAmount -= 300;
        if (bookScrollAmount < 0) { 
            bookScrollAmount = 0;
        }
        bookCards.scrollTo({
            top: 0,
            left: bookScrollAmount,
            behavior: 'smooth'
        });
    }
});

//carousel for bookstores
const bookstorePrevButton = document.querySelector('.bookstore-prev');
const bookstoreNextButton = document.querySelector('.bookstore-next');
const bookstoreCards = document.querySelector('.bookstore-cards');

let bookstoreScrollAmount = 0;

bookstoreNextButton.addEventListener('click', () => {
    const maxScrollLeft = bookstoreCards.scrollWidth - bookstoreCards.clientWidth; 
    if (bookstoreScrollAmount < maxScrollLeft) { 
        bookstoreScrollAmount += 300;
        if (bookstoreScrollAmount > maxScrollLeft) { 
            bookstoreScrollAmount = maxScrollLeft;
        }
        bookstoreCards.scrollTo({
            top: 0,
            left: bookstoreScrollAmount,
            behavior: 'smooth'
        });
    }
});

bookstorePrevButton.addEventListener('click', () => {
    if (bookstoreScrollAmount > 0) {
        bookstoreScrollAmount -= 300;
        if (bookstoreScrollAmount < 0) { 
            bookstoreScrollAmount = 0;
        }
        bookstoreCards.scrollTo({
            top: 0,
            left: bookstoreScrollAmount,
            behavior: 'smooth'
        });
    }
});

var PrevButtonClass = '.prev-fiction';
var NextButtonClass = '.next-fiction';
var bookCardClass = '.book-cards-fiction';

var bestSellerPrevButton = document.querySelector(PrevButtonClass);
var bestSellerNextButton = document.querySelector(NextButtonClass);
var bestSellerbookCards = document.querySelector(bookCardClass);
var bestSellerBookScrollAmount = 0;

function updateSelectors(selectedTabClass) {
    bestSellerBookScrollAmount = 0;
    PrevButtonClass = `.prev-${selectedTabClass}`;
    NextButtonClass = `.next-${selectedTabClass}`;
    bookCardClass = `.book-cards-${selectedTabClass}`;

    bestSellerPrevButton = document.querySelector(PrevButtonClass);
    bestSellerNextButton = document.querySelector(NextButtonClass);
    bestSellerbookCards = document.querySelector(bookCardClass);
  
    console.log(selectedTabClass,bestSellerPrevButton, bestSellerNextButton, bestSellerbookCards);

    bestSellerNextButton.addEventListener('click', () => {
        const maxScrollLeft = bestSellerbookCards.scrollWidth - bestSellerbookCards.clientWidth; 
        if (bestSellerBookScrollAmount < maxScrollLeft) { 
            bestSellerBookScrollAmount += 300;
            if (bestSellerBookScrollAmount > maxScrollLeft) { 
                bestSellerBookScrollAmount = maxScrollLeft;
            }
            bestSellerbookCards.scrollTo({
                top: 0,
                left: bestSellerBookScrollAmount,
                behavior: 'smooth'
            });
        }
    });
    
    bestSellerPrevButton.addEventListener('click', () => {
        if (bestSellerBookScrollAmount > 0) {
            bestSellerBookScrollAmount -= 300;
            if (bestSellerBookScrollAmount < 0) { 
                bestSellerBookScrollAmount = 0;
            }
            bestSellerbookCards.scrollTo({
                top: 0,
                left: bestSellerBookScrollAmount,
                behavior: 'smooth'
            });
        }
    });

}

function showTab(tabId) {
    var tabContents = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
    }

    var tabButtons = document.getElementsByClassName('tab-button');
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }

    document.getElementById(tabId).style.display = 'block';
    
    var selectedTabClass = tabId; // Get the last class of the selected tab

    event.currentTarget.classList.add('active');

    // Call the function to update selectors and query the elements
    updateSelectors(selectedTabClass);
}


document.getElementById('fiction').style.display = 'block';


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




//carousel for best sellers

// Carousel for the New Arrivals
