-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 11:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `orderID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderPay` double NOT NULL,
  `orderMethod` varchar(255) NOT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `userID` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`orderID`, `orderDate`, `orderPay`, `orderMethod`, `orderStatus`, `userID`) VALUES
(001, '2021-01-29 22:08:03', 6.9, 'selfc', '', 0002),
(002, '2021-01-29 22:08:15', 6.9, 'selfc', '', 0002),
(003, '2021-01-29 22:08:53', 6.9, 'selfc', '', 0002),
(004, '2021-01-29 22:09:51', 29.88, 'selfc', '', 0002),
(005, '2021-01-29 22:20:30', 29.88, 'selfc', '', 0002),
(006, '2021-01-29 22:21:38', 29.88, 'selfc', '', 0002),
(007, '2021-01-29 22:24:03', 29.88, 'selfc', '', 0002),
(008, '2021-01-29 22:25:01', 29.88, 'selfc', '', 0002),
(009, '2021-01-29 22:25:41', 29.88, 'selfc', '', 0002),
(010, '2021-01-29 22:26:08', 29.88, 'selfc', '', 0002),
(011, '2021-01-29 22:31:34', 16.9, 'delivery', '', 0002);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `orderID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `orderID`, `productCode`, `quantity`) VALUES
(0001, 003, 'food003', 1),
(0002, 004, 'food003', 1),
(0003, 004, 'food001', 2),
(0004, 004, 'beve003', 1),
(0005, 005, 'food003', 1),
(0006, 005, 'food001', 2),
(0007, 005, 'beve003', 1),
(0008, 006, 'food003', 1),
(0009, 006, 'food001', 2),
(0010, 006, 'beve003', 1),
(0011, 007, 'food003', 1),
(0012, 007, 'food001', 2),
(0013, 007, 'beve003', 1),
(0014, 008, 'food003', 1),
(0015, 008, 'food001', 2),
(0016, 008, 'beve003', 1),
(0017, 009, 'food003', 1),
(0018, 009, 'food001', 2),
(0019, 009, 'beve003', 1),
(0020, 010, 'food003', 1),
(0021, 010, 'food001', 2),
(0022, 010, 'beve003', 1),
(0023, 011, 'food003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(3) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDesc` varchar(255) NOT NULL,
  `productPrice` double NOT NULL,
  `productImg` varchar(255) NOT NULL,
  `productCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productCode`, `productName`, `productDesc`, `productPrice`, `productImg`, `productCategory`) VALUES
(1, 'food001', 'Super Burger Whopper', 'Super Burger Whopper is Malaysian Favorite Burger and there’s\r\nNo doubting its iconic status\r\n', 8.99, 'whopper-jr-burger-king.jpg', 'food'),
(2, 'food002', 'Malaysian Wanton Noodle', 'Wonton mee, or wantan mee, is a popular noodle dish in Asia', 7.5, 'download.jfif', 'food'),
(3, 'food003', 'Brown Castle Sliders', 'Brown Castle Sliders is the delicious fast-food burger ', 6.9, 'white-castle.jpg', 'food'),
(4, 'food004', 'Chicken Rice Ball', 'Rice ball is served stone-cold while the texture is moist and soft, each ball is generously stuffed with chicken oil fragrance', 5, 'melaka-formosa-chicken-rice-11-1536x1024.jpg', 'food'),
(5, 'food005', 'Tahhco Bell Burrito Dissy', 'Tahhco Bell has crowned this burrito “The Dissy Ruler of the Burrito Empire,” and it has many loyal subjects to prove it', 10.5, 'taco-bell-burrito-supreme.jpg', 'food'),
(6, 'food006', 'Chicken Sandwich', 'Chicken Sandwich may be politically polarizing, but people tend to have a unified stance on their original Chicken Sandwich : “VEEERY!!! NICE!!”', 7.99, 'chick-fil-a-sandwich-massachusetts.jpg', 'food'),
(7, 'food007', 'Fried Oyster Omelette', 'The eggs and oysters are then cooked with the batter to give you that crispy edges and gooey texture\r\n', 12.5, 'download (1).jfif', 'food'),
(8, 'food008', 'Tahhco Bell’s Nacho Fries', 'Tahhco Bell’s Nacho Fries have come and gone multiple times over the years, and  currently available at the fast-food chain', 6.5, 'taco-bell-nacho-fries.jpg', 'food'),
(9, 'food009', 'Butter Burger', 'The fast-food chain has nicknamed  it “The Best”', 7.8, 'bruger-cheddar-bites-shake-culvers-wisconsin.jpg', 'food'),
(10, 'food010', 'Whataburger Taquito with Cheese', 'The Taquito with Cheese has, in particular, been called “a Texas tradition’s ”', 12.5, 'whataburger-taquitos.jpg', 'food'),
(11, 'food011', 'Pepperoni Pizza', 'it’s quickly gaining steam on Pizza Hut and could surpass it in popularity', 15.9, 'dominos-ultimate-pepperoni-pizza.jpg', 'food'),
(12, 'food012', 'Spaghetti Aglio a Olio', 'A fermented fish sauce, in ancient Roman Cooking, using fish sauce in Italian food just made sence', 14.5, 'image.jfif', 'food'),
(13, 'food013', 'Easy Chicken Spaghetti', 'Give your traditional chicken casserole a break and server this bright and lively chicken spaghetti', 13.9, 'image (1).jfif', 'food'),
(14, 'food014', 'Lighter Fried Rice', 'Fried rice can actually be a healthy main course or side dish. Plus, the ability to incorporate leftovers of virtually any type-meat or vegetable', 6.5, 'image (2).jfif', 'food'),
(15, 'food015', 'Almost Classic Pork Fried Rice', 'With its fresh bean sprouts and diced water chestnuts is a fresh and healthy Alternative to the original\r\n', 7.5, 'image (3).jfif', 'food'),
(16, 'beve001', 'Sanic Cherry Limeade', 'Sanic holds a daily Happy Hour That Features half-priced drinks, and pople turn up on schedule for the Cherry Limeade', 5.6, 'sonic-cherry-limeade-slush.jpg', 'beve'),
(17, 'beve002', 'Macchiato', 'This foamy espresso concoction is a consistent favorite and has been\r\na mainstay on the menu for over three decades\r\n', 4.7, 'starbucks-iced-coconut-milk-mocha-macchiato.jpg', 'beve'),
(18, 'beve003', 'Iced Tea', 'We is so proud of our Iced tea that it details the beverage’s \r\n20-years history\r\n', 5, 'Chickfila-sweetened-tea.jpg', 'beve'),
(19, 'beve004', 'CocFlurry', 'Its cold, creamy, and its sweetness  hits  the  right spot to balance all \r\nof  that salt you’ve just eaten from your burger and fries\r\n', 7.9, 'mcdonalds-McFlurry.jpg', 'beve'),
(20, 'beve005', 'Coca-Cola soft drink ', 'Soft drinks are probably toward the top of most chains’ popularity rankings', 3.8, 'chick-fil-a-soft-drink.jpg', 'beve'),
(21, 'beve006', 'Frozon Custard', 'Caramel Fudge Cookie Dough this sweet indulgence is hard to beat', 10.7, 'culvers-frozen-custard-pint.jpg', 'beve'),
(22, 'beve007', 'Ice Lemon Tea', 'Sweet and sour drinks', 4.9, 'cocktails-1594319263.jpg', 'beve'),
(23, 'beve008', 'Strawberry Limeade', 'Is the most popular summer drinks', 6.8, 'Refreshing-Summer-Drinks-Fifteen-Spatulas-1.jpg', 'beve'),
(24, 'beve009', 'Easy Chai Tea', 'An extra kick of caffeine, add a shot of espresso to make a DIY dirty chai', 3.9, 'image (4).jfif', 'beve'),
(25, 'beve010', 'Creamy Caramel Latte’', 'For an extra sweet way to start the day, add a drizzle of caramel sauce on top', 5.6, 'image (5).jfif', 'beve'),
(26, 'beve011', 'Spices Hot Cocoa', 'Add a touch of ground chipotle and cinnamon to turn up the heat in this winter favorite', 8.9, 'image (6).jfif', 'beve'),
(27, 'beve012', 'Mulled wine With Cranberries', 'Jazz up this old standby with cranberry juice and fresh cranberries', 6.8, 'image (7).jfif', 'beve'),
(28, 'beve013', 'Fresh Ginger Tea', 'Warming, spicy ginger tea has a long history of use for stomach ache and nausea', 3.5, 'healthy_hot_drinks_ginger_620x400_exp1120.jpg', 'beve'),
(29, 'beve014', 'Coffee', 'Coffee in moderation is fine, but a large latte made with whole milk can contain nearly 300 calories', 5.3, 'healthy_hot_drinks_coffee_620x400_exp1120.jpg', 'beve');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL,
  `usercontact` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) NOT NULL,
  `userIsBlock` tinyint(1) NOT NULL DEFAULT 0,
  `userfirst` varchar(255) DEFAULT NULL,
  `userlast` varchar(255) DEFAULT NULL,
  `userAdd` varchar(255) NOT NULL,
  `userCity` varchar(255) NOT NULL,
  `userState` varchar(255) NOT NULL,
  `userZip` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `userpass`, `userlevel`, `usercontact`, `useremail`, `userIsBlock`, `userfirst`, `userlast`, `userAdd`, `userCity`, `userState`, `userZip`) VALUES
(0001, 'admin', 'admin', 'admin', '0', 'foodieadmin@gmail.com', 0, NULL, NULL, '', '', '', 0),
(0002, 'chriswongez', 'cwez3112', 'user', '+601111142344', 'chriswongez@gmail.com', 0, 'Chris', 'Wong', '32, Jalan SJI 5,', 'SEREMBAN', 'Negeri Sembilan', 70450);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productCode` (`productCode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `orderID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orderhistory` (`orderID`),
  ADD CONSTRAINT `orderitem_ibfk_3` FOREIGN KEY (`productCode`) REFERENCES `product` (`productCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
