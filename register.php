<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];
    $userPassword = $_POST['user_password'];

    $conn = mysqli_connect("localhost", "root", "", "php_project") or die(mysqli_error($conn));

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "User with this email address already exists";
    } else {
        // Hash the password
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Insert new user with hashed password
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $userName, $userEmail, $hashedPassword);

        if ($stmt->execute()) {
            echo "Registration successful";
            
            header("Location: account.php");
            exit();
        } else {
            echo "Error during registration";
        }
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"
        integrity="sha384-gQl4iL/FsA5HAHRVIe12fF5P5aFdIIJbq5PzYb7iCF7bYFgke5ifwz1yYbJ10by"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI/tZ11l0JBRlgtkY5FfiKz9v5z6wnN8fFf5g1j8="
        crossorigin="anonymous"></script>
    <script src="register.js"></script>
    <script>
   function submitForm(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var formData = new FormData(document.getElementById("register-form"));

      // AJAX request
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "register.php", true);

      // Set up callback function
      xhr.onreadystatechange = function () {
         if (xhr.readyState == 4) {
            if (xhr.status == 200) {
               // Handle the response from the server
               if (xhr.responseText.trim() === "Registration successful") {
                  // Redirect to account.php on successful registration
                  window.location.href = "account.php";
               } else {
                  // Display the response (error message) if needed
                  console.log(xhr.responseText);
               }
            } else {
               // Handle errors
               console.log("Error during AJAX request");
            }
         }
      };

      // Send the form data
      xhr.send(formData);
   }
</script>


    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="C:\Users\Svilen-PC\Desktop\website\font-awesome\css\all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" integrity="...">
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white bg-body-tertiary py-3 fixed-top">
        <div class="container">
            <img class ="logo" src="assets/imgs/logo.png"/>
            <h2 class="brand">ByteBazaar</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php"">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-shopping-cart"></i>
                        <i class="fas fa-user"></i>
                    </li>
                   
                    
                </ul>
            </div>
        </div>
    </nav>

    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <!-- Include your JavaScript dependencies here -->
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
        <form id="register-form" method="POST" action="register.php">
            <div class="form-group">
                <label for="register-name">Name</label>
                <input type="text" class="form-control" id="register-name" name="user_name" placeholder="Name" required/>
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" class="form-control" id="register-email" name="user_email" placeholder="Email" required/>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" class="form-control" id="register-password" name="user_password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirm-password" placeholder="Confirm Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
            </div>
            <div class="form-group">
                <a href="login.php" id="login-url" class="btn">Already have an account? Login.</a>
            </div>
        </form>
    </div>
    </section>
    
    <!--Footer-->
    <footer class="mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <img class="logo" src="assets/imgs/logo.png" alt="Logo">
                    <p class="pt-3">We provide the best products for the most affordable price</p>
                </div>
    
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Featured</h5>
                    <ul class="text-uppercase">
                        <li><a href="shop.php?category=headphones">Headphones</a></li>
                        <li><a href="shop.php?category=Smartphone">Smartphones</a></li>
                        <li><a href="shop.php?category=TV">TVs</a></li>
                        <li><a href="shop.php?category=Laptop">Laptops</a></li>
                        <li><a href="shop.php?category=consoles">Consoles</a></li>
                        <li><a href="shop.php?category=smartwatches">Smart Watches</a></li>
                    </ul>
                </div>
    
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Contact us</h5>
                    <div>
                        <h6 class="text-uppercase">Address</h6>
                        <p>1234 Street Name, City</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Phone</h6>
                        <p>+359123456789</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">E-mail</h6>
                        <p>support@gmail.com</p>
                    </div>
                </div>
    
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Instagram</h5>
                    <div class="row">
                        <img src="assets/imgs/footer1.png" alt="Instagram 1" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/imgs/footer1.png" alt="Instagram 2" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/imgs/footer1.png" alt="Instagram 3" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/imgs/footer1.png" alt="Instagram 4" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/imgs/footer1.png" alt="Instagram 5" class="img-fluid w-25 h-100 m-2"/>
                    </div>
                </div>
            </div>
        </div>

      <div class="copyright mt-5">
        <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <img src="assets/imgs/payment.jpg"/>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                <P>eCommerce @ 2025 All Rights Reserved</P>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
      </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>