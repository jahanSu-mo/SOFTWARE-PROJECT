-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2025 at 10:31 AM
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
-- Database: `home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', NULL, '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2025-05-08 09:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `patient_id`, `fullname`, `email`, `phone`, `date`, `time`, `created_at`) VALUES
(1, 3, 0, 'sonu', 'sonu1@gmail.com', '01111111112', '2025-05-13', '00:30:00', '2025-06-13 18:03:24'),
(2, 7, 8, 'use1', 'use1@gmail.com', '01111111111', '2025-05-13', '00:30:00', '2025-06-14 06:09:07'),
(3, 7, 9, 'use1', 'use1@gmail.com', '01111111111', '2025-05-13', '13:29:00', '2025-06-14 06:24:12'),
(4, 7, 10, 'sonu', 'sonu1@gmail.com', '01111111112', '2025-06-10', '13:30:00', '2025-06-14 06:27:21'),
(5, 14, 11, 'doctor', 'docto@gmail.com', '01111111113', '2025-07-08', '13:05:00', '2025-07-07 10:27:48'),
(6, 18, 7, 'doc6', 'docto@gmail.com', '01111111113', '2025-07-08', '11:25:00', '2025-07-07 10:33:18'),
(7, 22, 23, 'user1', 'u@gmail.com', '01111111113', '2025-07-08', '10:20:00', '2025-07-15 12:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `available_days` varchar(255) DEFAULT NULL,
  `available_time` varchar(100) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `email`, `phone`, `created_at`, `available_days`, `available_time`, `room_number`, `user_id`, `image`) VALUES
(26, 'x', 'Pediatrics', 'x1@gmail.com', '01111111111', '2025-07-07 10:31:54', 'thursday', '10-2.00', '202', '18', NULL),
(27, 'a', 'Gynecology and Obstetrics', 'a1@gmail.com', '01111111111', '2025-07-07 11:07:32', 'thursday', '10-2.00', '202', '19', NULL),
(28, 'suborn', 'Medicine', 'sum@gmail.com', '01111111112', '2025-07-15 12:23:07', 'thursday', '10-2.00', '202', '21', NULL),
(29, 'xx', 'Medicine', 'xx22@gmail.com', '01111111111', '2025-07-15 12:40:11', 'thursday', '10-2.00', '202', '22', NULL),
(30, 'x3', 'Pediatrics', 'xx3@gmail.com', '01111111113', '2025-07-16 04:10:32', 'thursday', '10-2.00', '207', '24', NULL),
(31, 'x4', 'Gynecology and Obstetrics', 'x4@gmail.com', '01111111113', '2025-07-16 04:33:07', 'thursday', '10-2.00', '207', '25', 'doctor_68772b837d0f7.png'),
(32, 'x5', 'Gynecology and Obstetrics', 'x5@gmail.com', '01111111112', '2025-07-16 04:56:43', 'thursday', '10-2.00', '207', '26', 'doctor_6877310bc42eb.png'),
(33, 'x6', 'Gynecology and Obstetrics', 'x6@gmail.com', '01111111112', '2025-07-16 05:00:59', 'thursday', '10-2.00', '207', '27', 'doctor_6877320bd06e9.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `number`, `message`, `created_at`, `user_id`) VALUES
(2, 'jahan', 'jah1@gmail.com', '011111111111', 'how are you ,can i book a appoinment', '2025-05-13 16:07:42', 'kJc8pXvbqFP91tQE65Jh'),
(3, 'sumo', 'jah2@gmail.com', '011111111112', 'how can i book an appointment??', '2025-05-13 16:08:51', 'kJc8pXvbqFP91tQE65Jh'),
(6, 'sumon', 'jah3@gmail.com', '011111111113', 'hello can i book an appoinment', '2025-05-14 19:26:37', 'kJc8pXvbqFP91tQE65Jh'),
(8, 'doctor', 'doc12@gmail.com', '1111111113', 'doc12. i need a help', '2025-07-07 06:52:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `condition` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `appointment_time` varchar(100) DEFAULT NULL,
  `mandatory_info` text DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'patient',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `number`) VALUES
(1, 'su', 'su@gmail.com', '$2y$10$Dtrie/5cxwXq6sDMlZxasO5BR8HS1Hfced.z.YbnA9Y1fN7n5cj26', 'doctor', '2025-06-02 05:18:46', NULL),
(2, 'ja', 'ja@gmail.com', '$2y$10$XHlcJz4iiRqoUT5ZrGw/2unwF3JdnGiMO.lAF8wxf3hPOiF8zUsUC', 'doctor', '2025-06-02 05:19:20', NULL),
(3, 'doctor 2', 'doctor2@gmail.com', '$2y$10$1LIWVEbmlUl9CiQDfkgTIeyMub3hnyt54IotOL5xZ0Srpz87PoVbO', 'doctor', '2025-06-02 05:25:10', NULL),
(4, 'doctor 3', 'doctor3@gmail.com', '$2y$10$QrTtlLSi8gSrQO93PDjKqOFuDUbAa61mwXmdM8asjsBg7KmIMFB0K', 'doctor', '2025-06-02 05:32:00', NULL),
(5, 'doctor 4', 'doctor4@gmail.com', '$2y$10$J0ywUjfzzo7R.QK2Wnanke7XT7ulsIl3YxaKaCIyNPs1Y1E1/dtYy', 'doctor', '2025-06-02 05:34:51', NULL),
(6, 'doctor 5', 'doctor5@gmail.com', '$2y$10$ms6P7UpjC2DuQJXDmsjRwOoCY7.CwWlmUxTIvbs0ldV9hkXR9ARH6', 'doctor', '2025-06-02 05:49:08', NULL),
(7, 'doctor 6', 'doc6@gmail.com', '$2y$10$pDCt3Ku9Lg.xiZJLYTkPH.r/3n5d9G3mghWWZDq.sXzr9BCwsFnay', 'doctor', '2025-06-14 05:21:47', NULL),
(8, 'use1', 'use1@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'patient', '2025-06-14 06:08:26', NULL),
(9, 'use1', 'user1@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'patient', '2025-06-14 06:23:22', NULL),
(10, 'sonu', 'sonu1@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'patient', '2025-06-14 06:26:31', NULL),
(11, 'doctor', 'doc12@gmail.com', '8bd7954c40c1e59a900f71ea3a266732609915b1', 'patient', '2025-07-06 18:29:54', NULL),
(12, 'see', 'see@gmail.com', '$2y$10$nbvFxc4jRqm8vkT/517/zO2GojNkHMztWQKAlh2jNpsYfe/NlIGgW', 'doctor', '2025-07-06 18:37:07', NULL),
(13, 'sona', 'sona@gmail.com', '$2y$10$OXLhF9AsNudSpE6LtgmJK.Fjps2mNmqsR5XXYcIoM4VlVkItdkb0G', 'doctor', '2025-07-06 18:38:33', NULL),
(14, 'sha', 'sha@gmail.com', '$2y$10$L2DxkM1Xn8.5/jA6e5JNUOPZ7cfDAkmhKO9MBNkxeKvhPJM7G.Kfy', 'doctor', '2025-07-06 18:39:18', NULL),
(15, 'jannat', 'jannat@gmail.com', '$2y$10$1P5DL1e0Zr3y.7czdVGOQuMbOWPLvGEUv2j0nX4CkaFUeLoo7Py2.', 'doctor', '2025-07-06 18:39:44', NULL),
(16, 'suvo', 'suvo@gmail.com', '$2y$10$bTOtlKIGVOZCVRLeC7uUkuLjVRnyDwUPgF6RuneWqyIwSr.vXMuFy', 'doctor', '2025-07-06 18:40:32', NULL),
(17, 'ruma', 'ruma@gmail.com', '$2y$10$./VkvBe2VTcauRbTk05sXeJdKAXH6xohBJjiLy.t4kKfYSfdhUf6y', 'doctor', '2025-07-06 18:41:21', NULL),
(18, 'x', 'x1@gmail.com', '$2y$10$F1Z/8vAyDIVOz.bdFksk6O0Q9G8lNjPFymsxqEBD8ZB5Yz7XrabHa', 'doctor', '2025-07-07 10:31:54', NULL),
(19, 'a', 'a1@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'doctor', '2025-07-07 10:42:55', NULL),
(20, 'user1', 'u1@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'patient', '2025-07-07 11:08:41', NULL),
(21, 'suborn', 'sum@gmail.com', '777', 'doctor', '2025-07-15 12:18:30', NULL),
(22, 'xx', 'xx22@gmail.com', '$2y$10$2axYRRnwSM4WJkFEuCbvYe1nDGo0kIs2MW7SjX8XXIZRl/8KnVSB6', 'doctor', '2025-07-15 12:39:46', NULL),
(23, 'user1', 'u@gmail.com', '$2y$10$X/xeINKLb4qNkP/a0XvIEeeIFF0giAUdJ7KS9MY35oFtT5K4nmfka', 'patient', '2025-07-15 12:41:24', NULL),
(24, 'xx3', 'xx3@gmail.com', '$2y$10$xtycsObGSw1r59tgzkn1uOvKcYVSHfZjWa7ieK9yVdXkChD0SUOae', 'doctor', '2025-07-16 04:09:45', NULL),
(25, 'x4', 'x4@gmail.com', '$2y$10$FuBQkj3ynTvhzUwzk2nUJe0gbIC6IcLGC7v8qzWfZuFUmm2ziLsVS', 'doctor', '2025-07-16 04:32:25', NULL),
(26, 'x5', 'x5@gmail.com', '$2y$10$wIV..il8h1Zsc4SU640Fd.hnxEHD3/kC5/Yby5hfqBqmkiXk9Myf.', 'doctor', '2025-07-16 04:56:06', NULL),
(27, 'x6', 'x6@gmail.com', '$2y$10$BJtJ/fjV0wRFFidgubm70OQiEJEtsciTY7xYPfziMzPgSPIG5HvwG', 'doctor', '2025-07-16 05:00:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
