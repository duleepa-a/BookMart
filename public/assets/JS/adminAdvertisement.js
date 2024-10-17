function showTab( tabId,event) {

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


document.getElementsByClassName('type-group').display = 'none';

//For radio buttons
const imageType = document.getElementById('image-type');
const textType = document.getElementById('text-type');
const bothType = document.getElementById('both-type');

imageType.checked = false;
textType.checked = false;
bothType.checked = false;

imageType.onclick = function () {
    textType.checked = false; 
    bothType.checked = false; 
};

textType.onclick = function () {
    imageType.checked = false;
    bothType.checked = false; 
};

bothType.onclick = function () {
    imageType.checked = false;
    textType.checked = false; 
};



