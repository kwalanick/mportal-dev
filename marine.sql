-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 01:55 PM
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
-- Table structure for table `agmnf`
--

CREATE TABLE `agmnf` (
  `agtid` int(10) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `branch_agent` varchar(100) NOT NULL,
  `name` varchar(400) NOT NULL,
  `addr1` varchar(400) NOT NULL,
  `addr2` varchar(400) NOT NULL,
  `addr3` varchar(400) NOT NULL,
  `addr4` varchar(400) NOT NULL,
  `addr5` varchar(400) NOT NULL,
  `license` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `acc_type` varchar(100) NOT NULL,
  `email` varchar(400) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agmnf`
--

INSERT INTO `agmnf` (`agtid`, `branch`, `agent`, `branch_agent`, `name`, `addr1`, `addr2`, `addr3`, `addr4`, `addr5`, `license`, `type`, `acc_type`, `email`, `refno`, `mobile`) VALUES
(1, '10', '29', '01000029', 'AON UGANDA LIMITED', 'AON UGANDA LIMITED', 'P.O.Box 3132 Kampala', '', '0312-229100', '', 'TBA', '3', '3', '', '', ''),
(2, '10', '30', '01000030', 'AVENUE INSURANCE BROKERS', 'AVENUE INSURANCE BROKERS', 'P.O.Box 37682 Kampala', '', '0312-514608', '', 'TBA', '3', '3', '', '', ''),
(3, '10', '31', '01000031', 'AFRICAN RISKS & INSURANCE SERVICES', 'AFRICAN RISKS & INSURANCE SERVICES', 'P.O.Box 7291 Kampala', '', '0718-433636', '', 'TBA', '3', '3', 'admin@balajiinsurancelimited.com', '', ''),
(4, '10', '32', '01000032', 'BARTLETT AFRICA LTD', 'BARTLETT AFRICA LTD', 'P.O.Box 33087 Kampala', '', '256-414-259003', '', 'TBA', '3', '3', '', '', ''),
(5, '10', '33', '01000033', 'BTB INSURANCE BROKERS LIMITED', 'BTB INSURANCE BROKERS LIMITED', 'P.O.Box 37162 Kampala', '', '041-4340141', '', 'TBA', '3', '3', '', '', ''),
(6, '10', '34', '01000034', 'CHANCERY WRIGHT', 'CHANCERY WRIGHT', 'P.O.Bos 25672 Kampala', '', '0414-348464', '', 'TBA', '3', '3', '', '', ''),
(7, '10', '35', '01000035', 'CLARKSON INSURANCE BROKERS LIMITED', 'CLARKSON INSURANCE BROKERS LIMITED', 'P.O.Box 2308 Kampala', '', '25641256658', '', 'TBA', '3', '3', '', '', ''),
(8, '10', '36', '01000036', 'CORPORATE INVESTMENT BROKERS LTD', 'CORPORATE INVESTMENT BROKERS LTD', 'P.O.Box 22269 Kampala', '', '0414-258492', '', 'TBA', '3', '3', '', '', ''),
(9, '10', '37', '01000037', 'EAGLE AFRICA INSURANCE SERVICES UGA', 'EAGLE AFRICA INSURANCE SERVICES UGA', 'P.O.Box 24407 Kampala', '', '0414-348515', '', 'TBA', '3', '3', '', '', ''),
(10, '10', '38', '01000038', 'FIVE STAR INSURANCE SERVICES LTD', 'FIVE STAR INSURANCE SERVICES LTD', 'P.O.Box 23035 Kampala', '', '0414-349089', '', 'TBA', '3', '3', '', '', ''),
(11, '10', '39', '01000039', 'GRASSAVOYE UGANDA LIMITED', 'GRASSAVOYE UGANDA LIMITED', 'P.O.Box 7166 Kampala', '', '0752 779977', '', 'TBA', '3', '3', '', '', ''),
(12, '10', '40', '01000040', 'GUARDIAN REINSURANCE BROKERS LIMITE', 'GUARDIAN REINSURANCE BROKERS LIMITE', 'P.O.Box 24674 Kampala', '', '0414-344500', '', 'TBA', '3', '3', '', '', ''),
(13, '10', '41', '01000041', 'H S JUTLEY INSURANCE BROKERS (U) LI', 'H S JUTLEY INSURANCE BROKERS (U) LI', 'P.O.Box 73682 Kampala', '', '0313-673459', '', 'TBA', '3', '3', '', '', ''),
(14, '10', '42', '01000042', 'HILLCREST COMPANY LIMITED', 'HILLCREST COMPANY LIMITED', 'P.O.Box 8288 Kampala', '', '0414-236015', '', 'TBA', '3', '3', '', '', ''),
(15, '10', '43', '01000043', 'INTERCONTINTAL INSURANCE BROKERS LI', 'INTERCONTINTAL INSURANCE BROKERS LI', 'P.O.Box 8060 Kampala', '', '0414-541963', '', 'TBA', '3', '3', '', '', ''),
(16, '10', '1', '01000001', 'ANNET ILUKO', 'ANNET ILUKO', '', '', '', '', '', '2', '2', '', '', ''),
(17, '10', '2', '01000002', 'ANWAR GHUMMAN', 'ANWAR GHUMMAN', '', '', '773100786', '', '1A/030/2014', '2', '2', '', '', ''),
(18, '10', '3', '01000003', 'BEN DENIS WANYAMA', 'BEN DENIS WANYAMA', '', '', '704552227', '', '1A/033/2014', '2', '2', '', '', ''),
(19, '10', '4', '01000004', 'BRUNO SSERUNKUMA', 'BRUNO SSERUNKUMA', '', '', '772427384', '', '1A/029/2014', '2', '2', '', '', ''),
(20, '10', '5', '01000005', 'CHARLES ANGURIA', 'CHARLES ANGURIA', '', '', '772588775', '', '1A/042/2014', '2', '2', '', '', ''),
(21, '10', '6', '01000006', 'EDWARD SENDAGALLA', 'EDWARD SENDAGALLA', '', '', '775615716', '', '1A/036/2014', '2', '2', '', '', ''),
(22, '10', '7', '01000007', 'FLORENCE MULWANYI', 'FLORENCE MULWANYI', '', 'MBALE', '775140981', '', '1A/038/2014', '2', '2', 'florence.mulwanyi@gmail.com', '', ''),
(23, '10', '8', '01000008', 'HANNINGTON MUBIRU', 'HANNINGTON MUBIRU', '', '', '782896622', '', '1A/028/2014', '2', '2', '', '', ''),
(24, '10', '9', '01000009', 'IMMACULATE WAMIMBI', 'IMMACULATE WAMIMBI', '', '', '772519064', '', '1A/039/2014', '2', '2', '', '', ''),
(25, '10', '10', '01000010', 'JJAGWE ABDOUL', 'JJAGWE ABDOUL', '', '', '773836020', '', '1A/037/2014', '2', '2', '', '', ''),
(26, '10', '11', '01000011', 'LUKMAN KIIRYA (JANU TRADING LTD)', 'LUKMAN KIIRYA (JANU TRADING LTD)', '', 'KANSANGA', '0715558805', '', '1A/031/2014', '2', '2', '', '', ''),
(27, '10', '12', '01000012', 'MICHAEL SEJJENGO LUBANGA', 'MICHAEL SEJJENGO LUBANGA', '', '', '782761000', '', '1A/032/2014', '2', '2', '', '', ''),
(28, '10', '13', '01000013', 'MOSES MUSOKE', 'MOSES MUSOKE', '', '', '772482604', '', '1A/034/2014', '2', '2', '', '', ''),
(29, '10', '14', '01000014', 'ANDREW OJAMBO', 'ANDREW OJAMBO', '', '', '794668848', '', '1A/282/2014', '2', '2', '', '', ''),
(30, '10', '15', '01000015', 'BARACK BAHAME', 'BARACK BAHAME', '', '', '773833811', '', '1A/035/2014', '2', '2', '', '', ''),
(31, '10', '16', '01000016', 'DAVID WONIALA', 'DAVID WONIALA', '', '', '776515769', '', '1A/027/2014', '2', '2', '', '', ''),
(32, '10', '17', '01000017', 'GODFREY KAWULUKUSI', 'GODFREY KAWULUKUSI', '', '', '0', '', '1A/0192/2015', '2', '2', '', '', ''),
(33, '10', '18', '01000018', 'DIDAS MWESIGWE', 'DIDAS MWESIGWE', '', '', '772433832', '', '1A/934/2013', '2', '2', '', '', ''),
(34, '10', '19', '01000019', 'FLORENCE NANTEZA', 'FLORENCE NANTEZA', '', '', '752622972', '', '1A/283/2014', '2', '2', '', '', ''),
(35, '10', '20', '01000020', 'FRANK KAYIIRA', 'FRANK KAYIIRA', '', '', '775221779', '', '1A/041/2014', '2', '2', '', '', ''),
(36, '10', '21', '01000021', 'JOHN BAINOMUGISHA', 'JOHN BAINOMUGISHA', '', '', '772311305', '', '1A/933/2013', '2', '2', '', '', ''),
(37, '10', '22', '01000022', 'ROBERT SSENDAGALA MUSIIGE', 'ROBERT SSENDAGALA MUSIIGE', '', '', '776626883', '', '1A/733/2014', '2', '2', '', '', ''),
(38, '10', '23', '01000023', 'RONALD MUTONZI', 'RONALD MUTONZI', '', '', '702592103', '', '1A/906/2013', '2', '2', '', '', ''),
(39, '10', '24', '01000024', 'SAMUEL KENNETH IKOPIT', 'SAMUEL KENNETH IKOPIT', '', '', '712713767', '', '1A/281/2014', '2', '2', '', '', ''),
(40, '10', '25', '01000025', 'SSEKIWUNGA VINCENT KATENDE', 'SSEKIWUNGA VINCENT KATENDE', '', '', '785137979', '', '1A/284/2014', '2', '2', '', '', ''),
(41, '10', '26', '01000026', 'STEVEN SEWANONDA (CARETECH INVESTME', 'STEVEN SEWANONDA (CARETECH INVESTME', '', '', '752491582', '', '1A/734/2014', '2', '2', '', '', ''),
(42, '10', '27', '01000027', 'WAKWALE FRED WALIMBWA', 'WAKWALE FRED WALIMBWA', '', '', '751525917', '', '1A/040/2014', '2', '2', '', '', ''),
(43, '10', '28', '01000028', 'ABACUS INSURANCE BROKERS (UGANDA) L', 'ABACUS INSURANCE BROKERS (UGANDA) L', 'P.O.Box 50 Kampala', '', '0312-265681', '', 'TBA', '3', '3', '', '', ''),
(44, '10', '44', '01000044', 'KIBOKO FINANCIAL SERVICES LIMITED', 'KIBOKO FINANCIAL SERVICES LIMITED', 'P.O.Box 31376 Kampala', '', '0417-100900', '', 'TBA', '3', '3', '', '', ''),
(45, '10', '45', '01000045', 'LEGACY INSURANCE SERVICES LIMITED', 'LEGACY INSURANCE SERVICES LIMITED', 'P.O.Box 26476 Kampala', '', '041-4341553', '', 'TBA', '3', '3', '', '', ''),
(46, '10', '46', '01000046', 'LIAISON UGANDA LTD.', 'LIAISON UGANDA LTD.', 'P.O.Box 22607 Kampala', '', '0414- 234398', '', 'TBA', '3', '3', '', '', ''),
(47, '10', '47', '01000047', 'MARSH UGANDA LIMITED', 'MARSH UGANDA LIMITED', 'P.O.Box 3190 Kampala', '', '041-4222217', '', 'TBA', '3', '3', '', '', ''),
(48, '10', '48', '01000048', 'NEON INSURANCE BROKERS', 'NEON INSURANCE BROKERS', 'P.O.Box 37414 Kampala', '', '0392-968210', '', 'TBA', '3', '3', '', '', ''),
(49, '10', '49', '01000049', 'PADRE PIO INSURANCE BROKERS LIMITED', 'PADRE PIO INSURANCE BROKERS LIMITED', 'P.O.Box 7446 Kampala', '', '031-2284682', '', 'TBA', '3', '3', '', '', ''),
(50, '10', '50', '01000050', 'RADIANT INSURANCE BROKERS(2009) LIM', 'RADIANT INSURANCE BROKERS(2009) LIM', 'P.O.Box 7356 Kampala', '', '0414-254723', '', 'TBA', '3', '3', '', '', ''),
(51, '10', '51', '01000051', 'ROCK INSURANCE INSURANCE SERVICES L', 'ROCK INSURANCE INSURANCE SERVICES L', 'P.O.Box 28810 Kampala', '', '0414-233339', '', 'TBA', '3', '3', '', '', ''),
(52, '10', '52', '01000052', 'UNIVERSAL GALAXY INSURANCE BROKERS', 'UNIVERSAL GALAXY INSURANCE BROKERS', 'P.O.Box 3236 Kampala', '', '0414-232189', '', 'TBA', '3', '3', '', '', ''),
(53, '10', '53', '01000053', 'VITAL INSURANCE SERVICES LTD.', 'VITAL INSURANCE SERVICES LTD.', 'P.O.Box 792 Kampala', '', '0414-232339', '', 'TBA', '3', '3', '', '', ''),
(54, '10', '54', '01000054', 'PENTAD INSURANCE SERVICES LIMITED', 'PENTAD INSURANCE SERVICES LIMITED', 'P.O.Box 36735 Kampala', '', '0313-555555', '', 'TBA', '3', '3', '', '', ''),
(55, '96', '1', '09600001', 'BRITAM INSURANCE UGANDA LIMITED', 'BRITAM INSURANCE UGANDA LIMITED', 'P.O.Box 36583 Kampala', '', '0414-236815', '', 'TBA', '4', '4', '', '', ''),
(56, '96', '2', '09600002', 'EAST AFRICAN UNDERWRITERS', 'EAST AFRICAN UNDERWRITERS', 'P.O.Box 22938 Kampala', '', '0414-232893', '', 'TBA', '4', '4', '', '', ''),
(57, '96', '3', '09600003', 'INSURANCE COMPANY OF EAST AFRICA', 'INSURANCE COMPANY OF EAST AFRICA', 'P.O.Box 33953 Kampala', '', '0414-347535', '', 'TBA', '4', '4', '', '', ''),
(58, '96', '4', '09600004', 'JUBILEE INSURANCE COMPANY OF UGANDA', 'JUBILEE INSURANCE COMPANY OF UGANDA', 'P.O.Box 10234 Kampala', '', '041-4311702', '', 'TBA', '4', '4', '', '', ''),
(59, '96', '5', '09600005', 'LION INSURANCE COMPANY LIMITED', 'LION INSURANCE COMPANY LIMITED', 'P.O.Box 7658 Kampala', '', '0414-341450', '', 'TBA', '4', '4', '', '', ''),
(60, '96', '6', '09600006', 'PAX INSURANCE COMPANY LIMITED', 'PAX INSURANCE COMPANY LIMITED', 'P.O.Box 7030 Kampala', '', '0414-233089', '', 'TBA', '4', '4', '', '', ''),
(61, '96', '7', '09600007', 'PHOENIX OF UGANDA ASSURANCE COMPANY', 'PHOENIX OF UGANDA ASSURANCE COMPANY', 'P.O.Box 70149 Kampala', '', '0414-349659', '', 'TBA', '4', '4', '', '', ''),
(62, '96', '8', '09600008', 'TRANSAFRICA ASSURANCE COMPANY LIMIT', 'TRANSAFRICA ASSURANCE COMPANY LIMIT', 'P.O.Box 7601 Kampala', '', '0414-251411', '', 'TBA', '4', '4', '', '', ''),
(63, '96', '9', '09600009', 'UAP INSURANCE COMPANY LIMITED', 'UAP INSURANCE COMPANY LIMITED', 'P.O.Box 7185 Kampala', '', '0414-332700', '', 'TBA', '4', '4', '', '', ''),
(64, '10', '55', '01000055', 'DIRECT HEAD OFFICE', 'DIRECT HEAD OFFICE', '', '', '', '', 'TBA', '1', '1', 'daniel.kanja@aimsoft.co.ke', '', ''),
(65, '96', '10', '09600010', 'LEADS INSURANCE', 'LEADS INSURANCE', '', '', '', '', '', '4', '4', '', '', ''),
(66, '96', '11', '09600011', 'SOUTHERN UNION', 'SOUTHERN UNION', '', '', '', '', '', '4', '4', '', '', ''),
(67, '96', '12', '09600012', 'PTA RE', 'PTA RE', '', '', '', '', '', '4', '4', '', '', ''),
(68, '96', '13', '09600013', 'AFRICA RE', 'AFRICA RE', '', '', '', '', '', '4', '4', '', '', ''),
(69, '10', '56', '01000056', 'SUSAN NAMBI', 'SUSAN NAMBI', '', '', '', '', 'TBA', '2', '2', '', '', ''),
(70, '10', '57', '01000057', 'SIMON ESOGU', 'SIMON ESOGU', '', '', '', '', 'TBA', '2', '2', '', '', ''),
(71, '10', '58', '01000058', 'SOUTHERN UNION', 'SOUTHERN UNION', '', '', '', '', 'TBA', '3', '3', '', '', ''),
(72, '10', '59', '01000059', 'ADVANTA ASSURANCE SERVICES', 'ADVANTA ASSURANCE SERVICES', '', '', '', '', '', '3', '3', '', '', ''),
(73, '10', '83', '01000083', 'BALAJI INSURANCE BROKERS', 'BALAJI INSURANCE BROKERS', '', '', '', '', 'TBA', '3', '3', '', '', ''),
(74, '10', '87', '01000087', 'RICHARD KILONZO', 'RICHARD KILONZO', '', '', '', '', '', '2', '2', '', '', ''),
(75, '10', '85', '01000085', 'ALEXANDER FORBES-KENYA', 'ALEXANDER FORBES', '', 'KENYA', '', '', '', '3', '3', '', '', ''),
(76, '95', '8', '09500008', 'UAP INSURANCE COMPANY LIMITED', 'P. O. BOX 7185', 'KAMPALA', '', 'UAP@UAPINSURANCE.CO.UG', '', '', '4', '4', '', '', ''),
(77, '20', '1', '02000001', 'BABIRYE MARIAM', 'BABIRYE MARIAM', '', 'JINJA', '0434120671', '', '1A/1023/2014', '2', '2', 'apa.jinja@apainsurance.org', '', ''),
(78, '10', '82', '01000082', 'DAVE SHAILESHKUMAR', 'DAVE SHAILESHKUMAR', '', 'KAMPALA', '', '', '1A/943/2014', '2', '2', '', '', ''),
(79, '10', '86', '01000086', 'ASHISH KAMANI', 'ASHISH KAMANI', '', '', '', '', '', '2', '2', '', '', ''),
(80, '10', '90', '01000090', 'DUMMY', 'DUMMY', '', '', '', '', '', '5', '5', '', '', ''),
(81, '95', '1', '09500001', 'AFRICA RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(82, '95', '2', '09500002', 'KENYA RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(83, '95', '3', '09500003', 'UGANDA RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(84, '95', '4', '09500004', 'EAST AFRICA RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(85, '95', '5', '09500005', 'PTA RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(86, '10', '81', '01000081', 'VINCENT KATENDE', 'VINCENT KATENDE', '', '', '', '', 'TBA', '2', '2', '', '', ''),
(87, '10', '84', '01000084', 'INTER LINK INSURANCE (AFRICA) LTD', 'INTER LINK INSURANCE (AFRICA) LTD', '', '', '', '', '', '3', '3', '', '', ''),
(88, '10', '60', '01000060', 'BID INSURANCE BROKERS UGANDA LTD', 'BID INSURANCE BROKERS UGANDA LTD', '', '', '', '', '', '3', '3', '', '', ''),
(89, '10', '61', '01000061', 'STEVEN SEWANONDA', 'STEVEN SEWANONDA', '', '', '', '', '', '2', '2', '', '', ''),
(90, '96', '14', '09600014', 'NIKO INSURANCE', 'NIKO INSURANCE', '', '', '', '', 'TBA', '4', '4', '', '', ''),
(91, '10', '62', '01000062', 'AFRO ASIA', 'AFRO ASIA', '0', '', '0', '', '0', '3', '3', '', '', ''),
(92, '10', '63', '01000063', 'CADAM', 'CADAM', '', '', '', '', '', '3', '3', '', '', ''),
(93, '10', '64', '01000064', 'INTERSTATE INSURANCE SERVICES', 'INTERSTATE INSURANCE SERVICES', '', '', '', '', '', '3', '3', '', '', ''),
(94, '10', '65', '01000065', 'MICRO ENSURE', 'MICRO ENSURE', '', '', '', '', '', '3', '3', '', '', ''),
(95, '10', '66', '01000066', 'ANCHOR AFRICA', 'ANCHOR AFRICA', '', '', '', '', '', '3', '3', '', '', ''),
(96, '96', '15', '09600015', 'KENYA RE', 'KENYA RE', '', '', '', '', '', '4', '4', '', '', ''),
(97, '10', '67', '01000067', 'EMMY AGABA', 'EMMY AGABA', '', '', '', '', '', '2', '2', '', '', ''),
(98, '10', '68', '01000068', 'AMANYA COLEB', 'AMANYA COLEB', '', '', '', '', '', '2', '2', '', '', ''),
(99, '10', '69', '01000069', 'DAVIE & JOSH', 'DAVIE & JOSH', '', '', '', '', '', '2', '2', '', '', ''),
(100, '10', '70', '01000070', 'EAGEN', 'EAGEN', '', '', '', '', '', '2', '2', '', '', ''),
(101, '10', '71', '01000071', 'EDWARD FLORENCE', 'EDWARD FLORENCE', '', '', '', '', '', '2', '2', '', '', ''),
(102, '10', '72', '01000072', 'KABUGO MARILYN', 'KABUGO MARILYN', '', '', '', '', '', '2', '2', '', '', ''),
(103, '10', '73', '01000073', 'KIRABO ESTHER', 'KIRABO ESTHER', '', '', '', '', '', '2', '2', '', '', ''),
(104, '10', '74', '01000074', 'MAGUMBA', 'MAGUMBA', '', '', '', '', '', '2', '2', '', '', ''),
(105, '10', '75', '01000075', 'MARTIN  MUGIZI', 'MARTIN  MUGIZI', '', '', '', '', '', '2', '2', '', '', ''),
(106, '10', '76', '01000076', 'NABISERE MARTHA', 'NABISERE MARTHA', '', '', '', '', '', '2', '2', '', '', ''),
(107, '10', '77', '01000077', 'NAMAWENJE GLADYS', 'NAMAWENJE GLADYS', '', '', '', '', '', '2', '2', '', '', ''),
(108, '10', '78', '01000078', 'NYAKECH CHRISTINE', 'NYAKECH CHRISTINE', '', '', '', '', '', '2', '2', '', '', ''),
(109, '10', '79', '01000079', 'PETRA MAGOOLA', 'PETRA MAGOOLA', '', '', '', '', '', '2', '2', '', '', ''),
(110, '10', '80', '01000080', 'MUKOOLI', 'MUKOOLI', '', '', '', '', '', '2', '2', '', '', ''),
(111, '10', '99999', '01099999', 'DUMMY A/C - WITHOUT  INTERMEDIARY', 'DUMMY A/C - WITHOUT  INTERMEDIARY', '', '', '', '', '', '1', '1', '', '', ''),
(112, '96', '16', '09600016', 'UGANDA RE', 'UGANDA RE', '', '', '', '', 'TBA', '4', '4', '', '', ''),
(113, '95', '6', '09500006', 'SWISS RE', '', '', '', '', '', '', '4', '4', '', '', ''),
(114, '95', '7', '09500007', 'ZEP RE', '', '', '', '', '', '', '4', '4', '', '', '');

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
(1, 'Chemicals, Pharmaceuticals, Acids and Paints  1 ', 1),
(2, 'Grains, Cereals, Foodstuffs and Alcohol', 1),
(3, 'Metals and Pipes', 2),
(4, 'Paper,Wool and Cotton', 2),
(5, 'Personal Effects & Hse goods', 1),
(6, 'Piece Goods edited', 1);

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
(2, 1, 'Bleaching Powder in drums 1', '4', 2),
(4, 2, 'Cheese butter & other Milk products edt', '5', 1),
(11, 1, 'Chemicals & Dyes in bags', '9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
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
  `pin` int(11) NOT NULL,
  `premium` decimal(10,0) NOT NULL,
  `userid` int(11) NOT NULL,
  `Total_premium` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `cargo_type`, `shipping_mode`, `package_type`, `shp_cover_type`, `sum_insured`, `country_orig`, `country_dest`, `city_orig`, `city_dest`, `owner`, `email`, `mobile`, `p_from`, `p_to`, `pin`, `premium`, `userid`, `Total_premium`) VALUES
(1, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', 3344, '667', 1, '0'),
(2, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', 3344, '667', 1, '0'),
(3, 2, '3', 'Sea', 'P2P', 6000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'mmzender65@gmail.com', '8974982', '2017-01-19', '2017-01-06', 3344, '667', 2, '0'),
(4, 1, '4', 'Air', 'Port to Port', 300000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'maxwell.munene@aimsoft.co.ke', '8974982', '2017-01-03', '2017-01-06', 254, '12000', 2, '0'),
(5, 5, 'Sea', 'Non-Containerized', 'Warehouse to Warehouse', 40000, 'Kenya', 'Kenya', 'nairobi', 'nairobi', 'max', 'maxwell.munene@aimsoft.co.ke', '8974982', '2017-01-11', '2017-01-24', 254, '2000', 2, '0'),
(6, 4, 'Sea', 'Containerized', 'Port to Port', 50000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'maxwell munene', 'max@gmail.com', '0702979399', '2017-01-04', '2017-01-05', 223333, '2275', 2, '0'),
(7, 9, 'Sea', 'Non-Containerized', 'Port to Port', 60000000, 'kenya', 'Uganda', 'nakuru', 'Kampala', 'maxwell munene', 'aims@gmail.com', '0702979399', '2017-01-19', '2017-01-11', 76766733, '5730000', 2, '0'),
(8, 4, 'Air', '2', 'Port to Port', 5000000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-27', 4435553, '227500', 2, '0'),
(9, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', 6637, '33300', 2, '0'),
(10, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', 6637, '33300', 2, '0'),
(11, 5, 'Sea', 'Non-Containerized', 'Port to Port', 600000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-28', 6637, '33300', 2, '0'),
(12, 5, 'Sea', 'Containerized', 'Port to Port', 60000000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-28', '2017-01-30', 777866, '3330000', 2, '0'),
(13, 4, 'Air', '2', 'Warehouse to Warehouse', 900000, 'kenya', 'Uganda', 'Nairobi', 'Kampala', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-30', 7784333, '40950', 2, '0'),
(14, 4, 'Sea', 'Containerized', 'Port to Port', 12000000, 'Nigeria', 'Kenya', 'Lagos', 'Nairobi', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-27', '2017-01-31', 66734, '480000', 2, '546000'),
(15, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', 76472, '240000', 2, '273000'),
(16, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', 76472, '240000', 2, '273000'),
(17, 4, 'Sea', 'Non-Containerized', 'Port to Port', 6000000, 'Nigeria', 'Egypt', 'Lagos', 'Cairo', 'Aimsoft Limited', 'aims@gmail.com', '0702973929', '2017-01-31', '2017-01-31', 76472, '240000', 2, '273000');

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
  `Training_levy` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`id`, `stamp_duty`, `policy_fund`, `Training_levy`) VALUES
(2, 0.1, 0.25, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `loghist`
--

CREATE TABLE `loghist` (
  `log_id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `logout` varchar(50) NOT NULL,
  `logged` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loghist`
--

INSERT INTO `loghist` (`log_id`, `user_id`, `login`, `logout`, `logged`) VALUES
(1, '2', '09/01/2017 07:25:35', '17/01/2017 14:29:07', 'Y'),
(2, '2', '16/01/2017 14:19:20', '17/01/2017 14:29:07', 'Y'),
(3, '2', '17/01/2017 14:29:13', '20/01/2017 12:47:54', 'Y');

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
(1, 'h@k.com', 25897);

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
(3, 'Z ending', 2),
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
  `id_no` int(11) NOT NULL,
  `mobile_no` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `telephone_no` int(11) DEFAULT NULL,
  `fax_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `username`, `admin`, `password`, `address`, `email`, `id_no`, `mobile_no`, `telephone_no`, `fax_no`) VALUES
(1, 'Daniel', 'Kanja', 'dan', 0, '2591e5f46f28d303f9dc027d475a5c60d8dea17a', '', '', 0, 0000000000, 0, 0),
(2, 'Aimsoft', 'Limited', 'aims', 1, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', '', 'aims@gmail.com', 0, 0702973929, 0, 0),
(3, 'Guest', 'User', 'guest', 0, '2ac15cab107096305d0274cd4eb86c74bb35a4b4', '', '', 0, 0000000000, 0, 0),
(4, 'maxwell', 'munene', 'nesh', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', 'nairobi', 'maxwell.munene@aimsoft.co.ke', 23, 0000000034, 34, 56),
(5, 'maxwell', 'munene', 'maxwell', 0, 'c4560ff03f86a158d7266de9fcf5f0655f83e812', NULL, 'lol@gmail.com', 66662, 0000000044, NULL, NULL),
(6, 'maxwell', 'munene', 'max', 0, 'f7177163c833dff4b38fc8d2872f1ec6', NULL, 'test@gmail.com', 666624, 0000000023, NULL, NULL),
(7, 'Dan', 'Kan', '', 0, '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'dan@dan.com', 11288888, 0000007222, NULL, NULL),
(8, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 112244, 0000009111, NULL, NULL),
(9, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL),
(10, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL),
(11, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL),
(12, 'test', 'tester', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'test@g.com', 6677, 0000008788, NULL, NULL),
(24, 'humphrey', 'ndirangu', 'user', 0, '202cb962ac59075b964b07152d234b70', NULL, 'humphrey.ndirangu@aimsoft.co.ke', 45546, 0789657456, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `loghist`
--
ALTER TABLE `loghist`
  ADD PRIMARY KEY (`log_id`);

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
-- AUTO_INCREMENT for table `agmnf`
--
ALTER TABLE `agmnf`
  MODIFY `agtid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `cargocat`
--
ALTER TABLE `cargocat`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cargotype`
--
ALTER TABLE `cargotype`
  MODIFY `ctypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
-- AUTO_INCREMENT for table `loghist`
--
ALTER TABLE `loghist`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_recovery`
--
ALTER TABLE `p_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `termid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
