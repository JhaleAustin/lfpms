<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: pages/home/");
} else {
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Foodtrack Home</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .section { display: none; }
        .section.active { display: block; }
        .c1 { display: flex; justify-content: center; align-content: center; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
        li a { text-decoration: none; color: #000000; font-weight: bold; }
        .toggle-button, .toggle-button2 { position: absolute; right: 10px; cursor: pointer; background: none; border: none; }
        .form-group input { width: 100%; padding-left: 30px; }
    </style>
</head>
<body>
<div class="hero2">
    <nav>
        <img src="../img/foodtrack.png" class="Foodtrack">
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="pages/about.php">About</a></li>
            <li><a href="pages/contact.php">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <div class="c1">
        <div class="container" id="container">
            <form method="POST" action="regmsme.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                <img src="../img/foodtrack.png" class="Foodtrack">
                <h1>LFPMS Sign up</h1>
                <!-- Profile Information Section -->
                <div id="profileSection" class="section active">
                    <span>Create account for MSMEs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Information</span>
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <input type="text" name="fullname" id="fullname" placeholder="Fullname" required />
                    <input type="text" name="username" id="username" placeholder="Username" required />
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <button type="button" class="toggle-button" onclick="togglePasswordVisibility('password')">👁️</button>
                    <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Repeat Password" required />
                    <button type="button" class="toggle-button2" onclick="togglePasswordVisibility('passwordCheck')">👁️</button>
                    <button type="button" onclick="nextSection('businessSection')">Next</button>
                </div>
                <!-- Business Information Section -->
                <div id="businessSection" class="section">
                    <span>Create account for MSMEs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business Information</span>
                    <input type="text" name="nameofbusiness" id="nameofbusiness" placeholder="Name of Business" required />
                    <input type="text" name="businessAddress" id="businessAddress" placeholder="Business Address" required />
                    <input type="text" name="typeofbusiness" id="typeofbusiness" placeholder="Type of Business" required />
                    <input type="text" name="bnr" id="bnr" placeholder="Business Registration Number" required />
                    <input type="text" name="tin" id="tin" placeholder="Tax Identification Number" required />
                    <button type="button" onclick="nextSection('verificationSection')">Next</button>
                </div>
                <!-- Verification Information Section -->
                <div id="verificationSection" class="section">
                    <h6 class="mb-0">Business License</h6>
                    <input type="file" name="bl" accept=".pdf,.doc,.docx" />
                    <h6 class="mb-0">Tax Documents</h6>
                    <input type="file" name="td" accept=".pdf,.doc,.docx" />
                    <h6 class="mb-0">Business Permit</h6>
                    <input type="file" name="bp" accept=".pdf,.doc,.docx" />
                    <div class="input-container">
                        <label>
                            <input type="checkbox" id="termsCheckbox" required>
                            By clicking Register, I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a>.
                        </label>
                    </div>
                    <button type="submit" name="submit" id="submit">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        const password = document.getElementById('password').value;
        const passwordCheck = document.getElementById('passwordCheck').value;
        if (password !== passwordCheck) {
            alert('Passwords do not match.');
            return false;
        }
        return true;
    }

    function togglePasswordVisibility(id) {
        const field = document.getElementById(id);
        field.type = field.type === "password" ? "text" : "password";
    }

    function nextSection(sectionId) {
        const currentSection = document.querySelector('.section.active');
        currentSection.classList.remove('active');
        const nextSection = document.getElementById(sectionId);
        nextSection.classList.add('active');
    }
</script><script>
        document.getElementById('termsCheckbox').addEventListener('change', function() {
            var submitButton = document.getElementById('submit');
            submitButton.disabled = !this.checked;
        });
    </script>
</body>
</html>
<?php
}
?>
