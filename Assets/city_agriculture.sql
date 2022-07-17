-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 05:16 PM
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
-- Table structure for table `databin_farmer_data`
--

CREATE TABLE `databin_farmer_data` (
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
  `Date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `databin_farm_land`
--

CREATE TABLE `databin_farm_land` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ARB` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `tot_farm_area` varchar(255) DEFAULT NULL,
  `ownership_docNo` int(10) DEFAULT NULL,
  `Ownership` varchar(50) DEFAULT NULL,
  `tenant_landOwnname` varchar(255) DEFAULT NULL,
  `lessee_landOwnername` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `databin_farm_profile`
--

CREATE TABLE `databin_farm_profile` (
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
-- Table structure for table `databin_land_parcel`
--

CREATE TABLE `databin_land_parcel` (
  `id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `NoofFarmParcel` varchar(255) NOT NULL,
  `Crop_commodity` varchar(100) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `size_ha` varchar(100) DEFAULT NULL,
  `farm_type` varchar(100) DEFAULT NULL,
  `organic_practitioner` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_data`
--

INSERT INTO `farmer_data` (`u_id`, `ReferenceControlNo`, `Surname`, `Firstname`, `Middlename`, `Extensionname`, `Sex`, `House_Lot_BLDGNo`, `Street_Sitio_SUBDV`, `Barangay`, `Municipality_City`, `Province`, `Region`, `Contact_number`, `Birthdate`, `Place_of_Birth`, `Religion`, `Civil_status`, `Name_of_Spouse`, `Mother_maidenname`, `householded`, `name_ofhouseholdhead`, `Relationship`, `no_oflivinghouse_members`, `no_ofMale`, `no_ofFemale`, `Education_attainment`, `person_with_disability`, `FourPs_beneficiary`, `memberof_indigengroup`, `specify_if_yes`, `with_governmentID`, `specify_if_yes1`, `memberof_FAC`, `specify_if_yes2`, `person_tonotify`, `person_contactNo`, `image`, `Date_created`) VALUES
(3, '-4448', 'Divina', 'Reyniel', 'N/A', 'Ext-1109', 'Male', '271', 'Bani Pangasinan', 'Banian', 'Bani', 'Pangasinan', 1, '+639123456789', '12/23/2009', 'Bani', 'Satanism', 'Single', '', 'Montilla', 'No', 'Reyn', 'nano', '100', 209, 0, 'College', 'Yes', 'Yes', 'No', 'N/A', 'Yes', 'NA', 'No', 'N/A', 'wer', '+639123456789', 'IMG_5912.JPG', '2021-10-16'),
(17, '56-988', 'Puda', 'Reyneil', 'Montilla', 'Ext-1109', 'Female', '271', 'San jose', '', 'Bani', 'Pangasinan', 1, '+639123456789', '12/23/2009', 'Bani', 'Satanism', 'Single', '', 'Montilla', 'Yes', '', 'nan', '1', 1, 1, 'College', 'No', 'No', 'No', '', 'No', '', 'No', '', 'wer', '+639123456789', '989164.png', '2021-11-09');

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
  `lessee_landOwnername` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm_land`
--

INSERT INTO `farm_land` (`id`, `u_id`, `ARB`, `location`, `tot_farm_area`, `ownership_docNo`, `Ownership`, `tenant_landOwnname`, `lessee_landOwnername`) VALUES
(1, 3, 'Yes', 'Pangasinan', '1', 3, 'Owner', '', ''),
(15, 17, 'Yes', 'San jose', '', 4, 'Registered Owner', '', '');

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
(3, 3, 'Farmworker', '', '', 'Others', 'NA', '4564', '534534'),
(17, 17, 'Farmworker', '', '', 'Planting/Transplanting', '', '4564', '534534');

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
  `organic_practitioner` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land_parcel`
--

INSERT INTO `land_parcel` (`id`, `u_id`, `NoofFarmParcel`, `Crop_commodity`, `others`, `size_ha`, `farm_type`, `organic_practitioner`) VALUES
(2, 3, '1', 'Corn', ' ', '1', 'Land', 'Yes'),
(3, 3, '1', 'Rice', ' ', '67879', 'Land', 'Yes'),
(9, 17, '1', 'Rice', ' ', '2', 'Land', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `databin_farmer_data`
--
ALTER TABLE `databin_farmer_data`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `databin_farm_land`
--
ALTER TABLE `databin_farm_land`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `databin_farm_profile`
--
ALTER TABLE `databin_farm_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `databin_land_parcel`
--
ALTER TABLE `databin_land_parcel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

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
-- Indexes for table `land_parcel`
--
ALTER TABLE `land_parcel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer_data`
--
ALTER TABLE `farmer_data`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `farm_profile`
--
ALTER TABLE `farm_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `land_parcel`
--
ALTER TABLE `land_parcel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `databin_farm_land`
--
ALTER TABLE `databin_farm_land`
  ADD CONSTRAINT `databin_farm_land_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `databin_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `databin_farm_profile`
--
ALTER TABLE `databin_farm_profile`
  ADD CONSTRAINT `databin_farm_profile_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `databin_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `databin_land_parcel`
--
ALTER TABLE `databin_land_parcel`
  ADD CONSTRAINT `databin_land_parcel_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `databin_farmer_data` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
