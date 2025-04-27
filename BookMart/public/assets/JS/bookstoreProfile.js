
function showTab(tabId) {

    event.preventDefault();
    var tabContents = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
    }

 
    var tabButtons = document.getElementsByClassName('tab-button');
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }

    // Show the selected tab content
    document.getElementById(tabId).style.display = 'block';

    // Add 'active' class to the clicked tab button
    event.currentTarget.classList.add('active');
}

document.getElementById('store-details').style.display = 'block';



// Select elements
const addBookButton = document.querySelector('.add-book-bttn');
const modal = document.querySelector('.modal');
const closeModalButton = document.querySelector('.close-modal');

console.log(addBookButton);

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




document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");
    const ownerDetailsRegisterForm = document.getElementById("owner-details-registerForm");
    const passwordRegisterForm = document.getElementById("password-registerForm");

    // Selectors for username and email
    const usernameInput = document.getElementById("store-name");
    const usernameError = document.querySelector(".error");
    const usernameValid = document.querySelector(".valid");

    const emailInput = document.getElementById("email");
    const emailError = document.querySelector(".error-email");
    const emailValid = document.querySelector(".valid-email");
    

    const phoneInput = document.getElementById("phone-number");
    const ownerPhoneInput = document.getElementById("phone-number-owner");
    const managerPhoneInput = document.getElementById("phone-number-manager");

    const ownerNicInput = document.getElementById("NIC-owner");
    const managerNicInput = document.getElementById("NIC-manager");


    // Selectors for password fields
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");
    const confirmPasswordError = document.querySelector(".confirm-password-error");

    let usernameIsValid = true;
    let emailIsValid = true;
    let passwordIsValid = true;
    let phoneIsValid = true;
    let ownerPhoneIsValid = true;
    let managerPhoneIsValid = true;
    let ownerNicIsValid = true;
    let managerNicIsValid = true;

    // Check if username is taken
    usernameInput.addEventListener("input", function () {
        const username = usernameInput.value;

        if (username.length > 0) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/BookMart/public/user/checkusername", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.taken) {
                        usernameError.style.display = "block";
                        usernameValid.style.display = "none";
                        usernameIsValid = false;
                    } else {
                        usernameError.style.display = "none";
                        usernameValid.style.display = "block";
                        usernameIsValid = true;
                    }
                }
            };

            xhr.send("username=" + encodeURIComponent(username));
        } else {
            usernameError.style.display = "none";
            usernameValid.style.display = "none";
            usernameIsValid = false;
        }
    });

    // Check if email is taken
    emailInput.addEventListener("input", function () {
        const email = emailInput.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email.length > 0 && emailRegex.test(email)) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/BookMart/public/user/checkemail", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.taken) {
                        emailError.style.display = "block";
                        emailValid.style.display = "none";
                        emailIsValid = false;
                    } else {
                        emailError.style.display = "none";
                        emailValid.style.display = "block";
                        emailIsValid = true;
                    }
                }
            };

            xhr.send("email=" + encodeURIComponent(email));
        } else {
            emailError.style.display = "none";
            emailValid.style.display = "none";
            emailIsValid = false;
        }
    });

    // Validate password strength
    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        
        const passwordStrength = document.querySelector(".password-strength");
        const passwordStrengthWeak = document.querySelector(".password-strength-weak");

        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (strongPasswordRegex.test(password)) {
            passwordIsValid = true;
            passwordStrength.style.display = "inline"; // Show strong message
            passwordStrengthWeak.style.display = "none"; // Hide weak message
        } else {
            passwordIsValid = false;
            passwordStrength.style.display = "none"; // Hide strong message
            passwordStrengthWeak.style.display = "inline"; // Show weak message
        }
    });

    // Confirm password match
    confirmPasswordInput.addEventListener("input", function () {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.style.display = "block";
        } else {
            confirmPasswordError.style.display = "none";
        }
    });

    // Prevent form submission if validation fails

    phoneInput.addEventListener("input", function () {
        const phoneNumber = phoneInput.value;
    
        const phoneError = document.querySelector(".error-phone");
        const validPhoneRegex = /^\d{10}$/; // Adjust regex as per your requirement
    
        if (validPhoneRegex.test(phoneNumber)) {
            phoneIsValid = true;
            phoneError.style.display = "none"; // Hide error message
        } else {
            phoneIsValid = false;
            phoneError.style.display = "inline"; // Show error message
        }
    });

    ownerPhoneInput.addEventListener("input", function () {
        const phoneNumber = ownerPhoneInput.value;
    
        const ownerPhoneError = document.querySelector(".error-phone-owner");
        const validPhoneRegex = /^\d{10}$/; // Adjust regex as per your requirement
    
        if (validPhoneRegex.test(phoneNumber)) {
            ownerPhoneIsValid = true;
            ownerPhoneError.style.display = "none"; // Hide error message
        } else {
            ownerPhoneIsValid = false;
            ownerPhoneError.style.display = "inline"; // Show error message
        }
    });

    managerPhoneInput.addEventListener("input", function () {
        const phoneNumber = managerPhoneInput.value;
    
        const phoneError = document.querySelector(".error-phone-manager");
        const validPhoneRegex = /^\d{10}$/; // Adjust regex as per your requirement
    
        if (validPhoneRegex.test(phoneNumber)) {
            managerPhoneIsValid = true;
            phoneError.style.display = "none"; // Hide error message
        } else {
            managerPhoneIsValid = false;
            phoneError.style.display = "inline"; // Show error message
        }
    });


        // Validate NIC for owner
    ownerNicInput.addEventListener("input", function () {
        const nicNumber = ownerNicInput.value;

        const nicError = document.querySelector(".error-nic-owner");
        const validNicRegex = /^(\d{9}[VXvx]|\d{12})$/; // Supports both old and new NIC formats

        if (validNicRegex.test(nicNumber)) {
            ownerNicIsValid = true;
            nicError.style.display = "none"; // Hide error message
        } else {
            ownerNicIsValid = false;
            nicError.style.display = "inline"; // Show error message
        }
    });

    // Validate NIC for manager
    managerNicInput.addEventListener("input", function () {
        const nicNumber = managerNicInput.value;

        const nicError = document.querySelector(".error-nic-manager");
        const validNicRegex = /^(\d{9}[VXvx]|\d{12})$/; // Supports both old and new NIC formats

        if (validNicRegex.test(nicNumber)) {
            managerNicIsValid = true;
            nicError.style.display = "none"; // Hide error message
        } else {
            managerNicIsValid = false;
            nicError.style.display = "inline"; // Show error message
        }
    });

    registerForm.addEventListener("submit", function (event) {
        if (!usernameIsValid || !emailIsValid ) {
            event.preventDefault(); 
            showAlert("Please correct the errors before updating the profile.",'error');
        }
    });

    ownerDetailsRegisterForm.addEventListener("submit", function (event) {
        if (  !phoneIsValid || !ownerPhoneIsValid || !managerPhoneIsValid || !ownerNicIsValid || !managerNicIsValid ) {
            event.preventDefault(); 
            showAlert("Please correct the errors before updating the profile.",'error');
        }
    });
    passwordRegisterForm.addEventListener("submit", function (event) {
        if (!passwordIsValid || passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault(); 
            showAlert("Password Mismatch!",'error');
        }
    });

});