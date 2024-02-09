
<?php
 session_start();

 if(!empty($_SESSION['cart'] && isset($_POST['checkout']))){
 }else{
    header('location: index.php');
 }
 $totalAmount = 0;

 if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
     foreach ($_SESSION['cart'] as $product) {
         
         $totalAmount += isset($product['product_price']) ? $product['product_price'] : 0;
     }
 }
 
 $_SESSION['total'] = $totalAmount;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c44e685fe3.js" crossorigin="anonymous"></script>
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

<!--Chekout-->
  <!--Register-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">
            <div class="checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" id="chekout-name" name="name" placeholder="Name" required/>
            </div>
            <div class="form-group checkout-small-element">
                <label>Email</label>
                <input type="text" class="form-control" id="chekout-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group checkout-small-element">
                <label>Phone</label>
                <input type="tel" class="form-control" id="chekout-phone" name="phone" placeholder="Phone" required/>
            </div>
            <div class="form-group checkout-small-element">
                <label>City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
            </div>
            <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
            </div>
            <div class="form-group checkout-btn-container">
               <p>Total amount: $ <?php echo $totalAmount; ?></p>
               <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
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