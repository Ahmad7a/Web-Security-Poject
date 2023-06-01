-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 11:18 PM
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
-- Database: `gamerstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE `add_item` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact2`
--

CREATE TABLE `contact2` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact2`
--

INSERT INTO `contact2` (`id`, `name`, `email`, `phone`, `message`) VALUES
(22, '3', '2', '3', '2'),
(23, 'dd', '2', '2', '<script> alert (\"hey\") </script>'),
(24, '2', '1', '2', 's'),
(25, '<script> alert (\"hey\") </script>', '1', '<script> alert (\"hey\") </script>', '&lt;script&gt; alert (&quot;hey&quot;) &lt;/script&gt;'),
(26, '1', '1', '1', '1'),
(27, '1', '1', '1', '1'),
(28, 'ئيب', '4', 'سقلب', 'شثلق');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(600) NOT NULL,
  `product_bestseller` varchar(1) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_description`, `product_bestseller`, `image`, `keywords`) VALUES
(3, 'Playstation 5', '2300 SAR', 'The PS5 features cutting-edge hardware, including a custom AMD Zen 2 processor with 8 cores, a custom AMD RDNA 2 GPU with 36 compute units, 16GB of GDDR6 RAM, and a high-speed solid-state drive (SSD) with a capacity of 825GB. This hardware provides the console with the power and speed necessary to run the latest games at high resolutions and frame rates.\r\n\r\n', 'Y', 'images\\PS5.jpg', 'Playstation, Playstation 5, PS5, play, Play, PS'),
(4, 'XBOX Series S', '1200 SAR', 'Xbox Series S Specifications:\r\n\r\nSmaller and lighter than Xbox Series X\r\n512GB SSD\r\nBackward compatibility with previous Xbox games\r\nDesigned to work with Xbox Game Pass\r\nUpdated wireless controller with share button and hybrid D-pad\r\nSupports hardware-accelerated ray tracing\r\nQuick Resume feature for quickly switching between games\r\nDigital-only (no disc drive)', 'Y', 'images\\xbox s.jpg', 'Xbox Series s, Xbox s, Xbox '),
(5, 'XBOX Series x', '1800 SAR', 'Xbox Series X Specifications:\r\n\r\nCustom AMD Zen 2 processor with 8 cores, AMD RDNA 2 GPU with 52 compute units, and 16GB of GDDR6 RAM\r\n1TB SSD and expandable storage\r\nBackward compatibility with previous Xbox games\r\nDesigned to work with Xbox Game Pass\r\nUpdated wireless controller with share button and hybrid D-pad\r\nSupports hardware-accelerated ray tracing\r\nQuick Resume feature for quickly switching between games\r\nIncludes a 4K Ultra HD Blu-ray player\r\nSmart Delivery feature allows for optimized performance on both Xbox One and Xbox Series X/S', 'Y', 'images\\xbox x.jpg', 'Xbox Series x, Xbox x, Xbox '),
(6, 'Nintendo Switch', '1400 SAR', 'Meet the newest member of the Nintendo Switch family\r\nThe new system features a vibrant 7-inch OLED screen, a wide adjustable stand, a dock with a wired LAN port, 64 GB of internal storage, and enhanced audio.\r\nPlay anytime, anywhere, with anyone. Nintendo Switch can transform to suit your situation, so you can play the games you want, no matter how busy life may be.\r\nPick it up and play with the Joy-Con controllers attached. Nintendo Switch (OLED model) includes a vibrant 7-inch OLED screen with a slimmer bezel. The large screen\'s vivid colours and high contrast deliver a rich handheld and ta', 'N', 'images\\Nintendo Switch.jpg', 'Nintendo Switch, OLED'),
(7, 'Xbox Controller', '220 SAR', 'Experience the modernized design of the Xbox Wireless Controller in Robot White, featuring sculpted surfaces and refined geometry for enhanced comfort and effortless control during gameplay.\r\nStay on target with textured grip on the triggers, bumpers, and back case and with a new hybrid D-pad for accurate, yet familiar input.\r\nMake the controller your own by customizing button mapping with the Xbox Accessories app.\r\nIncludes Xbox Wireless and Bluetooth technology for wireless gaming on supported consoles, Windows 10 PCs, Android phones, and tablets. iOS support coming in the future', 'N', 'images\\xbox controller.jpg', 'xbox controller, controller'),
(9, 'Nintendo Controller', '160 SAR', '', 'N', 'images\\Nintendo Switch Controller.jpg', 'joy-stick, Nintendo Switch Controller, switch'),
(10, 'MINECRAFT', '140 SAR', '', 'N', 'images\\MINECRAFT.jfif', 'game, MINECRAFT , Microsoft'),
(11, 'Gran Turismo 7', '289 SAR', '', 'N', 'images\\Gran Turismo 7.jfif', 'ps5 games, games, sport, racing, cars'),
(12, 'Forza Horizon 5', '240 SAR', '', 'Y', 'images\\Forza Horizon 5.jfif', 'Forza Horizon 5, cars, racing, sport, xbox games'),
(13, 'Flight Simulator', '260 SAR', '', 'Y', 'images\\Flight Simulator.jpg', 'Flight Simulator, xbox, games, sky, world'),
(14, 'FIFA 23', '180 SAR', '', 'Y', 'images\\FIFA 23.jfif', 'FIFA 23, football, games'),
(15, 'DualSense', '290 SAR', '', 'Y', 'images\\DualSense.jfif', 'DualSense, ps5 , playstation, controller'),
(17, 'Bloodborne', '140 SAR', '', 'N', 'images\\Bloodborne.jpg', 'Bloodborne, souls, playstation, games'),
(18, 'Playstation 5 headset', '499 SAR', '', 'N', 'images\\Playstation 5 headset.jpg', 'headset, playstation, sony,'),
(20, 'PlayStation VR2', '2899 SAR', '', 'Y', 'images\\PlayStation VR2.jfif', 'vr, virtual, playstation, sony'),
(21, 'Ratchet & Clank', '199 SAR', '', 'N', 'images\\Ratchet & Clank  Rift Apart.jfif', 'playstation, games, Ratchet & Clank  Rift Apart'),
(22, 'Xbox Charge Station', '160 SAR', '', 'N', 'images\\Xbox Charge Station.jpg', 'charger, xbox, battery , controller '),
(23, 'Xbox Storage Expansion SS', '500 SAR', '', 'N', 'images\\Xbox Storage Expansion SSD 1TB.jpg', 'expansion, space, Xbox Storage Expansion SSD 1TB'),
(24, 'Xbox Wireless Headset', '400 SAR', '', 'Y', 'images\\Xbox Wireless Headset.jpg', 'Xbox Wireless Headset, sound, 3D ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_item`
--
ALTER TABLE `add_item`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contact2`
--
ALTER TABLE `contact2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_item`
--
ALTER TABLE `add_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact2`
--
ALTER TABLE `contact2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
