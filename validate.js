<script>
    // Ensure that the script runs only after the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            
            // Check if passwords match
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                alert('Account created successfully! You can now log in.');

                e.preventDefault(); // Prevent form submission
            }
        })
    })
</script>