-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 01:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codehaking`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'javascript', '2019-04-04 11:18:33', '2019-04-04 11:18:33'),
(2, 'laravel', '2019-04-04 11:18:42', '2019-04-04 11:18:42'),
(3, 'python', '2019-04-04 11:18:51', '2019-04-04 11:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `is_active`, `author`, `email`, `photo`, `body`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'sharif uddin', 'sharif@gmail.com', '', 'something', '2019-04-20 20:46:58', '2019-04-20 20:50:18'),
(8, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'go going gone', '2019-04-21 23:39:29', '2019-04-22 00:28:56'),
(9, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'Fartilizer', '2019-04-21 23:43:24', '2019-04-22 00:28:58'),
(10, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'Libaration', '2019-04-21 23:44:44', '2019-04-22 00:29:01'),
(11, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'bin tere sanam', '2019-04-21 23:45:31', '2019-04-22 00:29:04'),
(12, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'jig jag', '2019-04-21 23:46:31', '2019-04-22 00:29:07'),
(13, 1, 1, 'sharif uddin', 'sharif@gmail.com', '155581530935449.jpg', 'hing erytuio', '2019-04-21 23:47:34', '2019-04-22 00:29:09'),
(15, 2, 1, 'shojib', 'shojib@gmail.com', '', 'sounds good ', '2019-05-22 01:01:08', '2019-05-22 01:01:55'),
(16, 2, 1, 'shojib', 'shojib@gmail.com', '', 'comment test', '2019-05-22 01:12:45', '2019-05-22 01:21:51'),
(17, 2, 1, 'Pavel Rahman', 'pavel@gmail.com', '', 'comment test test', '2019-05-22 01:21:07', '2019-05-22 01:21:53'),
(18, 2, 1, 'Pavel Rahman', 'pavel@gmail.com', '', 'comment test', '2019-05-22 01:29:33', '2019-05-22 01:30:03'),
(19, 2, 1, 'shojib', 'shojib@gmail.com', '1558509904agent.jpg', 'comment test ', '2019-05-22 01:35:21', '2019-05-22 01:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `is_active`, `author`, `photo`, `email`, `body`, `created_at`, `updated_at`) VALUES
(3, 7, 1, 'sharif uddin', '', 'sharif@gmail.com', 'reply somethng', '2019-04-20 20:54:21', '2019-04-20 20:54:29'),
(4, 7, 1, 'sharif uddin', '155581530935449.jpg', 'sharif@gmail.com', 'double reply ', '2019-04-20 21:47:58', '2019-04-20 21:48:14'),
(5, 8, 0, 'Pavel Rahman', '', 'pavel@gmail.com', 'sounds good', '2019-05-21 23:23:39', '2019-05-21 23:23:39'),
(6, 8, 0, 'Pavel Rahman', '', 'pavel@gmail.com', 'hi lop', '2019-05-21 23:24:40', '2019-05-21 23:24:40'),
(7, 8, 0, 'Pavel Rahman', '', 'pavel@gmail.com', 'hiop ', '2019-05-21 23:25:08', '2019-05-21 23:25:08'),
(8, 15, 1, 'shojib', '', 'shojib@gmail.com', 'reply for sounds good', '2019-05-22 01:10:08', '2019-05-22 01:13:18'),
(9, 15, 1, 'shojib', '', 'shojib@gmail.com', 'jolly good', '2019-05-22 01:12:18', '2019-05-22 01:13:21'),
(10, 15, 1, 'Pavel Rahman', '', 'pavel@gmail.com', 'something going wrong', '2019-05-22 01:14:52', '2019-05-22 01:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2019_03_18_073900_create_roles_table', 1),
('2019_03_22_060744_add_photo_id_to_user_table', 1),
('2019_03_22_165842_create_photos_table', 1),
('2019_03_26_160023_create_posts_table', 1),
('2019_03_28_155522_create_categories_table', 1),
('2019_04_03_061729_create_comments_table', 1),
('2019_04_03_061758_create_comment_replies_table', 1),
('2019_04_08_142817_add_slug_to_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(83, '155581530935449.jpg', '2019-04-20 20:55:09', '2019-04-20 20:55:09'),
(85, '1555915783Home7.jpg', '2019-04-22 00:49:43', '2019-04-22 00:49:43'),
(86, '1555915784Home8.jpg', '2019-04-22 00:49:44', '2019-04-22 00:49:44'),
(88, '1555916704First-Western-Hospital-Koh-Phangan-general-ward-1.jpg', '2019-04-22 01:05:04', '2019-04-22 01:05:04'),
(89, '1555916717house-lighting-hospital-ward-lighting-design-rendering.jpg', '2019-04-22 01:05:17', '2019-04-22 01:05:17'),
(90, '1558509904agent.jpg', '2019-05-22 01:25:04', '2019-05-22 01:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `photo_id`, `title`, `body`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 1, 88, 'my first post', '<p><strong>i love laravel</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>', '2019-04-04 11:19:48', '2019-04-22 01:05:04', 'my-first-post'),
(2, 1, 1, 89, 'Another cool post for laravel 5.3', '<p><strong>javascript is the most remarkable language and wired language in the world</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>', '2019-04-08 08:57:46', '2019-04-22 01:05:17', 'another-cool-post-for-laravel-5-3'),
(11, 1, 1, 59, 'post for laravel 5.4', '<p><strong>Updated to laravel 5.4</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>', '2019-04-16 19:36:27', '2019-04-19 11:15:24', 'post-for-laravel-5-4'),
(12, 1, 2, 62, 'post for laravel 5.5', '<p><strong>hjuohjh</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>', '2019-04-18 12:03:42', '2019-04-19 11:15:45', 'post-for-laravel-5-5');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'subscriber', NULL, NULL),
(3, 'author', NULL, NULL),
(4, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `is_active`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 1, 1, 'sharif uddin', 'sharif@gmail.com', '$2y$10$RC0Nc9kQCmCwxK.dXN1h0.ZKEGokcfiuPwITemPH0JvSPeyUPXULi', 'y671uajqKo4RStB8EOjZZer0Znkvvzu4tE1Glvz4CDki8t3jmVv65JSyU2L9', '2019-04-04 11:14:54', '2019-04-20 20:55:09', '83'),
(2, 2, 1, 'Maria islam', 'maria@gmail.com', '$2y$10$s/.lS.mnm5TLHorcTQN6ruXwa10DxfvEGGpfpqlMXaLUKYTJOJ9N.', NULL, '2019-04-09 08:36:25', '2019-04-18 11:51:05', '61'),
(3, 3, 1, 'jhumjhmi', 'jhum@gmail.com', '$2y$10$xnIh6b4NaOZXVWTsO11Ae.ZVIxvPkC0iG0VZwo.NLkV8ZgnkbbuIi', 'FyAIC2r9nnA2I0EzCkNzCWvykrdu8I0gQZofNBHXToZIittEHyqK34n9IbNO', '2019-05-04 01:12:41', '2019-05-04 01:12:41', ''),
(4, 4, 0, 'Pavel Rahman', 'pavel@gmail.com', '$2y$10$s3KMrxfvYar7/qFHO43YZe5hxaLmBDoSxmMZP/siROC8BQ2prdcP2', 'zRgbO9G4GXF5ue37ejNnfVftcK0woCTkaOomgTPuRwKh1L8oKVmxuTTJHNcK', '2019-05-21 15:43:14', '2019-05-21 22:39:09', ''),
(5, 4, 0, 'sujon shekh', 'sujon@gmail.com', '$2y$10$4EL.khQjlwite9sIac2pYeAWSDu42QkiU2iFpx3JXY.5B8XnIHkxm', '3FA0mt1GmyHhImxh1k8hGVaC2adXqbcQKx1Jd5Opvo3huPFACYe0tH8QoB9H', '2019-05-21 22:36:11', '2019-05-21 22:36:11', ''),
(6, 4, 1, 'shojib', 'shojib@gmail.com', '$2y$10$/kyJnPEgwgAEGC8Z6Fstn.QI9VArhmF38zie3yIBwxksnXZzTxPQq', '74WYESLIhjXbGXSo3rPfx7fRo4wCSpH9OrZddv4gGm1dzahSmw4wy3OIh4Xb', '2019-05-21 23:14:53', '2019-05-22 01:25:04', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_index` (`comment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
