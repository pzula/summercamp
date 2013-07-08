-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2013 at 03:41 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lcbsummercamp`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_sessions_view`
--
CREATE TABLE IF NOT EXISTS `all_sessions_view` (
`session_combo` int(3)
,`campus_id` int(4)
,`campus_name` varchar(255)
,`session_id` int(3)
,`start_date` date
,`end_date` date
,`end_display_date` date
,`registrant_count` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `registrants`
--

CREATE TABLE IF NOT EXISTS `registrants` (
  `registrant_id` int(4) NOT NULL AUTO_INCREMENT,
  `session_combo` int(3) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `tshirt` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  PRIMARY KEY (`registrant_id`),
  KEY `session_combo` (`session_combo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `campus_id` int(4) NOT NULL,
  `campaign_id` int(6) NOT NULL,
  `campus_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `campus_phone` varchar(12) NOT NULL,
  `doa_name` varchar(255) NOT NULL,
  `doa_email` varchar(255) NOT NULL,
  `map_url` varchar(255) NOT NULL,
  UNIQUE KEY `campus_id` (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`campus_id`, `campaign_id`, `campus_name`, `address`, `city`, `state`, `zip`, `campus_phone`, `doa_name`, `doa_email`, `map_url`) VALUES
(5, 211599, 'Le Cordon Bleu in Scottsdale', '8100 East Camelback Road, Suite 1001', 'Scottsdale', 'AZ', '85251', '800-848-2433', 'Shannon Ferrer', 'Shannon.Ferrer@scottsdale.chefs.edu', 'http://maps.google.com/maps?q=8100+East+Camelback+Road,+Suite+1001,+Scottsdale,+AZ+85251&hl=en&sll=38.654791,-121.520841&sspn=0.010507,0.026157&hnear=8100+E+Camelback+Rd+%231001,+Scottsdale,+Arizona+85251&t=m&z=16'),
(6, 211604, 'Le Cordon Bleu in Porland', '600 SW 10th Avenue Suite 500', 'Portland', 'OR', '97205', '888-848-3202', 'Thomas Barker', 'TBarker@portland.chefs.edu', 'http://maps.google.com/maps?q=600+SW+10th+Avenue+Suite+500,+Portland,+OR+97205&hl=en&sll=28.433129,-81.421824&sspn=0.011831,0.026157&hnear=600+SW+10th+Ave+%23500,+Portland,+Oregon+97205&t=m&z=16'),
(7, 211600, 'Le Cordon Bleu in San Francisco', '350 Rhode Island Street', 'San Francisco', 'CA', '94103', '800-229-2433', 'Brian Rossiter', 'BRossiter@sf.chefs.edu', 'http://maps.google.com/maps?q=350+Rhode+Island+Street,+San+Francisco,+CA&hl=en&sll=33.840051,-84.239602&sspn=0.011175,0.026157&oq=350+Rhode+Island+Street+&hnear=350+Rhode+Island+St,+San+Francisco,+California+94103&t=m&z=16'),
(8, 211597, 'Le Cordon Bleu in Los Angeles', '530 East Colorado Blvd', 'Pasadena', 'CA', '91101', '888-900-2433', 'Jamie Williams', 'JWilliams@la.chefs.edu', 'http://maps.google.com/maps?q=530+East+Colorado+Blvd,+Pasadena,+CA+91101&hl=en&sll=36.188936,-115.313044&sspn=0.010858,0.026157&hnear=530+E+Colorado+Blvd,+Pasadena,+California+91101&t=m&z=16'),
(32, 211605, 'Le Cordon Bleu in Chicago', '361 West Chestnut', 'Chicago', 'IL', '60610', '877-828-7772', 'Norman Veal', 'NVeal@chicago.chefs.edu', 'http://maps.google.com/maps?q=361+West+Chestnut,+Chicago,+IL+60610&hl=en&sll=42.364259,-71.078541&sspn=0.009941,0.026157&hnear=361+W+Chestnut+St,+Chicago,+Illinois+60610&t=m&z=16'),
(46, 211602, 'Le Cordon Bleu in Orlando', '8511 Commodity Circle, Suite 100', 'Orlando', 'FL', '32819', '866-622-2433', 'Janet Doughman', 'JDoughman@orlando.chefs.edu', 'http://maps.google.com/maps?q=8511+Commodity+Circle,+Suite+100,+Orlando,+FL+32819&hl=en&sll=44.866311,-93.161224&sspn=0.009536,0.026157&hnear=8511+Commodity+Cir+%23100,+Orlando,+Orange,+Florida+32819&t=m&z=16'),
(49, 211607, 'Le Cordon Bleu in Austin', '3110 Esperanza Crossing Suite 100', 'Austin', 'TX', '78758', '888-553-2433', 'Bryce Hollas', 'BHollas@austin.chefs.edu', 'http://maps.google.com/maps?q=3110+Esperanza+Crossing+Suite+100,+Austin,+TX+78758&hl=en&sll=37.765388,-122.403111&sspn=0.010636,0.026157&hnear=3110+Esperanza+Crossing+%23100,+Austin,+Travis,+Texas+78758&t=m&z=16'),
(55, 211597, 'Le Cordon Bleu in Las Vegas', '1451 Center Crossing Road', 'Las Vegas', 'NV', '89144', '866-450-2433', 'Jody DellaMonica', 'JDellaMonica@vegas.chefs.edu', 'http://maps.google.com/maps?q=1451+Center+Crossing+Road,+Las+Vegas,+NV+89144&hl=en&sll=32.911424,-96.871178&sspn=0.011295,0.026157&hnear=1451+Center+Crossing+Rd,+Las+Vegas,+Clark,+Nevada+89144&t=m&z=16'),
(58, 211612, 'Le Cordon Bleu in Atlanta', '1927 Lakeside Parkway', 'Tucker', 'GA', '30084', '866-315-2433', 'Cris Liuba', 'CLiuba@atlanta.chefs.edu', 'http://maps.google.com/maps?q=1927+Lakeside+Parkway,+Tucker,+GA&hl=en&ll=33.838911,-84.239688&spn=0.011175,0.026157&sll=40.530502,-81.793213&sspn=5.234802,13.392334&hnear=1927+Lakeside+Pkwy,+Tucker,+DeKalb,+Georgia+30084&t=m&z=16&iwloc=A'),
(88, 211595, 'Le Cordon Bleu in Miami', '3221 Enterprise Way', 'Miramar', 'FL', '33025', '866-762-2433', 'Daniela Cortes', 'DCortes@miami.chefs.edu', 'http://maps.google.com/maps?q=3221+Enterprise+Way,+Miramar,+FL+33025&hl=en&sll=33.838911,-84.239688&sspn=0.011175,0.026157&hnear=3221+Enterprise+Way,+Miramar,+Broward,+Florida+33025&t=m&z=16'),
(97, 211603, 'Le Cordon Bleu in Boston', '215 First Street', 'Cambridge', 'MA', '02142', '888-522-8550', 'James Hayes', 'JHayes@boston.chefs.edu', 'http://maps.google.com/maps?q=215+First+Street,+Cambridge,+MA+02142&hl=en&sll=30.4009,-97.723796&sspn=0.011604,0.026157&hnear=215+1st+St,+Cambridge,+Middlesex,+Massachusetts+02142&t=m&z=16'),
(99, 211601, 'Le Cordon Bleu in MSP', '1315 Mendota Heights Road', 'Mendota Heights', 'MN', '55120', '866-762-2433', 'David Peterson', 'DPeterson@msp.chefs.edu', 'http://maps.google.com/maps?q=1315+Mendota+Heights+Road,+Mendota+Heights,+MN+55120&hl=en&sll=34.145848,-118.139274&sspn=0.011135,0.026157&hnear=1315+Mendota+Heights+Rd,+Mendota+Heights,+Dakota,+Minnesota+55120&t=m&z=16'),
(107, 211606, 'Le Cordon Bleu in Sacramento', '2450 Del Paso Road', 'Sacramento', 'CA', '95834', '916-830-6220', 'Benjamin Martin', 'BMartin@sacramento.chefs.edu', 'http://maps.google.com/maps?q=2450+Del+Paso+Road,+Sacramento,+CA+95834&hl=en&sll=45.5203,-122.681647&sspn=0.009427,0.026157&hnear=2450+Del+Paso+Rd,+Sacramento,+California+95834&t=m&z=16'),
(109, 211598, 'Le Cordon Bleu in Dallas', '11830 Webb Chapel Road #1200', 'Dallas', 'TX', '75234', '866-461-2433', 'Darlene Gross', 'DGross@dallas.chefs.edu', 'http://maps.google.com/maps?q=11830+Webb+Chapel+Road+%231200,+Dallas,+TX+75234&hl=en&sll=41.898135,-87.637504&sspn=0.010014,0.026157&hnear=11830+Webb+Chapel+Rd+%231200,+Dallas,+Texas+75234&t=m&z=16'),
(112, 211610, 'Le Cordon Bleu in St. Louis', '7898 Veterans Memorial Parkway', 'St. Peters', 'MO', '63376', '866-863-2061', 'Jerry Wolford', 'JWolford@stlouis.chefs.edu', 'http://maps.google.com/maps?q=7898+Veterans+Memorial+Parkway,+St.+Peters,+MO+63376&hl=en&sll=47.450801,-122.255058&sspn=0.009098,0.026157&hnear=7898+Veterans+Memorial+Pkwy,+St+Peters,+St+Charles,+Missouri+63376&t=m&z=16'),
(113, 211596, 'Le Cordon Bleu in Seattle', '360 Corporate Drive North', 'Tukwila', 'WA', '98188', '866-863-2580', 'Laura Copenhaver', 'LCopenhaver@seattle.chefs.edu', 'http://maps.google.com/maps?q=360+Corporate+Drive+North,+Tukwila,+WA+98188&hl=en&sll=33.50254,-111.906588&sspn=0.011219,0.026157&hnear=360+Corporate+Dr+N,+Tukwila,+Washington+98188&t=m&z=16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_combo` int(3) NOT NULL AUTO_INCREMENT,
  `session_id` int(3) NOT NULL,
  `campus_id` int(4) NOT NULL,
  PRIMARY KEY (`session_combo`),
  UNIQUE KEY `session_combo` (`session_combo`),
  KEY `campus_id` (`campus_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_combo`, `session_id`, `campus_id`) VALUES
(33, 3, 5),
(34, 3, 6),
(35, 3, 7),
(36, 3, 8),
(37, 3, 32),
(38, 3, 46),
(39, 3, 49),
(40, 3, 55),
(41, 3, 58),
(42, 3, 88),
(43, 3, 97),
(44, 3, 99),
(45, 3, 107),
(46, 3, 109),
(47, 3, 112),
(48, 3, 113),
(49, 4, 5),
(50, 4, 6),
(51, 4, 7),
(52, 4, 8),
(53, 4, 32),
(54, 4, 46),
(55, 4, 49),
(56, 4, 55),
(57, 4, 58),
(58, 4, 88),
(59, 4, 97),
(60, 4, 99),
(61, 4, 107),
(62, 4, 109),
(63, 4, 112),
(64, 4, 113),
(65, 5, 5),
(66, 5, 6),
(67, 5, 7),
(68, 5, 8),
(69, 5, 32),
(70, 5, 46),
(71, 5, 49),
(72, 5, 55),
(73, 5, 58),
(74, 5, 88),
(75, 5, 97),
(76, 5, 99),
(77, 5, 107),
(78, 5, 109),
(79, 5, 112),
(80, 5, 113),
(81, 6, 5),
(82, 6, 6),
(83, 6, 7),
(84, 6, 8),
(85, 6, 32),
(86, 6, 46),
(87, 6, 49),
(88, 6, 55),
(89, 6, 58),
(90, 6, 88),
(91, 6, 97),
(92, 6, 99),
(93, 6, 107),
(94, 6, 109),
(95, 6, 112),
(96, 6, 113);

-- --------------------------------------------------------

--
-- Table structure for table `session_dates`
--

CREATE TABLE IF NOT EXISTS `session_dates` (
  `session_id` int(3) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `end_display_date` date NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `session_dates`
--

INSERT INTO `session_dates` (`session_id`, `start_date`, `end_date`, `end_display_date`) VALUES
(3, '2013-07-19', '2013-07-20', '2013-07-15'),
(4, '2013-07-26', '2013-07-27', '2013-07-22'),
(5, '2013-08-02', '2013-08-03', '2013-07-29'),
(6, '2013-08-09', '2013-08-10', '2013-08-05');

-- --------------------------------------------------------

--
-- Structure for view `all_sessions_view`
--
DROP TABLE IF EXISTS `all_sessions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_sessions_view` AS select `sessions`.`session_combo` AS `session_combo`,`schools`.`campus_id` AS `campus_id`,`schools`.`campus_name` AS `campus_name`,`session_dates`.`session_id` AS `session_id`,`session_dates`.`start_date` AS `start_date`,`session_dates`.`end_date` AS `end_date`,`session_dates`.`end_display_date` AS `end_display_date`,(select count(`registrants`.`registrant_id`) from `registrants` where (`registrants`.`session_combo` = `sessions`.`session_combo`)) AS `registrant_count` from ((`sessions` left join `schools` on((`schools`.`campus_id` = `sessions`.`campus_id`))) left join `session_dates` on((`sessions`.`session_id` = `session_dates`.`session_id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrants`
--
ALTER TABLE `registrants`
  ADD CONSTRAINT `registrants_ibfk_1` FOREIGN KEY (`session_combo`) REFERENCES `sessions` (`session_combo`) ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `schools` (`campus_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session_dates` (`session_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
