-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 01:39 PM
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
-- Database: `dailybazar1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cid_f` int(11) NOT NULL,
  `pid_f` int(11) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `quantity` int(10) NOT NULL,
  `name_f` varchar(150) NOT NULL,
  `price_f` int(10) NOT NULL,
  `imagedb_f` varchar(500) NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cid_f`, `pid_f`, `owner_id`, `quantity`, `name_f`, `price_f`, `imagedb_f`, `total`, `status`) VALUES
(12, 3, 1, 1, 2, 'onion', 20, '../shopownerupload/product-9.jpg', 40, 'incart');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Fruits'),
(3, 'Vegetables'),
(4, 'Meat'),
(5, 'Dairy Products'),
(6, 'cool drinks'),
(7, 'Daily products'),
(8, 'groceries');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `imagedb` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `username`, `password`, `address`, `contact`, `imagedb`) VALUES
(1, 'Karthik bk', 'kart', 'Kar@12345', 'bekal', '9654234567', '../customerupload/face4.jpg'),
(2, 'Sonith Kumar', 'sonithkumar', 'pradi@1234', 'Kateel', '9076578690', '../customerupload/WhatsApp Image 2024-01-16 at 6.53.20 PM.jpeg'),
(3, 'Uday', 'uday', 'uday@123', 'Kateel', '9087634233', '../customerupload/Sony.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `cid`, `cname`, `message`) VALUES
(1, 1, 'Karthik bk', ''),
(2, 1, 'Karthik bk', 'sfasf'),
(3, 3, 'Uday', 'Good product');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_pincode`) VALUES
(4, 'state bank', '574144'),
(5, 'Ballal bagh', '574145'),
(6, 'Jyothi', '786567'),
(8, 'Bajpe', '574509');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `cartid_f` int(11) NOT NULL,
  `name_f` varchar(20) NOT NULL,
  `cid_f` int(11) NOT NULL,
  `total_f` int(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `product_ido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `owner_id`, `date`, `cartid_f`, `name_f`, `cid_f`, `total_f`, `quantity`, `order_status`, `product_ido`) VALUES
(1, 1, '2022-08-02', 1, 'onion', 1, 75, 5, 'shipped', 1),
(3, 1, '2022-08-02', 3, 'onion', 1, 15, 1, 'order_cancelled', 1),
(4, 1, '2022-08-16', 5, 'onion', 1, 45, 3, 'shipped', 1),
(5, 1, '2022-08-16', 6, 'orange', 1, 60, 2, 'order_cancelled', 2),
(7, 1, '2024-03-12', 8, 'cucumber', 1, 20, 1, 'shipped', 4),
(8, 1, '2024-03-13', 9, 'orange', 1, 30, 1, 'shipped', 2),
(9, 1, '2024-03-13', 10, 'carrot', 3, 20, 1, 'shipped', 3),
(10, 1, '2024-03-13', 11, 'orange', 3, 30, 1, 'pending', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cid_f` int(11) NOT NULL,
  `orderid_f` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cid_f`, `orderid_f`, `totalprice`, `date`, `status`) VALUES
(5, 35, 6, 75, '2022-04-16 16:15:10', 'pending'),
(6, 35, 7, 120, '2022-04-16 16:15:10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment_veg`
--

CREATE TABLE `payment_veg` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `card_number` int(16) NOT NULL,
  `expiry` int(5) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `location_id` int(5) NOT NULL,
  `owner_pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `imagedb` varchar(500) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `category_idp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `location_id`, `owner_pid`, `name`, `price`, `description`, `imagedb`, `shop_name`, `category_idp`) VALUES
(1, 5, 1, 'onion', 20, 'fresh onion', '../shopownerupload/product-9.jpg', 'Carry Fresh', 3),
(2, 5, 1, 'orange', 30, 'organic orange ', '../shopownerupload/anastasia-malysh-Jr7t5QviCDM-unsplash.jpg', 'Carry Fresh', 2),
(3, 5, 1, 'carrot', 20, 'fresh carrot', '../shopownerupload/rodrigo-dos-reis-ZgDHMMd72I8-unsplash.jpg', 'Carry Fresh', 3),
(4, 5, 1, 'cucumber', 20, 'fresh cucumber', '../shopownerupload/harshal-s-hirve-2GiRcLP_jkI-unsplash.jpg', 'Carry Fresh', 3),
(5, 5, 1, 'watermelon', 30, 'fresh watermelon', '../shopownerupload/art-rachen-izi5AnlbRIA-unsplash.jpg', 'Carry Fresh', 2),
(6, 5, 1, 'banana', 25, 'fresh banana', '../shopownerupload/giorgio-trovato-fczCr7MdE7U-unsplash.jpg', 'Carry Fresh', 2),
(7, 5, 1, 'fish', 50, 'fresh fish', '../shopownerupload/jakub-kapusnak-vLQzopDRSNI-unsplash.jpg', 'Carry Fresh', 4),
(8, 5, 1, 'chicken', 100, 'fresh chicken', '../shopownerupload/eiliv-sonas-aceron-DNQLBdGdld0-unsplash.jpg', 'Carry Fresh', 4),
(9, 5, 1, 'milk', 20, 'pure milk', '../shopownerupload/Milk2.webp', 'Carry Fresh', 5),
(10, 5, 1, 'egg', 6, 'fresh', '../shopownerupload/estudio-gourmet-wJbDzUQoFBQ-unsplash.jpg', 'Carry Fresh', 4),
(11, 5, 1, 'Greap', 20, 'Buy', '../shopownerupload/image_5.jpg', 'Carry Fresh', 8),
(12, 5, 2, 'Pista', 10, 'fresh juice', '../shopownerupload/product-8.jpg', 'Ram', 6);

-- --------------------------------------------------------

--
-- Table structure for table `shopowner`
--

CREATE TABLE `shopowner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `location_id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `shop_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `imagedb` varchar(500) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopowner`
--

INSERT INTO `shopowner` (`owner_id`, `owner_name`, `location_id`, `username`, `password`, `shop_name`, `email`, `contact`, `imagedb`, `status`) VALUES
(1, 'Sonith Kumar', 5, 'Sonith Kumar', 'Sonith@123', 'Carry Fresh', 'sonith@gmil.com', '9876543212', '../shopownerupload/WhatsApp Image 2024-02-29 at 8.44.56 PM.jpeg', 'approved'),
(2, 'Pavan', 5, 'pavan', 'Pavan@123', 'Ram', 'Pavan123@gmail.com', '9068574436', '../shopownerupload/WhatsApp Image 2024-01-16 at 6.53.20 PM.jpeg', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_veg`
--
ALTER TABLE `payment_veg`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `shopowner`
--
ALTER TABLE `shopowner`
  ADD PRIMARY KEY (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_veg`
--
ALTER TABLE `payment_veg`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shopowner`
--
ALTER TABLE `shopowner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
