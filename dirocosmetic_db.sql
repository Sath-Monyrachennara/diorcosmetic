-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 05:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dirocosmetic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `sub_total` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_id`, `name`, `email`, `number`, `message`, `date`) VALUES
(2, 1, 'Nara Sath', 'monyrasath44@gmail.com', '09875623', 'Hi, How are you Admin?', '2022-08-10'),
(8, 14, 'Nara Sath', 'reancode123@gamil.com', '09875623', 'lolooljkjk', '2022-12-14'),
(17, 26, 'Heng Gogo', 'reancode123@gamil.com', '09875623', 'Helllo Kakaka', '2022-12-27'),
(44, 26, 'Heng Gogo', 'reancode123@gamil.com', '09875623', 'He', '2022-12-27'),
(48, 2, 'Nara Sath', 'monyrasath44@gmail.com', '09875623', 'koko', '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `place_on` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `order_product` varchar(2000) NOT NULL,
  `price` int(255) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `place_on`, `name`, `email`, `number`, `address`, `payment_method`, `order_product`, `price`, `payment_status`) VALUES
(1, 3, '2022-12-17', 'Sath Nara', 'monyrasath44@gmail.com', '098674523', 'st45 BTB Cambodia', 'aba', 'CLHa, ka, koko', 123, 'completed'),
(9, 3, '2022-12-17', 'Sath Nara', 'monyrasath44@gmail.com', '098674523', 'st45 BTB Cambodia', 'aba', 'CLHa, ka, koko', 123, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Error reading structure for table dirocosmetic_db.product: #1932 - Table 'dirocosmetic_db.product' doesn't exist in engine
-- Error reading data for table dirocosmetic_db.product: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `dirocosmetic_db`.`product`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `proDetail_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_price`, `detail`, `description`, `image`, `proDetail_img`) VALUES
(1, 'DIOR BACKSTAGE FACE & BODY FOUNDATION', 46, 'Dior backstage face and body foundation is the radiant foundation by Dior that gives high perfection to the complexion with 24h wear.', 'Dior face and body foundation achieves a high-perfection and radiant complexion that lasts all day long. The skin and the pores are smooth-looking and refined, the complexion is even.', 'pic15.jpg', 'detailImg1'),
(2, 'DIOR BACKSTAGE GLOW FACE PALETTE', 35, 'Multi-use illuminating makeup palette - reveals a radiant makeup finish from morning to night. The complexion is evened out and the skin smoothed.', 'The iconic multi-use face makeup palette. Formulated to hold even in conditions of heat and humidity.', 'pic12.jpg', 'detailImg2'),
(3, 'ROUGE DIOR - NEW LOOK LIMITED EDITION', 26, 'Lipstick and colored lip balm - floral lip care - couture color - refillable - engraved houndstooth motif', 'February 1947: Christian Dior dazzled the fashion world just as much as he shook it up with his 1st runway show called \"New Look\". Today, it\'s the iconic Rouge Dior lipstick\'s turn to experience its own \"new look\" by reinventing itself in an ultra-desirable limited edition.', 'pic1.webp', 'detailImg3'),
(4, 'ROUGE DIOR FOREVER LIQUID', 20, 'Holographic gloss - maximum hydration - instant & long-term volume effect', 'This spring, Dior Addict Lip Maximizer, now the must-have product from the Dior backstage, adorns the lips in a fresh, intense holographic pink with a golden shimmer for smooth, hydrated lips and an instant plumping effect, day after day.', 'pic9.webp', 'detailImg4'),
(5, 'DIOR BACKSTAGE EYE PALETTE', 36, 'Multi-finish, concentrated colors prime, plump, color, contour', 'A collection of makeup artist essentials inspired by the energy backstage at the runway shows, this palette offers shades that adapt to any skin tone, in buildable matte, satin and glossy finishes.', 'pic10.webp', 'detailImg5'),
(6, 'ROUGE DIOR COLORED LIP BALM', 25, 'Refillable lipstick - couture finishes - engraved pattern', 'In the Mitzah limited edition, each shade of Rouge Dior lipstick features an engraving and matte, metallic, satiny or velvet couture finish.', 'pic11.jpg', 'detailImg6'),
(7, 'DIOR FOREVER NATURAL BRONZE DIORIVIERA', 50, 'Long-wear highlighter - intense highlighting powder - 99% pigments of natural origin', 'Dior Forever Couture Luminizer Dioriviera is the intense highlighting powder with a spectacular iridescent finish, long wear and sensational comfort.\r\n', 'pic2.jpg', 'detailImg7'),
(8, 'DIOR FOREVER COUTURE PERFECT CUSHION', 55, '24h wear foundation - hydrating - luminous matte and glow finishes', 'For the Dioriviera limited edition, the bayadere motif that enhances the case of the Dior Forever Couture Perfect Cushion foundation is the Dioriviera pattern, originally found on the flagship pieces of the House of Dior wardrobe.', 'pic3.jpg', 'detailImg8'),
(9, 'DIOR FOREVER - NEW LOOK LIMITED EDITION', 48, 'Clean blurring matte primer - 24h comfort and matte finish - enriched with floral extracts', 'Dior Forever Velvet Veil: the matte Dior primer with 24h* wear that visibly blurs pores and imperfections for an even, smoothed and enhanced complexion.\r\n', 'pic19.jpg', 'detailImg9'),
(10, 'DIOR ADDICT LIP GLOW', 27, 'Vibrant colour hydrating care lip shine', 'Dior Addict Stellar Shine is the next-generation lip shine that delivers 8h* of unparalleled shine.** The balm glides on with incredible sensoriality and instantly melts in contact with the lips for shine with sheer, vibrant colour. The lip care formula boasts a fine film infused with aloe vera for 24h-hydration*** and long-lasting comfort, wrapped in the addictive sweet scent of musky vanilla. ', 'pic17.webp', 'detailImg10'),
(11, 'ROUGE DIOR FOREVER LIQUID', 21, 'Flower oil liquid lipstick - ultra weightless wear and petal velvet finish', 'Rouge Dior Ultra Care Liquid is the 1st Dior lipstick infused with flower oil, delivering ultra care and 12-hour* wear.\r\nInspired by the flowers so dear to the House of Dior, it comes in a range of soft colours with matte and satiny finishes.\r\nIts micro-flocked applicator in the shape of a petal delivers soft and precise application on the lips.', 'pic16.webp', 'detailImg11'),
(12, 'ROUGE DIOR COLORED LIP BALM', 25, 'Flower oil radiant lipstick - weightless wear', 'Rouge Dior Ultra Care is the 1st Dior lipstick infused with flower oil, ultra care and 12-hour* wear.\r\nInspired by the flowers so dear to the House of Dior, it comes in a range of soft colours with a luminous pearly matte finish.\r\n', 'pic14.webp', 'detailImg12'),
(13, 'DIOR BACKSTAGE ROSY GLOW', 32, 'Perfecting translucent powder - blurring effect, natural radiant finish - long-wear matity.', 'Dior has created Dior Backstage, its first professional makeup line, a collection of Dior makeup artist essentials, inspired by the energy backstage at the runway shows. Shades to suit all skin tones in exclusive* and buildable textures.', 'pic13.webp', 'detailImg13'),
(14, 'DIOR ADDICT', 29, 'Hydrating shine lipstick - 90% natural-origin ingredients - refillable.', 'Dior Addict is the Dior shine lipstick designed like a fashion accessory, with a formula now composed of 90%* natural-origin ingredients, housed in an ultra-couture and refillable case.\r\nIntense color and shine with a vinyl effect, 24h** hydration and 6h*** wear, a formula infused with jasmine floral wax with hydrating properties: Dior Addict lipstick enhances the lips in bright and luminous shades with sensational shine.', 'pic18.webp', 'detailImg14'),
(15, 'DIORSHOW BLACK OUT', 23, 'Mascara primer-serum - triple action - volume, curl & definition - 24h* wear lash care.', 'Diorshow Maximizer 3D, the iconic Dior mascara primer-serum, boosts mascara performance and, day after day, improves lash appearance. A triple-action formula ─ volume, curl and length ─ for oversized lashes, instantly and for 24h.\r\n', 'pic5.jpg', 'detailImg15'),
(16, 'DIORSHOW ART PEN', 15, 'Long-wear waterproof eyeliner pencil.', 'The essential pencil for a perfectly soft, blended line with extra-long wear.', 'pic4.jpg', 'detailImg16'),
(17, 'MISS DIOR', 95, 'Blooming bouquet-Eau de parfum - fig and rose notes.', 'This eau de parfum composed by Francis Kurkdjian combines two concepts in one name: the south of France, his source of inspiration, and Paris, the city where Dioriviera was created. A fragrance that conveys the love story between Christian Dior and the French Riviera, and draws inspiration from its solar beauty.', 'pic20.webp', 'detailImg17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `passwords` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `passwords`, `user_type`, `date`) VALUES
(2, 'monyrasath44@gmail.com', 'Nara', 'Sath', '123', 'user', '2022-08-10'),
(26, 'reancode123@gamil.com', 'Gogo', 'Heng', '456', 'user', '2022-12-20'),
(34, 'testing23@gmail.com', 'Admin', 'Testing', '123', 'user', '2023-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
