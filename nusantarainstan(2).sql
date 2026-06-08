-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 02:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusantarainstan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cate` int(11) NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cate`, `cate_name`, `description`) VALUES
(1, 'Frozen ', 'Makanan instan frozen makanan instan frozen adalah makanan yang sudah dimasak atau diproses, lalu dibekukan agar tetap segar dan tahan lama. Penyajiannya praktis, cukup dipanaskan dengan microwave, oven, atau digoreng. Cocok untuk kebutuhan cepat saji di rumah tanpa harus ribet.'),
(2, 'Kering', 'Makanan instan kering adalah makanan instan yang dikemas dalam bentuk kering dan praktis. Cara penyajiannya mudah, cukup diseduh atau direbus tanpa perlu proses masak yang lama. Cocok untuk stok harian karena tahan lama dan tidak perlu disimpan di kulkas. '),
(3, 'Kaleng', 'Makanan instan kaleng makanan instan yang dikemas dalam kaleng kedap udara, praktis dan tahan lama tanpa perlu disimpan di kulkas. Biasanya sudah matang dan bisa langsung dimakan atau cukup dipanaskan sebentar. Cocok untuk stok darurat atau makanan cepat saji'),
(4, 'Makanan Kaleng', 'Produk makanan instan dalam bentuk kaleng'),
(5, 'Frozen Food', 'Makanan beku cepat saji');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','paid','shipped','completed','cancelled') NOT NULL DEFAULT 'pending',
  `total_price` decimal(12,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(20) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `user_id`, `order_date`, `status`, `total_price`, `shipping_address`, `shipping_phone`, `payment_method`, `payment_proof`) VALUES
(2, 2, '2025-06-21 20:27:30', 'pending', 10000.00, 'Bandung karapitan', '083217062931', NULL, NULL),
(3, 5, '2025-06-21 21:57:54', 'pending', 27000.00, 'cicalengka', '091432837858', NULL, NULL),
(4, 5, '2025-06-22 00:22:59', 'pending', 20000.00, 'cicalengka', '091432837858', NULL, NULL),
(5, 6, '2025-06-22 04:06:25', 'pending', 44000.00, 'cililin', '56756543354', NULL, NULL),
(6, 4, '2025-06-22 10:26:02', 'pending', 20000.00, 'jambi', '082175764165', NULL, NULL),
(7, 4, '2025-06-22 10:26:30', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(8, 4, '2025-06-22 10:27:38', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(9, 4, '2025-06-22 10:28:50', 'pending', 27000.00, 'jambi', '082175764165', NULL, NULL),
(10, 4, '2025-06-22 10:32:32', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(11, 4, '2025-06-22 10:33:12', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(12, 4, '2025-06-22 10:34:19', 'pending', 34000.00, 'jambi', '082175764165', NULL, NULL),
(13, 4, '2025-06-22 10:39:53', 'pending', 20000.00, 'jambi', '082175764165', NULL, NULL),
(14, 4, '2025-06-22 10:41:36', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(15, 4, '2025-06-22 10:42:34', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(16, 4, '2025-06-22 10:43:43', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(17, 4, '2025-06-22 10:45:49', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(18, 4, '2025-06-22 10:52:55', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(19, 4, '2025-06-22 11:16:43', 'pending', 10000.00, 'jambi', '082175764165', NULL, NULL),
(20, 4, '2025-06-22 11:30:31', 'pending', 37000.00, 'jambi', '082175764165', 'ovo', NULL),
(21, 4, '2025-06-22 11:30:48', 'pending', 10000.00, 'jambi', '082175764165', 'gopay', NULL),
(22, 14, '2025-06-22 11:50:16', '', 10000.00, 'ajona', '089788', 'gopay', 'e73d8ee7d4ff5c5ef8e283ce7c345bbb.png'),
(23, 14, '2025-06-22 12:16:35', 'pending', 27000.00, 'ajona', '089788', 'gopay', '5bbcc279086d235927745d3f484ed0f2.png'),
(24, 14, '2025-06-22 12:18:07', 'pending', 17000.00, 'ajona', '089788', 'dana', '04de892477049901713c1545fbc4bbeb.png'),
(25, 14, '2025-06-22 12:26:09', 'pending', 10000.00, 'ajona', '089788', 'gopay', 'c0b1e185d562ecf1a698cc0fc4c5f63f.png'),
(26, 14, '2025-06-22 12:28:35', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(27, 14, '2025-06-22 12:30:22', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(28, 14, '2025-06-22 12:38:57', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(29, 14, '2025-06-22 12:40:08', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(30, 14, '2025-06-22 12:41:45', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(31, 14, '2025-06-22 12:45:52', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(32, 14, '2025-06-22 12:46:46', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(33, 14, '2025-06-22 12:51:48', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(34, 14, '2025-06-22 13:18:50', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(35, 14, '2025-06-22 13:25:18', 'pending', 24000.00, 'ajona', '089788', 'mandiri', NULL),
(36, 15, '2025-06-22 16:12:08', 'pending', 34000.00, 'bandung', '083217653098', 'cod', NULL),
(37, 2, '2025-06-22 16:15:00', 'pending', 17000.00, 'manggaang', '75645342', 'mandiri', NULL),
(38, 2, '2025-06-22 16:15:50', 'pending', 10000.00, 'manggaang', '75645342', 'cod', NULL),
(39, 4, '2025-06-22 16:17:01', 'pending', 17000.00, 'jambi', '082175764165', 'dana', NULL),
(40, 15, '2025-06-22 16:18:10', 'pending', 20000.00, 'bandung', '083217653098', 'mandiri', NULL),
(41, 17, '2025-06-23 02:59:03', 'pending', 17000.00, 'sumedang', '1378529945642', 'mandiri', NULL),
(42, 17, '2025-06-23 03:23:11', 'pending', 17000.00, 'sumedang', '1378529945642', 'cod', NULL),
(43, 17, '2025-06-23 03:29:51', 'pending', 10000.00, 'sumedang', '1378529945642', 'mandiri', NULL),
(44, 2, '2025-06-23 05:10:50', 'pending', 10000.00, 'bandung', '905839783454', 'cod', NULL),
(45, 2, '2025-06-23 05:11:41', 'pending', 17000.00, 'bandung', '905839783454', 'bri', NULL),
(46, 2, '2025-06-23 05:21:25', 'pending', 10000.00, 'bandung', '905839783454', 'cod', NULL),
(47, 14, '2025-11-26 03:14:35', 'pending', 10000.00, 'ajona', '089788', 'cod', NULL),
(48, 2, '2025-11-26 10:30:58', 'pending', 15000.00, 'Bandung', '089512345xxx', NULL, NULL),
(49, 2, '2025-11-26 10:35:15', 'pending', 15000.00, 'Bandung', '089512345xxx', NULL, NULL),
(52, 2, '2025-11-26 11:09:04', 'paid', 55000.00, 'Jambi', '082175764165', 'Transfer', 'bukti_transfer1.jpg'),
(53, 4, '2025-11-26 11:09:04', 'pending', 72000.00, 'Cililin', '56756543354', 'COD', NULL),
(57, 2, '2026-02-11 10:01:48', 'pending', 6000.00, 'Jl. Merdeka No.10', '08123456789', 'Transfer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id_order_item` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id_order_item`, `order_id`, `product_id`, `qty`, `price`, `subtotal`) VALUES
(1, 2, 3, 1, 10000.00, 10000.00),
(2, 3, 4, 1, 17000.00, 17000.00),
(3, 3, 3, 1, 10000.00, 10000.00),
(4, 4, 3, 2, 10000.00, 20000.00),
(5, 5, 3, 1, 10000.00, 10000.00),
(6, 5, 6, 1, 10000.00, 10000.00),
(7, 5, 5, 1, 7000.00, 7000.00),
(8, 5, 4, 1, 17000.00, 17000.00),
(9, 6, 3, 2, 10000.00, 20000.00),
(10, 7, 3, 1, 10000.00, 10000.00),
(11, 8, 3, 1, 10000.00, 10000.00),
(12, 9, 3, 1, 10000.00, 10000.00),
(13, 9, 4, 1, 17000.00, 17000.00),
(14, 10, 3, 1, 10000.00, 10000.00),
(15, 11, 3, 1, 10000.00, 10000.00),
(16, 12, 4, 1, 17000.00, 17000.00),
(17, 12, 3, 1, 10000.00, 10000.00),
(18, 12, 5, 1, 7000.00, 7000.00),
(19, 13, 3, 2, 10000.00, 20000.00),
(20, 14, 3, 1, 10000.00, 10000.00),
(21, 15, 3, 1, 10000.00, 10000.00),
(22, 16, 3, 1, 10000.00, 10000.00),
(23, 17, 3, 1, 10000.00, 10000.00),
(24, 18, 3, 1, 10000.00, 10000.00),
(25, 19, 3, 1, 10000.00, 10000.00),
(26, 20, 3, 1, 10000.00, 10000.00),
(27, 20, 4, 1, 17000.00, 17000.00),
(28, 20, 6, 1, 10000.00, 10000.00),
(29, 21, 3, 1, 10000.00, 10000.00),
(30, 22, 3, 1, 10000.00, 10000.00),
(31, 23, 3, 1, 10000.00, 10000.00),
(32, 23, 4, 1, 17000.00, 17000.00),
(33, 24, 6, 1, 10000.00, 10000.00),
(34, 24, 5, 1, 7000.00, 7000.00),
(35, 25, 3, 1, 10000.00, 10000.00),
(36, 26, 3, 1, 10000.00, 10000.00),
(37, 27, 3, 1, 10000.00, 10000.00),
(38, 28, 3, 1, 10000.00, 10000.00),
(39, 29, 3, 1, 10000.00, 10000.00),
(40, 30, 3, 1, 10000.00, 10000.00),
(41, 31, 3, 1, 10000.00, 10000.00),
(42, 32, 3, 1, 10000.00, 10000.00),
(43, 33, 3, 1, 10000.00, 10000.00),
(44, 34, 3, 1, 10000.00, 10000.00),
(45, 35, 4, 1, 17000.00, 17000.00),
(46, 35, 5, 1, 7000.00, 7000.00),
(47, 36, 3, 1, 10000.00, 10000.00),
(48, 36, 4, 1, 17000.00, 17000.00),
(49, 36, 5, 1, 7000.00, 7000.00),
(50, 37, 3, 1, 10000.00, 10000.00),
(51, 37, 5, 1, 7000.00, 7000.00),
(52, 38, 6, 1, 10000.00, 10000.00),
(53, 39, 5, 1, 7000.00, 7000.00),
(54, 39, 6, 1, 10000.00, 10000.00),
(55, 40, 3, 1, 10000.00, 10000.00),
(56, 40, 6, 1, 10000.00, 10000.00),
(57, 41, 4, 1, 17000.00, 17000.00),
(58, 42, 4, 1, 17000.00, 17000.00),
(59, 43, 6, 1, 10000.00, 10000.00),
(60, 44, 6, 1, 10000.00, 10000.00),
(61, 45, 4, 1, 17000.00, 17000.00),
(62, 46, 3, 1, 10000.00, 10000.00),
(63, 47, 3, 1, 10000.00, 10000.00),
(82, 57, 8, 2, 3000.00, 6000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` decimal(12,2) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default.png',
  `sold` tinyint(1) DEFAULT 0,
  `id_cate` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `type`, `stock`, `price`, `description`, `photo`, `sold`, `id_cate`) VALUES
(3, 'cuangki', 'Kering', 64, 10000.00, 'Cuangki Instan adalah versi praktis dari jajanan khas Bandung berisi baso, tahu, siomay, dan aci dalam kuah gurih. Cukup direbus beberapa menit, cuangki hangat siap dinikmati kapan saja tanpa perlu keluar rumah. Rasanya tetap otentik, seenak cuangki gerobakan!', 'Cuplikan_layar_2025-06-22_204754.png', 0, NULL),
(4, 'sarden abc', 'Kaleng', 90, 17000.00, '\r\n\r\nSarden ABC adalah makanan siap saji yang praktis dan bergizi, terbuat dari ikan sarden pilihan yang dimasak dengan saus tomat khas ABC yang kaya rasa. Cukup dipanaskan, sarden ini cocok disantap dengan nasi hangat untuk sajian cepat dan lezat kapan saja.', NULL, 0, NULL),
(5, 'seblak', 'Kering', 43, 7000.00, 'Seblak Instan, Pedasnya Bikin Ketagihan!\r\nLagi mager tapi pengen seblak? Cukup rebus, aduk bumbu, dan nikmati sensasi pedas gurih ala Bandung! Isian lengkap, bumbu nendang, siap jadi teman ngemil atau pengganjal lapar. Praktis, cepat, dan pastinya nagih!', NULL, 0, NULL),
(6, 'pempek', 'Frozen ', 62, 10000.00, 'Pempek Ikan Premium terbuat dari Ikan Tenggiri 100%, tanpa bahan pengawet dan pewarna. Menggunakan tepung dengan kualitas / grade terbaik untuk bahan baku pempek. Rasa ikannya sangat terasa dengan ciri rasa khas cuko yg kental pedes asem manis menjadikan pempek nikmat disantap.', 'Cuplikan_layar_2025-06-22_0846245.png', 0, NULL),
(7, 'seblak', 'Kering', 0, 200000.00, 'seblak mantap', 'Cuplikan_layar_2026-06-08_184628.png', 0, NULL),
(8, 'Mie Sedaap Goreng', 'Kering', 48, 3000.00, NULL, 'default.png', 0, NULL),
(9, 'Sarden ABC', 'Makanan Kaleng', 50, 15000.00, 'Sarden siap saji kaleng 155g', 'default.png', 0, NULL),
(10, 'Nuget So Good', 'Frozen Food', 40, 28000.00, 'Nuget ayam original 400g', 'default.png', 0, NULL),
(11, 'Indomie Goreng', 'Mie Instan', 100, 3500.00, 'Indomie goreng original satuan', 'default.png', 0, NULL),
(12, 'Indomie Goreng', 'Makanan Instan', 200, 3500.00, 'Indomie goreng original', 'indomie.png', 0, NULL),
(13, 'Sarden ABC', 'Makanan Kaleng', 100, 17000.00, 'Sarden siap makan', 'sarden.png', 0, NULL),
(14, 'Kornet Pronas', 'Makanan Kaleng', 150, 10000.00, 'Kornet sapi pronas', 'pronas.png', 0, NULL),
(15, 'Nugget So Good', 'Frozen Food', 75, 5000.00, 'Nugget enak dan praktis', 'sogood.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` varchar(100) NOT NULL DEFAULT 'Customer',
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `usertype`, `password`, `fullname`, `email`, `phone`, `address`, `photo`) VALUES
(2, 'rendi', 'Admin', '$2y$10$U1WbVNn/ZLvVrcpfoiaHCukZJjo3m13II6yuQqc8quDauaP3j/6zi', 'rendi firmansyah', 'rendi@gmail.com', '082315676223', 'balaendah', ''),
(4, 'candra14', 'Customer', '$2y$10$w43GxFq0GYqF.wh5T6OOeOnwjbVsIipTGZ2KJysLfFM896pCLx/5.', 'candra', 'candra@gmail.com', '082175764165', 'jambi', ''),
(5, 'herman2', 'Customer', '$2y$10$WDPAkXzr0YZ.sSFNALuxtusXtbVPT1q2MDyn5MBtq0GGcX7VJBrqq', 'herman', 'herman@gmail.com', '091432837858', 'cicalengka', 'Cuplikan_layar_2025-05-26_175649.png'),
(6, 'zen2', 'Customer', '$2y$10$iZQ4pdytx0wUR45kPMvtmeHRLN/nbWYTa62yyahgJRz1jzYY8XRZi', 'zaenal suryana', 'suryana@gmail.com', '56756543354', 'cililin', 'Cuplikan_layar_2025-06-19_151633.png'),
(9, 'zaenal', 'Admin', '$2y$10$1j2vNhtEYr4Q6JW2.1nEFupRwNcGROre3t3sfHw4KVyvn7qNjmMRW', 'M.Zaenal Suryana', 'zaenal@gmail.com', '234098234765', 'bandung barat', 'default.png'),
(10, 'zen1', 'Customer', '$2y$10$P57xs6oENtfHDeJ727MbAecJ2g6o0/0u65pJNHM4RzbG7KSO18crW', 'zaenal suryana', 'sgdjhk@gmail.com', '43024985788', 'karapitan', 'default.png'),
(11, 'can', 'Admin', '$2y$10$C/F7HzX8RE6lL4gS2qRl..5X4lOqa8KpX7nrTANBtAV1BU4N0pkRi', 'nugraha', 'nugraha@gmail.com', '09876789324', 'jambi', 'default.png'),
(12, 'isan', 'Admin', '$2y$10$Z8ObhmTZLsKnZqhK1iOYue6zaIf.cEQUdMjfe3el39gY5Ss61ysbG', 'isan mubarok', 'isan@gmail.com', '876512345674', 'ciparai', 'default.png'),
(13, 'zen', 'Customer', '$2y$10$AxSf3INmhhP2ZIk02SBYFeIXSKglecEe0zRac0tD0er40Yaiu2UMW', 'zaenal', 'adasdasd@gmail.com', '98098908', 'asdasdas', 'default.png'),
(14, 'ajona', 'Customer', '$2y$10$U.qDmcI27TqVAt3zfRX9oO.a.kFeOu0cYX7NU7HB0KSWB1vwbI50y', 'ajona', 'ajona@gmail.com', '089788', 'ajona', 'default.png'),
(15, 'zaenal1', 'Customer', '$2y$10$1j2vNhtEYr4Q6JW2.1nEFupRwNcGROre3t3sfHw4KVyvn7qNjmMRW', 'm. zaenal suryana', 'zaenal8@gmail.com', '083217653098', 'bandung', 'zaenal.png'),
(17, 'bob', 'Customer', '$2y$10$H8H8.AfUybz6WtHAVslpkOvT0kSjFWWlNnUG.ZYSBdv7AFdCLO6A.', 'bobi karta negara', 'bobbi@gmaul.com', '1378529945642', 'sumedang', 'default.png'),
(20, 'zena', 'Customer', '$2y$10$wmzM.r6tUGuB4VBCIupvNujoFTtgGJyM9gPo3Iy3BYGmkeiNV7F8i', 'zenzenzen', 'zaena@gmail.com', '256752354', 'Bandung karapitan', 'default.png'),
(21, 'zaenal', 'Admin', 'admin123', 'M. Zaenal Suryana', 'zaenal@mail.com', '081234567890', 'Bandung', 'default.png'),
(22, 'cindy', 'Customer', 'cust123', 'Cindy Putri', 'cindy@mail.com', '082244556677', 'Cimahi', 'default.png'),
(23, 'rafli', 'Customer', 'cust321', 'Rafli Firmansyah', 'rafli@mail.com', '089876543210', 'Bandung Barat', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`),
  ADD UNIQUE KEY `uq_cate_name` (`cate_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `idx_orders_user_id` (`user_id`),
  ADD KEY `idx_orders_user_id_where` (`user_id`),
  ADD KEY `idx_orders_status` (`status`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `idx_order_items_order_id` (`order_id`),
  ADD KEY `idx_order_items_product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_products_categories` (`id_cate`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_review_user` (`user_id`),
  ADD KEY `fk_review_product` (`product_id`),
  ADD KEY `fk_review_order` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `uq_users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id_cate`),
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id_cate`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `fk_review_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
