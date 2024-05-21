 
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
                <h1>Consultancy Questionaire</h1>
                <!-- Profile Information Section -->
                <!-- <div id="profileSection" class="section active"> -->
                    <input type="text" name="name" id="name" placeholder="Name" required />
                    <input type="text" name="address" id="address" placeholder="Address" required />
                    <h6>Please provide the following information.</h6>
                <input type="text" name="municipality" id="municipality" placeholder="Municipality" required />
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required />
                    <input type="text" name="labelingformat" id="labelingformat" placeholder="Labeling Format: (stick on label, header, etc)
" required />
                    <input type="text" name="brandName" id="brandName" placeholder="Brand Name: (ex. Coca-cola, Milo, Mt.Dew)
" required />
                    <!-- <button type="button" onclick="nextSection('businessSection')">Next</button>
                </div> -->
                <!-- Business Information Section -->
                <!-- <div id="businessSection" class="section"> -->
                   <h6>Product Identity Name: True Name/Nature of the Food (ex. salted Peanut, Dried Mango)</h6> 
                   <input type="text" name="productIdentity" id="productIdentity"  required />
                    <h6>If 1 label with 2 or more product selection:
Name of Product </h6>
                   <input type="text" name="label1" id="label1"  required />
                    <input type="text" name="label2" id="label2"  required />
                    <input type="text" name="label3" id="label3"  required />
                    <input type="text" name="label4" id="label4"required />

                    
                    <input type="text" name="tagline" id="tagline" placeholder="Tagline (optional) " required />
                    <input type="text" name="netContent" id="netContent" placeholder="Net. Content (kg, g, ml,etc.): " required />
                    <!-- <button type="button" onclick="nextSection('verificationSection')">Next</button>
                </div> -->
                <!-- Verification Information Section -->
                <!-- <div id="verificationSection" class="section"> -->
                    <h6 class="mb-0">Ingredients (from most to least quantity):</h6>
                    <textarea name="ingredients"></textarea>
                    <h6 class="mb-0">Expiry Date of the Product</h6>
                    <textarea name="expiryDate"></textarea>
                    <br><br>                
                    <button type="submit" name="submit" id="submit">Create Account</button>
                <!-- </div> -->
            </form>
            <br><br>
        </div>
    </div>

    <br><br>  <br><br>  <br><br>  <br><br>
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

