-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 11:33 PM
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
-- Database: `infinitetales`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `houseNumber` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `postCode` varchar(10) NOT NULL,
  `town` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `houseNumber`, `street`, `postCode`, `town`) VALUES
(33, 106, 'Oleanders Flat 2, Saint Martin Street', 'ZRQ2073', 'Gudja');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `reviewId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `quantity`, `price`, `title`, `author`, `category`, `description`, `reviewId`) VALUES
(5, 10, 12.99, 'One Piece Vol. 104', 'Eiichiro Oda', 'Manga', 'Join Monkey D. Luffy and his swashbuckling crew in their search for the ultimate treasure, One Piece!\r\n\r\nAs a child, Monkey D. Luffy dreamed of becoming King of the Pirates. But his life changed when he accidentally gained the power to stretch like rubber...at the cost of never being able to swim again! Years later, Luffy sets off in search of the One Piece, said to be the greatest treasure in the world...\r\n\r\nAs the battle between Luffy and Kaido enters the final round, everyone in Wano puts their lives on the line to protect their home. But even if Luffy can actually secure victory, will there be anything left for a new shogun to rule?', NULL),
(6, 21, 12.5, 'Atomic Habits', 'James Clear', 'Self-Help', 'No matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear, one of the world\'s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.\r\n\r\nIf you\'re having trouble changing your habits, the problem isn\'t you. The problem is your system. Bad habits repeat themselves again and again not because you don\'t want to change, but because you have the wrong system for change. You do not rise to the level of your goals. You fall to the level of your systems. Here, you\'ll get a proven system that can take you to new heights.\r\n\r\nClear is known for his ability to distill complex topics into simple behaviors that can be easily applied to daily life and work. Here, he draws on the most proven ideas from biology, psychology, and neuroscience to create an easy-to-understand guide for making good habits inevitable and bad habits impossible. Along the way, readers will be inspired and entertained with true stories from Olympic gold medalists, award-winning artists, business leaders, life-saving physicians, and star comedians who have used the science of small habits to master their craft and vault to the top of their field.\r\n\r\nLearn how to:\r\nmake time for new habits (even when life gets crazy);\r\novercome a lack of motivation and willpower;\r\ndesign your environment to make success easier;\r\nget back on track when you fall off course;\r\n...and much more.\r\n\r\nAtomic Habits will reshape the way you think about progress and success, and give you the tools and strategies you need to transform your habits--whether you are a team looking to win a championship, an organization hoping to redefine an industry, or simply an individual who wishes to quit smoking, lose weight, reduce stress, or achieve any other goal.', NULL),
(7, 24, 12.99, 'Iron Flame', 'Rebecca Yarros', 'Fantasy', 'Everyone expected Violet Sorrengail to die during her first year at Basgiath War College—Violet included. But Threshing was only the first impossible test meant to weed out the weak-willed, the unworthy, and the unlucky.  Now the real training begins, and Violet’s already wondering how she’ll get through. It’s not just that it’s grueling and maliciously brutal, or even that it’s designed to stretch the riders’ capacity for pain beyond endurance. It’s the new vice commandant, who’s made it his personal mission to teach Violet exactly how powerless she is–unless she betrays the man she loves.  Although Violet’s body might be weaker and frailer than everyone else’s, she still has her wits—and a will of iron. And leadership is forgetting the most important lesson Basgiath has taught her: Dragon riders make their own rules.  But a determination to survive won’t be enough this year.  Because Violet knows the real secret hidden for centuries at Basgiath War College—and nothing, not even dragon fire, may be enough to save them in the end.', NULL),
(8, 12, 12.99, 'Ikigai', 'Hector Garcia', 'Philosophy', 'According to the Japanese, everyone has an ikigai—a reason for living. And according to the residents of the Japanese village with the world’s longest-living people, finding it is the key to a happier and longer life. Having a strong sense of ikigai—where what you love, what you’re good at, what you can get paid for, and what the world needs all overlap—means that each day is infused with meaning. It’s the reason we get up in the morning. It’s also the reason many Japanese never really retire (in fact there’s no word in Japanese that means retire in the sense it does in English): They remain active and work at what they enjoy, because they’ve found a real purpose in life—the happiness of always being busy.  In researching this book, the authors interviewed the residents of the Japanese village with the highest percentage of 100-year-olds—one of the world’s Blue Zones. Ikigai reveals the secrets to their longevity and happiness: how they eat, how they move, how they work, how they foster collaboration and community, and—their best-kept secret—how they find the ikigai that brings satisfaction to their lives. And it provides practical tools to help you discover your own ikigai. Because who doesn’t want to find happiness in every day?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` float NOT NULL,
  `addressId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `bookId`, `accountId`, `quantity`, `totalPrice`, `addressId`) VALUES
(1, 6, 7, 3, 40.49, 33);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `accountId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `addressId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`accountId`, `username`, `email`, `password`, `addressId`) VALUES
(7, 'ig088', 'deaconmizzi@gmail.com', '123', 33),
(9, 'test', 'test', 'test', NULL),
(10, 'admin', 'admin@test', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistId`, `accountId`, `bookId`, `quantity`) VALUES
(3, 9, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `Revuew` (`reviewId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `Account` (`accountId`),
  ADD KEY `Book` (`bookId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `BookCon` (`bookId`),
  ADD KEY `AccCon` (`accountId`),
  ADD KEY `AddCon` (`addressId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `UserCon` (`userId`),
  ADD KEY `ProductCon` (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `Address` (`addressId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistId`),
  ADD KEY `AccountCon` (`accountId`),
  ADD KEY `BookIDCon` (`bookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `Revuew` FOREIGN KEY (`reviewId`) REFERENCES `review` (`reviewId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Account` FOREIGN KEY (`accountId`) REFERENCES `users` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Book` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `AccCon` FOREIGN KEY (`accountId`) REFERENCES `users` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AddCon` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BookCon` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `ProductCon` FOREIGN KEY (`productId`) REFERENCES `book` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserCon` FOREIGN KEY (`userId`) REFERENCES `users` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Address` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `AccountCon` FOREIGN KEY (`accountId`) REFERENCES `users` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BookIDCon` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
