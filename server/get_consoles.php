<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='consoles' LIMIT 4");
$stmt->execute();

if ($stmt->error) {
    die("Error: " . $stmt->error);
}

$console_products = $stmt->get_result();
?>
