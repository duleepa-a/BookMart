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

document.getElementById('login-credentials').style.display = 'block';

document.addEventListener("DOMContentLoaded", function() {
    const usernameInput = document.getElementById("user-name");
    const errorMessage = document.querySelector(".error");
    const validMessage = document.querySelector(".valid");

    usernameInput.addEventListener("input", function() {
        const username = usernameInput.value;

        if (username.length > 0) {
            const xhr = new XMLHttpRequest();
            // Adjust the URL to match your controller routing
            xhr.open("POST", "http://localhost/BookMart/public/user/checkusername", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.taken) {
                                errorMessage.style.display = "block";
                                validMessage.style.display = "none"; 
                            } else {
                                errorMessage.style.display = "none"; 
                                validMessage.style.display = "block";
                            }
                        } catch (e) {
                            console.error("Invalid JSON response:", e);
                            errorMessage.textContent = "Invalid response from server.";
                            errorMessage.style.display = "block";
                            validMessage.style.display = "none";
                        }
                    } else {
                        // Handle error case
                        console.error("Error: " + xhr.statusText);
                        errorMessage.textContent = "An error occurred while checking the username.";
                        errorMessage.style.display = "block";
                        validMessage.style.display = "none";
                    }
                }
            };

            // Send the username to the server
            xhr.send("username=" + encodeURIComponent(username));
        } else {
            errorMessage.style.display = "none"; 
            validMessage.style.display = "none"; 
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");
    const confirmPasswordError = document.querySelector(".confirm-password-error");
    const passwordStrength = document.querySelector(".password-strength");
    const passwordStrengthWeak = document.querySelector(".password-strength-weak");

    function validatePasswords() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length > 0) {
            if (confirmPassword !== password) {
                confirmPasswordError.style.display = "inline"; 
            } else {
                confirmPasswordError.style.display = "none";
            }
        } else {
            confirmPasswordError.style.display = "none"; 
        }
    }

    function validatePasswordStrength() {
        const password = passwordInput.value;

        // Criteria: length >= 8, contains lowercase, uppercase, number, and special character
        const strongPasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

        if (strongPasswordPattern.test(password)) {
            passwordStrength.style.display = "inline"; // Show strong message
            passwordStrengthWeak.style.display = "none"; // Hide weak message
        } else {
            passwordStrength.style.display = "none"; // Hide strong message
            passwordStrengthWeak.style.display = "inline"; // Show weak message
        }
    }

    passwordInput.addEventListener("input", function() {
        validatePasswordStrength();
        validatePasswords(); // Optional: To check if password matches confirm password during input
    });

    confirmPasswordInput.addEventListener("input", validatePasswords);
    passwordInput.addEventListener("input", validatePasswords);


});


