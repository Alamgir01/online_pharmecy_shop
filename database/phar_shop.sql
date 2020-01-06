-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2015 at 08:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phar_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `c_name`) VALUES
(4, 'ACI Limited'),
(5, 'Acme Laboratories Ltd.'),
(6, 'Ad-din Pharmaceuticals Ltd.'),
(7, 'Albion Laboratories Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `o_id` int(11) NOT NULL,
  `o_item` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--



-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--



-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `g_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `strength` mediumtext,
  `Dosage_type` varchar(255) DEFAULT NULL,
  `p_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `g_id`, `c_id`, `strength`, `Dosage_type`, `p_price`) VALUES
(1, 'Celofen', 16, 4, '100 mg', 'Tablet', 4.01),
(2, 'Soritec 25 mg', 17, 4, '25 mg', 'Capsule', 85.26),
(3, 'Soritec 10 mg', 18, 4, '10 mg', 'Capsule\r\n', 45),
(4, 'Adgar 0.3%', 19, 4, '3 mg/gm', 'Gel', 80.24),
(5, 'Adgar 0.1%', 19, 4, '100 mg/100 gm', 'Gel', 60.18),
(6, 'Cytonic', 20, 4, '200 mg + 50 mg + 1 gm + 60 mg/100 ml', 'Eye Drops', 120.36),
(7, 'Xylone-A', 21, 4, '5 mcg + 20 mg/ml', 'Injection', 3.75),
(8, 'Sintel 200', 22, 4, '200 mg', 'Tablet', 0),
(9, 'Sintel 400', 22, 4, '400 mg', 'Tablet', 5.02),
(10, 'Sintel', 22, 4, '200 mg/5 ml', 'Suspension', 20.06),
(11, 'Sintel DT', 22, 4, '400 mg', 'Dispersible', 0),
(12, 'Acicaft', 23, 4, '250 mg/100 ml', 'Eye Drops', 0),
(13, 'Alen D', 24, 4, '70 mg + 2800 IU	', 'Tablet', 25.17),
(14, 'Prelab', 25, 4, '5 mg', 'Tablet', 8),
(15, 'Duxit', 26, 4, '30 mg + 10 mg', 'Tablet', 10.05),
(16, 'Xiety 0.25', 27, 4, '.25 mg', 'Tablet', 0),
(17, 'Xiety 0.50', 27, 4, '.5 mg', 'Tablet', 0),
(18, 'Avlocid', 28, 4, '250 mg + 400 mg', 'Tablet', 0.64),
(19, 'Avlocid Plus', 29, 4, '400 mg + 400 mg + 30 mg', 'Tablet', 2.01),
(20, 'Avlocid', 30, 4, '175 mg + 225 mg/5 ml', 'Suspension', 0),
(21, 'Gluco A 100', 31, 5, '100 mg', 'Tablet', 0),
(22, 'Gluco A 50', 31, 5, '50 mg', 'Tablet', 0),
(23, 'Apitac', 16, 5, '100 mg', 'Tablet', 4.01),
(24, 'Acemox', 32, 5, '250 mg', 'Tablet', 2),
(25, 'Avir', 33, 5, '3 gm/100 gm', 'Eye Ointment', 0),
(26, 'Acivir 200', 33, 5, '200 mg', 'Tablet', 0),
(27, 'Acivir 400', 33, 5, '400 mg', 'Tablet', 0),
(28, 'Acivir', 33, 5, '200 mg/5 ml', 'Suspension', 0),
(29, 'Acnegel', 34, 5, '.1 gm + 2.5 gm/100 gm', 'Gel', 160.48),
(30, 'Catnil', 20, 5, '200 mg + 50 mg + 1 gm + 60 mg/100 ml', 'Eye Drops', 125.37),
(31, 'Ben A 400', 22, 5, '400 mg', 'Tablet', 5.01),
(32, 'Benazole', 22, 5, '600 mg', 'Bolus', 7.44),
(33, 'Ben-A', 22, 5, '200 mg/5 ml', 'Suspension	20.07\r\n', 0),
(34, 'Osta 10', 35, 5, '10 mg', 'Tablet', 0),
(35, 'Xofast 60', 36, 6, '60 mg', 'Tablet', 3.5),
(36, 'Xofast 120', 36, 6, '120 mg', 'Tablet', 6),
(37, 'Xofast', 36, 6, '30 mg/5 ml', 'Suspension', 0),
(38, 'Oxacol', 37, 6, '500 mg', 'Capsule', 9),
(39, 'Trigal', 38, 6, '50 mg', 'Capsule', 7),
(40, 'Trigal', 38, 6, '150 mg', 'Capsule', 18),
(41, 'Folate', 39, 6, '5 mg', 'Tablet', 0.3),
(42, 'Frunal', 40, 6, '20 mg + 50 mg', 'Tablet', 6),
(43, 'Sugred', 41, 6, '80 mg', 'Tablet', 6),
(44, 'Glaryl 1', 42, 6, '1 mg', 'Tablet', 2.5),
(45, 'Glaryl 2', 42, 6, '2 mg', 'Tablet', 4),
(46, 'Adapen 10', 43, 6, '10 mg', 'Tablet', 0),
(47, 'Lacor', 44, 6, '10 mg', 'Tablet', 9),
(48, 'Cevozin 5', 45, 6, '5 mg', 'Tablet', 2),
(49, 'Quiva 500 mg', 46, 6, '500 mg', 'Tablet', 13),
(50, 'Cladin', 47, 6, '10 mg', 'Tablet', 2.25),
(51, 'Carlos 50', 48, 6, '50 mg', 'Tablet', 0),
(52, 'Myco HC', 49, 7, '1 gm + 2 gm/100 gm', 'Cream', 0),
(53, 'Altapan 10', 43, 7, '10 mg', 'Tablet', 1.83),
(54, 'Osteonil', 50, 7, '150 mg', 'Tablet', 1500),
(55, 'Ibuprofen', 51, 7, '100 mg/5 ml', 'Suspension', 18.56),
(56, 'Alflam-400', 51, 7, '400 mg', 'Tablet', 1.42),
(57, 'Inco SR', 52, 7, '1.5 mg', 'Tablet', 5),
(58, 'Indomethacin SR', 53, 7, '75 mg', 'Capsule', 3.52),
(59, 'Indomethacin', 53, 7, '25 mg', 'Capsule', 0.6),
(60, 'Albi-Tasty Ispaghul', 54, 7, '3.5 gm', 'Sachet', 4),
(61, 'I-Pour Vet', 55, 7, '1 gm/100 gm	Solution', '42.00', 0),
(62, 'Vetmectin (Vet)', 55, 7, '10 mg/ml', 'Injection', 230),
(63, 'Ketoprofen 50', 56, 7, '50 mg', 'Tablet', 3.5),
(64, 'Ketoprofen 100', 56, 7, '100 mg', 'Tablet', 6),
(65, 'AL-KETO (VET0', 56, 7, '400 mg', 'Bolus', 9),
(66, 'Al-Keto (Vet)', 56, 7, '100 mg/1 ml', 'Injection', 105),
(67, 'Korac', 44, 7, '10 mg', 'Tablet', 10),
(68, 'Korac 30', 44, 7, '30 mg/ml', 'Injection', 55),
(69, 'Veelac', 57, 7, '68 %', 'Oral Solution', 0),
(70, 'Lanzopra 15', 58, 7, '15 mg', 'Capsule', 3.5),
(71, 'Lanzopra 30', 58, 7, '30 mg', 'Capsule', 6),
(72, 'Levamisole', 59, 7, '40 mg/5 ml', 'Syrup', 12);

-- --------------------------------------------------------

--
-- Table structure for table `p_generic`
--

CREATE TABLE `p_generic` (
  `g_id` int(11) NOT NULL,
  `g_name` mediumtext,
  `g_indication` longtext,
  `g_side_effet` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_generic`
--

INSERT INTO `p_generic` (`g_id`, `g_name`, `g_indication`, `g_side_effet`) VALUES
(16, 'Aceclofenac', '', ''),
(17, 'Acitretin', '', ''),
(18, 'Acitretin', '', ''),
(19, 'Adapalene', '', ''),
(20, 'Adenosine + Cytochrome C + Nicotinamide + Sodium Succinate', '', ''),
(21, 'Adrenaline + Lidocaine Hydrochloride', '', ''),
(22, 'Albendazole', '', ''),
(23, 'Alcaftadine', '', ''),
(24, 'Alendronic Acid + Vitamin D3', '', ''),
(25, 'Allystrenol', '', ''),
(26, 'Almitrine Bismesylate + Raubasine', '', ''),
(27, 'Alprazolam', '', ''),
(28, 'Aluminium Hydroxide + Magnesium Hydroxide', '', ''),
(29, 'Aluminium Hydroxide + Magnesium Hydroxide + Simethicone', '', ''),
(30, 'Aluminium Oxide + Magnesium Hydroxide', '', ''),
(31, 'Acarbose', '', ''),
(32, 'Acetazolamide', '', ''),
(33, 'Acyclovir', '', ''),
(34, 'Adapalene + Benzoyl Peroxide', '', ''),
(35, 'Alendronic Acid', '', ''),
(36, 'Fexofenadine Hydrochloride', '', ''),
(37, 'Flucloxacillin', '', ''),
(38, 'Fluconazole', '', ''),
(39, 'Folic Acid', '', ''),
(40, 'Frusemide + Spironolactone', '', ''),
(41, 'Gliclazide', '', ''),
(42, 'Glimepiride', '', ''),
(43, 'Hyoscine Butyl Bromide', '', ''),
(44, 'Ketorolac Tromethamine', '', ''),
(45, 'Levocetirizine Hydrochloride', '', ''),
(46, 'Levofloxacin', '', ''),
(47, 'Loratadine', '', ''),
(48, 'Losartan Potassium', '', ''),
(49, 'Hydrocortisone + Miconazole Nitrate', '', ''),
(50, 'Ibandronic Acid', '', ''),
(51, 'Ibuprofen', '', ''),
(52, 'Indapamide', '', ''),
(53, 'Indomethacin', '', ''),
(54, 'Ispaghula Husk', '', ''),
(55, 'Ivermectin', '', ''),
(56, 'Ketoprofen', '', ''),
(57, 'Lactulose', '', ''),
(58, 'Lansoprazole', '', ''),
(59, 'Levamisole', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `s_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`o_id`,`o_item`),
  ADD KEY `items_fk2` (`o_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `orders_fk` (`s_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `product_fk1` (`g_id`),
  ADD KEY `product_fk2` (`c_id`);

--
-- Indexes for table `p_generic`
--
ALTER TABLE `p_generic`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `p_generic`
--
ALTER TABLE `p_generic`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`),
  ADD CONSTRAINT `items_fk2` FOREIGN KEY (`o_item`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk` FOREIGN KEY (`s_id`) REFERENCES `shippings` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`g_id`) REFERENCES `p_generic` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
