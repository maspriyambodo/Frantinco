
-- --------------------------------------------------------

--
-- Table structure for table `sys_app`
--

DROP TABLE IF EXISTS `sys_app`;
CREATE TABLE `sys_app` (
  `favico` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `logo` varchar(9) CHARACTER SET utf8mb4 DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_app`
--

INSERT INTO `sys_app` (`favico`, `logo`, `company_name`, `app_name`, `app_year`) VALUES
('favicon.png', 'logo.png', 'Frantinco', 'Business Intelegence', 2021);
