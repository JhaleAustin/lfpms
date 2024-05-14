<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Customer.css">
    <title>Registration Page</title>
</head>
<body>
    <div class="Registration-Container">
        <div class="Registration">
            <h2 class="personal-info-heading">Personal Information</h2>
            <form method="POST" action="regcustomer.php">
                <div class="input-container">
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-container">
                    <input type="text" name="fullName" id="fullName" placeholder="Full Name">
                </div>
                <div class="input-container">
                    <input type="text" name="userName" id="userName" placeholder="User Name">
                </div>
                <div class="input-container">
                    <input type="tel" name="phone" id="phone" placeholder="Phone Number" pattern="\d*" required oninput="validatePhoneNumber(this)">
                </div>
                <div class="input-container">
                    <input type="password" name="password" id="password" class="password-input" placeholder="Password">
                </div>
                <div class="input-container">
                    <input type="password" name="confirmPassword" id="confirmPassword" class="password-input" placeholder="Confirm Password">
                </div>
                <div class="input-container">
                    <label>
                        <input type="checkbox" id="termsCheckbox" required>By clicking Register, I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a>.
                    </label>
                </div>
                <button type="submit" name="submit" id="submit" disabled>Register</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('termsCheckbox').addEventListener('change', function() {
            var submitButton = document.getElementById('submit');
            submitButton.disabled = !this.checked;
        });
    </script>
    <script src="../js/script.js"></script>

</body>
</html>
