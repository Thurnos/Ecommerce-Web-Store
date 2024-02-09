-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 10:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 155.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-16 10:15:24'),
(2, 454.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-16 10:39:11'),
(3, 454.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-16 10:40:07'),
(4, 454.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-16 10:41:02'),
(5, 279.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-16 11:31:06'),
(6, 299.00, 'on_hold', 1, 882427901, 'Quebec', 'Canada', '2024-01-22 08:38:07'),
(7, 499.00, 'on_hold', 1, 1234567890, 'Quebec', 'Canada', '2024-01-23 12:58:42'),
(8, 779.00, 'on_hold', 1, 1234567890, 'Sofia', 'Canada', '2024-01-23 13:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 4, '1', 'Razer Headphones', 'head.png', 155.00, 1, 1, '2024-01-16 10:41:02'),
(2, 4, '2', 'Sony WH-1000XM4', 'sony_wh1000xm4.jpg', 299.00, 1, 1, '2024-01-16 10:41:02'),
(3, 5, '3', 'Bose QuietComfort 35 II', 'bose_qc35ii.jpg', 279.00, 1, 1, '2024-01-16 11:31:06'),
(4, 6, '2', 'Sony WH-1000XM4', 'sony_wh1000xm4.jpg', 299.00, 1, 1, '2024-01-22 08:38:07'),
(5, 7, '161', 'PlayStation 5', 'ps5_console.jpg', 499.00, 1, 1, '2024-01-23 12:58:42'),
(6, 8, '161', 'PlayStation 5', 'ps5_console.jpg', 499.00, 1, 1, '2024-01-23 13:31:24'),
(7, 8, '3', 'Bose QuietComfort 35 II', 'bose_qc35ii.jpg', 279.00, 1, 1, '2024-01-23 13:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_special_offer`, `product_color`) VALUES
(1, 'Razer Headphones', 155.00, 'headphones', 'Razer Kraken X Headphones', 'head.png', 'featuredl.png', 'featuredl.png', 'featuredl.png', 0, 'Black'),
(2, 'Sony WH-1000XM4', 299.99, 'headphones', 'Sony Noise Cancelling Headphones', 'sony_wh1000xm4.jpg', 'sony_wh1000xm4_2.jpg', 'sony_wh1000xm4_3.jpg', 'sony_wh1000xm4_4.jpg', 1, 'Black'),
(3, 'Bose QuietComfort 35 II', 279.99, 'headphones', 'Bose Noise Cancelling Headphones', 'bose_qc35ii.jpg', 'bose_qc35ii_2.jpg', 'bose_qc35ii_3.jpg', 'bose_qc35ii_4.jpg', 0, 'Silver'),
(4, 'Sennheiser HD 660 S', 499.99, 'headphones', 'Sennheiser Open-Back Headphones', 'sennheiser_hd660s.jpg', 'sennheiser_hd660s_2.jpg', 'sennheiser_hd660s_3.jpg', 'sennheiser_hd660s_4.jpg', 0, 'Gray'),
(5, 'Apple AirPods Pro', 249.99, 'headphones', 'Apple Noise Cancelling Earbuds', 'apple_airpods_pro.jpg', 'apple_airpods_pro_2.jpg', 'apple_airpods_pro_3.jpg', 'apple_airpods_pro_4.jpg', 0, 'White'),
(21, 'Apple Watch Series 7', 399.99, 'smartwatches', 'Apple Smartwatch with Always-On Retina Display', 'apple_watch_series7.jpg', 'apple_watch_series7_2.jpg', 'apple_watch_series7_3.jpg', 'apple_watch_series7_4.jpg', 0, 'Gold'),
(22, 'Samsung Galaxy Watch 4', 299.99, 'smartwatches', 'Samsung Smartwatch with Fitness and Health Tracking', 'samsung_galaxy_watch4.jpg', 'samsung_galaxy_watch4_2.jpg', 'samsung_galaxy_watch4_3.jpg', 'samsung_galaxy_watch4_4.jpg', 1, 'Silver'),
(27, 'Fossil Gen 6', 279.99, 'smartwatches', 'Fossil Touchscreen Smartwatch with Wear OS', 'fossil_gen6.jpg', 'fossil_gen6_2.jpg', 'fossil_gen6_3.jpg', 'fossil_gen6_4.jpg', 0, 'Black'),
(28, 'Xiaomi Mi Watch', 129.99, 'smartwatches', 'Xiaomi Affordable Smartwatch with Fitness Tracking', 'xiaomi_miwatch.jpg', 'xiaomi_miwatch_2.jpg', 'xiaomi_miwatch_3.jpg', 'xiaomi_miwatch_4.jpg', 1, 'White'),
(35, 'Honor MagicWatch 2', 179.99, 'smartwatches', 'Honor Smartwatch with SpO2 Monitor', 'honor_magicwatch2.jpg', 'honor_magicwatch2_2.jpg', 'honor_magicwatch2_3.jpg', 'honor_magicwatch2_4.jpg', 0, 'Silver'),
(38, 'Samsung QLED Q90T', 1499.99, 'TV', 'Samsung 4K QLED Smart TV', 'samsung_qled_q90t.jpg', 'samsung_qled_q90t_2.jpg', 'samsung_qled_q90t_3.jpg', 'samsung_qled_q90t_4.jpg', 1, 'Black'),
(39, 'LG OLED CX', 1799.99, 'TV', 'LG 4K OLED Smart TV', 'lg_oled_cx.jpg', 'lg_oled_cx_2.jpg', 'lg_oled_cx_3.jpg', 'lg_oled_cx_4.jpg', 0, 'Silver'),
(40, 'Sony Bravia X900H', 1299.99, 'TV', 'Sony 4K LED Smart TV', 'sony_bravia_x900h.jpg', 'sony_bravia_x900h_2.jpg', 'sony_bravia_x900h_3.jpg', 'sony_bravia_x900h_4.jpg', 0, 'Gray'),
(41, 'TCL 6-Series', 799.99, 'TV', 'TCL 4K QLED Roku Smart TV', 'tcl_6series.jpg', 'tcl_6series_2.jpg', 'tcl_6series_3.jpg', 'tcl_6series_4.jpg', 1, 'Black'),
(42, 'Vizio M-Series Quantum', 899.99, 'TV', 'Vizio 4K Quantum Smart TV', 'vizio_mseries_quantum.jpg', 'vizio_mseries_quantum_2.jpg', 'vizio_mseries_quantum_3.jpg', 'vizio_mseries_quantum_4.jpg', 0, 'White'),
(60, 'HP Spectre x360', 1399.99, 'Laptop', 'HP Spectre x360 Convertible Laptop', 'hp_spectre_x360.jpg', 'hp_spectre_x360_2.jpg', 'hp_spectre_x360_3.jpg', 'hp_spectre_x360_4.jpg', 0, 'Black'),
(77, 'iPhone 13 Pro Max', 1299.99, 'Smartphone', 'Apple iPhone 13 Pro Max', 'iphone_13_pro_max.jpg', 'iphone_13_pro_max_2.jpg', 'iphone_13_pro_max_3.jpg', 'iphone_13_pro_max_4.jpg', 0, 'Silver'),
(78, 'Samsung Galaxy S21 Ultra', 1199.99, 'Smartphone', 'Samsung Galaxy S21 Ultra 5G', 'samsung_galaxy_s21_ultra.jpg', 'samsung_galaxy_s21_ultra_2.jpg', 'samsung_galaxy_s21_ultra_3.jpg', 'samsung_galaxy_s21_ultra_4.jpg', 1, 'Black'),
(79, 'Google Pixel 6 Pro', 899.99, 'Smartphone', 'Google Pixel 6 Pro 5G', 'google_pixel_6_pro.jpg', 'google_pixel_6_pro_2.jpg', 'google_pixel_6_pro_3.jpg', 'google_pixel_6_pro_4.jpg', 0, 'White'),
(88, 'Nokia X20', 349.99, 'Smartphone', 'Nokia X20 5G', 'nokia_x20.jpg', 'nokia_x20_2.jpg', 'nokia_x20_3.jpg', 'nokia_x20_4.jpg', 1, 'Black'),
(97, 'Samsung French Door Refrigerator', 2199.99, 'House Appliances', 'Samsung 28 cu. ft. 4-Door French Door Refrigerator', 'samsung_french_door_refrigerator.jpg', 'samsung_french_door_refrigerator_2.jpg', 'samsung_french_door_refrigerator_3.jpg', 'samsung_french_door_refrigerator_4.jpg', 0, 'Stainless Steel'),
(98, 'Whirlpool Top Load Washer', 699.99, 'House Appliances', 'Whirlpool 4.8 cu. ft. High-Efficiency Top Load Washer', 'whirlpool_top_load_washer.jpg', 'whirlpool_top_load_washer_2.jpg', 'whirlpool_top_load_washer_3.jpg', 'whirlpool_top_load_washer_4.jpg', 1, 'White'),
(99, 'LG Front Load Dryer', 899.99, 'House Appliances', 'LG 7.4 cu. ft. Smart Wi-Fi Enabled Front Load Electric Dryer', 'lg_front_load_dryer.jpg', 'lg_front_load_dryer_2.jpg', 'lg_front_load_dryer_3.jpg', 'lg_front_load_dryer_4.jpg', 0, 'Graphite Steel'),
(100, 'Dyson V11 Torque Drive Vacuum', 599.99, 'House Appliances', 'Dyson V11 Torque Drive Cordless Stick Vacuum Cleaner', 'dyson_v11_torque_drive.jpg', 'dyson_v11_torque_drive_2.jpg', 'dyson_v11_torque_drive_3.jpg', 'dyson_v11_torque_drive_4.jpg', 1, 'Red'),
(101, 'KitchenAid Stand Mixer', 379.99, 'House Appliances', 'KitchenAid Artisan Series 5-Qt. Stand Mixer', 'kitchenaid_stand_mixer.jpg', 'kitchenaid_stand_mixer_2.jpg', 'kitchenaid_stand_mixer_3.jpg', 'kitchenaid_stand_mixer_4.jpg', 0, 'Blue'),
(126, 'Apple MacBook Pro 13-inch', 1299.99, 'Laptops', 'Apple MacBook Pro 13-inch, 8GB RAM, 256GB SSD Storage', 'apple_macbook_pro_13_inch.jpg', 'apple_macbook_pro_13_inch_2.jpg', 'apple_macbook_pro_13_inch_3.jpg', 'apple_macbook_pro_13_inch_4.jpg', 0, 'Space Gray'),
(137, 'HP Envy x360', 799.99, 'Laptops', 'HP Envy x360 Convertible Laptop, 15.6\" FHD Touchscreen, AMD Ryzen 5 4500U, 8GB RAM, 256GB SSD', 'hp_envy_x360_laptop.jpg', 'hp_envy_x360_laptop_2.jpg', 'hp_envy_x360_laptop_3.jpg', 'hp_envy_x360_laptop_4.jpg', 1, 'Nightfall Black'),
(138, 'Acer Chromebook Spin 13', 599.99, 'Laptops', 'Acer Chromebook Spin 13, 13.5\" 2K Touchscreen, Intel Core i5-8250U, 8GB RAM, 128GB eMMC', 'acer_chromebook_spin_13.jpg', 'acer_chromebook_spin_13_2.jpg', 'acer_chromebook_spin_13_3.jpg', 'acer_chromebook_spin_13_4.jpg', 0, 'Steel Gray'),
(139, 'Lenovo Legion 5', 899.99, 'Laptops', 'Lenovo Legion 5 Gaming Laptop, 15.6\" FHD 120Hz, AMD Ryzen 5 4600H, 8GB RAM, 512GB SSD', 'lenovo_legion_5_laptop.jpg', 'lenovo_legion_5_laptop_2.jpg', 'lenovo_legion_5_laptop_3.jpg', 'lenovo_legion_5_laptop_4.jpg', 1, 'Phantom Black'),
(161, 'PlayStation 5', 499.99, 'consoles', 'Sony PlayStation 5 Console', 'ps5_console.jpg', 'ps5_console_2.jpg', 'ps5_console_3.jpg', 'ps5_console_4.jpg', 0, 'Black'),
(162, 'Xbox Series X', 499.99, 'consoles', 'Microsoft Xbox Series X Console', 'xbox_series_x_console.jpg', 'xbox_series_x_console_2.jpg', 'xbox_series_x_console_3.jpg', 'xbox_series_x_console_4.jpg', 0, 'Black'),
(163, 'Nintendo Switch', 299.99, 'consoles', 'Nintendo Switch Console', 'nintendo_switch_console.jpg', 'nintendo_switch_console_2.jpg', 'nintendo_switch_console_3.jpg', 'nintendo_switch_console_4.jpg', 1, 'Gray'),
(164, 'PlayStation 4 Pro', 399.99, 'consoles', 'Sony PlayStation 4 Pro Console', 'ps4_pro_console.jpg', 'ps4_pro_console_2.jpg', 'ps4_pro_console_3.jpg', 'ps4_pro_console_4.jpg', 1, 'Jet Black'),
(165, 'Xbox One X', 399.99, 'consoles', 'Microsoft Xbox One X Console', 'xbox_one_x_console.jpg', 'xbox_one_x_console_2.jpg', 'xbox_one_x_console_3.jpg', 'xbox_one_x_console_4.jpg', 1, 'Robot White');

-- --------------------------------------------------------

--
-- Table structure for table `usera`
--

CREATE TABLE `usera` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Zadara', 'john@email.com', 'zadara'),
(2, 'Zadara', 'zadar@gmail.com', 'zadara'),
(3, 'Ivan Ivanov', 'ivivan@gmail.com', 'zadara'),
(4, 'JohnA', 'johny@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `usera`
--
ALTER TABLE `usera`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `usera`
--
ALTER TABLE `usera`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
