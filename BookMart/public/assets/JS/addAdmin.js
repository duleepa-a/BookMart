document.addEventListener('DOMContentLoaded', function() {
    console.log("Admin form handler loaded");
    
    const modal = document.getElementById('add-modal');
    const addAdminButton = document.querySelector('.add-bttn');
    const closeModalButton = document.querySelector('.close-modal');
    const addForm = document.querySelector('.add-form');
    
    if (addAdminButton) {
        addAdminButton.addEventListener('click', function(e) {
            console.log("Button clicked");
            e.preventDefault(); 
            modal.classList.remove('hidden');
        });
    }


    if (closeModalButton) {
        closeModalButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    }


    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    const usernameInput = document.getElementById("username");
    const usernameError = document.querySelector(".error");
    const usernameValid = document.querySelector(".valid");

    const emailInput = document.getElementById("email");
    const emailError = document.querySelector(".error-email");
    const emailValid = document.querySelector(".valid-email");
    
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmpassword");
    const confirmPasswordError = document.querySelector(".confirm-password-error");
    
    let usernameIsValid = false;
    let passwordIsValid = false;
    
    if (usernameInput) {
        usernameInput.addEventListener("input", function() {
            const username = usernameInput.value;
    
            if (username.length > 0) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/BookMart/public/user/checkusername", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                xhr.onreadystatechange = function() {
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
    }

    if (emailInput) {
        emailInput.addEventListener("input", function() {
            const email = emailInput.value;
    
            if (email.length > 0) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/BookMart/public/user/checkemail", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
    
                        if (response.taken) {
                            emailError.style.display = "block";
                            emailValid.style.display = "none";
                        } else {
                            emailError.style.display = "none";
                            emailValid.style.display = "block";
                        }
                    }
                };
    
                xhr.send("email=" + encodeURIComponent(email));
            } else {
                emailError.style.display = "none";
                emailValid.style.display = "none";
            }
        });
    }
    
    if (passwordInput) {
        passwordInput.addEventListener("input", function() {
            const password = passwordInput.value;
            
            const passwordStrength = document.querySelector(".password-strength");
            const passwordStrengthWeak = document.querySelector(".password-strength-weak");
    
            const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
            if (strongPasswordRegex.test(password)) {
                passwordIsValid = true;
                passwordStrength.style.display = "inline"; 
                passwordStrengthWeak.style.display = "none"; 
            } else {
                passwordIsValid = false;
                passwordStrength.style.display = "none"; 
                passwordStrengthWeak.style.display = "inline"; 
            }
        });
    }
    
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener("input", function() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.style.display = "block";
            } else {
                confirmPasswordError.style.display = "none";
            }
        });
    }

    document.querySelectorAll('.save-status-btn').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.dataset.userid;
        const toggle = document.querySelector(`.status-toggle[data-userid="${userId}"]`);
        const status = toggle.checked ? 'active' : 'inactive';
        const label = toggle.closest('td').querySelector('.status-label');
        
        const formData = new FormData();
        formData.append('ID', userId);
        formData.append('active_status', status);

        console.log(formData);
        
        const url = `${window.location.origin}/BookMart/public/SAdminAddAdmin/updateAdminStatus`;
        
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {

                label.textContent = status;
                label.className = 'status-label px-2 py-1 rounded-full text-sm ' + 
                                (status ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600');
                window.location.reload();
               
            } else {
                toggle.checked = !toggle.checked;
                window.location.reload();
            }
        })
        .catch(error => {
            console.error("Error updating status:", error);
            alert("Something went wrong: " + error.message);
            // Revert toggle on error
            toggle.checked = !toggle.checked;
        });
    });
});

    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const userId = this.dataset.userid;
            const status = this.checked ? 1 : 0;
            const label = this.closest('td').querySelector('.status-label');
            
            // Just update the label visually, but don't save to database yet
            label.textContent = status ? 'active' : 'inactive';
            label.className = 'status-label px-2 py-1 rounded-full text-sm ' +
                (status ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600');
            
            // The actual save to database will happen when the Save button is clicked
        });
    });

    
});