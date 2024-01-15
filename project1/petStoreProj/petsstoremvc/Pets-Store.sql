-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 03:37 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pets-Store`
--

-- --------------------------------------------------------

--
-- Table structure for table `Breed`
--

CREATE TABLE `Breed` (
  `breedID` int(11) NOT NULL,
  `breedName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Breed`
--

INSERT INTO `Breed` (`breedID`, `breedName`) VALUES
(1, 'Labrador Retriever'),
(2, 'German Shepherd'),
(3, 'Beagle'),
(4, 'Golden Retriever'),
(5, 'Poodle');

-- --------------------------------------------------------

--
-- Table structure for table `Pets`
--

CREATE TABLE `Pets` (
  `petID` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(256) NOT NULL,
  `isNeutered` tinyint(1) NOT NULL,
  `pet_breed` int(11) DEFAULT NULL,
  `pet_species` int(11) DEFAULT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Pets`
--

INSERT INTO `Pets` (`petID`, `age`, `color`, `isNeutered`, `pet_breed`, `pet_species`, `name`) VALUES
(1, 2, 'Black', 1, 1, 1, ''),
(2, 3, 'Brown', 0, 2, 1, ''),
(3, 1, 'White', 1, 3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `Pricing`
--

CREATE TABLE `Pricing` (
  `pricingID` int(11) NOT NULL,
  `pet_toy_id` int(11) DEFAULT NULL,
  `pet_name` varchar(256) NOT NULL,
  `pet_toy_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Pricing`
--

INSERT INTO `Pricing` (`pricingID`, `pet_toy_id`, `pet_name`, `pet_toy_price`) VALUES
(1, 1, 'Bead Ball', 5.99),
(2, 2, 'Leashboss Unstuffed Crinkle Dog Toys', 8.99),
(3, 3, 'Plush Toys', 12.99);

-- --------------------------------------------------------

--
-- Table structure for table `Species`
--

CREATE TABLE `Species` (
  `speciesID` int(11) NOT NULL,
  `speciesName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Species`
--

INSERT INTO `Species` (`speciesID`, `speciesName`) VALUES
(1, 'Dog'),
(2, 'Cat');

-- --------------------------------------------------------

--
-- Table structure for table `Toys`
--

CREATE TABLE `Toys` (
  `toysID` int(11) NOT NULL,
  `toysName` varchar(256) NOT NULL,
  `bestFor` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Toys`
--

INSERT INTO `Toys` (`toysID`, `toysName`, `bestFor`) VALUES
(1, 'Bead Ball', 'all'),
(2, 'Leashboss Unstuffed Crinkle Dog Toys', 'all'),
(3, 'Plush Toys', 'all'),
(4, 'Chew Toys', 'all'),
(5, 'Heartbeat Stuffed Dog Toy', 'dog'),
(6, 'Cat Toy Wand', 'cat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Breed`
--
ALTER TABLE `Breed`
  ADD PRIMARY KEY (`breedID`);

--
-- Indexes for table `Pets`
--
ALTER TABLE `Pets`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `pet_breed` (`pet_breed`),
  ADD KEY `pet_species` (`pet_species`);

--
-- Indexes for table `Pricing`
--
ALTER TABLE `Pricing`
  ADD PRIMARY KEY (`pricingID`),
  ADD KEY `pet_toy_id` (`pet_toy_id`);

--
-- Indexes for table `Species`
--
ALTER TABLE `Species`
  ADD PRIMARY KEY (`speciesID`);

--
-- Indexes for table `Toys`
--
ALTER TABLE `Toys`
  ADD PRIMARY KEY (`toysID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Pets`
--
ALTER TABLE `Pets`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Pricing`
--
ALTER TABLE `Pricing`
  MODIFY `pricingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Pets`
--
ALTER TABLE `Pets`
  ADD CONSTRAINT `Pets_ibfk_1` FOREIGN KEY (`pet_breed`) REFERENCES `Breed` (`breedID`),
  ADD CONSTRAINT `Pets_ibfk_2` FOREIGN KEY (`pet_species`) REFERENCES `Species` (`speciesID`);

--
-- Constraints for table `Pricing`
--
ALTER TABLE `Pricing`
  ADD CONSTRAINT `Pricing_ibfk_1` FOREIGN KEY (`pet_toy_id`) REFERENCES `Toys` (`toysID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
