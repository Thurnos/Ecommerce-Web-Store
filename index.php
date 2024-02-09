<?php
$cookieAccepted = isset($_COOKIE['cookie_accepted']);
$user = isset($_COOKIE['user']) ? $_COOKIE['user'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteBazaar</title>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c44e685fe3.js" crossorigin="anonymous"></script>
    <script>
        function filterProducts() {
            var selectedCategory = document.getElementById('category').value;

            window.location.href = 'shop.php?category=' + selectedCategory;
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
                       <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                       <a href="account.php"><i class="fas fa-user"></i></a>
                    </li>
                   
                    
                </ul>
            </div>
        </div>
    </nav>

    <!--Home-->
    <section id="home">
        
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p>Eshop offers the best products for the most affordable prices</p>
            <button>Shop Now</button>
        </div>
    </section>

  <!--Brand-->
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.png"/>

        </div>
    </section>

    <!--New-->
    <section id="new" class="w-90 mb-4">
        <div class="row p-0 m-0">
            <!-- One -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/1.png" alt="Laptops">
                <div class="details">
                    <h2>Laptops</h2>
                    <a href="http://localhost/website/shop.php?category=Laptops">
                       <button class="text-uppercase">Shop Now</button>
                    </a>
                </div>
            </div>
            <!-- Two -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.png" alt="Smartphones">
                <div class="details">
                    <h2>Smartphones</h2>
                    <a href="http://localhost/website/shop.php?category=smartphones">
                       <button class="text-uppercase">Shop Now</button>
                    </a>
                </div>
            </div>
            <!-- Three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.png" alt="Watches">
                <div class="details">
                    <h2>Watches</h2>
                    <a href="http://localhost/website/shop.php?category=smartwatches">
                       <button class="text-uppercase">Shop Now</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
        <!--Featured-->
        <section id="featured">
            <div class="container text-center d-flex flex-column align-items-center">
                <h3>Featured</h3>
                <hr class="w-50">
                <p>Here you can check out our featured products</p>
            </div>


            <?php include('server/get_featured_products.php')?>
            
            <div class="row mx-auto container-fluid"> 
         <?php while($row = $feature_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-6 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="Sports Shoes Image">
            <div class="star-rating">
            <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
            
             </div>
                    <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                   <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                   <a href="<?php echo 'single_product.php?product_id=' . $row['product_id']; ?>">                   
                   <button class="buy-button">Buy Now</button></a>
               </div>
           <?php } ?>
             
           
          
        </section>
    

    <!--Banner-->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>MID SEASON DISCOUNT</h4>
            <h1>Winter Collection<br> UP TO 30% OFF</h1>
            
        </div>
    </section>

    <!--CONSOLES-->
    <section id="consoles" class="w-90 mb-4">
    <div class="container text-center d-flex flex-column align-items-center">
        <h3>Consoles</h3>
        <hr class="w-50">
        <p>Here you can check out our featured products</p>
    </div>

    <?php include('server/get_consoles.php');?>
    <div class="row mx-auto container-fluid"> 
        <?php while($row = $console_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="Console Image">
                <div class="star-rating">
                    
                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                <button class="buy-button">Buy Now</button>
            </div>
        <?php } ?>
    </div>
</section>



    <section id="consoles" class="w-90 mb-4">
        <div class="container text-center d-flex flex-column align-items-center">
            <h3>Headphones</h3>
            <hr class="w-50">
            <p>Here you can check out our featured products</p>
        </div>

        <?php include('server/get_headphones.php');?>
     <div class="row mx-auto container-fluid"> 
        <?php while($row = $headphone_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="Headphones Image">
                <div class="star-rating">

                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                <button class="buy-button">Buy Now</button>
            </div>
        <?php } ?>
    </div>
        </div>
       
    <!-- Consoles Section -->
 <section id="consoles" class="w-90 mb-4">
    <div class="container text-center d-flex flex-column align-items-center">
        <h3>House Appliances</h3>
        <hr class="w-50">
        <p>Here you can check out our featured products</p>
    </div>

<!-- Carousel -->
 <?php include('server/get_house_appliances.php');?>
     <div class="row mx-auto container-fluid"> 
        <?php while($row = $house_appliances->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="House Appliances">
                <div class="star-rating">
                    
                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                <button class="buy-button">Buy Now</button>
            </div>
        <?php } ?>

    </div>
    </section>  



        
    <div id="cookie-popup" style="display: none; position: fixed; bottom: 0; left: 0; width: 100%; background: rgba(240, 240, 240, 0.85); padding: 10px; text-align: center;">
        <p style="font-weight: bold;">This website uses cookies. By continuing to use this site, you accept our use of cookies. <button onclick="acceptCookies()">Accept</button></p>
    </div>


   
    <!-- Button to reset cookies -->
    <button onclick="resetCookies()">Reset Cookies</button>
    <input type="hidden" id="user-name" value="<?php echo isset($user) ? $user : ''; ?>">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    
    
    <script>
        
        function acceptCookies() {
    // Calculate the expiration date 30 days from now
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 30);

    // Format the date string for the expires attribute
    var expiresDateString = expirationDate.toUTCString();

    // Set the cookie with the updated expiration date
    document.cookie = "cookie_accepted=true; expires=" + expiresDateString + "; path=/";

    // Hide the cookie popup
    var cookiePopup = document.getElementById('cookie-popup');
    cookiePopup.style.display = 'none';

    // Set the background color with increased transparency after accepting cookies
    var currentBackgroundColor = window.getComputedStyle(cookiePopup).backgroundColor;
    var currentOpacity = parseFloat(currentBackgroundColor.match(/[\d.]+/)[0]);
    var newOpacity = Math.min(currentOpacity + 0.1, 0.9);
    cookiePopup.style.backgroundColor = `rgba(95, 158, 160, ${newOpacity})`;

    // Retrieve the user information from the hidden input field
    var userName = "Ivan Ivanov";
    alert("Welcome, " + userName + "!");
     }

    function resetCookies() {
            document.cookie = "cookie_accepted=; expires=Thu, 01 Feb 2023 00:00:00 UTC; path=/";
            document.cookie = "user=; expires=Thu, 01 Feb 2023 00:00:00 UTC; path=/";
            alert("Cookies have been reset!");
        }
        // Function to check if the user has already accepted cookies
    function checkCookies() {
            var cookieAccepted = document.cookie.indexOf('cookie_accepted') !== -1;
            if (!cookieAccepted) {
                document.getElementById('cookie-popup').style.display = 'block';
            }
        }

        // Execute the checkCookies function when the page loads
        window.onload = checkCookies;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>