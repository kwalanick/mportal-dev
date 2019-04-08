-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 02:19 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marine`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_clients`
--

CREATE TABLE `agent_clients` (
  `id` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `policy_no` varchar(20) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `sum_insured` bigint(20) NOT NULL,
  `total_premium` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_clients`
--

INSERT INTO `agent_clients` (`id`, `agent`, `policy_no`, `period_from`, `period_to`, `sum_insured`, `total_premium`) VALUES
(1, 1, '', '2017-02-08', '2017-02-22', 780000, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `agmnf`
--

CREATE TABLE `agmnf` (
  `agtid` int(10) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `name` varchar(400) NOT NULL,
  `addr1` varchar(400) NOT NULL DEFAULT 'default',
  `type` varchar(100) DEFAULT NULL,
  `email` varchar(400) NOT NULL,
  `mobile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agmnf`
--

INSERT INTO `agmnf` (`agtid`, `branch`, `agent`, `name`, `addr1`, `type`, `email`, `mobile`) VALUES
(1, '010', '748', 'nesh munene', 'default', NULL, 'maxwell.munene@aimsoft.co.ke', '0702973929');

-- --------------------------------------------------------

--
-- Table structure for table `cargocat`
--

CREATE TABLE `cargocat` (
  `catid` int(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargocat`
--

INSERT INTO `cargocat` (`catid`, `category`, `user`) VALUES
(3, 'Metals and Pipes', 2),
(4, 'Paper,Wool and Cotton', 2),
(5, 'Personal Effects & Hse goods', 1),
(6, 'Piece Goods', 1),
(7, 'Chemicals, Pharmaceuticals, Acids and Paints', 2),
(8, 'Starch', 2),
(9, 'Stone, Cement, Coal and Clay', 2),
(10, 'Tyres, Rubber and Plastics', 2),
(11, 'Vehicles, Electricals and Machinery', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cargotype`
--

CREATE TABLE `cargotype` (
  `ctypeid` int(10) NOT NULL,
  `catid` int(10) NOT NULL,
  `ctype` varchar(200) NOT NULL,
  `crate` decimal(10,0) NOT NULL DEFAULT '0',
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargotype`
--

INSERT INTO `cargotype` (`ctypeid`, `catid`, `ctype`, `crate`, `user`) VALUES
(4, 2, 'Canned goods', '5', 2),
(12, 7, 'Acids in glass', '10', 2),
(13, 1, 'Bleaching Powder in drums', '10', 2),
(14, 7, 'Calcium Carbide in drums', '10', 2),
(15, 2, 'Caustic Soda', '10', 2),
(16, 2, 'Chemicals & dyes in glass', '10', 2),
(21, 6, 'piece', '6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `cargo_type` int(10) NOT NULL,
  `shipping_mode` varchar(10) NOT NULL,
  `package_type` varchar(30) NOT NULL,
  `shp_cover_type` varchar(50) NOT NULL,
  `sum_insured` int(11) NOT NULL,
  `country_orig` varchar(50) NOT NULL,
  `country_dest` varchar(50) NOT NULL,
  `city_orig` varchar(50) NOT NULL,
  `city_dest` varchar(50) NOT NULL,
  `owner` varchar(80) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `p_from` date NOT NULL,
  `p_to` date NOT NULL,
  `pin` varchar(12) NOT NULL,
  `premium` decimal(10,0) NOT NULL,
  `userid` int(11) NOT NULL,
  `Total_premium` decimal(10,0) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `pesa_track_id` varchar(70) NOT NULL DEFAULT '00empty',
  `remark` varchar(200) DEFAULT NULL,
  `amount` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `category`, `cargo_type`, `shipping_mode`, `package_type`, `shp_cover_type`, `sum_insured`, `country_orig`, `country_dest`, `city_orig`, `city_dest`, `owner`, `email`, `mobile`, `p_from`, `p_to`, `pin`, `premium`, `userid`, `Total_premium`, `paid`, `pesa_track_id`, `remark`, `amount`) VALUES
(1, 0, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', '3344', '667', 1, '0', 0, '00empty', NULL, 0),
(2, 0, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', '3344', '667', 1, '0', 0, '00empty', NULL, 0),
(3, 0, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', '3344', '667', 2, '0', 0, '00empty', NULL, 0),
(4, 0, 1, '4', 'Air', 'Port to Port', 300000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'maxwell.munene@aimsoft.co.ke', '8974982', '2017-01-03', '2017-01-06', '254', '12000', 2, '0', 0, '00empty', NULL, 0),
(5, 0, 5, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 40000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'maxwell.munene@aimsoft.co.ke', '8974982', '2017-01-11', '2017-01-24', '254', '2000', 2, '0', 0, '00empty', NULL, 0),
(6, 0, 4, 'Sea', 'Containerized', 'Port to Port', 50000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'maxwell munene', 'max@gmail.com', '0702979399', '2017-01-04', '2017-01-05', '223333', '2275', 2, '0', 0, '00empty', NULL, 0),
(7, 0, 9, 'Sea', 'Non-Containerized', 'Port to Port', 60000000, 'kenya', 'Uganda', 'nakuru', 'Kampala', 'maxwell munene', 'aims@gmail.com', '0702979399', '2017-01-19', '2017-01-11', '76766733', '5730000', 2, '0', 0, '00empty', NULL, 0),
(8, 0, 4, 'Air', '2', 'Port to Port', 5000000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-27', '4435553', '227500', 2, '0', 0, '00empty', NULL, 0),
(9, 0, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', '6637', '33300', 2, '0', 0, '00empty', NULL, 0),
(10, 0, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', '6637', '33300', 2, '0', 0, '00empty', NULL, 0),
(11, 0, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', '6637', '33300', 2, '0', 0, '00empty', NULL, 0),
(12, 0, 5, 'Sea', 'Containerized', 'Port to Port', 60000000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-28', '2017-01-30', '777866', '3330000', 2, '0', 0, '00empty', NULL, 0),
(13, 0, 4, 'Air', '2', 'Warehouse to Warehouse', 900000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-30', '7784333', '40950', 2, '0', 0, '00empty', NULL, 0),
(14, 0, 4, 'Sea', 'Containerized', 'Port to Port', 12000000, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-31', '66734', '480000', 2, '546000', 0, '00empty', NULL, 0),
(15, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '76472', '240000', 2, '273000', 0, '00empty', NULL, 0),
(16, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '76472', '240000', 2, '273000', 0, '00empty', NULL, 0),
(17, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '76472', '240000', 2, '273000', 0, '00empty', NULL, 0),
(18, 0, 5, 'Sea', 'Containerized', 'Port to Port', 5000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '56555', '250', 2, '278', 0, '00empty', NULL, 0),
(19, 0, 5, 'Sea', 'Containerized', 'Warehouse to Warehouse', 6000000, 'Tanzania', 'Uganda', 'Dodoma', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '556363', '300000', 2, '333000', 0, '00empty', NULL, 0),
(20, 0, 5, 'Sea', 'Containerized', 'Port to Port', 7000000, 'Tanzania', 'Kenya', 'Dodoma', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '77688', '350000', 2, '388500', 0, '00empty', NULL, 0),
(21, 0, 4, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 900000, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-30', '2017-01-31', '89999', '45000', 2, '49950', 0, '00empty', NULL, 0),
(22, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 700000, 'kenya', 'Kenya', 'Nairobi', 'Nakuru', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-02', '77688', '35000', 2, '38850', 0, '00empty', NULL, 0),
(23, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 900000, 'kenya', 'Uganda', 'Nairobi', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', '777866', '45000', 2, '49950', 0, '00empty', NULL, 0),
(24, 0, 4, 'Air', '2', 'Port to Port', 780000, 'kenya', 'Egypt', 'Nairobi', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-02', '33442', '39000', 2, '43290', 0, '00empty', NULL, 0),
(25, 0, 4, 'Sea', 'Containerized', 'Port to Port', 700000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-02', '667755', '35000', 2, '38850', 1, '00empty', 'fully paid', 38850),
(26, 0, 4, 'Sea', 'Containerized', 'Port to Port', 800000, 'kenya', 'Kenya', 'Nairobi', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-02', '6674', '40000', 2, '44400', 1, '00empty', NULL, 0),
(27, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 8000000, 'Japan', 'Kenya', 'Tokyo', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-01', '12344454', '400000', 2, '444000', 1, '00empty', NULL, 0),
(28, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 900000, 'Japan', 'Kenya', 'Tokyo', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-02-01', '3443423', '45000', 2, '49950', 1, '00empty', NULL, 0),
(29, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 779000, 'Japan', 'USA', 'Tokyo', 'Michigan', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-02', '8998', '38950', 2, '43235', 1, '00empty', NULL, 0),
(30, 0, 4, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 90000, 'Japan', 'Uganda', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-02', '88997', '4500', 2, '4995', 1, '00empty', NULL, 0),
(31, 0, 4, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 455000, 'Burundi', 'South Africa', 'Bujumbura', 'Pretoria', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-02', '7788', '22750', 2, '25253', 1, '00empty', NULL, 0),
(32, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 230000, 'South Africa', 'Japan', 'Pretoria', 'Tokyo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-10', '9900', '11500', 2, '12765', 1, '0f15aee0-023c-44c3-8a3e-22c4dd8951ac', NULL, 0),
(33, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 799900, 'kenya', 'Uganda', 'Nairobi', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-18', '77484', '39995', 2, '44395', 1, '3e40ca01-44c5-455d-bafd-30f1751ad185', NULL, 0),
(34, 0, 4, 'Sea', 'Containerized', 'Select Cover', 8000, 'kenya', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-09', '900', '400', 2, '444', 1, 'a0617027-d887-452d-961f-a81649b17254', NULL, 0),
(35, 0, 4, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 90000, 'Nigeria', 'Kenya', 'Dodoma', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-02', '77688', '4500', 2, '4995', 1, 'c343ade7-ed9f-44c7-b1a4-dd2f2daf8b19', NULL, 0),
(36, 0, 4, 'Sea', 'Non-Containerized', 'Port to Port', 89000, 'Tanzania', 'Uganda', 'Dodoma', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-01', '2017-02-09', '778866', '4450', 2, '4940', 1, '00empty', NULL, 0),
(37, 0, 16, 'Sea', 'Containerized', 'Port to Port', 678888, 'Tanzania', 'Kenya', 'Dodoma', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-03-02', '2017-03-03', '6655', '33945', 2, '37679', 1, '02013742-a30c-4d48-9892-d60475ff441a', NULL, 0),
(38, 0, 16, 'Sea', 'Containerized', 'Port to Port', 1290200, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-22', '2017-02-16', '77886', '64510', 2, '71607', 1, 'e4b04a23-b407-42c2-a94d-b7717f8767a6', NULL, 0),
(39, 0, 16, 'Sea', 'Non-Containerized', 'Port to Port', 90888, 'kenya', 'Egypt', 'Nairobi', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-08', '2017-02-10', '989', '4545', 2, '5045', 1, 'ee8976e9-834d-4cb0-99d4-facca4e6e196', NULL, 0),
(40, 0, 16, 'Sea', 'Containerized', 'Warehouse to Warehouse', 89999, 'Nigeria', 'Uganda', 'Lagos', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-15', '2017-02-28', 'A1223344444', '4500', 2, '5040', 0, '00empty', NULL, 0),
(41, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 890000, 'Tanzania', 'Kenya', 'Dodoma', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-15', '2017-02-16', 'a7786637333', '44500', 2, '49840', 1, '00empty', NULL, 0),
(42, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 9033333, 'Nigeria', 'USA', 'Lagos', 'Michigan', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-09', '2017-02-17', 'q3342333333', '451667', 2, '505867', 1, '00empty', NULL, 0),
(43, 0, 16, 'Sea', 'Non-Containerized', 'Port to Port', 90000, 'kenya', 'USA', 'Nairobi', 'Michigan', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-08', '2017-02-10', 's4433445565', '4500', 2, '5040', 1, '41612cff-3c14-40f3-bd8a-de3c5e437afe', NULL, 0),
(44, 0, 16, 'Air', 'Containerized', 'Port to Port', 900000, 'Tanzania', 'Japan', 'Dodoma', 'Tokyo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-14', '2017-02-16', 'r6677889999', '45000', 2, '50400', 1, '2a83e872-0744-460a-9cab-7a2fe3e8eb12', NULL, 0),
(45, 0, 16, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 90339, 'Nigeria', 'Kenya', 'Dodoma', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-08', '2017-02-16', 't6667787867', '4517', 2, '5059', 1, '00empty', NULL, 0),
(46, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 9000000, 'Tanzania', 'Egypt', 'Dodoma', 'Cairo', 'maxwell munene', 'maxwell.munene@aimsoft.co.ke', '0000000034', '2017-02-15', '2017-02-17', 'A1223344444', '450000', 4, '50400', 1, 'fb1ac33c-ee30-438e-9c37-183368239640', NULL, 0),
(47, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 78900, 'Tanzania', 'Kenya', 'Dodoma', 'Nairobi', 'maxwell munene', 'maxwell.munene@aimsoft.co.ke', '0000000034', '2017-02-08', '2017-02-16', 'a3444334444', '3945', 4, '4419', 1, '24537506-b467-44fd-943b-77f1a0f0a65b', NULL, 0),
(48, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 90000, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'test tester', 't@test.com', '0702973929', '2017-02-15', '2017-02-16', 'A2334400959', '4500', 29, '5040', 1, '00empty', NULL, 0),
(49, 0, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 907356, 'Nigeria', 'USA', 'Lagos', 'Michigan', 'maxwell munene', 'maxwell.munene@aimsoft.co.ke', '0000000034', '2017-02-28', '2017-02-22', 'A00198784r6', '90736', 4, '96180', 1, '00empty', NULL, 0),
(50, 0, 16, 'Sea', 'Containerized', 'Warehouse to Warehouse', 564444, 'South Africa', 'Burundi', 'Pretoria', 'Bujumbura', 'test tester', 't@test.com', '0702973929', '2017-02-08', '2017-02-16', 'A87376267g6', '56445', 29, '59832', 1, '2509dd0f-e00b-4278-823d-df4cf677429f', NULL, 0),
(51, 2, 16, 'Sea', 'Non-Containerized', 'Port to Port', 89000, 'Nigeria', 'Kenya', 'Lagos', 'Nakuru', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-14', '2017-02-17', 's2344fg4445', '8900', 2, '9434', 1, '00empty', NULL, 0),
(52, 2, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 907733, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-07', '2017-02-21', 'a7678682224', '45387', 2, '50834', 1, '00empty', NULL, 0),
(53, 2, 16, 'Sea', 'Containerized', 'Warehouse to Warehouse', 904444, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-08', '2017-02-23', 'A1223344444', '45223', 2, '50649', 1, '00empty', 'full payment', 50649),
(54, 2, 16, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 90637, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-08', '2017-02-15', 'A2334400959', '4532', 2, '5076', 1, '00empty', 'full payment of premiums', 5076),
(55, 2, 16, 'Air', 'Containerized', 'Warehouse to Warehouse', 906363, 'Kenya', 'Kenya', 'Nairobi', 'Mombasa', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-02-14', '2017-02-15', 'A00198784r6', '45319', 2, '50757', 0, '00empty', NULL, 0),
(56, 7, 14, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 1000000, 'Uganda', 'Kenya', 'Select Type', 'Nairobi', 'DDDD KKKK', 'daniel.kanja@aimsoft.co.ke', '0720114295', '2017-02-06', '2017-02-07', 'P2213239876', '10000', 25, '10600', 1, '00empty', 'deni', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `Country_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `Country_code`, `city`) VALUES
(1, 1, 'Nairobi'),
(2, 1, 'Nakuru'),
(3, 1, 'Mombasa'),
(4, 1, 'Eldoret'),
(5, 1, 'Kisumu'),
(6, 1, 'Thika'),
(7, 1, 'Nanyuki');

-- --------------------------------------------------------

--
-- Table structure for table `cltsms`
--

CREATE TABLE `cltsms` (
  `smsid` int(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `receiver` int(100) NOT NULL,
  `message` varchar(400) NOT NULL,
  `createdate` varchar(50) NOT NULL,
  `sentdate` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `creator` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cltsms`
--

INSERT INTO `cltsms` (`smsid`, `category`, `receiver`, `message`, `createdate`, `sentdate`, `status`, `creator`) VALUES
(3, 'Custom', 44, 'testing', '2017-01-25 11:07:34', '2017-01-25 11:07:34', 'send', '5'),
(4, 'Custom', 0, 'nimecheki msg', '2017-01-25 11:08:12', '2017-01-25 11:08:12', 'send', '5'),
(5, 'Custom', 44, 'te', '2017-01-25 11:16:27', '2017-01-25 11:16:27', 'send', '2'),
(6, 'Custom', 23, 'hi.please confirm if you get this message', '2017-01-25 14:25:57', '2017-01-25 14:25:57', 'send', '2'),
(7, 'Custom', 34, 'lol', '2017-01-25 14:59:02', '2017-01-25 14:59:02', 'send', '2');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE `constants` (
  `id` int(11) NOT NULL,
  `stamp_duty` float NOT NULL,
  `policy_fund` float NOT NULL,
  `Training_levy` float NOT NULL,
  `war` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`id`, `stamp_duty`, `policy_fund`, `Training_levy`, `war`) VALUES
(2, 0.1, 0.25, 0.2, 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Kenya'),
(2, 'Uganda'),
(3, 'Tanzania'),
(4, 'Egypt'),
(5, 'Nigeria'),
(6, 'U.S.A'),
(7, 'England'),
(8, 'South Africa'),
(9, 'Namibia'),
(10, 'Somalia'),
(11, 'Gabon'),
(12, 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faqid` int(10) NOT NULL,
  `faquestion` varchar(2000) NOT NULL,
  `faqanswer` varchar(2000) NOT NULL,
  `faqdate` varchar(50) NOT NULL,
  `creator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faqid`, `faquestion`, `faqanswer`, `faqdate`, `creator`) VALUES
(1, 'Test FAQ    ', 'can be accessed  tested', '24/08/2015', 1),
(3, 'How to change password? .', 'Access profile link under username top right corner ', '2017-01-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loghist`
--

CREATE TABLE `loghist` (
  `log_id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `logout` varchar(50) DEFAULT NULL,
  `logged` varchar(2) NOT NULL,
  `activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loghist`
--

INSERT INTO `loghist` (`log_id`, `user_id`, `login`, `logout`, `logged`, `activity`) VALUES
(1, '2', '09/01/2017 07:25:35', '17/01/2017 14:29:07', 'Y', ''),
(2, '2', '16/01/2017 14:19:20', '17/01/2017 14:29:07', 'Y', ''),
(3, '2', '17/01/2017 14:29:13', '20/01/2017 12:47:54', 'Y', ''),
(4, '2', '2017-02-06 10:37:45', NULL, 'Y', 'login'),
(5, '2', '2017-02-06 10:38:35', NULL, 'Y', 'login'),
(6, '', '2017-02-06 10:43:33', NULL, 'Y', 'generated certificate'),
(7, '2', '2017-02-06 11:11:58', NULL, 'Y', 'login'),
(8, '2', '2017-02-06 11:41:56', NULL, 'Y', 'generated certificate'),
(9, '2', '2017-02-06 11:42:10', NULL, 'Y', 'login'),
(10, '2', '2017-02-06 12:16:43', NULL, 'Y', 'login'),
(11, '2', '2017-02-06 12:48:58', NULL, 'Y', 'login'),
(12, '2', '2017-02-06 14:12:37', NULL, 'Y', 'login'),
(13, '2', '2017-02-06 14:43:45', NULL, 'Y', 'login'),
(14, '', '2017-02-06 14:43:51', NULL, 'Y', 'printing certificate no 54'),
(15, '25', '2017-02-06 16:20:46', NULL, 'Y', 'login'),
(16, '25', '2017-02-06 16:41:32', NULL, 'Y', 'generated certificate'),
(17, '2', '2017-02-06 16:45:15', NULL, 'Y', 'login'),
(18, '2', '2017-02-07 08:20:51', NULL, 'Y', 'login'),
(19, '2', '2017-02-07 09:10:47', NULL, 'Y', 'login'),
(20, '4', '2017-02-07 10:04:33', NULL, 'Y', 'login'),
(21, '4', '2017-02-07 10:36:23', NULL, 'Y', 'login'),
(22, '2', '2017-02-07 10:39:46', NULL, 'Y', 'login'),
(23, '2', '2017-02-07 11:41:20', NULL, 'Y', 'login'),
(24, '', '2017-02-07 12:02:19', NULL, 'Y', 'printing certificate no 56'),
(25, '', '2017-02-07 12:02:32', NULL, 'Y', 'printing certificate no 54'),
(26, '2', '2017-02-07 14:38:08', NULL, 'Y', 'login'),
(27, '2', '2017-02-10 16:09:47', NULL, 'Y', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `mail_activate`
--

CREATE TABLE `mail_activate` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_activate`
--

INSERT INTO `mail_activate` (`id`, `email`, `code`) VALUES
(1, 'maxwell.munene@aimsoft.co.ke', 19904),
(2, 'maxwell.munene@aimsoft.co.ke', 94836),
(3, 'maxwell.munene@aimsoft.co.ke', 66730),
(4, 'daniel.kanja@aimsoft.co.ke', 61591),
(5, 'maxwell.munene@aimsoft.co.ke', 50237),
(6, 'maxwell.munene@aimsoft.co.ke', 50723),
(7, 'maxwell.munene@aimsoft.co.ke', 11035);

-- --------------------------------------------------------

--
-- Table structure for table `p_recovery`
--

CREATE TABLE `p_recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_recovery`
--

INSERT INTO `p_recovery` (`id`, `email`, `code`) VALUES
(1, 'h@k.com', 25897),
(2, 'maxwell.munene@aimsoft.co.ke', 95308),
(3, 'daniel.kanja@aimsoft.co.ke', 49416),
(4, 'lol@g.com', 0),
(5, 'kanjakd@gmail.com', 0),
(6, 'test@g.com', 0),
(7, 't@test.com', 0),
(8, 'n@g.com', 0),
(9, 'maxwell.munene@aimsoft.co.ke', 0),
(10, 'maxwell.munene@aimsoft.co.ke', 0),
(11, 'maxwell.munene@aimsoft.co.ke', 0),
(12, 'maxwell.munene@aimsoft.co.ke', 0),
(13, 'maxwell.munene@aimsoft.co.ke', 0),
(14, 'maxwell.munene@aimsoft.co.ke', 0),
(15, 'maxwell.munene@aimsoft.co.ke', 0),
(16, 'daniel.kanja@aimsoft.co.ke', 0),
(17, 'maxwell.munene@aimsoft.co.ke', 0),
(18, 'maxwell.munene@aimsoft.co.ke', 0),
(19, 'maxwell.munene@aimsoft.co.ke', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `termid` int(10) NOT NULL,
  `termcondition` varchar(500) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`termid`, `termcondition`, `user`) VALUES
(1, 'Test condition', 2),
(2, 'A starting', 2),
(3, 'Z ending test', 2),
(4, 'lol', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `username` varchar(200) NOT NULL DEFAULT 'user',
  `admin` int(10) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `id_no` int(11) NOT NULL DEFAULT '0',
  `mobile_no` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `telephone_no` int(11) DEFAULT NULL,
  `fax_no` int(11) DEFAULT NULL,
  `pin` varchar(12) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `username`, `admin`, `password`, `address`, `email`, `id_no`, `mobile_no`, `telephone_no`, `fax_no`, `pin`, `active`) VALUES
(1, 'Daniel', 'Kanja', 'dan', 0, '2591e5f46f28d303f9dc027d475a5c60d8dea17a', '', '', 0, 0000000000, 0, 0, '', 1),
(2, 'Aimsoft', 'Limited', 'aims', 1, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'Geomaps center', 'aims@gmail.com', 29601299, 0702973929, 0, 67776873, '7736AQ87', 1),
(3, 'Guest', 'User', 'guest', 0, '2ac15cab107096305d0274cd4eb86c74bb35a4b4', '', '', 0, 0000000000, 0, 0, '', 1),
(4, 'maxwell', 'munene', 'nesh', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, 56, '3442', 1),
(5, 'maxwell', 'munene', 'maxwell', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', NULL, 'lol@gmail.com', 66662, 0000000044, NULL, NULL, '', 1),
(6, 'maxwell', 'munene', 'max', 0, 'f7177163c833dff4b38fc8d2872f1ec6', NULL, 'test@gmail.com', 666624, 0000000023, NULL, NULL, '', 0),
(7, 'Dan', 'Kan', '', 0, '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'dan@dan.com', 11288888, 0000007222, NULL, NULL, '', 0),
(8, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 112244, 0000009111, NULL, NULL, '', 0),
(9, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL, '', 0),
(10, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL, '', 0),
(11, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL, '', 0),
(12, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL, '', 0),
(24, 'humphrey', 'ndirangu', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'humphrey.ndirangu@aimsoft.co.ke', 45546, 0789657456, NULL, NULL, '', 0),
(25, 'DDDD', 'KKKK', 'user', 0, '683dcf491e8f82f49e5229f4fc75fd2890638905', NULL, 'daniel.kanja@aimsoft.co.ke', 12345678, 0720114295, NULL, NULL, '', 1),
(26, 'test', 'test 2', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'lol@g.com', 23907688, 0702973929, NULL, NULL, 'a334fg', 0),
(27, 'KKKK', 'KDK', 'user', 0, '0f281d173f0fdfdccccd7e5b8edc21f1', NULL, 'kanjakd@gmail.com', 121212, 0720114295, NULL, NULL, 'p1223', 0),
(28, 'test', 'test 2', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef\n\n', NULL, 'test@g.com', 665566777, 0702973929, NULL, NULL, 'A1223344444', 0),
(29, 'test', 'tester', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 't@test.com', 736363, 0702973929, NULL, NULL, 'qw889373737', 0),
(30, 'nesh', 'munesh', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'n@g.com', 67456745, 0702973929, NULL, NULL, 'A1223344444', 0),
(31, 'john', 'mochoge', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 8778831, 0702973929, NULL, NULL, 'A1223344444', 1),
(32, 'john', 'mutula', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 545462, 0702973929, NULL, NULL, 'A1223344444', 1),
(33, 'alla', 'kiboi', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 576572, 0702973929, NULL, NULL, 'A1223344444', 1),
(34, 'loki', 'levante', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 313123, 0702973929, NULL, NULL, 'A1223344444', 1),
(35, 'john', 'onyango', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 334242, 0702973929, NULL, NULL, 'A1223344444', 1),
(36, 'nesh', 'munene', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 0, 0702973929, NULL, NULL, 'A7638736812', 0),
(37, 'nesh', 'munene', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 0, 0702973929, NULL, NULL, 'A7638736812', 0),
(38, 'maxwell', 'munene', 'user', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, NULL, '43244', 0),
(39, 'maxwell', 'munene', 'user', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, NULL, '43244', 0),
(40, 'maxwell', 'munene', 'user', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, NULL, '2342', 0),
(41, 'maxwell', 'munene', 'user', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, NULL, '2342', 0),
(42, 'ddkk', 'kkkd', 'user', 0, '683dcf491e8f82f49e5229f4fc75fd2890638905', NULL, 'daniel.kanja@aimsoft.co.ke', 12457896, 0714760706, NULL, NULL, 'P1212122234', 1),
(43, 'john', 'Anyanza', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 56225661, 0702973929, NULL, NULL, 'A1223344444', 0),
(44, 'john', 'Anyanza', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 665363, 0702973929, NULL, NULL, 'A1223344444', 0),
(45, 'john', 'Anyanza', 'user', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'maxwell.munene@aimsoft.co.ke', 2311223, 0702973929, NULL, NULL, 'A1223344444', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_clients`
--
ALTER TABLE `agent_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agmnf`
--
ALTER TABLE `agmnf`
  ADD PRIMARY KEY (`agtid`);

--
-- Indexes for table `cargocat`
--
ALTER TABLE `cargocat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `cargotype`
--
ALTER TABLE `cargotype`
  ADD PRIMARY KEY (`ctypeid`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cltsms`
--
ALTER TABLE `cltsms`
  ADD PRIMARY KEY (`smsid`);

--
-- Indexes for table `constants`
--
ALTER TABLE `constants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faqid`);

--
-- Indexes for table `loghist`
--
ALTER TABLE `loghist`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mail_activate`
--
ALTER TABLE `mail_activate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_recovery`
--
ALTER TABLE `p_recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`termid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_clients`
--
ALTER TABLE `agent_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agmnf`
--
ALTER TABLE `agmnf`
  MODIFY `agtid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cargocat`
--
ALTER TABLE `cargocat`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cargotype`
--
ALTER TABLE `cargotype`
  MODIFY `ctypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cltsms`
--
ALTER TABLE `cltsms`
  MODIFY `smsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `constants`
--
ALTER TABLE `constants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faqid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loghist`
--
ALTER TABLE `loghist`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `mail_activate`
--
ALTER TABLE `mail_activate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `p_recovery`
--
ALTER TABLE `p_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `termid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
