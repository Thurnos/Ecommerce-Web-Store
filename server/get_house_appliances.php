<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='House Appliances' LIMIT 4");
$stmt->execute();

if ($stmt->error) {
    die("Error: " . $stmt->error);
}

$house_appliances = $stmt->get_result();
?>
