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


