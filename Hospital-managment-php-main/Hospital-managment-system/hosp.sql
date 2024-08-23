-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 09:16 PM
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
-- Database: `hosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `contact`, `password`, `date`) VALUES
(1, 'admin', 8476875734, 'adminn', '2024-08-23 16:52:16.994778');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_contact` bigint(10) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `fees` bigint(6) NOT NULL,
  `appoint_date` date NOT NULL,
  `appoint_time` time NOT NULL,
  `user_status` int(10) NOT NULL,
  `doc_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_name`, `user_email`, `user_contact`, `specialization`, `doctor_name`, `fees`, `appoint_date`, `appoint_time`, `user_status`, `doc_status`) VALUES
(10, 'Ashish kumar', 'ashishk234@gmail.com', 97856786, 'cardiologist', 'doctor1', 500, '2024-08-07', '12:03:00', 0, 1),
(11, 'Ashish kumar', 'ashishk234@gmail.com', 97856786, 'orthopedic', 'odoc1', 700, '2024-08-21', '13:30:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `doc_fees` bigint(6) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `doc_email` varchar(30) NOT NULL,
  `doc_password` varchar(40) NOT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specialization`, `doctor_name`, `address`, `doc_fees`, `contact`, `doc_email`, `doc_password`, `creation_date`) VALUES
(5, 'orthopedic', 'odoc1', 'delhi', 700, 8756458785, 'odoc1@gmail.com', 'odoc', '2024-08-23 16:12:43.132204');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_specialization`
--

CREATE TABLE `doctors_specialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_specialization`
--

INSERT INTO `doctors_specialization` (`id`, `specialization`, `creation_date`) VALUES
(3, 'opthamalogist', '2024-07-26 07:05:16.000000'),
(4, 'dermatologist', '2024-07-26 07:05:44.000000'),
(8, 'ent', '2024-08-09 07:34:15.228723'),
(9, 'cardiologist', '2024-08-20 05:15:36.150686'),
(10, 'orthopedic', '2024-08-20 05:16:34.097868');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(40) NOT NULL,
  `patient_name` varchar(40) NOT NULL,
  `patient_contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_age` bigint(3) NOT NULL,
  `medical_history` text NOT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `doctor_name`, `patient_name`, `patient_contact`, `email`, `patient_gender`, `patient_address`, `patient_age`, `medical_history`, `creation_date`) VALUES
(1, 'doctor1', 'patient1', 785684653, 'pat1@email.com', 'male', 'delhi', 55, 'diabetic', '2024-08-19 05:04:59.328102'),
(2, 'doctor1', 'patient1', 98778658765, 'pat1@email.com', 'male', 'delhi', 45, 'diabetic', '2024-08-19 05:05:15.324271'),
(3, 'doctor1', 'patient2', 875687867543, 'pat2@email.com', 'male', 'delhi', 34, 'bp', '2024-08-19 05:04:37.783093');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `number` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `city`, `number`, `gender`, `email`, `password`, `date`) VALUES
(18, 'Ashish kumar', 'najafgarh', 'delhi', 97856786, 'male', 'ashishk234@gmail.com', 'abcd', '2024-08-08 06:36:49.651087'),
(22, 'neha', 'palam', 'delhi', 986746887, 'Female', 'neha@gmail.com', 'neha', '2024-08-20 11:56:25.709899'),
(23, 'jatin', 'uttam', 'delhi', 847565786, 'Male', 'jatin@gmail.com', 'jatinn', '2024-08-23 16:28:03.246714'),
(24, 'priya', 'bewadi', 'gurgaon', 876867868687, 'Female', 'priya@gmail.com', 'priya', '2024-08-21 06:48:40.476201'),
(25, 'himanshu', 'a25', 'lucknow', 987568978, 'Male', 'him@gmail.com', 'him', '2024-08-21 06:55:53.665096');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_specialization`
--
ALTER TABLE `doctors_specialization`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors_specialization`
--
ALTER TABLE `doctors_specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
