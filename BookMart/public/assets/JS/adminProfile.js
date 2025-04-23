document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    function showTab(tabId, event) {
        // Get all tab buttons and content
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        // Hide all tab contents
        tabContents.forEach(content => {
            content.classList.remove('active');
        });
        
        // Deactivate all tab buttons
        tabButtons.forEach(button => {
            button.classList.remove('active');
        });
        
        // Activate the clicked tab button
        if (event && event.currentTarget) {
            event.currentTarget.classList.add('active');
        }
        
        // Show the selected tab content
        const selectedTab = document.getElementById(tabId);
        if (selectedTab) {
            selectedTab.classList.add('active');
        }
    }

    // Make showTab function available in the global scope
    window.showTab = showTab;

    // Make closePopup function available in the global scope
    window.closePopup = function(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            popup.style.animation = 'fadeOut 0.5s ease forwards';
            setTimeout(() => {
                popup.remove();
            }, 500);
        }
    };

    // Auto-close popups after 10 seconds (optional)
    const popups = document.querySelectorAll('.popup-message');
    popups.forEach(popup => {
        setTimeout(() => {
            if (popup && document.body.contains(popup)) {
                popup.style.animation = 'fadeOut 0.5s ease forwards';
                setTimeout(() => {
                    popup.remove();
                }, 500);
            }
        }, 10000); // 10 seconds
    });

    // Password strength validation
    const passwordInput = document.getElementById('password');
    const passwordStrong = document.querySelector('.password-strength');
    const passwordWeak = document.querySelector('.password-strength-weak');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strong = password.length >= 8 && 
                           /[A-Z]/.test(password) && 
                           /[a-z]/.test(password) && 
                           /[0-9]/.test(password);
            
            if (strong) {
                passwordStrong.style.display = 'inline';
                passwordWeak.style.display = 'none';
            } else if (password.length > 0) {
                passwordStrong.style.display = 'none';
                passwordWeak.style.display = 'inline';
            } else {
                passwordStrong.style.display = 'none';
                passwordWeak.style.display = 'none';
            }
        });
    }

    // Password confirmation validation
    const confirmPasswordInput = document.getElementById('confirm-password');
    const confirmPasswordError = document.querySelector('.confirm-password-error');
    
    if (confirmPasswordInput && passwordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                if (this.value !== passwordInput.value) {
                    confirmPasswordError.style.display = 'inline';
                } else {
                    confirmPasswordError.style.display = 'none';
                }
            } else {
                confirmPasswordError.style.display = 'none';
            }
        });
    }

    // Username validation
    const usernameInput = document.getElementById('user-name');
    const usernameError = document.querySelector('.error');
    const usernameValid = document.querySelector('.valid');

    // Optional: Add live username checking
    if (usernameInput) {
        usernameInput.addEventListener('blur', function() {
            if (this.value.length < 3) {
                usernameError.style.display = 'inline';
                usernameValid.style.display = 'none';
                return;
            }
            
            // Optional: Add AJAX check to see if username is available
            // This would need a server endpoint to check username availability
        });
    }

    // Form validation for personal details
    const personalDetailsForm = document.getElementById('personal-details-form');
    if (personalDetailsForm) {
        personalDetailsForm.addEventListener('submit', function(e) {
            const username = document.getElementById('user-name').value;
            
            if (!username.trim()) {
                e.preventDefault();
                showPopupMessage('Username is required', 'error');
                return false;
            }
            
            if (username.length < 3) {
                e.preventDefault();
                showPopupMessage('Username must be at least 3 characters', 'error');
                return false;
            }
            
            // Form will submit normally if validation passes
        });
    }

    // Form validation for password change
    const passwordChangeForm = document.getElementById('password-change-form');
    if (passwordChangeForm) {
        passwordChangeForm.addEventListener('submit', function(e) {
            const currentPassword = document.getElementById('current-password').value;
            const newPassword = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            
            if (!currentPassword) {
                e.preventDefault();
                showPopupMessage('Current password is required', 'error');
                return false;
            }
            
            if (!newPassword) {
                e.preventDefault();
                showPopupMessage('New password is required', 'error');
                return false;
            }
            
            if (!confirmPassword) {
                e.preventDefault();
                showPopupMessage('Confirm password is required', 'error');
                return false;
            }
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                showPopupMessage('New password and confirm password do not match', 'error');
                return false;
            }
            
            const strong = newPassword.length >= 8 && 
                          /[A-Z]/.test(newPassword) && 
                          /[a-z]/.test(newPassword) && 
                          /[0-9]/.test(newPassword);
                          
            if (!strong) {
                e.preventDefault();
                showPopupMessage('Password must be at least 8 characters and contain uppercase, lowercase, and numbers', 'error');
                return false;
            }
            
            // Form will submit normally if validation passes
        });
    }

    // Function to show popup messages from JavaScript
    function showPopupMessage(message, type = 'error') {
        // Remove existing popups of the same type
        const existingPopup = document.getElementById(type + '-popup');
        if (existingPopup) {
            existingPopup.remove();
        }
        
        // Create popup element
        const popup = document.createElement('div');
        popup.className = 'popup-message popup-' + type;
        popup.id = type + '-popup';
        
        // Create message content
        const messageContent = document.createElement('div');
        messageContent.className = 'message-content';
        
        // Create icon
        const icon = document.createElement('span');
        icon.className = 'message-icon';
        const iconElement = document.createElement('i');
        iconElement.className = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
        icon.appendChild(iconElement);
        
        // Create text
        const text = document.createElement('span');
        text.className = 'message-text';
        text.textContent = message;
        
        // Create close button
        const closeBtn = document.createElement('button');
        closeBtn.className = 'close-btn';
        closeBtn.onclick = function() { closePopup(type + '-popup'); };
        const closeBtnIcon = document.createElement('i');
        closeBtnIcon.className = 'fas fa-times';
        closeBtn.appendChild(closeBtnIcon);
        
        // Assemble popup
        messageContent.appendChild(icon);
        messageContent.appendChild(text);
        popup.appendChild(messageContent);
        popup.appendChild(closeBtn);
        
        // Add to document
        document.body.appendChild(popup);
        
        // Auto-close after 10 seconds
        setTimeout(() => {
            if (popup && document.body.contains(popup)) {
                popup.style.animation = 'fadeOut 0.5s ease forwards';
                setTimeout(() => {
                    if (popup && document.body.contains(popup)) {
                        popup.remove();
                    }
                }, 500);
            }
        }, 10000);
    }
});