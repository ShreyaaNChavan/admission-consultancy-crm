-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2026 at 08:48 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `batch_id` bigint UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent','Late') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `batch_id`, `attendance_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 14, '2026-07-20', 'Present', '2026-07-20 00:47:51', '2026-07-20 00:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `batch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `timing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `course_id`, `batch_name`, `start_date`, `end_date`, `timing`, `capacity`, `status`, `created_at`, `updated_at`, `faculty_id`) VALUES
(12, 3, 'Mission DevOps', '2026-07-15', '2026-09-30', '6.00pm - 8.00 pm', 50, 1, '2026-07-20 00:23:43', '2026-07-20 00:23:43', 20),
(13, 6, 'Lara for WebDev', '2026-06-01', '2026-07-30', '6.00pm - 8.00 pm', 100, 1, '2026-07-20 00:24:21', '2026-07-20 00:24:21', 19),
(14, 1, 'AutoSigma', '2026-06-01', '2026-07-31', '10.00am -11.30am', 25, 1, '2026-07-20 00:25:06', '2026-07-20 00:25:06', 20);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AUTO101', 'Automation', 3, 1, '2026-07-10 04:06:06', '2026-07-10 04:06:06'),
(2, 'PYTH101', 'Python Programming', 4, 1, '2026-07-10 08:38:25', '2026-07-10 08:38:25'),
(3, 'DEVOPS1001', 'DevOps Engineering', 5, 1, '2026-07-10 08:39:44', '2026-07-10 08:39:44'),
(4, 'JAVA101', 'Java Full Stack', 6, 1, '2026-07-16 00:51:50', '2026-07-16 00:51:50'),
(5, 'MERN101', 'MERN Stack Development', 6, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(6, 'LARAVEL101', 'Laravel Web Development', 4, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(7, 'REACT101', 'React JS Development', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(8, 'FLUTTER101', 'Flutter App Development', 5, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(9, 'DSA101', 'Data Structures & Algorithms', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(10, 'AIDS101', 'Artificial Intelligence & Data Science', 8, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(11, 'ML101', 'Machine Learning', 6, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(12, 'DL101', 'Deep Learning', 6, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(13, 'DATA101', 'Data Analytics', 4, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(14, 'AWS101', 'AWS Cloud Practitioner', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(15, 'AZURE101', 'Microsoft Azure Fundamentals', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(16, 'GCP101', 'Google Cloud Platform', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(17, 'CCNA101', 'CCNA Networking', 4, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(18, 'CYBER101', 'Cyber Security', 6, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(19, 'UIUX101', 'UI / UX Design', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(20, 'TEST101', 'Software Testing', 4, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(21, 'SQL101', 'SQL & Database Development', 2, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(22, 'POWERBI101', 'Power BI & Business Intelligence', 3, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46'),
(23, 'GENAI101', 'Generative AI & Prompt Engineering', 4, 1, '2026-07-16 06:22:46', '2026-07-16 06:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administration', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(2, 'Admissions', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(3, 'Sales', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(4, 'Counseling', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(5, 'Academics', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(6, 'Training', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(7, 'Human Resources', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(8, 'Finance', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(9, 'Accounts', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(10, 'Marketing', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(11, 'Information Technology', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(12, 'Placement Cell', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(13, 'Student Support', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(14, 'Examination', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51'),
(15, 'Research & Development', 1, '2026-07-16 15:01:51', '2026-07-16 15:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Sales Manager', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(3, 'Admission Executive', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(4, 'Senior Counselor', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(5, 'Counselor', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(6, 'Receptionist', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(7, 'HR Manager', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(8, 'HR Executive', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(9, 'Accountant', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(10, 'Finance Executive', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(11, 'Academic Coordinator', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(12, 'Faculty', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(13, 'Senior Trainer', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(14, 'Technical Trainer', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(15, 'Lab Assistant', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(16, 'Placement Officer', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(17, 'Marketing Executive', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(18, 'Digital Marketing Executive', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(19, 'Software Developer', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(20, 'System Administrator', 1, '2026-07-16 15:00:25', '2026-07-16 15:00:25'),
(21, 'Director', 1, '2026-07-16 11:29:36', '2026-07-16 11:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `employee_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `designation_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `employee_code`, `full_name`, `department_id`, `designation_id`, `role_id`, `phone`, `email`, `joining_date`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(98, NULL, 'EMP1784525641', 'Amit Deshmukh', 3, 2, 2, '7218182252', 'sales@crm.com', '2026-07-01', 35000.00, 'Active', '2026-07-20 00:04:01', '2026-07-20 00:04:01'),
(99, NULL, 'EMP1784525699', 'Rahul Joe Sharma', 13, 5, 3, '7879485236', 'rahul@crm.com', '2026-06-01', 32000.00, 'Active', '2026-07-20 00:04:59', '2026-07-20 00:04:59'),
(100, NULL, 'EMP1784525748', 'Priya Yash Patil', 13, 5, 3, '9823641020', 'priya@crm.com', '2026-06-01', 32000.00, 'Active', '2026-07-20 00:05:48', '2026-07-20 00:05:48'),
(101, 16, 'EMP1784525812', 'Jasika Vikram Roy', 9, 9, 4, '7412589630', 'jasika123@crm.com', '2026-07-15', 30000.00, 'Active', '2026-07-20 00:06:52', '2026-07-20 00:08:27'),
(102, 17, 'EMP1784526086', 'Mrs. Aabha Yash Shinde', 7, 7, 5, '9876543210', 'hr@crm.com', '2026-05-01', 45000.00, 'Active', '2026-07-20 00:11:26', '2026-07-20 00:11:52'),
(103, 18, 'EMP1784526324', 'Mrs. Shweta Chavan', 8, 6, 7, '8237858598', 'shweta@crm.com', '2026-07-01', 37000.00, 'Active', '2026-07-20 00:15:24', '2026-07-20 00:15:57'),
(104, 19, 'EMP1784526504', 'Mrs. Gauri Vinayak Garud', 6, 12, 6, '8527419856', 'gauri@crm.com', '2026-06-01', 35000.00, 'Active', '2026-07-20 00:18:24', '2026-07-20 00:19:28'),
(105, 20, 'EMP1784526647', 'Mr. Shankar Dharmesh Ban', 6, 13, 6, '7874859620', 'shankar@crm.com', '2026-06-01', 40000.00, 'Active', '2026-07-20 00:20:47', '2026-07-20 00:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` enum('Present','Absent','Late','Half Day','Leave') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Present',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `attendance_date`, `check_in`, `check_out`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(22, 98, '2026-07-20', '11:49:00', NULL, 'Late', 'No pre info', '2026-07-20 00:50:04', '2026-07-20 00:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `faculty_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `employee_id`, `faculty_code`, `full_name`, `qualification`, `specialization`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(19, NULL, 'FAC1784526504', 'Mrs. Gauri Vinayak Garud', 'Fullstack in laravel , Web Dev , AI&ML', 'Faculty', '8527419856', 'gauri@crm.com', 'Active', '2026-07-20 00:18:24', '2026-07-20 00:22:18'),
(20, NULL, 'FAC1784526647', 'Mr. Shankar Dharmesh Ban', 'Cloud Computing, DevOps', 'Senior Trainer', '7874859620', 'shankar@crm.com', 'Active', '2026-07-20 00:20:47', '2026-07-20 00:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

CREATE TABLE `fee_structures` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `fee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_structures`
--

INSERT INTO `fee_structures` (`id`, `course_id`, `fee_name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Regular', 25000.00, 1, '2026-07-11 13:08:15', '2026-07-11 13:08:15'),
(2, 1, 'Scholarship', 18000.00, 1, '2026-07-11 13:08:35', '2026-07-11 13:08:35'),
(3, 1, 'Installment', 27000.00, 1, '2026-07-11 13:08:51', '2026-07-11 13:08:51'),
(4, 3, 'Regular', 20000.00, 1, '2026-07-15 12:39:00', '2026-07-15 12:39:00'),
(5, 3, 'Scholarship', 15000.00, 1, '2026-07-15 12:39:17', '2026-07-15 12:39:17'),
(6, 3, 'Installment', 25000.00, 1, '2026-07-15 12:39:37', '2026-07-15 12:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `counselor_id` bigint UNSIGNED NOT NULL,
  `followup_date` date NOT NULL,
  `followup_type` enum('Call','WhatsApp','Email','Walk-in','Meeting') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_followup` date DEFAULT NULL,
  `status` enum('Pending','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `lead_id`, `counselor_id`, `followup_date`, `followup_type`, `remarks`, `next_followup`, `status`, `created_at`, `updated_at`) VALUES
(9, 7, 4, '2026-07-18', 'Call', 'He is interested', '2026-07-20', 'Completed', '2026-07-20 00:44:40', '2026-07-20 00:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Partially Paid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `student_id`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(4, 'INV1784528150', 4, 27000.00, 'Partially Paid', '2026-07-20 00:45:50', '2026-07-20 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `source_id` bigint UNSIGNED DEFAULT NULL,
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `status` enum('New','Assigned','Contacted','Follow-up','Interested','Not Interested','Converted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `lead_code`, `full_name`, `phone`, `email`, `course_id`, `source_id`, `assigned_to`, `status`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 'LD1784528011', 'Mr. Aniket Gite', '8080932659', 'aniketgite0405@gmail.com', 1, 7, 4, 'Converted', 'He is doing ENTC (grad year 2027) from MMCOE, Pune', 1, '2026-07-20 00:43:31', '2026-07-20 00:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` bigint UNSIGNED NOT NULL,
  `source_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_sources`
--

INSERT INTO `lead_sources` (`id`, `source_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Website', 1, '2026-07-10 04:06:29', '2026-07-10 04:06:29'),
(2, 'WhatsApp', 1, '2026-07-10 09:03:36', '2026-07-10 09:03:36'),
(3, 'Walk-in', 1, '2026-07-10 09:03:44', '2026-07-10 09:03:44'),
(4, 'Phone', 1, '2026-07-10 09:03:50', '2026-07-10 09:03:50'),
(5, 'Facebook', 1, '2026-07-10 09:04:00', '2026-07-10 09:04:00'),
(6, 'Instagram', 1, '2026-07-10 09:04:08', '2026-07-10 09:04:08'),
(7, 'Youtube', 1, '2026-07-16 08:31:28', '2026-07-16 08:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `leave_type` enum('Casual','Sick','Annual','Maternity','Paternity','Emergency','Unpaid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_days` int UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `admin_remark` text COLLATE utf8mb4_unicode_ci,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_id`, `leave_type`, `from_date`, `to_date`, `total_days`, `reason`, `status`, `admin_remark`, `approved_at`, `created_at`, `updated_at`) VALUES
(8, 105, 'Sick', '2026-07-21', '2026-07-23', 3, 'I am having appointment of knee.', 'Approved', 'Okay bt again no more leaves. Thank You', '2026-07-20 00:50:52', '2026-07-20 00:48:42', '2026-07-20 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_07_09_090000_create_roles_table', 1),
(4, '2026_07_09_090001_create_permissions_table', 1),
(5, '2026_07_09_090002_create_role_permissions_table', 1),
(6, '2026_07_09_174922_create_users_table', 1),
(7, '2026_07_09_183920_create_sessions_table', 1),
(8, '2026_07_10_040000_create_courses_table', 1),
(9, '2026_07_10_040001_create_lead_sources_table', 1),
(10, '2026_07_10_050000_create_leads_table', 1),
(11, '2026_07_10_145608_create_followups_table', 2),
(12, '2026_07_11_135355_create_students_table', 3),
(13, '2026_07_11_144040_create_batches_table', 4),
(14, '2026_07_11_145808_create_fee_structures_table', 5),
(15, '2026_07_11_181729_add_fee_structure_to_students_table', 5),
(16, '2026_07_11_185051_create_invoices_table', 6),
(17, '2026_07_12_073354_create_payments_table', 7),
(18, '2026_07_12_074104_add_receipt_no_to_payments_table', 8),
(19, '2026_07_12_091532_create_departments_table', 9),
(20, '2026_07_12_092450_create_designations_table', 9),
(21, '2026_07_12_093003_create_employees_table', 10),
(22, '2026_07_12_093518_create_faculties_table', 11),
(23, '2026_07_12_093721_add_faculty_to_batches_table', 12),
(24, '2026_07_12_095306_drop_trainer_name_from_batches_table', 13),
(25, '2026_07_12_095448_create_attendances_table', 13),
(26, '2026_07_12_145214_remove_fees_from_courses_table', 14),
(27, '2026_07_17_055111_create_employee_attendances_table', 15),
(28, '2026_07_17_071905_create_leave_requests_table', 16),
(29, '2026_07_17_135102_create_payrolls_table', 17),
(30, '2026_07_18_123306_add_user_id_to_employees_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_mode` enum('Cash','UPI','Card','Bank Transfer','Cheque') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `receipt_no`, `invoice_id`, `payment_date`, `amount`, `payment_mode`, `transaction_no`, `remarks`, `created_at`, `updated_at`) VALUES
(6, 'RCP1784528629', 4, '2026-07-20', 10000.00, 'UPI', 'UPI123456785', 'Next on 2nd month', '2026-07-20 00:53:49', '2026-07-20 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `payroll_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payroll_year` year NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `allowances` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deductions` decimal(10,2) NOT NULL DEFAULT '0.00',
  `overtime` decimal(10,2) NOT NULL DEFAULT '0.00',
  `net_salary` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employee_id`, `payroll_month`, `payroll_year`, `basic_salary`, `allowances`, `deductions`, `overtime`, `net_salary`, `payment_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 105, 'January', '2026', 40000.00, 5000.00, 20000.00, 0.00, 25000.00, '2026-07-20', 'Paid', '2026-07-20 00:52:44', '2026-07-20 00:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Has complete access to the CRM', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(2, 'Sales Manager', 'Manages sales team', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(3, 'Counselor', 'Handles student enquiries', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(4, 'Accountant', 'Manages finance and payments', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(5, 'HR', 'Manages employees', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(6, 'Faculty', 'Handles academic batches', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12'),
(7, 'Receptionist', 'Handles walk-in enquiries', 1, '2026-07-10 04:05:12', '2026-07-10 04:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d69LhC3c9v00IOk3hXU2UXeYviTkLRhRRrG0M1BN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2tHTlRiMXU1blduUng0SmcwNkhLc0lXdEhwenRnaFJaVzdIVmtzYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1784528836);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `batch_id` bigint UNSIGNED DEFAULT NULL,
  `fee_structure_id` bigint UNSIGNED DEFAULT NULL,
  `admission_date` date NOT NULL,
  `status` enum('Active','Completed','Cancelled','Dropped') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `lead_id`, `full_name`, `phone`, `email`, `course_id`, `batch_id`, `fee_structure_id`, `admission_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ST1784528133', 7, 'Mr. Aniket Gite', '8080932659', 'aniketgite0405@gmail.com', 1, 14, NULL, '2026-07-20', 'Active', '2026-07-20 00:45:33', '2026-07-20 00:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shreya Chavan', 'admin@crm.com', '9876543210', '$2y$12$HiPX6yfDncXcr0ghe/M8o.jR.ZXgGvxZBI6xM0oxudYlcWuxoG0eW', 1, NULL, NULL, NULL),
(2, 2, 'Amit Deshmukh', 'sales@crm.com', '9000000001', '$2y$12$.rQJEX3xseEMtAUoTFnMKu32TeAFlyvWSYSNxBPW1pb08gDFmPEG6', 1, NULL, NULL, '2026-07-18 08:09:45'),
(3, 3, 'Rahul Sharma', 'rahul@crm.com', '9000000002', '$2y$12$D/9HWs7ejxZ0Iq2LZKCZs.diKS8X7K4E30TMpMGRZlK.EfSVxFJ.K', 1, NULL, NULL, NULL),
(4, 3, 'Priya Patil', 'priya@crm.com', '9000000003', '$2y$12$6LkuRF2uG0E9X/06GeG1mOgturRfgXs/1bfQDDnQLq2P068C3fJUG', 1, NULL, NULL, NULL),
(16, 4, 'Jasika Vikram Roy', 'jasika123@crm.com', NULL, '$2y$12$RFAlHAx1fdmCsLyFlfXice7jjafP2b1QYk1z2APQNTlnH3bk5hLi.', 1, NULL, '2026-07-20 00:08:27', '2026-07-20 00:08:27'),
(17, 5, 'Mrs. Aabha Yash Shinde', 'hr@crm.com', NULL, '$2y$12$TyoGLWw7dtvvc6efILoX8u02Nat4aM31iKt.iT/FeoY.mw.PDdR2e', 1, NULL, '2026-07-20 00:11:52', '2026-07-20 00:12:53'),
(18, 7, 'Mrs. Shweta Chavan', 'shweta@crm.com', NULL, '$2y$12$ggts9.qdRF5/.Jw5y.DM4u3YQiPdwujdWOqgbgVZCeEhXKpgIIItu', 1, NULL, '2026-07-20 00:15:57', '2026-07-20 00:15:57'),
(19, 6, 'Mrs. Gauri Vinayak Garud', 'gauri@crm.com', NULL, '$2y$12$LfFSdb1HnPdJhWn2plx/.Ogf.iUrKbglY3T2CoJrJsTTcTewxVmV2', 1, NULL, '2026-07-20 00:19:28', '2026-07-20 00:19:28'),
(20, 6, 'Mr. Shankar Dharmesh Ban', 'shankar@crm.com', NULL, '$2y$12$O6Z1rPCykj2ySrUxBI5NLO7ML3C97DD0GGZvwrLIgIfpQGzCL3Z/.', 1, NULL, '2026-07-20 00:21:17', '2026-07-20 00:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_course_id_foreign` (`course_id`),
  ADD KEY `batches_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_code_unique` (`employee_code`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`),
  ADD KEY `fk_employee_role` (`role_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_attendances_employee_id_attendance_date_unique` (`employee_id`,`attendance_date`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_faculty_code_unique` (`faculty_code`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_structures_course_id_foreign` (`course_id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followups_lead_id_foreign` (`lead_id`),
  ADD KEY `followups_counselor_id_foreign` (`counselor_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_no_unique` (`invoice_no`),
  ADD KEY `invoices_student_id_foreign` (`student_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_lead_code_unique` (`lead_code`),
  ADD KEY `leads_course_id_foreign` (`course_id`),
  ADD KEY `leads_source_id_foreign` (`source_id`),
  ADD KEY `leads_assigned_to_foreign` (`assigned_to`),
  ADD KEY `leads_created_by_foreign` (`created_by`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_receipt_no_unique` (`receipt_no`),
  ADD KEY `payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payrolls_employee_id_payroll_month_payroll_year_unique` (`employee_id`,`payroll_month`,`payroll_year`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_permission_name_unique` (`permission_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_code_unique` (`student_code`),
  ADD KEY `students_lead_id_foreign` (`lead_id`),
  ADD KEY `students_course_id_foreign` (`course_id`),
  ADD KEY `students_fee_structure_id_foreign` (`fee_structure_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_structures`
--
ALTER TABLE `fee_structures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_employee_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD CONSTRAINT `fee_structures_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `followups`
--
ALTER TABLE `followups`
  ADD CONSTRAINT `followups_counselor_id_foreign` FOREIGN KEY (`counselor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followups_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_fee_structure_id_foreign` FOREIGN KEY (`fee_structure_id`) REFERENCES `fee_structures` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `students_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
