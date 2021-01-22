-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2021 at 09:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type_id`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tlVE7c', 1, '1onkY9GU8u7P7VEetk9A', 1, 1, NULL, NULL, NULL, NULL),
(2, 'iqiuPC', 1, 'UWSg9uwl7aNgTYRdo5qq', 1, 1, NULL, NULL, NULL, NULL),
(3, '7omi3g', 1, 'l0aQEQoSoNAYtvKkdGEs', 1, 1, NULL, NULL, NULL, NULL),
(4, 'AWsT3L', 1, 'YsCAMZdjZM8jcbwzjtxm', 1, 1, NULL, NULL, NULL, NULL),
(5, 'sf1vrR', 1, 'RcqURyzjYjUM3yETX1Sw', 1, 1, NULL, NULL, NULL, NULL),
(6, '6I0VSK', 2, 'H1AJuzPb4zkbdvDmeXNs', 1, 1, NULL, NULL, NULL, NULL),
(7, '9GDa7k', 2, 'tDFGPYw7bgIYjpYQmNfu', 1, 1, NULL, NULL, NULL, NULL),
(8, '8kTIVF', 2, 'nTzBbDuClq3luma0YvOd', 1, 1, NULL, NULL, NULL, NULL),
(9, '7tpyXQ', 2, 'qxJd7v9FCdDdTCx9VPBK', 1, 1, NULL, NULL, NULL, NULL),
(10, 'WJnXx4', 2, 'Nkr841Ml65JjaUaw0LcM', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_invoices`
--

CREATE TABLE `account_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_invoice_details`
--

CREATE TABLE `account_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_invoice_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Debit', NULL, NULL),
(2, 'Credit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', NULL, NULL),
(2, 'A-', NULL, NULL),
(3, 'B+', NULL, NULL),
(4, 'B-', NULL, NULL),
(5, 'AB+', NULL, NULL),
(6, 'AB-', NULL, NULL),
(7, 'O+', NULL, NULL),
(8, 'O-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Anesthetics', NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Cardiology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Neurology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Oncology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Ophthalmology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Urology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(7, 'Breast Screening', NULL, 1, 1, NULL, NULL, NULL, NULL),
(8, 'Gastroenterology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(9, 'Hematology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(10, 'Oncology', NULL, 1, 1, NULL, NULL, NULL, NULL),
(11, 'Physiotherapy', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `blood_id` bigint(20) UNSIGNED DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `designation`, `department_id`, `address`, `mobile`, `phone`, `biography`, `specialist`, `birthday`, `gender`, `blood_id`, `education`, `picture`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Martin Lara', 'NUpDnUVJkZ@gmail.com', 'mV5wnQhPA8', 1, 'Nr5jSleo1YwBSg1', '8801829718018', '1546718', '<p>xg7dmYbEU3sKEFT</p>', '8gjbki0lthgwdPX', NULL, 2, NULL, '<p>BxkGUtRqM67ugdXqUq8Z</p>', 'backend/files/doctor/doctor_1611289818.jpg', 1, 1, 1, NULL, NULL, '2021-01-21 22:30:18'),
(2, 'Susan Donovan', 'KcVeoaQYOQ@gmail.com', '3aaHJGZugm', 2, 'kx3C8GdfC2t1LlF', '8801818826670', '1652226', '<p>flohKOyCPOJKpXO</p>', '3ySaIoAjY8KRuAl', NULL, 1, NULL, '<p>R7DHlhzY4edhdyfnGsUq</p>', 'backend/files/doctor/doctor_1611289796.jpg', 1, 1, 1, NULL, NULL, '2021-01-21 22:29:56'),
(3, 'Eliana Goodwin', 'gR07U5BoQh@gmail.com', 'zaOazf6mUk', 3, '4ISJPNw48D4Msgr', '8801886407566', '1400997', '<p>JhiCOOlKagpzPdW</p>', '1zKbDMXoIBUi10w', NULL, 1, NULL, '<p>J8fgEyDVyVWqgi4ccO1Z</p>', 'backend/files/doctor/doctor_1611289776.jpg', 1, 1, 1, NULL, NULL, '2021-01-21 22:29:36'),
(4, 'Kevin paul', 'uFjvi4kIlv@gmail.com', 'bzwXo6o5kQ', 4, '6a2X1D2G8ijyn3g', '8801871260873', '1947050', '<p>DotTd9ElYOKZhdh</p>', '6kTNTWdTbvKzBgb', NULL, 1, NULL, '<p>gW20vNxiUNvo57BzXA65</p>', 'backend/files/doctor/doctor_1611289757.jpg', 1, 1, 1, NULL, NULL, '2021-01-21 22:29:17'),
(5, 'lara paul', 'SuEmlt67t9@gmail.com', 'cCnEJW6t9g', 5, 'mafRZZlCWmwpLU0', '8801847378793', '1323287', '<p>87nzDj0WFnXhWEc</p>', 'yt0sWIVJ16q1SOD', NULL, 2, NULL, '<p>QoCAs5h7wsiuXQqC3nqj</p>', 'backend/files/doctor/doctor_1611289741.jpg', 1, 1, 1, NULL, NULL, '2021-01-21 22:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roll_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `blood_id` bigint(20) UNSIGNED DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `roll_id`, `name`, `email`, `address`, `mobile`, `phone`, `birthday`, `gender`, `blood_id`, `picture`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'NYZD9XHeTU', 'KR79PLbvCj@gmail.com', 's8Es3WZnweyRfjdEcOalbEma3f4jtk7azKCDPXEZn2OUwCpbyU', '11', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, 3, 'Bjdr8kpLBF', 'LbrQUlKHxr@gmail.com', 'VI2L1YaGJCWuly3Pw1xFE38xrRhDCPtc6V7n4vd42cpWGblF7u', '12', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 3, '2GXENNbGuw', 'b3OwfWVsP0@gmail.com', 'cLi79KrCS3zV0puBcD593Pn7SDv6rtGQmZ5SIbnuSQJwdzYTno', '11', '11', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(4, 3, 'cVQMwCRokt', '0eiaoQ5IKl@gmail.com', 'KtPaic7qQrnNUfch3eQJyoXaJGOSbSI4CntbBNY7NBHbipmEo6', '12', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(5, 3, 'OZ4W79XoHN', 'M7tF3Te5Gs@gmail.com', 'zFVFQpF2dXDRRqbZAYFh63rSl251gCeS92En8uBTseGOvrNAmL', '11', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(6, 3, 'rQMBX5O9Ye', 'fFDGohwgIK@gmail.com', 'xkwwazjxOptbGvLCpIYy2BPww4bXnpvfcYCmLQEz37seZeJZuF', '12', '11', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(7, 3, 'qKLtYuxkYv', 'SGdEfOaD6W@gmail.com', 'BGpiYCEYFf2rY9pId5RI0WhivCJ2oecbAc2LLjryx635Z52WMU', '11', '11', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(8, 3, 'cCKvMMy5sB', 'lD7B2F1VWN@gmail.com', 'DKiCCtamHOeXRDORaXS3pAu74bhlqAgWejZEnN8dutMliEqZP5', '12', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(9, 3, 'L5Cf6T2Jgi', 'PSzOzqZeYo@gmail.com', 'MYWbc4w2QWUKrJ4bxZZKNF2d88SHYnMxTRS8KwBB6Dn3BtFsMB', '11', '11', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(10, 3, 'YCTIHWSWHs', 'LBRM1g3TSa@gmail.com', '2szaC2aJ5jfMlwGRn30v7faqQM3gK73qDwODUruX5yjxxnXGfY', '11', '12', NULL, 2, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(11, 4, '4KadFkzCW1', 'w2qbOvnFCG@gmail.com', 'pvmmHLbuxWzyKSlaX9rwVl7CWmhIFHJZM194ibyT8j34WBfoRW', '12', '11', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(12, 4, 'SlzoPn7oWM', 'UlBtzkemwb@gmail.com', 'V9Cp9u1sq07pCF5aqgraj2jqUqJX9hwYuZwIrOxJ98Gb5vckGg', '12', '12', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(13, 4, 'NCb1wTvez0', 'Jc5gP4ORX2@gmail.com', 'FGnZvZ5VJkDpq3P8pZ5BaJ3EILttvNGkbjckdk1JCT0DWyPKkI', '11', '11', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(14, 4, 'bzZvms3fjc', 'w5ZHSf4GgH@gmail.com', 'FQMB1NDpXj0GINyz4czkNhSpxPo5ub2IeMhw9Vh4d8S2RVBa9C', '11', '12', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(15, 4, 'agC0gjj6mt', 'VqVB7WtuYj@gmail.com', 'iQ0lxJ4muZDkdJhXbMKQP7BXkCXOCPnTW2ySNnGSGA6C8A6URc', '11', '12', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL),
(16, 1, 'u50Y68uCgw', '9UfppLX1fL@gmail.com', 'h2vkeTJFN1ouQ4tDKqlpkM5iW264P02K4IWfvcnKNtN2ac2rxa', '11', '12', NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_rolls`
--

CREATE TABLE `employee_rolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_rolls`
--

INSERT INTO `employee_rolls` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Accountant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(3, 'Nurse', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(4, 'Laboratorist', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(5, 'Pharmacist', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(6, 'Receptionist', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(7, 'Representative', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL),
(8, 'Case Manager', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generics`
--

CREATE TABLE `generics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generics`
--

INSERT INTO `generics` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PLENAXIS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(2, 'ORENCIA ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(3, 'ZIAGEN', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(4, 'YONSA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(5, 'GELFOAM DENTAL SPONGE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(6, 'ACTIQ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `today_date` date NOT NULL,
  `today_time` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `mail_to`, `subject`, `message`, `file`, `today_date`, `today_time`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'cohecelak@mailinator.com', 'Dolor veritatis ut l', '<p>hi i am komlo</p>', NULL, '2021-01-21', '16:35:32', 1, 1, NULL, NULL, '2021-01-21 10:35:32', '2021-01-21 10:35:32'),
(2, 'huxymy@mailinator.com', 'Quae consectetur no', '<p>jdkfljkldjfkldjfl</p>', '/tmp/phpTpYVGx', '2021-01-21', '16:45:31', 1, 1, NULL, NULL, '2021-01-21 10:45:31', '2021-01-21 10:45:31'),
(3, 'homer@mailinator.com', 'Est numquam nulla qu', '<p>ffff</p>', '/tmp/php67wuyt', '2021-01-21', '16:47:55', 1, 1, NULL, NULL, '2021-01-21 10:47:55', '2021-01-21 10:47:55'),
(4, 'judi@mailinator.com', 'Sed doloribus vitae', '<p>fff</p>', '/tmp/phpifhwXt', '2021-01-21', '16:49:40', 1, 1, NULL, NULL, '2021-01-21 10:49:40', '2021-01-21 10:49:40'),
(5, 'fereh@mailinator.com', 'Laborum rerum ipsum', '<p>&nbsp; &nbsp;x</p>', '/tmp/phpwcQYFw', '2021-01-21', '16:53:05', 2, 1, NULL, NULL, '2021-01-21 10:53:05', '2021-01-21 10:53:05'),
(6, 'gusi@mailinator.com', 'Amet commodi magnam', '<p>jjjjj</p>', 'backend/files/mail/mail_1611288486.zip', '2021-01-22', '04:08:06', 1, 1, NULL, '2021-01-21 22:10:57', '2021-01-21 22:08:06', '2021-01-21 22:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `mobile`, `email`, `address`, `details`, `picture`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'IevFdt2kpG', '11', 'XNS0Xmhqar@gmail.com', 'WjibkKYGz9eyfGlhHjWn', 'TJcFTvdJKTNFeRH4CrZn', NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, '1gfRZQTsg9', '11', '0zGwA9hxrJ@gmail.com', '3RLJ5U1bdfRv8exzzDis', 'Y5R731FrIpCDZUSg1Rrt', NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 'lEOaMebJu7', '11', '0BktzJAxeP@gmail.com', 'ze1hL09aE40qMcipKEBR', 'QNPDYTRcAvmEPkkQOWXC', NULL, 1, 1, NULL, NULL, NULL, NULL),
(4, 'oyRrbo7wLq', '11', 'iCMJx4lOVv@gmail.com', 'BKgxX6VhD5DyVm9MaUYG', 'FbnvMiNiqC4BknwUBpPL', NULL, 1, 1, NULL, NULL, NULL, NULL),
(5, 'z2s2OCkC7P', '11', 'XDyTS7XYEv@gmail.com', 'o9XBHhcXFlI2WnHZdhSU', 'lLLjrOAfe8sYe9Bzcelp', NULL, 1, 1, NULL, NULL, NULL, NULL),
(6, 'vdNmXs5rwB', '11', 'zWQvEip3f2@gmail.com', 'fhlRHl3LSpDLCSr9MHPI', 'fDiwDztvIEwAfjx6xqTS', NULL, 1, 1, NULL, NULL, NULL, NULL),
(7, 'n0xohzZl1T', '11', 'jYn6gHRwmy@gmail.com', '81bkWFQhzlJYDSdLp8bH', 'j89wca8O2NX5S0zkCFil', NULL, 1, 1, NULL, NULL, NULL, NULL),
(8, 'mbVwFGBxk8', '12', 'djNb8psNNL@gmail.com', 'fI6EGxWbMACgaIrLaBCY', '9ujug1lQlLy0BdsEzQSq', NULL, 1, 1, NULL, NULL, NULL, NULL),
(9, 'JZiCqUztyh', '11', 'pxszPgmMER@gmail.com', 'DAopPahgUJTtxMd5zpoj', '7Kc3iWY60nR57PhjrmyY', NULL, 1, 1, NULL, NULL, NULL, NULL),
(10, 'wb3eK5ExEV', '12', '7BKQ9jqYgI@gmail.com', '2yvNNWGJPqSxS6OAto4s', 'pQ67W07nMhRVfIoCoBYC', NULL, 1, 1, NULL, NULL, NULL, NULL),
(11, '42HXJMB1JR', '11', 'SETJ3ZFRsO@gmail.com', 'gWhFrgatzlmi9d7rcT5E', '11UW9tBSFclovsvSRpjx', NULL, 1, 1, NULL, NULL, NULL, NULL),
(12, 'DxkbEE4g9d', '12', 'CdcDDc3Lxo@gmail.com', 'JIfP0V4UgT8u6w3WcjEX', 'I83WJD2vxScCwLjN9FCh', NULL, 1, 1, NULL, NULL, NULL, NULL),
(13, 'GpzCdfQtVe', '12', 'qH19xSH7rV@gmail.com', 'crq49lVzduoX7dEt7HeC', 'iTG7DL2E6y8G6tLh9WAu', NULL, 1, 1, NULL, NULL, NULL, NULL),
(14, 'oC1bATnwLi', '11', 'PwEZZxVpmf@gmail.com', '4WkaDj8TmOwdekl21zCj', 'jXHijbdXevpDx7o8CcYW', NULL, 1, 1, NULL, NULL, NULL, NULL),
(15, 'Ri1t6zFpaQ', '11', 'GtEwHInyLF@gmail.com', 'RLt0y9HjxQJEImL8hvmt', 'o0H2LmK5MnCqWk4Bqppr', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `generic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `manufacturer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `type_id`, `generic_id`, `manufacturer_id`, `sku`, `tax`, `details`, `picture`, `per_box`, `price`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'XzAughEFtv', 1, 1, NULL, NULL, '2', 'koFwoBtfrTCoJysZHDVcloKS3nqkW1YE8sOmGV6gqg6lQ5ivowhOqufvhot20uFT7JqligQuVjgo18IZcZxlow71EArIawWLCTkr', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(2, 'jgKB8ppqGQ', 1, 1, NULL, NULL, '2', 'Rr7j9YPRLvXQmkXi6y8XTWimdVqXl7QeU0mWqf45LDWwGFc9Xo0bOF6aoHKQhbV4zKYKRU1Vt3y3pNgxQ3hVBII6nG7PkIG4yXJS', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(3, 'DY7wTJUjVY', 1, 1, NULL, NULL, '2', 'tq4mNuHtAY2q1czd6AnCKtMRVFVNqknC1nwNhZNyUicalZVipNcGgItkxD01nYsu3pAfkjr4qFOKGHga4zU3Vo5jM5Q8yzIhgcci', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(4, 'IWgUxZvdj6', 1, 1, NULL, NULL, '1', 'EWjZQDUIfm16AWeCGZApU1rHmpzEfUyNgsL7cLwIdTgzkNUO9yE5yxqQGcFcQTD1sd5qlHV3lWzhubVdmyOf7qX1CKENZKRVTati', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(5, 'UgtsdcbN0G', 1, 1, NULL, NULL, '2', 'PE4vmAu1tQOlqOioDBt5PlJv1hhC54myHFuE1PflWVi37dBkVAIDSmuffHdROEqTfj2yWvGb9W0P9lhMDNoqjXdzXi8oShRMNdI4', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(6, 'QNFhxKOOFt', 1, 1, NULL, NULL, '2', 'iNUg23KzLHbVsCTVea6aBXZKPeUYBhY90iLtx94DPEJ5u3uVs7eCQ1P9SvBu19KM1FaQhR2Ji5APdJXvyjyvT2dyb5lSl3BVSfB7', NULL, NULL, '2', 1, 1, NULL, NULL, NULL, NULL),
(7, 'Hj4EEIl49L', 1, 1, NULL, NULL, '2', 'vQkXiELjmqYvn9XMyw9Vr0XBd29lca9QV9T7s4I2ymBpAfFKY6wNbSPFX2wtaDmimAhH70VWUG0cCWPy1XpkocMjqPMGXHi3Qr33', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(8, 'BtEWfO0HPH', 1, 1, NULL, NULL, '2', 'CCzOHWhMvZAani1URadS1awWJDKxp5MHZmu6RLvZrovJkmm0IaTvJqSKDtB9JH81VeZ8aCftFXRwHTzLsLgFfhKiRt7NfJomISLj', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(9, '7XKHIPm1AK', 1, 1, NULL, NULL, '2', 'S2wfVb35lkd7ZT98LsC6XXjreTSEGxQJHJLKXJM3vWM4bH2JNyJoZD6SBItohPiinqzWRu5aAcjyAKBiOIV3zBAO7WE6t6m3WX4j', NULL, NULL, '2', 1, 1, NULL, NULL, NULL, NULL),
(10, 'Y97pxmByVZ', 1, 1, NULL, NULL, '2', '1UZOYr51DlSIWXioXddC8ZnIIPqO3e7g9NtyIV4tNqf1fKjaPQncEEnuJNQlXWFuILyNEpfIQwwe8FsVPH0f5qH8AdUreTckCXX7', NULL, NULL, '2', 1, 1, NULL, NULL, NULL, NULL),
(11, 'FkKHMQppmj', 1, 1, NULL, NULL, '1', 'TfKsIehCe5CXRMuk6W6AcPOZ56NGoPtemhwWFm0uV7Mo1Cny2hKYDyhxm9dXbJet07qmUoZt1fIhs5aiUOJSagSH2RK9uWv0S8s8', NULL, NULL, '2', 1, 1, NULL, NULL, NULL, NULL),
(12, 'VkGLcb2iWp', 1, 1, NULL, NULL, '1', 'ydEFCBc0Y0qakrTEJ2xgunZHu95gkgxxcLX944U3Fhx0lT75msQj6Ib4fHiacLRrZl3hNJX8a01KhKYHeq87mEWBLFjO3PIIjWNF', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(13, 'knjhUs0aVl', 1, 1, NULL, NULL, '1', 'TKTomQlOZlkVCN232mQmplIOwFziqnLMAfxgkQKOzZLRk7mroGGgQ5Fz8ktDSddQbgCvhPYBT31GwZXp0zotgk5yW1ga4VBdyDbZ', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL),
(14, 'pPQyW3eeKi', 1, 1, NULL, NULL, '1', 'qVpypuyuyL9cBrn979waHVhtCoMz4rlboZsyTt9ttG9XUyRUNkNDqslnlOqMeE0WgAMVrG4mDpaGz8XrasbU0Cmg9KJbEdrGlC75', NULL, NULL, '2', 1, 1, NULL, NULL, NULL, NULL),
(15, 'YUAzDRj2Od', 1, 1, NULL, NULL, '2', 'iJ4xrFrE6UXCWmyydMKGYeA2ffmGcDNvg6z2tlImnhT8W7diFu7FwaAHwgvezFpvEGKqotbUy3ubdZk7Hc1VfWoUyr1eQryjTrsg', NULL, NULL, '3', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_types`
--

CREATE TABLE `medicine_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_types`
--

INSERT INTO `medicine_types` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Liquid', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Tablet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(3, 'Capsules', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(4, 'Inhalers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(5, 'Injections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL),
(6, 'Drops', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(993, '2014_10_12_000000_create_users_table', 1),
(994, '2014_10_12_100000_create_password_resets_table', 1),
(995, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(996, '2019_08_19_000000_create_failed_jobs_table', 1),
(997, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(998, '2020_12_06_092536_create_sessions_table', 1),
(999, '2020_12_06_092954_create_bloods_table', 1),
(1000, '2020_12_06_104953_create_doctor_departments_table', 1),
(1001, '2020_12_07_195447_create_doctors_table', 1),
(1002, '2020_12_10_071754_create_patients_table', 1),
(1003, '2020_12_12_021228_days', 1),
(1004, '2020_12_12_021229_create_schedules_table', 1),
(1005, '2020_12_12_111859_create_appointments_table', 1),
(1006, '2020_12_19_184713_create_new_appointments_table', 1),
(1007, '2020_12_22_150408_create_tests_table', 1),
(1008, '2020_12_23_145913_create_patient_tests_table', 1),
(1009, '2020_12_23_195920_create_medicine_types_table', 1),
(1010, '2020_12_23_200029_create_manufacturers_table', 1),
(1011, '2020_12_23_204748_create_generics_table', 1),
(1012, '2020_12_23_211752_create_medicines_table', 1),
(1013, '2020_12_26_152514_create_prescriptions_table', 1),
(1014, '2020_12_26_152603_create_prescription_medicines_table', 1),
(1015, '2020_12_26_222523_create_employee_rolls_table', 1),
(1016, '2020_12_26_232459_create_employees_table', 1),
(1017, '2020_12_27_044303_create_settings_table', 1),
(1018, '2020_12_27_202006_create_account_types_table', 1),
(1019, '2020_12_27_202713_create_accounts_table', 1),
(1020, '2020_12_30_074501_create_payments_table', 1),
(1021, '2021_01_04_083035_create_account_invoices_table', 1),
(1022, '2021_01_04_205600_create_account_invoice_details_table', 1),
(1023, '2021_01_06_215948_create_services_table', 1),
(1024, '2021_01_07_000757_create_payment_methods_table', 1),
(1025, '2021_01_15_020814_create_mails_table', 1),
(1026, '2021_01_15_021256_create_notices_table', 1),
(1027, '2021_01_16_093353_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `new_appointments`
--

CREATE TABLE `new_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `today_date` date DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_appointments`
--

INSERT INTO `new_appointments` (`id`, `patient_id`, `name`, `email`, `mobile`, `date`, `department_id`, `doctor_id`, `message`, `status`, `today_date`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'trbb1G87C2', 'v2KcsZztud@gmail.com', '12', '2021-01-23', 1, 1, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:10:30', '2021-01-21 23:10:30'),
(2, NULL, 'iVO4yTvCCs', 'UApywNHMch@gmail.com', '11', '2021-01-23', 2, 2, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:11:29', '2021-01-21 23:11:29'),
(3, NULL, 'ZTbvqsyJ3Z', 'zCxrDBjTXk@gmail.com', '11', '2021-01-23', 2, 2, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:12:00', '2021-01-21 23:12:00'),
(4, NULL, 'QO5BITw35Q', 'M4Fmnt8Xdp@gmail.com', '12', '2021-01-22', 2, 2, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:12:40', '2021-01-21 23:12:40'),
(5, NULL, 'QO5BITw35Q', 'M4Fmnt8Xdp@gmail.com', '12', '2021-01-23', 3, 3, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:13:01', '2021-01-21 23:13:01'),
(6, NULL, 'QO5BITw35Q', 'M4Fmnt8Xdp@gmail.com', '12', '2021-01-24', 3, 3, 'hi i am a patient', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-21 23:13:46', '2021-01-21 23:13:46'),
(7, NULL, 'Christine Mclaughlin', 'zobenyvawi@mailinator.com', '43', '2005-06-26', 1, 1, 'Commodi quis earum d', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-22 01:51:08', '2021-01-22 01:51:08'),
(8, NULL, 'Christine Mclaughlin', 'zobenyvawi@mailinator.com', '43', '2005-06-26', 1, 1, 'Commodi quis earum d', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-22 01:52:46', '2021-01-22 01:52:46'),
(9, NULL, 'Mohammad Oneill', 'pogy@mailinator.com', '65', '1977-08-05', 1, 1, 'Voluptatum illo quod', 1, '2021-01-22', NULL, NULL, NULL, '2021-01-22 01:53:33', '2021-01-22 01:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `today_date` date NOT NULL,
  `today_time` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `name`, `designation`, `start_date`, `end_date`, `today_date`, `today_time`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'party day', '<p>dfjdlkfjdlkfjlkfj</p>', '2021-01-29', '2021-01-29', '2021-01-22', '05:17:08', 1, 1, NULL, NULL, '2021-01-21 23:17:08', '2021-01-21 23:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `blood_id` bigint(20) UNSIGNED DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `today_date` date NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `code`, `name`, `email`, `address`, `mobile`, `phone`, `birthday`, `gender`, `blood_id`, `picture`, `status`, `created_by`, `today_date`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '92Egvr', '3FFk8jplwE', 'BThlSdQu8Y@gmail.com', 'oJrLQJeszkLr7n4nZuIV6odq0BcistWDx239pkRLN3Nhg31ARI', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(2, 'MzjPvE', 'Nd3z6bPLCJ', 'DLxU13mYRm@gmail.com', 'VsIXdPPVwICsh2fhcnoFIWEq3xSKyWW7gxU0bVSfWbXT8RCvg5', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(3, 'RrripS', '1FqfC2nqOl', 'lfPTyQ3oQG@gmail.com', 'DlhMRI5c7QTqF9EHNdHuxlXVhTInIGXMF9UxzbLMGertjnYxLw', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(4, 'jvpQbi', '9PXPf7Bt0k', 'Tu7oOBdEpN@gmail.com', 'ebxAMkp2ssEKBQa9FWiHZEoHPwaM99soI8KB74pW2zMCCfzElX', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(5, 'zNxCOJ', 'umrG6w9yUM', 'JE84Wm2tvj@gmail.com', 'VT407VswfRFMAO5HdcU61mejtcX8KPClSJg1jbtt6ZkWapuMk9', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(6, 'Ze2vWX', 'KRSf9LZZH0', 'eVTC4FHnDi@gmail.com', '5zfSOer4dzlverdXZjaEjqYbhDr368H93HWBW2ITPf0ESTcbP8', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(7, 'fUkEPV', '3h5QvtcwfT', '2Y0bkZL0da@gmail.com', 'lHxJsfjNUeN8DHKVuW3F9R2kahlufEXiiSgXLEDyZBKHNs3PuS', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(8, 'HKCInJ', 'tjH1jV8Dye', 'tktsyDXC0g@gmail.com', 'KMWcpEI3CKXiTL04FXEnFCxB1XmHSagUQRoXtEgxNf0qCr3qCW', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(9, 'YMdV9f', 'X42IoQKrDV', 'oBoxVhroCA@gmail.com', 'A20GEEcnoFBzkGfTTEdLBlTkBg86Q4IZFIUqW1DlRYp68jDzTP', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(10, 'tgzpeU', '4vRCME3W1I', '3Ht4rYBDxQ@gmail.com', 'jLBi5TaiRiv2HsqMN3CRLnue12IwE9cxGG5P9tZAKoGU2ITomk', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(11, 'eVfG6N', '1k5yn72cex', 'xQ4eJlkD98@gmail.com', 'eXh6jc4oy8wdYe24nLEbrtDJ6hVO3jbmV88Cjoaq49RyYZHo69', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(12, '7N8bNs', 'yMlvZTlIU4', 'weH7JWTO9k@gmail.com', 'RlxDNvgXIAIobWUMO0KPlmtBy5A3RelytFcrpiL05minjG7h2Z', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(13, 'DaCRSW', 'cz5b7kXB3U', 'YwtAT58ZxS@gmail.com', 'qOnB0lTkkP0Wfv4nauK4BTVuZTGWfIR4jGslksNSaZdzdTYBNn', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(14, 'nWlWp9', 'i1hnyb8zWJ', 'zcX5jALGM5@gmail.com', 'D5oJmGP530ZdCwSWTzHnwN9aeJJ9plGQo3DXJxZqFPetwbCoxO', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(15, 'cZOWeV', 'RmknviWJt4', 'FkPx5ZWeDa@gmail.com', 'UTBNpi9GMwrZab4VHQprCtde0eaWYDmrnfm9oU26MxCTdg2SjU', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(16, '2Na1VP', 'P36AJt2vb9', 'MEZERl7tGl@gmail.com', 'mCtfh02ZvNGFAHCuI3Iyu9m9WdQ3k86oFkmoreQ4e4oiXOY3DW', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(17, 'NqtRQA', 'tHxtCfVZZn', 'sVRl4XTnoy@gmail.com', 'vHzm58Kobe6953j3jBSOU6Y1kcVsFzCwDiiU7vdmWvnHZ5qw7Y', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(18, 'b1Cd6a', 'njXoCNVBGC', 'DcyVyTmq6a@gmail.com', 'mUMrDCbq13wDgtRUE8AnYPhjpg69utPv7XGg61ku2tLvDEgurX', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(19, 'XMFK1p', 'PaLMF1SkTV', 'I1M3SbgDFC@gmail.com', 'PyP23SzklYA9JrrBtQCJYXDYAVaHakMStbAYsxMhCefFAlbb6T', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(20, 'kOA8Eb', 'REsjzu2dnW', '7DeT2AEQhQ@gmail.com', 'JHF0rjAuMGIWdZPS7Xig0qEkQzUZpP0BnCtOduSztgXVwuVlg9', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(21, '80kP9v', 'KYlwyJjb3h', 'F23kxDBjFh@gmail.com', 'rkfz2kEzFsjJpIhE2ci1CH3HZjWuXGRYSb8g5BYhuOQ6gUFjAe', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(22, 'Ynf2NZ', 'dBX8ZpYg5A', 'GoqKYu0pBb@gmail.com', '3JnXvveTIa4Ibbg1Xv3o3wQvpp27qprdqBEOWsC9jzyqgBRgaz', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(23, 'wuC0ib', 'KnMcHzxrGM', 'P5a8IqxYyR@gmail.com', '3YJfdMUvQJ0Wc353wnOCabFLJiwakp8iugxMqcE2yjWWTCaswY', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(24, 'Pel2ur', 'jbW78TL8w9', 'v7cTumkBWb@gmail.com', '4EfxrTr7bNWiMENu9Ak04fd77OD0GSdzpDsbQmNhl7TkoEDJMS', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(25, 'kYWBTs', 'XW3lOGtstY', 'szQi81Ly9V@gmail.com', 'Al08RoSos1wYZJOJW7Bt101dp06T1WMTsiegM8VKHjVJgERHjg', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(26, 'lcRZeh', 'YiXdMY7qz0', 'ytbufrDXLa@gmail.com', 'HR5gdTHQOJeUasPiiLsRCMfkUaHixm0f72tFh1MvQzzRwbML1i', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(27, 'uxUXCu', 'lsBIBuQsaG', 'gjPZDMJQNN@gmail.com', 'GH2oMwb7f8Zpj4n6nDEMYvbHdzhLmj8QZm1NJtBOGoISTNBkB2', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(28, 'EvTz8S', 'PlQnAVLM9j', 'NfySVluy3p@gmail.com', '77CJ4YWeoNOBIA6SKbrcpAWw8zk1G0lw63g8dw6IwfwphRdo6k', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(29, '9RDZn7', 'aKwcafnRUL', 'Tu6bLxRu8R@gmail.com', 'tYN133rShXJb71BRx3C450gvONTZZgGVm9QtWHqTKpVW7pstcR', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(30, 'KkEPIV', 'alt2EDeOKi', 'eaBydYd5Ip@gmail.com', 'hQk8KOjYFV5R5sizr1VgvCJtVmSacSPPQO6mLecCOz4rSrHil9', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(31, 'Xhbqu4', 'D02dRKp5o6', '9pNUcMt7EF@gmail.com', 'dVjzFCiiBcNKpskoodPmnWYc9DZ35AsNj2VrfD7p2QTzEKXC6N', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(32, 'x11Cwa', 'L6qaKn0TG6', 'QQqLEq5ERG@gmail.com', 'nijR7yf04UHZAS56Vrdcn6z5apKaKKYzfizIBX71XWliEYeMn1', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(33, '4DuxHW', 'czGKR4Oivj', 'EaELXZsf8j@gmail.com', 'seN7lHvLQMvpfjsksBSvFGUU5MYushTRSukOljKfwLFhwimvIb', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(34, 'SMwgl6', 'P43Z1RycOl', 'jNlSgCeQnR@gmail.com', 'MsdxqHp3flJbloUgitq0e1pepg0exUM7eRk7L5yfrNE1YbymN4', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(35, 'Xt5BmT', '1OeWQVJmLs', '8NcM8syS6q@gmail.com', 'VSQ87vipN7WAKtAtk5uQsax1ncUgiOT3riq1RUZNPrp0fRasG3', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(36, '0HhjyF', 'XikTJqd9rT', '9CWoNfng0D@gmail.com', 'BTmfaRbOSadPYOPFBU1hYz5VgJmyjl7abjKPjTh8rUtteMRhtt', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(37, 'OeWTml', '1lLvWTwwZo', 'hCdpheisTM@gmail.com', '87ijSda28htg68OjV33okCPMTZG8qDUqmIfd2taUBoDb8ZFkFK', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(38, 'lcaA7y', 'LBt1GeAvne', '5KzkrDR808@gmail.com', 'YaPsxlVv2Cins5IReiZe8S1H8MM1PQCQ2DQm08m024Ier3Hdq5', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(39, 'H2Ih4K', 'ZANyHZSpVf', 'zpHfoHlKGh@gmail.com', 'ANMFtp1YiUwizZgkfR1pL23xZLqId1x6Y7ECpbcDKXKEGYAkfm', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(40, '30hGOD', 'EAtYtqw2Tj', 'AKpjHrTsrE@gmail.com', 'mMRdc2eyw0CtfAz3Qc1Njm2jLA1wFgJ62WFKv5yzVekwiPD0Oj', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(41, '2oFmsr', 'iNVEffjrOp', 'aZp4CCDlSs@gmail.com', 'Wx5RWqIfuMgRTx6KJnPlusYf0c3n36K5WHQ4n4MzQhnvjqqVo2', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(42, '4CtND6', 'sgGO1z2YRl', 'DS0RoWOFIu@gmail.com', 'FuQjFwIInOOm6p1vB14TOFjN5yXh4H1jmvABZQTOTc02nYmWJH', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(43, '4liaGa', 'rrmIQZ87KI', 'mp62VP5mYE@gmail.com', '0Pne1X9EeXtVkCaWTRLFGDMvFGXdoFdqVnbsXVu969m5xir5xX', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(44, 'F7sCgm', 'kMSIr9gjIf', 'vyWhe31c7B@gmail.com', 'PB7XmbLXtwCQKmEwvz4JBENgNZmoQnyRTcdf4c929I2DUuaJe9', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(45, 'Yexhst', 'erdWy0j8DH', 'Ozgz98xQiN@gmail.com', '94bKEzZScaXGhhynz6njKNuDL1r61nJDtxhrU0YQx7Jk2gSptG', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(46, 'QWoB3H', 'JWUfM03I2o', 'IAJxOG5GTk@gmail.com', 'OvY5oFMwCqX6Ag85N9OWCxweOYeTlhAt8AMayaWHqeDz3Wraw1', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(47, 't00dWM', 'AFrELiJRit', 'V1eUNsfNLT@gmail.com', 'FnHhgW10d7eQkPuiPnW5707kaOB8rlUpBilJwDAWWnaTDKVqnb', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(48, 'de68CW', 'yOZRTbaNIW', 'ahR0tc0Qsg@gmail.com', '5EgwNVSKt0onrwc1P9dpKZ3grcsEJFbvJqADDuUJ2qxNSVFGlQ', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(49, 'Gl5P2o', 'JWWGTb0rWO', 'pRGDFuKLKj@gmail.com', 'LkOziqPGpi6KN2YzN3A3Sb07ZnDrZJiTyMu8wTqsu9oqXOGDof', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(50, '3tDr8X', 'Tj0wVOuwvm', 'sUB7c6wrfl@gmail.com', 'gngbI7Dqy2ba7STy3j5GeJthU76v28B9Jc6cyqUW40ugGeZwAY', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(51, 'ZdKk0X', 'ukQybzvrXA', 'ehOMB6jZhx@gmail.com', 'oEksTNSx3ygkRiWhMvE3Fm58p8tYTsSzCdKErsDx7BcPgpDPrh', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(52, 'grItlX', '4aEcYnLpFA', 'K864HUqiyo@gmail.com', 'mYEdwc898viOhcvqFSz4sZGGk20qCW0FlbwzNRAcMEbQIZPMK2', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(53, 'ots7EJ', 'QTFLPwKujV', 'VykuD48gx6@gmail.com', 'kW59nrVlytvsZglnlncFtZnVbjHX5obrtrM6Pr96Vf31H5GNkI', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(54, 'CpMhUA', 'y9yMqawBm4', 'yuIHiqixqD@gmail.com', 'Nr7LKXjueLpz3VxIeMS2tBLG6Xnovh5N5WatNw8VTES35PbixT', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(55, 'mN4g6I', 'sCTsPSpWlO', 'qOnrUn1Z9K@gmail.com', 'fswplZ97CaciixQ93XNJNj99h6VXwgINgykddziB39MDvRkPMu', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(56, 'ErEvb3', 'i2LizJeOqP', 'zdCRqo4JOx@gmail.com', '5cmRhSYPvdYf63EgQ8GC1odX5HKlyQZvBt7jZxQ94BsXH55lXA', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(57, '8vGZNr', 'XRNBMpk928', 'MookphpW3z@gmail.com', '3oTcd7uNhpsIN9kwBeSlwxsBnQxxJdGWEjO0UOnzVUSw0JFNeI', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(58, 'LIkxKi', 'x0IDbkluBf', 'm4jUpyD9r6@gmail.com', 'AqBqbp1Z3A4J5pS2EVBp7dEU83Wchf1SLYNwir7b1fRzexTjQw', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(59, 'TR4lWQ', 'JOaOmQVhSH', 'mJMZ9hdpf1@gmail.com', 'iQPFmTmX2nzTg5H9wLbQOlibNj1BEqnNVWroPZegMbYeAsVLCO', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(60, 'o7doGS', 'ZaML26qxov', 'iGF3dztDlc@gmail.com', 'zy5fcqPURthBqwHeME3sWpmuIgf7glUvOHwJBFGWpVgHPXOCHo', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(61, '41ydvO', '3tFNbiw7BR', 'MBG2x4ZEN5@gmail.com', 'CXSQW8BkCHXBAxvHVQERVLFuuhKyoroLOCe4mzHqxu51OKVRrj', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(62, '9J7eKJ', 'fKXwUCMNfy', '8gM1nyqYhY@gmail.com', 'm3DCP3dYZWODKKuCyCUAbehYTFDU8Aw13qQZblv8pOntvEaXCk', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(63, 'okGe00', 'NzNdZ4M6l3', 'TK4Hv6dEEF@gmail.com', 'Cplce2k6inQnO84yNzSWHoyqGFXyiW5j2UjZ5kFGOwer9tgnvV', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(64, 'zNrBFa', 'iDhjntKUW8', 'UkLL4AZJLQ@gmail.com', 'ybgpRJOG3CyQNqmP4WET7yMUXCK77gyBzGA9rsC8riV6MoDHxr', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(65, '6Ng2a3', 'n8oe6G4BDo', 'SQdu4X6Qnf@gmail.com', 'e6xtTpPHNCyqG0UYEymqqxe2sjXZRE9oa0mIbN1P1dNiFadkwQ', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(66, 'Sdvu0m', 'N4RKmdLeVO', '4La6iIa8st@gmail.com', 'BFU18AIGdN7gQNXtA0Jp83rjVAWzNIRYMeP6b4fxGeutLkXRJz', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(67, 'lQOYjf', 'WANz9SOC8b', 'nMmabPs2Pr@gmail.com', 'YKS0yW0yUUE0lq7euH6cW4yokSMXWgmJqkbLZWALCmnLpeYb6u', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(68, 'fiVzxD', 'RohIsePpNy', 'cXIM9TLYkj@gmail.com', 'lhrdS6Iw093eVQzFFrWQcZKfDsuNawDsQTLWgGQKRfj7CGhatX', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(69, 'AXhJMh', 'swBzs61dVn', 'SJ5Li69Z6A@gmail.com', 'uQTCuduMY37nigzdJpzyfZhtnM5tgehrgREwjo6V3aiWnelEqt', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(70, 'PuB92D', 'RdtArCrfKA', 'VY9GW8QK60@gmail.com', 'H6m9r0IlTzuosina4PpqzSvno3TRc4sCOPg2Qh8mRvYAbjQdTJ', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(71, 'UrLLna', 'fo87OmrTrq', 'Qqp7wTmXSt@gmail.com', '3YGgKdK6aAioK6cgotEtaRJHTYB0RMU2HI6r0YzIz2ZQL4gUCo', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(72, '4mR0rw', 'iCCZaMgNaM', 'lRsKhtKBVE@gmail.com', 'eemg9kvO0WFhelzCtkUBtPfzRctAzS5UrxAbQm5w5jWotKRQDZ', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(73, 'vaY9P6', 'FbckJt5cIH', 'nYjQPUtrpG@gmail.com', '1VDvQUWRDrJL5V77ahbSfsy32jB4XxVwP7SNOLC06HnPCigGYU', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(74, 'RqR7CH', '0ohG2JBm44', 'HHh9CVLCOD@gmail.com', 'lF3Na1OLVQC5Uu7cEFLs4KvdDUErvlgkHsMUnnQLk9MHs61Yaz', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(75, '4AlHGY', 'a69Z9Ji0cI', 'eZoePa4UDP@gmail.com', 'yRWwdQ9IHR8JYHM4Pz87Cx6W3nan9N0xQC0yqr4zDGZgr8mWBL', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(76, 's0zErW', 'Wv61n5v4VQ', '6bewC2x5KK@gmail.com', 'RWR9tkUQfpMjz7zX67qMi0KfxcVgqDBWJplQu0hIe2tc3nLrNp', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(77, 'NYBTj9', 'qyTInCsthJ', '6ESCTgu5rA@gmail.com', 'MJ5GqFiDh6nYWjtRcb4SxNDDk8es2KA1LHOowcnqOyRNujCHhQ', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(78, 'V7lNFa', 'PM1gg0qooj', 'SR43DbP2gm@gmail.com', 'sIsffQoMFgYVnDjDlzimNHJ02334ecbrltE9WODJP96dizR0OL', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(79, 'lkBWiE', '9Z04kHR51k', 'oN9jBE9rLh@gmail.com', 'K8cd08lQoWiC2EbpqversxXqSgSdTdtAaVIgczVXdBHwFmFlD6', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(80, 'H1zVYf', 'qjfurVtxMo', 'wL4RLWD23x@gmail.com', 'kwhP64T9ApmT7L4BHV9GdqNidtgRAiVkvo68RKBG0na8hfMcMO', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(81, 'QBRFjw', 'NX3SLrQh9G', '2G2i07QSRj@gmail.com', 'UgiSMUzi2FWc322j2ofyoRpwqAx9ubdlsuoUaVZJjaHSWKoFOL', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(82, 'XIRz6y', 'x54rxkUbcC', 'Ijq5Q7y6eZ@gmail.com', 'lxxkHeCukdczPcbZlrb9Pf8YZ29iGQw0kGewFqQ5g9qrSesKWO', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(83, 'MVljJg', 'Hhy3VDmFPt', 'aeIFtaQq8t@gmail.com', 'NYATf7CcbiA6CsqeGapVoTVhwfe2MHP1S2I8tJ2nkxkktjTZvH', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(84, 'gwChna', 'HtsAxxSxBd', 'GrvtT66QIX@gmail.com', 'UyrJFKGXV2qnR4yRPbOGzV78efiw9JfyMEoKfx7QENArWivIWr', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(85, 'oHvqrN', '2MZoWbpbSB', 'xC0YAz2HuW@gmail.com', 'xVEZTQkRPVV7t1YNWdaZwLKbziiAHQ6g8zDt0PZwnup4uVpnxz', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(86, '0oajWl', '62gGxzwn0d', 'kDoauLOZYW@gmail.com', 'BlUprFI76jcavWebr3zgkkjQX6DCgObl96Bmuk3U2WV53gKuCM', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(87, '3gkRAE', 'bSolC2uh1O', 'yJc3kcFNuS@gmail.com', 'oiXw5Ijb7qw5GsCckUQ95e5B6gtRbtvhJ2q96cijPGHUjiZdsU', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(88, '9GjdM6', 'FD45U1LGRq', 'MhrjjDB4HY@gmail.com', 'e3hNQ7GxgPN7iNf8eppWt21jlnikqitSmquZLUiHQgFXvlVPu1', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(89, 'DnSt3E', 'ysKre3wqwP', 'BuevuQrLIE@gmail.com', 'kWAOmShDersHJH5jl4mQgXPhu143CvR6Fw9avnW5B0yihAye7x', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(90, 'UjEISN', 'ZJZ24m5TtN', 'fchhggKzOW@gmail.com', 'I3RN4znTomzCRwQpkKzpdF90xAzBsM9WOeOGU4gNz48jiY9nPt', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(91, 'zP8Gjz', 'hAZvE1KPeH', 'vRIuaaVYMz@gmail.com', 'wEZ8p7mjVd6mCJoEX3G7YnkEtVbVEpCdHJLEJJOqLanWsKLjw7', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(92, '6SkFm7', 'ySbxSDa84i', 'neuP6jmbcv@gmail.com', 'FAPBI4fI8zYl3fpTcQ1xbpWNKa3SgzAhXtxB3RGgDp4Eweh5L3', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(93, 'c49AFv', 'OHk2p9gJfW', 'PnlSMbdc6I@gmail.com', 'SMJhBD5dZo8RP3G5iCCN0EdCANjshFq1sEtzCzvW26WAvdrPj8', '12', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(94, 'fLNZfF', '4NRqtE2Xnd', 'US8sYhKgRg@gmail.com', '0T4ktUaJTHLhB6lKio0MohV22o5RCLkgWfF3FxMNT0pdzzabra', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(95, 'R43oGc', 'ZfcpOG7HU0', 'Dndl5WP5kn@gmail.com', '6Epqd8Y8R0rgAHLek3C7XLc6A6aYhR7uCzHvuXRsqf3EboCJ56', '11', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(96, 'f9wkrk', 'HKmsmucqvw', 'X7o3ZdH5Xn@gmail.com', 'Q0wQnHIBgZvkpwqw6vBvndUQMmsWeP3zWOy3LJKvR0aQIEvqDD', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(97, 'OLQzJx', 'QO5BITw35Q', 'M4Fmnt8Xdp@gmail.com', 'ryUh1x9iiwd0WOEensLmqYzN67gyk9YPsQ4NCaJTb6u0UcjaQr', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(98, 'a6BhgR', 'ZTbvqsyJ3Z', 'zCxrDBjTXk@gmail.com', '39XWkLVmA1Ch0vb8HBtdMxoaib9Hv23M1XLJoDZPBINufklue5', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(99, 'd8jn2j', 'iVO4yTvCCs', 'UApywNHMch@gmail.com', 'pxMP1RTe1poFkgXouxQkI190eGp1WrdoL7HVNSm2CrkBTMikDu', '11', '11', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(100, 'gc2a2S', 'trbb1G87C2', 'v2KcsZztud@gmail.com', 'MU4jGxmNvrEp6ICLGh91EYFy4BapsloBtMyKoqjjtstfNrT9GD', '12', '12', NULL, 1, 1, NULL, 1, 1, '2021-01-21', NULL, NULL, NULL, NULL),
(101, 'ZRVDGLb', 'Christine Mclaughlin', 'zobenyvawi@mailinator.com', NULL, '43', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-01-22', NULL, NULL, '2021-01-22 01:52:46', '2021-01-22 01:52:46'),
(102, 'yUaWNYI', 'Mohammad Oneill', 'pogy@mailinator.com', NULL, '65', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-01-22', NULL, NULL, '2021-01-22 01:53:33', '2021-01-22 01:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`id`, `test_id`, `doctor_id`, `patient_id`, `details`, `file`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'VwH6ZxkHzx', NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, 2, 2, 2, 'MJARvSabeX', NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 3, 3, 3, 'v92jbhDx9H', NULL, 1, 1, NULL, NULL, NULL, NULL),
(4, 4, 4, 4, '3KdJ1dMJ3d', NULL, 1, 1, NULL, NULL, NULL, NULL),
(5, 5, 5, 5, 'LqXuTeLopF', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pay_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `account_id`, `pay_to`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'nZHuWDjZla', 1, 'wuQt2', 'vD3n0izgq4', 1, 1, NULL, NULL, NULL, NULL),
(2, 'H2wOAUogsN', 1, 'yt7lA', 'qUgodoqGuR', 1, 1, NULL, NULL, NULL, NULL),
(3, 'GImnKptz4Q', 1, 'ADab6', 'xInq7sa8R2', 1, 1, NULL, NULL, NULL, NULL),
(4, 'GnyWQStrjC', 1, 'agFrM', 'Qz8guLxwSP', 1, 1, NULL, NULL, NULL, NULL),
(5, 'U0RVUrGYgU', 1, 'cQa89', '2DpNSmt5Uo', 1, 1, NULL, NULL, NULL, NULL),
(6, 'jBmFVFsmqi', 1, 'leEPh', 'W3iw5HMbrR', 1, 1, NULL, NULL, NULL, NULL),
(7, '0s2HjWW1ad', 1, 'PtVnK', 'x1qt6xw3If', 1, 1, NULL, NULL, NULL, NULL),
(8, 'fI4I7lwQSg', 1, 'hzjXr', 'qx2rBJtBns', 1, 1, NULL, NULL, NULL, NULL),
(9, '1gjawqWgkw', 1, 'RQ4zB', 'y3C4ZYlcHU', 1, 1, NULL, NULL, NULL, NULL),
(10, 'qmK5OqITGA', 1, 'DQSh5', '9PuofnUyKO', 1, 1, NULL, NULL, NULL, NULL),
(11, 'h07xLvP1ED', 1, 'mkLoB', '3C9Dn6zQKh', 1, 1, NULL, NULL, NULL, NULL),
(12, 'IuwGaPSWKY', 1, 'ouC7m', '7OepIRL2E0', 1, 1, NULL, NULL, NULL, NULL),
(13, '3lZ3rHRsmt', 1, 'n2aia', '5AuHpb0UK8', 1, 1, NULL, NULL, NULL, NULL),
(14, 'ZYojjT5rl1', 1, '1rwGu', 'dIth4VaNTy', 1, 1, NULL, NULL, NULL, NULL),
(15, 'i78eZqVjvm', 1, 'wuyQj', 'BPEtG2Xpr4', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'egFKIswJlW', 'fxvQCBi7VDYFQQTnRM2noCnfqDDDwiAKDMKqxipv8vVlWazIa1', 1, 1, NULL, NULL, NULL, NULL),
(2, 'AwtXPv4EXM', 'CtfYbfiIdM9exDCATM27TRiMEgiCR2OBMpDhWhJCQx5NtsR0JJ', 1, 1, NULL, NULL, NULL, NULL),
(3, 'ttLSt39uQa', 'xVoHjT1uMPUf1unEP5oUCQ10Ro69hSyjHM7RlM6R89vYooEngb', 1, 1, NULL, NULL, NULL, NULL),
(4, 'SeSp7ZvoFc', '4nRdwm5bXQUQ9R0PvDliQp22jBCoJcz6eyvWT1yXHWtyAqqfeu', 1, 1, NULL, NULL, NULL, NULL),
(5, 'FQhQ5SGiEH', 'ynHmIM22NDf8y6hO9zjGuinHHrKajzUK7zklMSXNJz3d6yde4t', 1, 1, NULL, NULL, NULL, NULL),
(6, 'KtrgV2YnSD', 'HWzScBPv1Dz4L8Fv1oULPoDXNTMge3RzHhlTRCnQh99zE0D5If', 1, 1, NULL, NULL, NULL, NULL),
(7, 'D49XX2wXaC', 'yX3VxVoVx7S8X9mtkIK6vRnPXs999ZLzUXN19xZ48wUwB1f3CV', 1, 1, NULL, NULL, NULL, NULL),
(8, '9dfeAq0o4m', 'J28ZTUWoruqQXQBE9wQgGtKsmZLOhbDDAuiWEO9lxL6mk9fqPt', 1, 1, NULL, NULL, NULL, NULL),
(9, 'KzcKue8s9l', 'PVDQNKs7G12T0IqH7i3D5OZModqRmkZnM960bnxGW5vuvR8L9j', 1, 1, NULL, NULL, NULL, NULL),
(10, 'nUunOYWBLI', 'NzXgnL0Cceujy3cuRlGTb6R5tC9VBTD2dem6P02d4Bt3EzAx94', 1, 1, NULL, NULL, NULL, NULL),
(11, 'y0gRBDALzp', 'xqZdT4LL0o522OvdBwpe9wVWSZeFOu9vBBVUVYq3bwlHYspkkL', 1, 1, NULL, NULL, NULL, NULL),
(12, 'zvGm3jDK7W', 'bLfH4CfbEQoiTwSQENcUuaa0Bb7ZNROf1Xbogxxpm5roYWPB0A', 1, 1, NULL, NULL, NULL, NULL),
(13, 'pXASvfPKSK', 'zxCThYT1d4BqjPIHx9H1TUKAdnxq8Zyzhb5Fc6yX9K8MnGLoY6', 1, 1, NULL, NULL, NULL, NULL),
(14, 'lhk43wRxTp', 'yYh5HhTlQU9seQdm2TGq32aBLgmzDjkJ2k3Ek1DV114z9ZzuEb', 1, 1, NULL, NULL, NULL, NULL),
(15, 'o07Xoij2G3', 'yZFFTaHOQ8TKqXOQBAZ3lBcrBlr6Zvp8lMyWeoAmeSlOMm5bB0', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `module_name`, `details`, `type`, `created_at`, `updated_at`) VALUES
(1, 'RBAC', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(2, 'Role', 'web', 'RBAC', 'FEATURE', NULL, NULL, NULL),
(3, 'User', 'web', 'RBAC', 'FEATURE', NULL, NULL, NULL),
(4, 'User_Access', 'web', 'RBAC', 'FEATURE', NULL, NULL, NULL),
(5, 'Add_Role', 'web', 'Role', 'Add_Role', '1', NULL, NULL),
(6, 'Delete_Role', 'web', 'Role', 'Delete_Role', '4', NULL, NULL),
(7, 'View_Role', 'web', 'Role', 'View_Role', '5', NULL, NULL),
(8, 'Add_User', 'web', 'User', 'Add_User', '1', NULL, NULL),
(9, 'Delete_User', 'web', 'User', 'Delete_User', '4', NULL, NULL),
(10, 'access_for_user', 'web', 'User_Access', 'access_for_user', '1', NULL, NULL),
(11, 'Department', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(12, 'Department_Add', 'web', 'Department', 'FEATURE', NULL, NULL, NULL),
(13, 'Department_List', 'web', 'Department', 'FEATURE', NULL, NULL, NULL),
(14, 'Edit_Department', 'web', 'Department_List', 'Edit_Department', '2', NULL, NULL),
(15, 'Status_Department', 'web', 'Department_List', 'Status_Department', '3', NULL, NULL),
(16, 'Delete_Department', 'web', 'Department_List', 'Delete_Department', '4', NULL, NULL),
(17, 'Doctor', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(18, 'Doctor_Add', 'web', 'Doctor', 'FEATURE', NULL, NULL, NULL),
(19, 'Doctor_List', 'web', 'Doctor', 'FEATURE', NULL, NULL, NULL),
(20, 'Edit_Doctor', 'web', 'Doctor_List', 'Edit_Doctor', '2', NULL, NULL),
(21, 'Status_Doctor', 'web', 'Doctor_List', 'Status_Doctor', '3', NULL, NULL),
(22, 'Delete_Doctor', 'web', 'Doctor_List', 'Delete_Doctor', '4', NULL, NULL),
(23, 'View_Doctor', 'web', 'Doctor_List', 'View_Doctor', '5', NULL, NULL),
(24, 'Patient', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(25, 'Patient_Add', 'web', 'Patient', 'FEATURE', NULL, NULL, NULL),
(26, 'Patient_List', 'web', 'Patient', 'FEATURE', NULL, NULL, NULL),
(27, 'Edit_Patient', 'web', 'Patient_List', 'Edit_Patient', '2', NULL, NULL),
(28, 'Status_Patient', 'web', 'Patient_List', 'Status_Patient', '3', NULL, NULL),
(29, 'Delete_Patient', 'web', 'Patient_List', 'Delete_Patient', '4', NULL, NULL),
(30, 'View_Patient', 'web', 'Patient_List', 'View_Patient', '5', NULL, NULL),
(31, 'Schedule', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(32, 'Schedule_Add', 'web', 'Schedule', 'FEATURE', NULL, NULL, NULL),
(33, 'Schedule_List', 'web', 'Schedule', 'FEATURE', NULL, NULL, NULL),
(34, 'Edit_Schedule', 'web', 'Schedule_List', 'Edit_Schedule', '2', NULL, NULL),
(35, 'Status_Schedule', 'web', 'Schedule_List', 'Status_Schedule', '3', NULL, NULL),
(36, 'Delete_Schedule', 'web', 'Schedule_List', 'Delete_Schedule', '4', NULL, NULL),
(37, 'Appointment', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(38, 'Appointment_list', 'web', 'Appointment', 'FEATURE', NULL, NULL, NULL),
(39, 'View_Appointment', 'web', 'Appointment_list', 'View_Appointment', '5', NULL, NULL),
(40, 'Test', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(41, 'Test_Type', 'web', 'Test', 'FEATURE', NULL, NULL, NULL),
(42, 'Test_Add', 'web', 'Test', 'FEATURE', NULL, NULL, NULL),
(43, 'Test_List', 'web', 'Test', 'FEATURE', NULL, NULL, NULL),
(44, 'Add_Test_Type', 'web', 'Test_Type', 'Add_Test_Type', '1', NULL, NULL),
(45, 'Edit_Test_Type', 'web', 'Test_Type', 'Edit_Test_Type', '2', NULL, NULL),
(46, 'Status_Test_Type', 'web', 'Test_Type', 'Status_Test_Type', '3', NULL, NULL),
(47, 'Delete_Test_Type', 'web', 'Test_Type', 'Delete_Test_Type', '4', NULL, NULL),
(48, 'Add_Test', 'web', 'Test_List', 'Add_Test', '1', NULL, NULL),
(49, 'Edit_Test', 'web', 'Test_List', 'Edit_Test', '2', NULL, NULL),
(50, 'Status_Test', 'web', 'Test_List', 'Status_Test', '3', NULL, NULL),
(51, 'Delete_Test', 'web', 'Test_List', 'Delete_Test', '4', NULL, NULL),
(52, 'View_Test', 'web', 'Test_List', 'View_Test', '5', NULL, NULL),
(53, 'Medicine', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(54, 'Medicine_Type', 'web', 'Medicine', 'FEATURE', NULL, NULL, NULL),
(55, 'Generic_List', 'web', 'Medicine', 'FEATURE', NULL, NULL, NULL),
(56, 'Manufacturer_List', 'web', 'Medicine', 'FEATURE', NULL, NULL, NULL),
(57, 'Add_Medicine', 'web', 'Medicine', 'FEATURE', NULL, NULL, NULL),
(58, 'Medicine_List', 'web', 'Medicine', 'FEATURE', NULL, NULL, NULL),
(59, 'Add_Medicine_Type', 'web', 'Medicine_Type', 'Add_Medicine_Type', '1', NULL, NULL),
(60, 'Edit_Medicine_Type', 'web', 'Medicine_Type', 'Edit_Medicine_Type', '2', NULL, NULL),
(61, 'Status_Medicine_Type', 'web', 'Medicine_Type', 'Status_Medicine_Type', '3', NULL, NULL),
(62, 'Delete_Medicine_Type', 'web', 'Medicine_Type', 'Delete_Medicine_Type', '4', NULL, NULL),
(63, 'Add_Generic', 'web', 'Generic_List', 'Add_Generic', '1', NULL, NULL),
(64, 'Edit_Generic', 'web', 'Generic_List', 'Edit_Generic', '2', NULL, NULL),
(65, 'Status_Generic', 'web', 'Generic_List', 'Status_Generic', '3', NULL, NULL),
(66, 'Delete_Generic', 'web', 'Generic_List', 'Delete_Generic', '4', NULL, NULL),
(67, 'View_Generic', 'web', 'Generic_List', 'View_Generic', '5', NULL, NULL),
(68, 'Add_Manufacturer', 'web', 'Manufacturer_List', 'Add_Manufacturer', '1', NULL, NULL),
(69, 'Edit_Manufacturer', 'web', 'Manufacturer_List', 'Edit_Manufacturer', '2', NULL, NULL),
(70, 'Status_Manufacturer', 'web', 'Manufacturer_List', 'Status_Manufacturer', '3', NULL, NULL),
(71, 'Delete_Manufacturer', 'web', 'Manufacturer_List', 'Delete_Manufacturer', '4', NULL, NULL),
(72, 'View_Manufacturer', 'web', 'Manufacturer_List', 'View_Manufacturer', '5', NULL, NULL),
(73, 'Add_Medicine', 'web', 'Medicine_List', 'Add_Medicine', '1', NULL, NULL),
(74, 'Edit_Medicine', 'web', 'Medicine_List', 'Edit_Medicine', '2', NULL, NULL),
(75, 'Status_Medicine', 'web', 'Medicine_List', 'Status_Medicine', '3', NULL, NULL),
(76, 'Delete_Medicine', 'web', 'Medicine_List', 'Delete_Medicine', '4', NULL, NULL),
(77, 'View_Medicine', 'web', 'Medicine_List', 'View_Medicine', '5', NULL, NULL),
(78, 'Prescription', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(79, 'Prescription_Add', 'web', 'Prescription', 'FEATURE', NULL, NULL, NULL),
(80, 'Prescription_List', 'web', 'Prescription', 'FEATURE', NULL, NULL, NULL),
(81, 'Add_Prescription', 'web', 'Prescription_List', 'Add_Prescription', '1', NULL, NULL),
(82, 'Edit_Prescription', 'web', 'Prescription_List', 'Edit_Prescription', '2', NULL, NULL),
(83, 'Status_Prescription', 'web', 'Prescription_List', 'Status_Prescription', '3', NULL, NULL),
(84, 'Delete_Prescription', 'web', 'Prescription_List', 'Delete_Prescription', '4', NULL, NULL),
(85, 'View_Prescription', 'web', 'Prescription_List', 'View_Prescription', '5', NULL, NULL),
(86, 'Account', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(87, 'Account_List', 'web', 'Account', 'FEATURE', NULL, NULL, NULL),
(88, 'Payment_List', 'web', 'Account', 'FEATURE', NULL, NULL, NULL),
(89, 'Account_Invoice_List', 'web', 'Account', 'FEATURE', NULL, NULL, NULL),
(90, 'Add_Account', 'web', 'Account', 'Add_Account', '1', NULL, NULL),
(91, 'Edit_Account', 'web', 'Account', 'Edit_Account', '2', NULL, NULL),
(92, 'Status_Account', 'web', 'Account', 'Status_Account', '3', NULL, NULL),
(93, 'Delete_Account', 'web', 'Account', 'Delete_Account', '4', NULL, NULL),
(94, 'View_Account', 'web', 'Account', 'View_Account', '5', NULL, NULL),
(95, 'Add_Payment', 'web', 'Account', 'Add_Payment', '1', NULL, NULL),
(96, 'Edit_Payment', 'web', 'Account', 'Edit_Payment', '2', NULL, NULL),
(97, 'Status_Payment', 'web', 'Account', 'Status_Payment', '3', NULL, NULL),
(98, 'Delete_Payment', 'web', 'Account', 'Delete_Payment', '4', NULL, NULL),
(99, 'View_Payment', 'web', 'Account', 'View_Payment', '5', NULL, NULL),
(100, 'Add_Account_Invoice', 'web', 'Account', 'Add_Account_Invoice', '1', NULL, NULL),
(101, 'Edit_Account_Invoice', 'web', 'Account', 'Edit_Account_Invoice', '2', NULL, NULL),
(102, 'Status_Account_Invoice', 'web', 'Account', 'Status_Account_Invoice', '3', NULL, NULL),
(103, 'Delete_Account_Invoice', 'web', 'Account', 'Delete_Account_Invoice', '4', NULL, NULL),
(104, 'View_Account_Invoice', 'web', 'Account', 'View_Account_Invoice', '5', NULL, NULL),
(105, 'Human_Resource', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(106, 'Employee_Type', 'web', 'Human_Resource', 'FEATURE', NULL, NULL, NULL),
(107, 'Employee_Add', 'web', 'Human_Resource', 'FEATURE', NULL, NULL, NULL),
(108, 'Employee_List', 'web', 'Human_Resource', 'FEATURE', NULL, NULL, NULL),
(109, 'Add_Employee_Type', 'web', 'Human_Resource', 'Add_Employee_Type', '1', NULL, NULL),
(110, 'Edit_Employee_Type', 'web', 'Human_Resource', 'Edit_Employee_Type', '2', NULL, NULL),
(111, 'Status_Employee_Type', 'web', 'Human_Resource', 'Status_Employee_Type', '3', NULL, NULL),
(112, 'Delete_Employee_Type', 'web', 'Human_Resource', 'Delete_Employee_Type', '4', NULL, NULL),
(113, 'View_Employee_Type', 'web', 'Human_Resource', 'View_Employee_Type', '5', NULL, NULL),
(114, 'Add_Employee', 'web', 'Human_Resource', 'Add_Employee', '1', NULL, NULL),
(115, 'Edit_Employee', 'web', 'Human_Resource', 'Edit_Employee', '2', NULL, NULL),
(116, 'Status_Employee', 'web', 'Human_Resource', 'Status_Employee', '3', NULL, NULL),
(117, 'Delete_Employee', 'web', 'Human_Resource', 'Delete_Employee', '4', NULL, NULL),
(118, 'View_Employee', 'web', 'Human_Resource', 'View_Employee', '5', NULL, NULL),
(119, 'Settings', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(120, 'Notice', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(121, 'Notice_Add', 'web', 'Notice', 'FEATURE', NULL, NULL, NULL),
(122, 'Notice_List', 'web', 'Notice', 'FEATURE', NULL, NULL, NULL),
(123, 'Add_Notice', 'web', 'Notice', 'Add_Notice', '1', NULL, NULL),
(124, 'Edit_Notice', 'web', 'Notice', 'Edit_Notice', '2', NULL, NULL),
(125, 'Status_Notice', 'web', 'Notice', 'Status_Notice', '3', NULL, NULL),
(126, 'Delete_Notice', 'web', 'Notice', 'Delete_Notice', '4', NULL, NULL),
(127, 'View_Notice', 'web', 'Notice', 'View_Notice', '5', NULL, NULL),
(128, 'Mail', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(129, 'Add_Mail', 'web', 'Mail', 'Add_Mail', '1', NULL, NULL),
(130, 'Edit_Mail', 'web', 'Mail', 'Edit_Mail', '2', NULL, NULL),
(131, 'Status_Mail', 'web', 'Mail', 'Status_Mail', '3', NULL, NULL),
(132, 'Delete_Mail', 'web', 'Mail', 'Delete_Mail', '4', NULL, NULL),
(133, 'View_Mail', 'web', 'Mail', 'View_Mail', '5', NULL, NULL),
(134, 'Billing', 'web', NULL, 'MODULE', NULL, NULL, NULL),
(135, 'Service_Billing', 'web', 'Billing', 'FEATURE', NULL, NULL, NULL),
(136, 'Payment_Billing', 'web', 'Billing', 'FEATURE', NULL, NULL, NULL),
(137, 'Billing_Invoice', 'web', 'Billing', 'FEATURE', NULL, NULL, NULL),
(138, 'Add_Service_Billing', 'web', 'Service_Billing', 'Add_Service_Billing', '1', NULL, NULL),
(139, 'Edit_Service_Billing', 'web', 'Service_Billing', 'Edit_Service_Billing', '2', NULL, NULL),
(140, 'Status_Service_Billing', 'web', 'Service_Billing', 'Status_Service_Billing', '3', NULL, NULL),
(141, 'Delete_Service_Billing', 'web', 'Service_Billing', 'Delete_Service_Billing', '4', NULL, NULL),
(142, 'View_Service_Billing', 'web', 'Service_Billing', 'View_Service_Billing', '5', NULL, NULL),
(143, 'Add_Payment_Billing', 'web', 'Payment_Billing', 'Add_Payment_Billing', '1', NULL, NULL),
(144, 'Edit_Payment_Billing', 'web', 'Payment_Billing', 'Edit_Payment_Billing', '2', NULL, NULL),
(145, 'Status_Payment_Billing', 'web', 'Payment_Billing', 'Status_Payment_Billing', '3', NULL, NULL),
(146, 'Delete_Payment_Billing', 'web', 'Payment_Billing', 'Delete_Payment_Billing', '4', NULL, NULL),
(147, 'View_Payment_Billing', 'web', 'Payment_Billing', 'View_Payment_Billing', '5', NULL, NULL),
(148, 'Add_Billing_Invoice', 'web', 'Billing_Invoice', 'Add_Billing_Invoice', '1', NULL, NULL),
(149, 'Edit_Billing_Invoice', 'web', 'Billing_Invoice', 'Edit_Billing_Invoice', '2', NULL, NULL),
(150, 'Status_Billing_Invoice', 'web', 'Billing_Invoice', 'Status_Billing_Invoice', '3', NULL, NULL),
(151, 'Delete_Billing_Invoice', 'web', 'Billing_Invoice', 'Delete_Billing_Invoice', '4', NULL, NULL),
(152, 'View_Billing_Invoice', 'web', 'Billing_Invoice', 'View_Billing_Invoice', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_prescription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `today_date` date NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `date`, `patient_id`, `doctor_id`, `history`, `note`, `old_prescription_id`, `status`, `today_date`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1996-08-18', 39, 1, NULL, NULL, NULL, 1, '2021-01-22', 1, NULL, NULL, '2021-01-21 23:15:10', '2021-01-21 23:15:10'),
(2, '1997-10-23', 58, 1, NULL, NULL, NULL, 1, '2021-01-22', 1, NULL, NULL, '2021-01-21 23:15:15', '2021-01-21 23:15:15'),
(3, '2017-06-01', 29, 5, NULL, NULL, NULL, 1, '2021-01-22', 1, NULL, NULL, '2021-01-21 23:15:33', '2021-01-21 23:15:33'),
(4, '1979-06-11', 37, 1, NULL, NULL, NULL, 1, '2021-01-22', 1, NULL, NULL, '2021-01-21 23:15:39', '2021-01-21 23:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicines`
--

CREATE TABLE `prescription_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` tinyint(4) NOT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_medicines`
--

INSERT INTO `prescription_medicines` (`id`, `prescription_id`, `medicine_id`, `duration`, `sequence`, `day`, `instruction`) VALUES
(1, 1, 15, 'Mollit hic deleniti', 'Error autem anim vol', 10, 'In est laboriosam'),
(2, 2, 12, 'Harum omnis placeat', 'Minim ut lorem qui q', 24, 'Cum laudantium sit'),
(3, 3, 9, 'Praesentium adipisic', 'Libero dolores moles', 9, 'Non consequuntur ali'),
(4, 4, 11, 'Voluptatum incididun', 'Molestiae odit enim', 19, 'Labore assumenda et');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-01-21 10:06:35', '2021-01-21 10:06:35'),
(2, 'doctor', 'web', '2021-01-21 10:06:42', '2021-01-21 10:06:42'),
(3, 'accountant', 'web', '2021-01-21 10:07:40', '2021-01-21 10:07:40'),
(4, 'receptionist', 'web', '2021-01-21 10:07:52', '2021-01-21 10:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(24, 2),
(24, 4),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(26, 4),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(37, 4),
(38, 1),
(38, 2),
(38, 4),
(39, 1),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(134, 3),
(135, 1),
(135, 3),
(136, 1),
(136, 3),
(137, 1),
(137, 3),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `starting` time NOT NULL,
  `ending` time NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `doctor_id`, `day_id`, `starting`, `ending`, `quantity`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 2, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(3, 1, 3, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(4, 1, 4, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(5, 1, 5, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(6, 1, 6, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(7, 1, 7, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(8, 2, 1, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(9, 2, 2, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(10, 2, 3, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(11, 2, 4, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(12, 2, 5, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(13, 2, 6, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(14, 2, 7, '11:30:00', '13:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(15, 3, 1, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(16, 3, 2, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(17, 3, 3, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(18, 3, 4, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(19, 3, 5, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(20, 3, 5, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(21, 3, 6, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL),
(22, 3, 7, '10:30:00', '12:30:00', 20, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `quantity`, `rate`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'K3RozsW0fJ', 'v4k43dJiEYmv4tZZkyNeQAouAIpWLKhcGw6W1pnaOyA0DGbipp', '1', '12776', 1, 1, NULL, NULL, NULL, NULL),
(2, 'WoEMWXToy0', 'jOO5zroFz9RCRksDgIzXFn516igVMfkK7Uzr2rQZ2ChmVrs4GH', '2', '19181', 1, 1, NULL, NULL, NULL, NULL),
(3, 'rikYcRqD5u', '7NZ5DUPUGDTZeH3XQA9tIe6CIs620r3XkiQOV9YvyTOqEuQeah', '2', '15291', 1, 1, NULL, NULL, NULL, NULL),
(4, 'GJALLMvP0s', 'Z4dWHQWHHrgKzJGP6kPCcN69NfDcDoE6cYMQ5ePXEbXYf1zWue', '1', '12348', 1, 1, NULL, NULL, NULL, NULL),
(5, 'QXBs6qsJA8', 'SDWJP2kU5giCg4tBKrmBoqy3xcjyt3L4GkNybNRaCzPqaRQ6i6', '1', '10168', 1, 1, NULL, NULL, NULL, NULL),
(6, 'CZJA020jPh', 'SF8GUecEsSWHanTpXFllDGzkFAZK7u6t7z1NVSIIq8AEiqUevj', '1', '4368', 1, 1, NULL, NULL, NULL, NULL),
(7, 't8fNJwJ0ra', '0qzCbupKG2teydKRL3fJj6aAO5gwLrzp7FBl0tGZ8qYH6AWbZk', '3', '11196', 1, 1, NULL, NULL, NULL, NULL),
(8, 'KcmCRVfAno', 'WFfpug5ZM0cGqYe1zN17y0FN2kgzEfhuS6nvcalx4I5MQaLRjj', '1', '19506', 1, 1, NULL, NULL, NULL, NULL),
(9, 'Z3bXbtA3g6', 'o907ef8qJ8rdRLI1dXr2upUwRc3cakA9OBxtlQEumLcOVYuY9q', '3', '2063', 1, 1, NULL, NULL, NULL, NULL),
(10, 'OfFGNzg0nB', 'LOfoI3ipGRDpvGwoPmeoIy1XpMBSJ6FYQX4pN5w483JBy1lOsV', '1', '10925', 1, 1, NULL, NULL, NULL, NULL),
(11, 'Lbfz6Jmd9N', '4v2gJCViTFMDNcFdB7FOgKsjVlchKczk6mpsUFdKZXJN08pVLV', '2', '8829', 1, 1, NULL, NULL, NULL, NULL),
(12, 'dULWQEopRj', 'kvtb5ZKONbZGR1vq2lBcfUKRWjCTWOUzG88ETZDGIUlU78Mufo', '2', '13590', 1, 1, NULL, NULL, NULL, NULL),
(13, 'B1oR698Bez', '1TIOUye6PCiWCb8iBNr9HtBUCTd6sFvbXG5CagbJm5X7IwDEIL', '2', '9155', 1, 1, NULL, NULL, NULL, NULL),
(14, 'ynzzXUUKIv', 'EARLh4v42x7lNSzCPp0hctkIxIPscJngi1JIIkq2W6Ayl8Xb7k', '2', '9590', 1, 1, NULL, NULL, NULL, NULL),
(15, '08Tvkkh6lT', '7l4NYUcOsRGL6426mfigEQoYf17sO60ad9TwmKhZAxcD5Hcbot', '2', '13670', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KomTHe4w6TJ2emd4ItHKXnAiYY7lssic3GJ2BOJ8', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVG5IUmFGOWMwVmdhMFJ2anlZWHBGYnV2cE9FaDF0bVNxSE5LbWp4dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mcm9udGVuZC9kb2N0b3JWaWV3LzIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkT0RxMVhvQmZwVC85eWN3M2V5cWJJLmRwOGhYYUVSZmJvbThja3Q0SVAvZHVTRlhPZ0Nodk8iO30=', 1611302738),
('yccZk2S4VNIyPCoR8HnnC2GPruxi1exxZmVqWkFe', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidElEY2lpQ3ViMG5ORFk4NWYxRklyV1l5d2NRNHh5QzRZUVZvUHd3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1611302952),
('zGteubFca5T2oXMclgNdSN2MMZ0Mj819IVntkf6O', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0IxWUxocUhYMXBlVndTSnpBMnYzMFBZSldjZjBZdmptSWdPcTBNOSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE9EcTFYb0JmcFQvOXljdzNleXFiSS5kcDhoWGFFUmZib204Y2t0NElQL2R1U0ZYT2dDaHZPIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1611303009);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_year` int(11) NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `white_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `contact`, `email`, `address`, `facebook`, `linkedin`, `twitter`, `google`, `youtube`, `instagram`, `footer_text`, `footer_year`, `favicon`, `small_logo`, `logo`, `white_logo`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin Hospital', '01234-567890', 'admin@example.com', 'House#25, 4th Floor, Mannan Plaza, Khilkhet, Dhaka-1229, Bangladesh.', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.twitter.com/', 'https://www.google.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', 'AdminHospital', 2020, NULL, 'backend/files/setting/small_logo_1611292894.png', 'backend/files/setting/logo_1611292879.png', NULL, NULL, 1, NULL, NULL, '2021-01-21 23:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prize` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `details`, `lab_name`, `prize`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'X-Ray', 'hiqApw4MgD', '9ERtH', 3, 1, 1, NULL, NULL, NULL, NULL),
(2, 'angiocardiography', 'tEVVLiUQt8', '9s5bh', 3, 1, 1, NULL, NULL, NULL, NULL),
(3, 'angiography', 'GDG6jCEVuo', '7D66d', 2, 1, 1, NULL, NULL, NULL, NULL),
(4, 'brain scanning', 'SpSluqMoaH', 'CLylk', 3, 1, 1, NULL, NULL, NULL, NULL),
(5, 'cholecystography', 'CikvKnoL3l', '6Ykbd', 3, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT 1,
  `parentId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `address`, `mobile`, `birthday`, `gender`, `picture`, `email`, `email_verified`, `email_verified_at`, `email_verification_token`, `deleted_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `type`, `parentId`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, 'backend/files/user/user_1611292662.jpg', 'admin@example.com', 1, '2021-01-21 10:05:53', '', NULL, '$2y$10$ODq1XoBfpT/9ycw3eyqbI.dp8hXaERfbom8ckt4IP/duSFXOgChvO', NULL, NULL, 'XwN5XlVwhYhOfekj3LW8UeLEsV9iTMVUFBenHJGlEcEuzrBoTYNGFKwfYUbR', NULL, NULL, 1, NULL, NULL, '2021-01-21 23:17:42'),
(2, 'doctor', 'doctor', NULL, NULL, NULL, NULL, NULL, 'doctor@example.com', 1, '2021-01-21 10:05:53', '', NULL, '$2y$10$kjgyFKTCuNL9yKhzs5.4q.0z1IRZmXOTU9nfI8KAyRa7Lw8mclnBK', NULL, NULL, 'u5ZOTRlqxWoIfyXZwh8pZmsHOv6B3s4Ajz3deejdPEL2bOdru8GTkgtiAR0T', NULL, NULL, 1, NULL, NULL, NULL),
(3, 'accountant', 'accountant', NULL, NULL, NULL, NULL, NULL, 'accountant@example.com', 1, '2021-01-21 10:05:53', '', NULL, '$2y$10$/mGMh3VUXBJtvJy2.RzQuODpxqf8kSWoMrC.BB.VWWcdrSeCqi0de', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(4, 'receptionist', 'receptionist', NULL, NULL, NULL, NULL, NULL, 'receptionist@example.com', 1, '2021-01-21 10:05:54', '', NULL, '$2y$10$VW9dxnkmt7f4FwGCn.rIH.7dzyEuk00E2REMW.oT5uqIJqW7gaboa', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_type_id_foreign` (`type_id`);

--
-- Indexes for table `account_invoices`
--
ALTER TABLE `account_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_invoices_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `account_invoice_details`
--
ALTER TABLE `account_invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_invoice_details_account_invoice_id_foreign` (`account_invoice_id`),
  ADD KEY `account_invoice_details_account_id_foreign` (`account_id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_department_id_foreign` (`department_id`),
  ADD KEY `doctors_blood_id_foreign` (`blood_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_roll_id_foreign` (`roll_id`),
  ADD KEY `employees_blood_id_foreign` (`blood_id`);

--
-- Indexes for table `employee_rolls`
--
ALTER TABLE `employee_rolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generics`
--
ALTER TABLE `generics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manufacturers_email_unique` (`email`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_type_id_foreign` (`type_id`),
  ADD KEY `medicines_generic_id_foreign` (`generic_id`),
  ADD KEY `medicines_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Indexes for table `medicine_types`
--
ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `new_appointments`
--
ALTER TABLE `new_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `new_appointments_department_id_foreign` (`department_id`),
  ADD KEY `new_appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_code_unique` (`code`),
  ADD UNIQUE KEY `patients_email_unique` (`email`),
  ADD KEY `patients_blood_id_foreign` (`blood_id`);

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_tests_test_id_foreign` (`test_id`),
  ADD KEY `patient_tests_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_tests_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_account_id_foreign` (`account_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`),
  ADD KEY `prescriptions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescriptions_old_prescription_id_foreign` (`old_prescription_id`);

--
-- Indexes for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_medicines_prescription_id_foreign` (`prescription_id`),
  ADD KEY `prescription_medicines_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_doctor_id_foreign` (`doctor_id`),
  ADD KEY `schedules_day_id_foreign` (`day_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `account_invoices`
--
ALTER TABLE `account_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_invoice_details`
--
ALTER TABLE `account_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_rolls`
--
ALTER TABLE `employee_rolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generics`
--
ALTER TABLE `generics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;

--
-- AUTO_INCREMENT for table `new_appointments`
--
ALTER TABLE `new_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `account_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `account_invoices`
--
ALTER TABLE `account_invoices`
  ADD CONSTRAINT `account_invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `account_invoice_details`
--
ALTER TABLE `account_invoice_details`
  ADD CONSTRAINT `account_invoice_details_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_invoice_details_account_invoice_id_foreign` FOREIGN KEY (`account_invoice_id`) REFERENCES `account_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `doctors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_roll_id_foreign` FOREIGN KEY (`roll_id`) REFERENCES `employee_rolls` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_generic_id_foreign` FOREIGN KEY (`generic_id`) REFERENCES `generics` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `medicines_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `medicines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `medicine_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_appointments`
--
ALTER TABLE `new_appointments`
  ADD CONSTRAINT `new_appointments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `new_appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `new_appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD CONSTRAINT `patient_tests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `patient_tests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `patient_tests_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `prescriptions_old_prescription_id_foreign` FOREIGN KEY (`old_prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  ADD CONSTRAINT `prescription_medicines_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_medicines_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
