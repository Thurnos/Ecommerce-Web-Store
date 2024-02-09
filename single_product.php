<?php
include('server/connection.php');

// Check if product_id is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? ");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

   
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
        
        <section class="container single_product my-5 pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $product['product_image']; ?>" id="main_img"/>
            <div class="small-img-group">
            
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $product['product_image2']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $product['product_image3']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $product['product_image2']; ?>" width="100%" class="small-img"/>
                </div>
                
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <h6><?php echo $product['product_category']; ?></h6>
            <h3 class="py-4"><?php echo $product['product_name']; ?></h3>
            <h2>$<?php echo $product['product_price']; ?></h2>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"/>
                <input type="hidden" name="product_image" value="<?php echo $product['product_image']; ?>"/>
                <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>"/>
                <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>"/>
                <input type="number" name="product_quantity" value="1"/>
                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>
            <h4 class="mt-5 mb-5">Product details</h4>
            <span><?php echo $product['product_description']; ?></span>
        </div>
    </div>
</section>

        <?php
    } else {
        
        echo "Product not found!";
    }
?>






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
    <script>
     var main_img =  document.getElementById("main_img");
     var small_img = document.getElementsByClassName("small-img");

     for(let i=0;i<4;i++){
        small_img[i].onclick = function(){
            main_img.src = small_img[i].src;
         }
        }
    </script>
</body>
</html>