$(document).ready(function() {
    // Your form submission event
    // console.log("hello")
    $('#loginForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        console.log("hello")
        // Gather form data
        var formData = $(this).serialize() + '&login=login';

        // Validate inputs
        if (!validateInputs()) {
            return;
        }


        console.log(formData)

        // Make AJAX request
        $.ajax({
            type: 'POST',
            url: 'handlers/login.php', // Replace with the actual path to your PHP script
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

        // Validate password
        var password = $('#password').val();
        if (!isValidPassword(password)) {
            alert('Invalid password, must be at least 8 characters');
            valid = false;
        }

        return valid;
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