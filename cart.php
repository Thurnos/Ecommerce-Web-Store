<?php
session_start();
$overallSubtotal = 0;

function addToCart($product_id, $product_name, $product_price, $product_image, $product_quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $existingProduct = array_filter($_SESSION['cart'], function ($item) use ($product_id) {
        return $item['product_id'] === $product_id;
    });

    if (empty($existingProduct)) {
        $product = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        ];

        // Add the product to the cart
        $_SESSION['cart'][] = $product;
        echo "Product added successfully.";
    } else {
        echo '<script>alert("Product is already in the cart");</script>';
    }
}

function removeFromCart($product_id) {
    $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));

    // Check if the product is found in the cart
    if ($index !== false) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
        echo "Product removed successfully.";
    } else {
        echo "Product not found in cart.";
    }
}

function editProductQuantity($product_id, $product_quantity) {
    // Check if the product is in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Set the quantity to the specified amount
        $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
        echo "Quantity updated successfully.";
    } else {
        echo "Product not found in cart.";
    }

    header("Location: cart.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        addToCart($product_id, $product_name, $product_price, $product_image, $product_quantity);
    } elseif (isset($_POST['remove_from_cart']) && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        removeFromCart($product_id);
    } elseif (isset($_POST['edit_quantity']) && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
        editProductQuantity($product_id, $product_quantity);
    }
}
?>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle click on "Remove from Cart" button
        $('.remove-from-cart-btn').on('click', function (e) {
            e.preventDefault();

            var productId = $(this).closest('form').find('input[name="product_id"]').val();

            
            var clickedButton = $(this);

            // Send AJAX request to remove the product from the cart
            $.ajax({
                type: 'POST',
                url: 'cart.php', 
                data: { remove_from_cart: true, product_id: productId },
                success: function (response) {
                    
                    clickedButton.closest('tr').remove();
                }
            });
        });
    });
</script>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c44e685fe3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="C:\Users\Svilen-PC\Desktop\website\font-awesome\css\all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" integrity="...">
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>

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


    <!--Cart-->
    <section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    <?php
      
       if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
               foreach ($_SESSION['cart'] as $product_id => $product) {
                $subtotal = $product['product_quantity'] * $product['product_price'];
                $overallSubtotal += $subtotal; // Update overall subtotal
             ?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo isset($product['product_image']) ? $product['product_image'] : ''; ?>" />
                    <div>
                        <p><?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?></p>
                        <small><span>$</span><?php echo isset($product['product_price']) ? $product['product_price'] : ''; ?></small>
                        <br>
                            <br>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="action" value="remove_from_cart" />
                                <input type="hidden" name="product_id" value="<?php echo isset($product['product_id']) ? $product['product_id'] : ''; ?>" />
                                <button type="submit" class="remove-from-cart-btn">Remove from Cart</button>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="action" value="edit_quantity" />
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                        <input type="number" name="product_quantity" value="<?php echo $product['product_quantity']; ?>" />
                        <input class="edit-btn" value="Edit" type="submit" />
                    </form>
                </td>

                <td>
                    <span>$</span>
                    <span class ="product-price"><?php echo $product['product_quantity'] * $product['product_price']; ?></span>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='3'>Your cart is empty.</td></tr>";
    }
    ?>
</table>

    <div class="chekout-container">
        <form method="POST" action = "chekout.php">
         <hr>
        <p>$<?php echo $overallSubtotal; ?></p>    
        <input type = "submit" class="btn checkout-btn" value ="Checkout" name="checkout">
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