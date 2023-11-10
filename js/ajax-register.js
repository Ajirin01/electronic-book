$(document).ready(function() {
    // Your form submission event
    
    $('#registerForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        console.log("hello")
        // Gather form data
        var formData = $(this).serialize() + '&register=register';

        // Validate inputs
        if (!validateInputs()) {
            return;
        }


        console.log(formData)

        // Make AJAX request
        $.ajax({
            type: 'POST',
            url: 'handlers/register.php', // Replace with the actual path to your PHP script
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Registration successful, do something (e.g., redirect)
                    window.location.href = 'index.php';
                } else {
                    // Registration failed, display error message
                    alert('Error: ' + response.error);
                }
            },
            error: function() {
                // AJAX request failed
                alert('Error in AJAX request');
            }
        });
    });

     // Function to validate inputs
    function validateInputs() {
        // Add your input validation logic here
        var valid = true;

        // Validate email
        var email = $('#email').val();
        if (!isValidEmail(email)) {
            alert('Invalid email address');
            valid = false;
        }

        // Validate full name
        var fullName = $('#fullName').val();
        if (!isValidFullName(fullName)) {
            alert('Invalid full name');
            valid = false;
        }

        // Validate username
        var username = $('#username').val();
        if (!isValidUsername(username)) {
            alert('Invalid username');
            valid = false;
        }

        // Validate phone
        var phone = $('#phone').val();
        if (!isValidPhone(phone)) {
            alert('Invalid phone number');
            valid = false;
        }

        // Validate password
        var password = $('#password').val();
        if (!isValidPassword(password)) {
            alert('Invalid password, must be at least 8 characters');
            valid = false;
        }

        return valid;
    }

    // Function to validate full name
    function isValidFullName(fullName) {
        // Implement your full name validation logic here
        // Example: Full name must contain at least two words
        return fullName.split(' ').length >= 2;
    }

    // Function to validate username
    function isValidUsername(username) {
        // Implement your username validation logic here
        // Example: Username must be at least 5 characters
        return username.length >= 5;
    }

    // Function to validate phone number
    function isValidPhone(phone) {
        // Implement your phone number validation logic here
        // Example: Phone number must be numeric and 10 digits
        phone = phone.replace(/\s+/g, '').replace(/-/g, '');

        // Validate numeric and 10 digits
        return /^\+?\d{10,}$/.test(phone);
    }

    // Function to validate password
    function isValidPassword(password) {
        // Implement your password validation logic here
        // Example: Password must be at least 8 characters
        return password.length >= 8;
    }


    // Function to validate email format
    function isValidEmail(email) {
        // Implement your email validation logic here
        // Example: Regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});