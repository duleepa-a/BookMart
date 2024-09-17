// Slider for the Ad Banner
// Slider for the Ad Banner
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
// setInterval(() => {
//     showSlide(currentSlide + 1);
// }, 3000);

// Carousel for the New Arrivals
const bookPrevButton = document.querySelector('.prev');
const bookNextButton = document.querySelector('.next');
const bookCards = document.querySelector('.book-cards');

let bookScrollAmount = 0;

bookNextButton.addEventListener('click', () => {
    const maxScrollLeft = bookCards.scrollWidth - bookCards.clientWidth; // Calculate the maximum scrollable width
    if (bookScrollAmount < maxScrollLeft) { // Check if there's more content to scroll
        bookScrollAmount += 300;
        if (bookScrollAmount > maxScrollLeft) { // Prevent overscrolling beyond the last item
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
    if (bookScrollAmount > 0) { // Prevent scrolling before the first item
        bookScrollAmount -= 300;
        if (bookScrollAmount < 0) { // Prevent negative scroll amount
            bookScrollAmount = 0;
        }
        bookCards.scrollTo({
            top: 0,
            left: bookScrollAmount,
            behavior: 'smooth'
        });
    }
});

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
