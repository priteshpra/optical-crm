-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 03:18 PM
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
-- Database: `climslara`
--

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `r_dist_sph` varchar(20) DEFAULT NULL,
  `r_dist_cyl` varchar(20) DEFAULT NULL,
  `r_dist_axis` varchar(20) DEFAULT NULL,
  `r_near_sph` varchar(20) DEFAULT NULL,
  `r_near_cyl` varchar(20) DEFAULT NULL,
  `r_near_axis` varchar(20) DEFAULT NULL,
  `l_dist_sph` varchar(20) DEFAULT NULL,
  `l_dist_cyl` varchar(20) DEFAULT NULL,
  `l_dist_axis` varchar(20) DEFAULT NULL,
  `l_near_sph` varchar(20) DEFAULT NULL,
  `l_near_cyl` varchar(20) DEFAULT NULL,
  `l_near_axis` varchar(20) DEFAULT NULL,
  `frame` varchar(255) DEFAULT NULL,
  `lenses` varchar(255) DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `advance` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `time`, `r_dist_sph`, `r_dist_cyl`, `r_dist_axis`, `r_near_sph`, `r_near_cyl`, `r_near_axis`, `l_dist_sph`, `l_dist_cyl`, `l_dist_axis`, `l_near_sph`, `l_near_cyl`, `l_near_axis`, `frame`, `lenses`, `instructions`, `total`, `advance`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, '54', '54', '5', '45', '45', '45', '5', '54', '54', '54', '54', '5', 'XYZ', 'LKSD KJS', 'Specific Instructions dhd fnfj', 5500.00, 500.00, 5000.00, '2025-06-03 09:25:36', '2025-06-03 09:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
