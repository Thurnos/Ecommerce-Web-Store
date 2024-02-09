<?php
session_start();

// Check if the user is logged in
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = mysqli_connect("localhost", "root", "", "php_project") or die(mysqli_error($conn));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$categories = array("consoles", "headphones", "smartphones", "House Appliances", "Laptop", "smartwatches", "TV"); // Add all your product categories

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$products = array();
$productLimit = 15; // Set the limit to 15 products

$categoryFilter = isset($_GET['category']) ? $_GET['category'] : 'all';

foreach ($categories as $category) {
    if ($categoryFilter == 'all' || $categoryFilter == $category) {
        $stmt = $conn->prepare("SELECT product_id, product_name, product_image, product_price FROM products WHERE product_category = ? LIMIT ?");
        $stmt->bind_param("si", $category, $productLimit);
        $stmt->execute();
        $stmt->bind_result($productId, $productName, $productImage, $productPrice);

        while ($stmt->fetch()) {
            $products[] = array('id' => $productId, 'name' => $productName, 'image' => $productImage, 'price' => $productPrice, 'category' => $category);
        }

        $stmt->close();
    }
}



$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c44e685fe3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="C:\Users\Svilen-PC\Desktop\website\font-awesome\css\all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" integrity="...">
    <link rel="stylesheet" href="assets/css/style.css"/>

    <style>
        .product img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }
        .pagination a{
            color:cadetblue;

        }
        .pagination li:hover a{
            color:black;
            background-color: cadetblue;
        }
    </style>

</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

<form method="get" action="">
    <label for="category">Select Category:</label>
    <select id="category" name="category">
       <a href="shop.php?category=all">All Categories</a>
       <a href="shop.php?category=consoles">Consoles</a>
       <a href="shop.php?category=headphones">Headphones</a>
       <a href="shop.php?category=TV">TV</a>
       <a href="shop.php?category=Laptop">Laptop</a>
       <a href="shop.php?category=smartwatches">Smart Watches</a>
     </select>

    <button type="submit">Filter</button>
</form> 


<section class="my-5 py-5">
    <div class="row mx-auto container-fluid">
    <form method="get" action="">
      <label for="category">Select Category:</label>
      <select id="category" name="category">
          <option value="all" onclick="applyFilters('all')">All Categories</option>
          <option value="consoles" onclick="applyFilters('consoles')">Consoles</option>
          <option value="headphones" onclick="applyFilters('headphones')">Headphones</option>
          <option value="consoles" onclick="applyFilters('TV')">TVs</option>
          <option value="headphones" onclick="applyFilters('Laptop')">Laptops</option>
          <option value="consoles" onclick="applyFilters('smartwatches')">Smartwatches</option>
       </select>
    </form>

        <!-- Display Products -->
        <?php foreach ($products as $product): ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $product['id']; ?>">
                    <img class="img-fluid mb-3 product-image" src="assets/imgs/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?> Image">
                </a>
                <h5 class="p-name"><?php echo $product['name']; ?></h5>
                <h4 class="p-price">$<?php echo $product['price']; ?></h4>

            </div>
        <?php endforeach; ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the category from the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const categoryParam = urlParams.get('category');

        // Set the selected option in the filter box
        if (categoryParam) {
            const categorySelect = document.getElementById('category');
            const selectedOption = categorySelect.querySelector(`[value="${categoryParam}"]`);

            if (selectedOption) {
                selectedOption.selected = true;
            }
        }
    });

    function applyFilters(category) {
        window.location.href = 'shop.php?category=' + category;
    }
    </script>
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