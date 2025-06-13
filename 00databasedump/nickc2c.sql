-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nickc2c`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `is_administrator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminID`, `username`, `password`, `phone_number`, `email`, `is_administrator`) VALUES
(1, 'NickLeong', '3ba6f4695f92901a806fbb11d78409bc', '767380339', 'nholeong@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `message_id` int(11) NOT NULL,
  `message_title` varchar(20) NOT NULL,
  `message_body` varchar(500) NOT NULL,
  `message_sender` varchar(50) NOT NULL,
  `date_sent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`message_id`, `message_title`, `message_body`, `message_sender`, `date_sent`) VALUES
(1, 'Too few items', 'There are too few items on this website! Why are there so few?', 'prince@email.com', '2025-04-04'),
(2, 'No clothes available', 'Their are n o cloths on this wevsite, why?', 'dragon.born@skyrim.com', '2025-04-04'),
(3, 'I need to go', 'A lot of shit is happening right now. So I thought I\'d leave a message here', 'biker@apocalypse.com', '2025-04-05'),
(4, 'This website is usel', 'This website is useless. It shows the same items every time', 'cheslin@email.com', '2025-04-07'),
(5, 'Trouble with account', 'I\'m trying to login but it says my account is disabled. Help', 'yvonne@email.com', '2025-04-16'),
(6, 'Test Message 1', 'This is a test message', 'ben@email.com', '2025-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_customer` tinyint(1) NOT NULL,
  `is_selling` tinyint(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `phone_number`, `email`, `is_customer`, `is_selling`, `date_created`) VALUES
(1, 'Geralt', '552e17f9ee44d2fe033cd92e327842d8', '0123456789', 'bigg@witcher.com', 1, 1, '2025-04-01'),
(2, 'Dovahkiin', '8f0e38e89d228092e2d9ab13b569af13', '08945478233', 'dragon.born@skyrim.com', 1, 1, '2025-04-01'),
(3, 'Daryl', '8302ff78d825cbacfdc7f255a180e457', '0894547823', 'biker@apocalypse.com', 0, 0, '2025-04-01'),
(4, 'Lucy', 'fdbdfced0f9a8d5cd74adcc155cabc3a', '0145784583', 'lucy@vault33.com', 1, 1, '2025-04-01'),
(5, 'Rassie', 'a5a26fb416c0ff7fd1888c2bad0a1065', '0656857284', 'rassie@rugby.com', 1, 1, '2025-04-01'),
(6, 'Doctor', 'adc67842a70dbbc61f829e257815b55e', '0159753286', 'doctor@who.com', 0, 0, '2025-04-02'),
(7, 'Darren', '3daa8c144a21c2474718c293c2683363', '7009449624', 'darren@email.com', 1, 1, '2025-04-02'),
(8, 'Patience', '0808f0296d1dd72acad2ba8ec70c808f', '7404996136', 'patience@email.com', 0, 0, '2025-04-02'),
(9, 'Siya', '68a609c0acc824ae7c2c4d4d06800a0d', '3115434073', 'siya@email.com', 1, 1, '2025-04-03'),
(10, 'Gerhard', '5fddb65e4471da1946140e4442fab376', '6968846718', 'gerhard@email.com', 1, 1, '2025-04-03'),
(11, 'Yvonne', '6f1b8bb6355aaf48c9c3d3dcd69d381b', '4462783881', 'yvonne@email.com', 0, 0, '2025-04-03'),
(12, 'Veronica', 'a41499d83a9360ff6a84781390d5634a', '7817281142', 'veronica@email.com', 1, 1, '2025-04-03'),
(13, 'Prince', 'e6a076496f2b7bcc2bbc9b2a4c51d66c', '8526571593', 'prince@email.com', 1, 0, '2025-04-04'),
(14, 'Alfontso', '4a9213249ee24f78b32706d71e09bfe5', '2365587492', 'alfontso@email.com', 1, 1, '2025-04-04'),
(15, 'Bob', 'dce012453a75cadc7a165579435859a6', '1258799853', 'bob@email.com', 1, 1, '2025-04-06'),
(16, 'Cheslin', '73df08b9c16e41a9a633efbf86135477', '6842397150', 'cheslin@email.com', 1, 0, '2025-04-06'),
(17, 'Ben', '55a9e5f16aec320acb9764381f400637', '9519514782', 'ben@email.com', 1, 1, '2025-04-07'),
(20, 'Dankie', '7821ebab0c53420888aafae3ff024eaf', '6859635984', 'dankie@email.com', 0, 0, '2025-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `items_for_approval`
--

CREATE TABLE `items_for_approval` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `link_to_item_picture` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `date_submitted` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_for_approval`
--

INSERT INTO `items_for_approval` (`item_id`, `item_name`, `item_price`, `link_to_item_picture`, `item_description`, `date_submitted`, `customer_id`) VALUES
(3, 'A bunch of peacock feathers', 80.00, 'items_maybe/peacockfeathers.png', '5 peacock feathers. Old, but strong and clean.', '2025-04-17', 15),
(4, 'Red Coffee Mug', 21.00, 'items_maybe/redcoffeemug.png', 'A simple red coffee mug with a smiley face on it', '2025-04-17', 10),
(7, 'Bamboo Chopsticks', 10.00, 'items_maybe/chopsticks.png', 'A pair of bamboo chopsticks. Handmade.', '2025-04-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items_for_sale`
--

CREATE TABLE `items_for_sale` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `link_to_item_picture` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_for_sale`
--

INSERT INTO `items_for_sale` (`item_id`, `item_name`, `item_price`, `link_to_item_picture`, `item_description`, `date_added`, `customer_id`) VALUES
(1, 'Cheese Wheel', 120.50, 'images_items/cheesewheel.png', 'Yellow cheese wheel found in ancient nord ruin. Still in good condition', '2025-04-01', 2),
(3, 'Blue T-Shirt', 50.00, 'images_items/bluetshirt.png', 'A simple blue T-shirt', '2025-04-08', 4),
(4, 'Autographed Rugby Ball', 200.00, 'images_items/autographedrugbyball.png', 'A rugby ball signed by the winners of the 2023 Rugby World Cup', '2025-04-04', 5),
(5, 'Assorted Foreign Coins', 120.99, 'images_items/foreigncoins.png', 'Assorted foreign coins from various lands', '2025-04-02', 1),
(6, 'Woven Hat', 25.00, 'images_items/wovenhat.png', 'A conical hat woven from grass', '2025-04-01', 4),
(7, 'Grey Blanket', 200.50, 'images_items/greyblanket.png', 'A grey blanket made of fleece', '2025-04-05', 1),
(9, 'Beaded Giraffe', 90.00, 'images_items/beadedgiraffe.png', 'A homemade giraffe made from wire and beads.', '2025-04-05', 9),
(10, 'Sunflower Seeds', 20.00, 'images_items/sunflowerseeds.png', '500g of raw sunflower seeds, ready to be planted', '2025-04-07', 10),
(11, 'Homemade Wooden Chair', 160.00, 'images_items/woodenchair.png', 'Homemade wooden chair. 100% natural Jacaranda wood', '2025-04-07', 4),
(12, 'Homemade Handbag Charm', 30.00, 'images_items/handbagcharm.png', 'A light, homemade handbag charm.', '2025-04-07', 12),
(13, '2nd Hand Volkswagen ', 5000.00, 'images_items/volkswagenpolo.png', '2nd hand Volswagen Polo. Still in good condition. 10 000 km mileage.', '2025-04-11', 7),
(14, '2nd Hand Nokia 3310', 100.00, 'images_items/nokia3310.png', '2nd hand Nokia 3310. Good condition', '2025-04-11', 1),
(15, 'English Dictionary', 81.00, 'images_items/englishdictionary.png', '2nd hand English doctionary for school kids.', '2025-04-12', 2),
(16, 'Assorted Novels', 350.00, 'images_items/assortednovels.png', 'A random assortment of novels.', '2025-04-13', 9),
(17, '500g Pack of Adzuki Beans', 100.00, 'images_items/adzukibeans.png', 'A 500g pack of Adzuki beans for cooking or planting', '2025-04-14', 12),
(18, 'Coffe Mug with a Pic', 26.00, 'images_items/coffeemug.png', 'A simple coffee mug with a picture', '2025-04-14', 5),
(19, 'South African Flag', 153.78, 'images_items/southafricaflag.png', 'A 1m x 700cm South African flag.', '2025-04-15', 5),
(20, 'Red Scrum Cap', 80.00, 'images_items/redscrumcap.png', 'A red scrum cap. Previously used', '2025-04-15', 10),
(21, 'Cool Looking Rock', 10.00, 'images_items/coolrock.png', 'A cool looking rock I found in my garden', '2025-04-15', 2),
(22, 'Steel Braai Rack', 23.00, 'images_items/braairack.png', 'A used steel braai rack. Cleaned as much as possible', '2025-04-16', 2),
(23, 'Pink Hair Ties', 24.00, 'images_items/pinkhairties.png', '10 pink hair ties', '2025-04-17', 12),
(24, 'Homemade Hand Fan', 30.00, 'images_items/handfan.png', 'A lightweight homemade hand fan', '2025-04-17', 12),
(25, 'Asus Laptop', 350.00, 'images_items/laptop.png', '2nd hand Asus laptop. Unknown model.', '2025-04-23', 17),
(26, 'Ancient Greek-Style Vases', 300.00, 'images_items/greekpots.png', 'Three handmade clay pots in an Ancient Greek-style. Good for storing food or liquids.', '2025-04-23', 15),
(28, 'Sapphire Ring', 550.00, 'images_items/Sapphire Ring.png', 'My old engagement ring. Made from 18K gold and a pure blue sapphire inset.', '2025-04-30', 14),
(31, 'Jet Ski', 25000.00, '../images_items/Jet Ski.png', 'A 2nd hand jet ski. Still in great condition.', '2025-04-30', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items_for_approval`
--
ALTER TABLE `items_for_approval`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `items_for_sale`
--
ALTER TABLE `items_for_sale`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `items_for_approval`
--
ALTER TABLE `items_for_approval`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items_for_sale`
--
ALTER TABLE `items_for_sale`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_for_approval`
--
ALTER TABLE `items_for_approval`
  ADD CONSTRAINT `items_for_approval_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `items_for_sale`
--
ALTER TABLE `items_for_sale`
  ADD CONSTRAINT `items_for_sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
