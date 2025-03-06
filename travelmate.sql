-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 17, 2025 at 02:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logged_in_users`
--

INSERT INTO `logged_in_users` (`sessionId`, `userId`, `lastUpdate`) VALUES
('5v47d1pueof1p8265597uhtciv', 25, '2025-01-17 02:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `route_id`, `user_id`, `user_name`, `created_at`) VALUES
(1, '1', '22', 'Liliia', '2025-01-05 11:01:56'),
(2, '1', '22', 'Liliia', '2025-01-05 11:01:59'),
(3, '1', '22', 'Liliia', '2025-01-05 11:05:10'),
(4, '2', '22', 'Liliia', '2025-01-05 11:09:01'),
(5, '3', '22', 'Liliia', '2025-01-05 11:10:19'),
(6, '1', '22', 'Liliia', '2025-01-05 11:10:37'),
(7, '2', '22', 'Liliia', '2025-01-05 11:12:34'),
(8, '3', '22', 'Liliia', '2025-01-05 11:15:20'),
(9, '2', '23', 'Liliia Hurko', '2025-01-05 11:32:51'),
(10, '2', '23', 'Liliia Hurko', '2025-01-05 11:35:58'),
(11, '2', '22', 'Liliia', '2025-01-16 20:48:53'),
(12, '2', '22', 'Liliia', '2025-01-16 20:48:55'),
(13, '87', '25', 'Liliia Hurko', '2025-01-16 23:34:36'),
(14, '87', '25', 'Liliia Hurko', '2025-01-16 23:38:41'),
(15, '86', '25', 'Liliia Hurko', '2025-01-16 23:47:29'),
(16, '85', '25', 'Liliia Hurko', '2025-01-16 23:54:44'),
(17, '86', '25', 'Liliia Hurko', '2025-01-17 00:05:02'),
(18, '86', '25', 'Liliia Hurko', '2025-01-17 00:07:06'),
(19, '87', '25', 'Liliia Hurko', '2025-01-17 00:07:35'),
(20, '89', '25', 'Liliia Hurko', '2025-01-17 00:08:07'),
(21, '89', '25', 'Liliia Hurko', '2025-01-17 00:11:20'),
(22, '89', '25', 'Liliia Hurko', '2025-01-17 00:14:21'),
(23, '87', '25', 'Liliia Hurko', '2025-01-17 00:14:35'),
(24, '92', '25', 'Liliia Hurko', '2025-01-17 00:16:01'),
(25, '89', '25', 'Liliia Hurko', '2025-01-17 00:23:31'),
(26, '89', '25', 'Liliia Hurko', '2025-01-17 00:36:39'),
(27, '89', '25', 'Liliia Hurko', '2025-01-17 00:36:46'),
(28, '87', '25', 'Liliia Hurko', '2025-01-17 00:36:57'),
(29, '93', '25', 'Liliia Hurko', '2025-01-17 00:37:10'),
(30, '89', '25', 'Liliia Hurko', '2025-01-17 00:37:29'),
(31, '95', '25', 'Liliia Hurko', '2025-01-17 00:37:35'),
(32, '95', '25', 'Liliia Hurko', '2025-01-17 00:37:40'),
(33, '86', '25', 'Liliia Hurko', '2025-01-17 00:37:44'),
(34, '108', '25', 'Liliia Hurko', '2025-01-17 00:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(23, 'Liliia Hurko', 'lili@gmail.com', '$2y$10$RSsyTfdTGRIbnba.JmFDROEU5SmrwCkb.BX3qzqmjeQg5KQUvNNm2', '2024-12-29 18:56:45'),
(24, 'Liliia Hurko', 'liliagurko571@gmail.com', '$2y$10$szHaslu7U8Do2NG7/2VTUuGS4pAtjSQdvfjgJ6uwugwh0z/ZC4SFe', '2025-01-16 23:14:30'),
(25, 'Liliia Hurko', 'liliagurko51@gmail.com', '$2y$10$Ba2qM9DIvdL8N7YoVskKR.zziXVmTDcV174fWW/ljNLyKW4AO.zRi', '2025-01-16 23:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_routes`
--

CREATE TABLE `user_routes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `visibility` enum('public','private') NOT NULL DEFAULT 'private',
  `route_type` enum('sea','mountain','ski_resort','cultural','adventure') NOT NULL DEFAULT 'adventure',
  `continent` enum('Europe','Asia','America','Africa','Oceania') NOT NULL DEFAULT 'Europe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_routes`
--

INSERT INTO `user_routes` (`id`, `name`, `description`, `created_at`, `visibility`, `route_type`, `continent`) VALUES
(85, 'Mountain Adventure', 'A breathtaking route through the mountains.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(86, 'City Tour', 'Explore the city\'s hidden gems and landmarks.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(87, 'Coastal Escape', 'A relaxing journey along the coastline.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(88, 'Bukovel Adventure', 'A winter wonderland in Bukovel, perfect for skiing and snowboarding.', '2025-01-16 23:25:23', 'public', 'ski_resort', 'Europe'),
(89, 'Alanya Discovery', 'A sunny escape to Alanya, with beaches and rich cultural history.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(90, 'Arizona Canyons Exploration', 'Explore the breathtaking canyons of Arizona, including the Grand Canyon.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(91, 'Tenerife Escapade', 'A paradise for nature lovers with stunning beaches and volcanic landscapes.', '2025-01-16 23:25:23', 'public', 'sea', 'Europe'),
(92, 'Madeira Adventure', 'Explore the island of Madeira with its mountains, valleys, and ocean views.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(93, 'Spain Cultural Journey', 'A deep dive into Spain\'s history, from its ancient castles to vibrant cities.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(94, 'Italy: Rome & Beyond', 'Explore the ancient ruins and art of Rome, Florence, and Venice.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(95, 'French Riviera Glamour', 'Luxury and beaches along the south of France, from Nice to Monaco.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(96, 'Swiss Alps Hiking', 'Take a breathtaking hike through the Swiss Alps, with scenic views and fresh air.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(97, 'Norwegian Fjords Adventure', 'Cruise through Norway\'s dramatic fjords with stunning natural beauty.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(98, 'Kyoto Temples and Gardens', 'Experience the tranquility of Kyoto\'s ancient temples and traditional gardens.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(99, 'New Zealand Nature Expedition', 'Discover New Zealand\'s diverse landscapes, from beaches to mountains.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(100, 'Icelandic Wonders', 'A tour of Iceland’s unique landscapes, from glaciers to geysers.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(101, 'Bali Paradise', 'Relax in Bali with its stunning beaches, temples, and natural beauty.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(102, 'Dubai Luxury Escape', 'Explore Dubai\'s modern architecture and luxurious lifestyle.', '2025-01-16 23:25:23', 'public', 'cultural', 'Asia'),
(103, 'Santorini Sunset Views', 'Enjoy the iconic sunsets and whitewashed buildings of Santorini.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(104, 'Thailand Beach Retreat', 'Bask in the sun on Thailand\'s stunning beaches and crystal-clear waters.', '2025-01-16 23:25:23', 'public', 'sea', 'Europe'),
(105, 'Peru Adventure', 'Trek through Peru, including the iconic Machu Picchu and the Sacred Valley.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(106, 'Japan Cultural Discovery', 'Experience Japan\'s culture, from its temples to its bustling cities.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(107, 'Australia Outback Expedition', 'Explore the rugged beauty of Australia\'s outback and iconic landmarks.', '2025-01-16 23:25:23', 'public', 'mountain', 'Europe'),
(108, 'Greece Ancient Wonders', 'Visit the ancient ruins of Greece, including Athens, Crete, and Rhodes.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(109, 'Portugal Coastal Adventure', 'Explore Portugal’s stunning coastline, from Lisbon to Porto.', '2025-01-16 23:25:23', 'public', 'cultural', 'Europe'),
(110, 'Egypt: Pyramids & History', 'Uncover the mysteries of Ancient Egypt with tours of the pyramids and temples.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(111, 'Maldives Beach Getaway', 'Relax in the Maldives, known for its luxury resorts and crystal-clear waters.', '2025-01-16 23:25:23', 'public', 'sea', 'Europe'),
(112, 'Hawaii Volcano Adventure', 'Explore the volcanic landscapes of Hawaii with scenic hikes and beaches.', '2025-01-16 23:25:23', 'public', 'adventure', 'Europe'),
(113, 'Croatia Island Hopping', 'Island hop through Croatia’s beautiful coastline and medieval towns.', '2025-01-16 23:25:23', 'public', 'sea', 'Europe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_user_email` (`email`);

--
-- Indexes for table `user_routes`
--
ALTER TABLE `user_routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_routes`
--
ALTER TABLE `user_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD CONSTRAINT `logged_in_users_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
