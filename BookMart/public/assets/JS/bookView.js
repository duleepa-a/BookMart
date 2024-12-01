// // JavaScript to handle tab switching
// document.addEventListener("DOMContentLoaded", function () {
//     const tabs = document.querySelectorAll(".tab");
//     const tabContents = document.querySelectorAll(".tab-content");

//     // Add click event listeners to each tab
//     tabs.forEach((tab, index) => {
//         tab.addEventListener("click", function () {
//             // Remove the 'active' class from all tabs and hide all tab contents
//             tabs.forEach(t => t.classList.remove("active"));
//             tabContents.forEach(tc => tc.style.display = "none");

//             // Add 'active' class to the clicked tab and show corresponding tab content
//             tab.classList.add("active");
//             tabContents[index].style.display = "block";
//         });
//     });

//     // Show the first tab and tab content by default
//     tabs[0].classList.add("active");
//     tabContents[0].style.display = "block";
// });


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
document.getElementById('book-reviews').style.display = 'block';


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
