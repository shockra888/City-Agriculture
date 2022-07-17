-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 05:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9');

-- --------------------------------------------------------

--
-- Table structure for table `archieve_farmer_data`
--

CREATE TABLE `archieve_farmer_data` (
  `u_id` int(11) NOT NULL,
  `ReferenceControlNo` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Extensionname` varchar(255) DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `House_Lot_BLDGNo` varchar(255) DEFAULT NULL,
  `Street_Sitio_SUBDV` varchar(255) DEFAULT NULL,
  `Barangay` varchar(255) DEFAULT NULL,
  `Municipality_City` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Region` int(10) DEFAULT NULL,
  `Contact_number` varchar(20) DEFAULT NULL,
  `Birthdate` varchar(50) DEFAULT NULL,
  `Place_of_Birth` varchar(255) DEFAULT NULL,
  `Religion` varchar(255) DEFAULT NULL,
  `Civil_status` varchar(255) DEFAULT NULL,
  `Name_of_Spouse` varchar(255) DEFAULT NULL,
  `Mother_maidenname` varchar(255) DEFAULT NULL,
  `householded` varchar(10) DEFAULT NULL,
  `name_ofhouseholdhead` varchar(255) DEFAULT NULL,
  `Relationship` varchar(255) DEFAULT NULL,
  `no_oflivinghouse_members` varchar(255) DEFAULT NULL,
  `no_ofMale` int(10) DEFAULT NULL,
  `no_ofFemale` int(10) DEFAULT NULL,
  `Education_attainment` varchar(255) DEFAULT NULL,
  `person_with_disability` varchar(10) DEFAULT NULL,
  `FourPs_beneficiary` varchar(10) DEFAULT NULL,
  `memberof_indigengroup` varchar(10) DEFAULT NULL,
  `specify_if_yes` varchar(255) DEFAULT NULL,
  `with_governmentID` varchar(10) DEFAULT NULL,
  `specify_if_yes1` varchar(255) DEFAULT NULL,
  `memberof_FAC` varchar(10) DEFAULT NULL,
  `specify_if_yes2` varchar(255) DEFAULT NULL,
  `person_tonotify` varchar(100) DEFAULT NULL,
  `person_contactNo` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Date_created` varchar(255) NOT NULL,
  `update_sched` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archieve_farm_land`
--

CREATE TABLE `archieve_farm_land` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ARB` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `tot_farm_area` varchar(255) DEFAULT NULL,
  `ownership_docNo` int(10) DEFAULT NULL,
  `Ownership` varchar(50) DEFAULT NULL,
  `tenant_landOwnname` varchar(255) DEFAULT NULL,
  `lessee_landOwnername` varchar(255) DEFAULT NULL,
  `otherowner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archieve_farm_profile`
--

CREATE TABLE `archieve_farm_profile` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `Main_Livelihood` varchar(50) DEFAULT NULL,
  `type_ofFarmingAct` varchar(50) DEFAULT NULL,
  `othercrops_specify` varchar(255) DEFAULT NULL,
  `kind_ofwork` varchar(50) DEFAULT NULL,
  `other_specify` varchar(255) DEFAULT NULL,
  `farming_income` varchar(255) DEFAULT NULL,
  `non_farming` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archieve_land_parcel`
--

CREATE TABLE `archieve_land_parcel` (
  `id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `NoofFarmParcel` varchar(255) NOT NULL,
  `Crop_commodity` varchar(100) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `size_ha` varchar(100) DEFAULT NULL,
  `farm_type` varchar(100) DEFAULT NULL,
  `organic_practitioner` varchar(100) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `distribute_fertilizer`
--

CREATE TABLE `distribute_fertilizer` (
  `distribution_id` int(10) NOT NULL,
  `farmer_id` int(10) DEFAULT NULL,
  `fertilizer_name` varchar(100) DEFAULT NULL,
  `material_used` varchar(100) DEFAULT NULL,
  `numbers_npk` varchar(100) DEFAULT NULL,
  `net_weight` varchar(100) DEFAULT NULL,
  `fertilizer_count` varchar(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_distributed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribute_fertilizer`
--

INSERT INTO `distribute_fertilizer` (`distribution_id`, `farmer_id`, `fertilizer_name`, `material_used`, `numbers_npk`, `net_weight`, `fertilizer_count`, `remarks`, `date_distributed`) VALUES
(9, 30, 'BIO Vita', '', '', '1', '4', '', '2021-12-15'),
(10, 34, 'Plant nutri', '', '', '20', '5', '', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `distribute_seed`
--

CREATE TABLE `distribute_seed` (
  `distribution_id` int(10) NOT NULL,
  `farmer_id` int(10) DEFAULT NULL,
  `plant_name` varchar(150) DEFAULT NULL,
  `GMO` varchar(10) DEFAULT NULL,
  `seed_count` varchar(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_distributed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribute_seed`
--

INSERT INTO `distribute_seed` (`distribution_id`, `farmer_id`, `plant_name`, `GMO`, `seed_count`, `remarks`, `date_distributed`) VALUES
(37, 30, 'Corn', 'No', '5', '', '2021-12-15'),
(38, 33, 'kamatis', 'No', '10', '', '2021-12-15'),
(39, 35, 'Corn', 'No', '25', '', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `distribute_utility`
--

CREATE TABLE `distribute_utility` (
  `distribution_id` int(10) NOT NULL,
  `farmer_id` int(10) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `tractor_type` varchar(50) DEFAULT NULL,
  `CH_type` varchar(50) DEFAULT NULL,
  `Attachment_type` varchar(50) DEFAULT NULL,
  `utility_name` varchar(50) DEFAULT NULL,
  `utility_count` int(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_distributed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribute_utility`
--

INSERT INTO `distribute_utility` (`distribution_id`, `farmer_id`, `category`, `type`, `tractor_type`, `CH_type`, `Attachment_type`, `utility_name`, `utility_count`, `remarks`, `date_distributed`) VALUES
(8, 30, 'Farming_vehicle', 'Combine_or_Harvester', '', 'Reaper', '', 'Masey', 6, '', '2021-12-15'),
(9, 32, 'Farming_vehicle', 'Tractor', 'Compact_tractor', '', '', 'Caterpilllar', 3, '', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_data`
--

CREATE TABLE `farmer_data` (
  `u_id` int(11) NOT NULL,
  `ReferenceControlNo` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Extensionname` varchar(255) DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `House_Lot_BLDGNo` varchar(255) DEFAULT NULL,
  `Street_Sitio_SUBDV` varchar(255) DEFAULT NULL,
  `Barangay` varchar(255) DEFAULT NULL,
  `Municipality_City` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Region` int(10) DEFAULT NULL,
  `Contact_number` varchar(20) DEFAULT NULL,
  `Birthdate` varchar(50) DEFAULT NULL,
  `Place_of_Birth` varchar(255) DEFAULT NULL,
  `Religion` varchar(255) DEFAULT NULL,
  `Civil_status` varchar(255) DEFAULT NULL,
  `Name_of_Spouse` varchar(255) DEFAULT NULL,
  `Mother_maidenname` varchar(255) DEFAULT NULL,
  `householded` varchar(10) DEFAULT NULL,
  `name_ofhouseholdhead` varchar(255) DEFAULT NULL,
  `Relationship` varchar(255) DEFAULT NULL,
  `no_oflivinghouse_members` varchar(255) DEFAULT NULL,
  `no_ofMale` int(10) DEFAULT NULL,
  `no_ofFemale` int(10) DEFAULT NULL,
  `Education_attainment` varchar(255) DEFAULT NULL,
  `person_with_disability` varchar(10) DEFAULT NULL,
  `FourPs_beneficiary` varchar(10) DEFAULT NULL,
  `memberof_indigengroup` varchar(10) DEFAULT NULL,
  `specify_if_yes` varchar(255) DEFAULT NULL,
  `with_governmentID` varchar(10) DEFAULT NULL,
  `specify_if_yes1` varchar(255) DEFAULT NULL,
  `memberof_FAC` varchar(10) DEFAULT NULL,
  `specify_if_yes2` varchar(255) DEFAULT NULL,
  `person_tonotify` varchar(100) DEFAULT NULL,
  `person_contactNo` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Date_created` varchar(255) NOT NULL,
  `update_sched` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_data`
--

INSERT INTO `farmer_data` (`u_id`, `ReferenceControlNo`, `Surname`, `Firstname`, `Middlename`, `Extensionname`, `Sex`, `House_Lot_BLDGNo`, `Street_Sitio_SUBDV`, `Barangay`, `Municipality_City`, `Province`, `Region`, `Contact_number`, `Birthdate`, `Place_of_Birth`, `Religion`, `Civil_status`, `Name_of_Spouse`, `Mother_maidenname`, `householded`, `name_ofhouseholdhead`, `Relationship`, `no_oflivinghouse_members`, `no_ofMale`, `no_ofFemale`, `Education_attainment`, `person_with_disability`, `FourPs_beneficiary`, `memberof_indigengroup`, `specify_if_yes`, `with_governmentID`, `specify_if_yes1`, `memberof_FAC`, `specify_if_yes2`, `person_tonotify`, `person_contactNo`, `image`, `Date_created`, `update_sched`) VALUES
(30, '09-55-03-019-000066', 'Bustyer', 'Corazon', 'Cabatic', '', 'Female', '342', 'N/A', 'Palamis', 'Alaminos', 'Pangasinan', 1, '+639195684533', '', 'Palamis', 'Catholic', '', '', '', 'Yes', '', '', '4', 2, 2, 'None', 'No', 'Yes', 'No', 'N/A', '', '', 'No', 'N/A', '', '+639236578304', '190684.png', '2021-12-15', '2022-06-15'),
(31, '01-55-03-020-000004', 'Tobias', 'Nestor', 'Botardo', '', 'Male', '454', 'N/A', 'Pangapisan', 'Alaminos City', 'Pangasinan', 1, '+639568935623', '12/24/1980', 'Pangapisan', 'Catholic', 'Married', 'Marites Tobias', 'Nilo', 'Yes', '', '', '4', 2, 2, 'High School', 'No', 'Yes', 'No', '', 'Yes', 'SSS ID', 'No', '', 'Marites Botardo', '+639452673246', 'download.jpg', '2021-12-15', '2021-06-15'),
(32, '09-55-03-29-000100', 'Rastrollo', 'Jessie', 'Tamayo', '', 'Male', '231', 'N/A', 'San Jose', 'Alaminos City', 'Pangasinan', 1, '+639765489075', '12/24/1980', 'San Jose', 'Catholic', 'Married', 'Maria Rastrollo', 'Tamayo', 'Yes', '', '', '3', 1, 2, 'High School', 'No', 'No', 'No', '', 'Yes', 'Driver License', 'No', '', 'Maria Rastrollo', '+639458354353', 'download.jpg', '2021-12-15', '2022-06-15'),
(33, '09-55-03-021-000081', 'Alcedo', 'Ernesto', 'Gilledo', '', 'Male', '567', 'N/A', 'Poblacion', '', 'Pangasinan', 1, '+639908758975', '', 'Poblacion', 'Catholic', '', '', 'Giledo', 'Yes', '', '', '4', 2, 2, '', 'No', 'Yes', 'No', 'N/A', '', '', 'No', 'N/A', '', '+639564435643', 'download.jpg', '2021-12-15', '2022-06-15'),
(34, '01-55-03-019-000036', 'Rabina', 'Pelagia', 'Halican', '', 'Female', '432', 'N/A', 'Pangapisan', '', 'Pangasinan', 1, '+639564783245', '', 'Pangapisan', 'Catholic', '', '', 'Halican', 'Yes', '', '', '5', 3, 2, '', 'No', 'Yes', 'No', 'N/A', '', '', 'No', 'N/A', '', '+639468932564', '190684.png', '2021-12-15', '2021-06-08'),
(35, '01-55-03-020-000049', 'Rid', 'Kurt', 'Dalisay', '', 'Male', '567', 'N/A', 'Pangapisan', 'Alaminos City', 'Pangasinan', 1, '+639764535786', '03/08/1990', 'Pangapisan', 'Catholic', 'Single', '', 'Dalisay', 'Yes', '', '', '5', 2, 3, 'College', 'No', 'No', 'No', '', 'Yes', 'Passport ID', 'No', '', 'Puda', '+639674542467', 'download.jpg', '2021-12-16', '2022-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `farm_land`
--

CREATE TABLE `farm_land` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ARB` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `tot_farm_area` varchar(255) DEFAULT NULL,
  `ownership_docNo` int(10) DEFAULT NULL,
  `Ownership` varchar(50) DEFAULT NULL,
  `tenant_landOwnname` varchar(255) DEFAULT NULL,
  `lessee_landOwnername` varchar(255) DEFAULT NULL,
  `otherowner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm_land`
--

INSERT INTO `farm_land` (`id`, `u_id`, `ARB`, `location`, `tot_farm_area`, `ownership_docNo`, `Ownership`, `tenant_landOwnname`, `lessee_landOwnername`, `otherowner`) VALUES
(20, 30, 'Yes', 'Palamis', '6003', 6, 'Registered_Owner', '', '', ''),
(21, 31, 'Yes', 'Pangapisan', '', 5, 'Registered_Owner', '', '', ''),
(22, 32, 'Yes', 'San Jose', '', 6, 'Registered_Owner', '', '', ''),
(23, 33, 'Yes', 'Poblacion', '5456', 5, 'Registered_Owner', '', '', ''),
(24, 34, 'Yes', 'Pangapisan', '', 8, 'Registered_Owner', '', '', ''),
(25, 35, 'Yes', 'Pangapisan', '8712', 1, 'Registered_Owner', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `farm_profile`
--

CREATE TABLE `farm_profile` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `Main_Livelihood` varchar(50) DEFAULT NULL,
  `type_ofFarmingAct` varchar(50) DEFAULT NULL,
  `othercrops_specify` varchar(255) DEFAULT NULL,
  `kind_ofwork` varchar(50) DEFAULT NULL,
  `other_specify` varchar(255) DEFAULT NULL,
  `farming_income` varchar(255) DEFAULT NULL,
  `non_farming` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm_profile`
--

INSERT INTO `farm_profile` (`id`, `u_id`, `Main_Livelihood`, `type_ofFarmingAct`, `othercrops_specify`, `kind_ofwork`, `other_specify`, `farming_income`, `non_farming`) VALUES
(23, 30, 'Farmworker', '', '', 'Planting/Transplanting', '', '5000', '1000'),
(24, 31, 'Farmer', 'Corn', '', '', '', '3000', '500'),
(25, 32, 'Farmworker', '', '', 'Planting/Transplanting', '', '10000', '3000'),
(26, 33, 'Farmer', 'Rice', '', '', '', '3000', '1000'),
(27, 34, 'Farmworker', '', '', 'Planting/Transplanting', '', '7000', '1000'),
(28, 35, 'Farmer', 'Rice', '', '', '', '5000', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE `fertilizers` (
  `fertilizer_id` int(10) NOT NULL,
  `fertilizer_name` varchar(255) DEFAULT NULL,
  `material_used` varchar(255) DEFAULT NULL,
  `available` int(100) NOT NULL,
  `numbers_npk` varchar(200) DEFAULT NULL,
  `net_weight` varchar(100) DEFAULT NULL,
  `distributed` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`fertilizer_id`, `fertilizer_name`, `material_used`, `available`, `numbers_npk`, `net_weight`, `distributed`, `date_created`) VALUES
(9, 'Multiphos', '', 10, '', '2', '0', '2021-12-15'),
(10, 'BIO Vita', '', 30, '', '1', '0', '2021-12-15'),
(11, 'YARA', '', 5, '', '60', '0', '2021-12-15'),
(12, 'Urea', '', 40, '', '30', '0', '2021-12-15'),
(13, 'Vita Plant', '', 40, '', '50', '0', '2021-12-15'),
(14, 'Plant nutri', '', 25, '', '20', '0', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_archieve`
--

CREATE TABLE `fertilizer_archieve` (
  `fertilizer_id` int(10) NOT NULL,
  `fertilizer_name` varchar(255) DEFAULT NULL,
  `material_used` varchar(255) DEFAULT NULL,
  `available` varchar(100) NOT NULL,
  `numbers_npk` varchar(200) DEFAULT NULL,
  `net_weight` varchar(100) DEFAULT NULL,
  `distributed` int(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `land_parcel`
--

CREATE TABLE `land_parcel` (
  `id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `NoofFarmParcel` varchar(255) NOT NULL,
  `Crop_commodity` varchar(100) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `size_ha` varchar(100) DEFAULT NULL,
  `farm_type` varchar(100) DEFAULT NULL,
  `organic_practitioner` varchar(100) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land_parcel`
--

INSERT INTO `land_parcel` (`id`, `u_id`, `NoofFarmParcel`, `Crop_commodity`, `others`, `size_ha`, `farm_type`, `organic_practitioner`, `latitude`, `longitude`) VALUES
(13, 30, '1', 'Rice', ' ', '2546', 'Arabie Farm', 'No', '16.219576', '119.951230'),
(14, 33, '1', 'Corn', ' ', '5456', 'Arabie Farm', 'No', '16.219576', '119.951230'),
(15, 30, '1', 'Rice', ' ', '3457', 'Arabie Farm', 'No', '16.168473', '119.998308'),
(16, 35, '1', 'Rice', ' ', '4356', 'Arabie Farm', 'No', '16.219576', '119.951230'),
(17, 35, '1', 'Rice', ' ', '4356', 'Arabie Farm', 'No', '16.219576', '119.951230');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `seed_id` int(10) NOT NULL,
  `plant_name` varchar(100) DEFAULT NULL,
  `GMO` varchar(10) DEFAULT NULL,
  `available` int(10) NOT NULL,
  `distributed` varchar(10) NOT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`seed_id`, `plant_name`, `GMO`, `available`, `distributed`, `date_created`) VALUES
(12, 'Rice', 'No', 8, '0', '2021-12-14'),
(13, 'Corn', 'No', 11, '0', '2021-12-15'),
(14, 'Monggo', 'No', 20, '0', '2021-12-15'),
(15, 'Glutinous Rice', 'Yes', 40, '0', '2021-12-15'),
(16, 'Wheat', 'Yes', 34, '0', '2021-12-15'),
(17, 'kamatis', 'No', 20, '0', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `seed_archieve`
--

CREATE TABLE `seed_archieve` (
  `seed_id` int(10) NOT NULL,
  `plant_name` varchar(255) DEFAULT NULL,
  `GMO` varchar(10) DEFAULT NULL,
  `available` int(10) DEFAULT NULL,
  `distributed` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `start`, `end`) VALUES
(3, 'Seed Distribution', '2021-12-13 00:00:00', '2021-12-16 00:00:00'),
(9, 'Fertilizer disctribution', '2021-12-28 00:00:00', '2021-12-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_logs`
--

CREATE TABLE `transaction_logs` (
  `t_id` int(255) NOT NULL,
  `t_activity` varchar(255) DEFAULT NULL,
  `t_time` varchar(255) DEFAULT NULL,
  `t_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_logs`
--

INSERT INTO `transaction_logs` (`t_id`, `t_activity`, `t_time`, `t_date`) VALUES
(131, 'Redirected to Fertilizer distribution history page', '11:56:36', '2021-12-26'),
(132, 'Redirected to Equipment distribution history page', '11:56:37', '2021-12-26'),
(133, 'Redirected to Seed distribution history page', '11:57:25', '2021-12-26'),
(134, 'Redirected to Fertilizer distribution history page', '11:57:26', '2021-12-26'),
(135, 'Redirected to Equipment distribution history page', '11:57:26', '2021-12-26'),
(136, 'Redirected to Fertilizer distribution history page', '11:57:28', '2021-12-26'),
(137, 'Redirected to Seed distribution history page', '11:57:28', '2021-12-26'),
(138, 'Redirected to farmers record page', '12:05:25', '2021-12-26'),
(139, 'Farmers record print button clicked', '12:05:45', '2021-12-26'),
(140, 'Redirected to fertilizers record page', '12:07:11', '2021-12-26'),
(141, 'Redirected to fertilizers record page', '12:07:15', '2021-12-26'),
(142, 'Redirected to seeds record page', '12:07:15', '2021-12-26'),
(143, 'Redirected to fertilizers record page', '12:07:17', '2021-12-26'),
(144, 'Redirected to seeds record page', '12:07:50', '2021-12-26'),
(145, 'Redirected to equpments record page', '12:08:26', '2021-12-26'),
(146, 'Redirected to fertilizers record page', '12:08:29', '2021-12-26'),
(147, 'Redirected to equpments record page', '12:09:01', '2021-12-26'),
(148, 'print equipment button has been clicked', '12:09:54', '2021-12-26'),
(149, 'Redirected to distribution history page', '12:11:32', '2021-12-26'),
(150, 'Redirected to Seed distribution history page', '12:11:33', '2021-12-26'),
(151, 'Redirected to Fertilizer distribution history page', '12:11:35', '2021-12-26'),
(152, 'Redirected to Equipment distribution history page', '12:11:36', '2021-12-26'),
(153, 'Redirected to Seed distribution history page', '12:11:37', '2021-12-26'),
(154, 'Redirected to Seed distribution history page', '12:12:31', '2021-12-26'),
(155, 'Redirected to Fertilizer distribution history page', '12:12:34', '2021-12-26'),
(156, 'Redirected to Equipment distribution history page', '12:12:45', '2021-12-26'),
(157, 'Redirected to system logs page', '12:12:51', '2021-12-26'),
(158, 'Redirected to system logs page', '12:26:58', '2021-12-26'),
(159, 'Admin has been logged out', '12:27:33', '2021-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `utility_id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `tractor_type` varchar(255) NOT NULL,
  `CH_type` varchar(255) NOT NULL,
  `Attachment_type` varchar(255) NOT NULL,
  `utility_name` varchar(200) DEFAULT NULL,
  `availability` int(100) DEFAULT NULL,
  `distribute` int(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`utility_id`, `category`, `type`, `tractor_type`, `CH_type`, `Attachment_type`, `utility_name`, `availability`, `distribute`, `date_created`) VALUES
(3, 'Farming_vehicle', 'Tractor', 'Compact_tractor', '', '', 'Mahindra', 21, 0, '2021-11-24'),
(5, 'Vehicle_attachment', '', '', '', 'Plow', 'plower', 10, 0, '2021-11-24'),
(6, 'Farming_vehicle', 'Combine_or_Harvester', '', 'Reaper', '', 'Masey', 14, 0, '2021-11-24'),
(10, 'Farming_vehicle', 'Tractor', 'Wheeled_Tractor', '', '', 'Sonalika', 10, 0, '2021-12-15'),
(11, 'Farming_vehicle', 'Tractor', 'Wheeled_Tractor', '', '', 'Kubota', 30, 0, '2021-12-15'),
(12, 'Farming_vehicle', 'Tractor', 'Compact_tractor', '', '', 'Caterpilllar', 2, 0, '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `utility_archieve`
--

CREATE TABLE `utility_archieve` (
  `utility_id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `tractor_type` varchar(255) NOT NULL,
  `CH_type` varchar(255) NOT NULL,
  `Attachment_type` varchar(255) NOT NULL,
  `utility_name` varchar(200) DEFAULT NULL,
  `availability` int(100) DEFAULT NULL,
  `distribute` int(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `archieve_farmer_data`
--
ALTER TABLE `archieve_farmer_data`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `archieve_farm_land`
--
ALTER TABLE `archieve_farm_land`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `archieve_farm_profile`
--
ALTER TABLE `archieve_farm_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `archieve_land_parcel`
--
ALTER TABLE `archieve_land_parcel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `distribute_fertilizer`
--
ALTER TABLE `distribute_fertilizer`
  ADD PRIMARY KEY (`distribution_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `distribute_seed`
--
ALTER TABLE `distribute_seed`
  ADD PRIMARY KEY (`distribution_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `distribute_utility`
--
ALTER TABLE `distribute_utility`
  ADD PRIMARY KEY (`distribution_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `farmer_data`
--
ALTER TABLE `farmer_data`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `farm_profile`
--
ALTER TABLE `farm_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `fertilizers`
--
ALTER TABLE `fertilizers`
  ADD PRIMARY KEY (`fertilizer_id`);

--
-- Indexes for table `fertilizer_archieve`
--
ALTER TABLE `fertilizer_archieve`
  ADD PRIMARY KEY (`fertilizer_id`);

--
-- Indexes for table `land_parcel`
--
ALTER TABLE `land_parcel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`seed_id`);

--
-- Indexes for table `seed_archieve`
--
ALTER TABLE `seed_archieve`
  ADD PRIMARY KEY (`seed_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`utility_id`);

--
-- Indexes for table `utility_archieve`
--
ALTER TABLE `utility_archieve`
  ADD PRIMARY KEY (`utility_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribute_fertilizer`
--
ALTER TABLE `distribute_fertilizer`
  MODIFY `distribution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `distribute_seed`
--
ALTER TABLE `distribute_seed`
  MODIFY `distribution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `distribute_utility`
--
ALTER TABLE `distribute_utility`
  MODIFY `distribution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmer_data`
--
ALTER TABLE `farmer_data`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `farm_profile`
--
ALTER TABLE `farm_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fertilizers`
--
ALTER TABLE `fertilizers`
  MODIFY `fertilizer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fertilizer_archieve`
--
ALTER TABLE `fertilizer_archieve`
  MODIFY `fertilizer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `land_parcel`
--
ALTER TABLE `land_parcel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `seed_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seed_archieve`
--
ALTER TABLE `seed_archieve`
  MODIFY `seed_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `utility_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `utility_archieve`
--
ALTER TABLE `utility_archieve`
  MODIFY `utility_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archieve_farm_land`
--
ALTER TABLE `archieve_farm_land`
  ADD CONSTRAINT `archieve_farm_land_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `archieve_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `archieve_farm_profile`
--
ALTER TABLE `archieve_farm_profile`
  ADD CONSTRAINT `archieve_farm_profile_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `archieve_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `archieve_land_parcel`
--
ALTER TABLE `archieve_land_parcel`
  ADD CONSTRAINT `archieve_land_parcel_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `archieve_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribute_fertilizer`
--
ALTER TABLE `distribute_fertilizer`
  ADD CONSTRAINT `distribute_fertilizer_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribute_seed`
--
ALTER TABLE `distribute_seed`
  ADD CONSTRAINT `distribute_seed_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribute_utility`
--
ALTER TABLE `distribute_utility`
  ADD CONSTRAINT `distribute_utility_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD CONSTRAINT `farm_land_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm_profile`
--
ALTER TABLE `farm_profile`
  ADD CONSTRAINT `farm_profile_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land_parcel`
--
ALTER TABLE `land_parcel`
  ADD CONSTRAINT `land_parcel_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
