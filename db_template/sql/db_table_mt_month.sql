
-- --------------------------------------------------------

--
-- Table structure for table `mt_month`
--

DROP TABLE IF EXISTS `mt_month`;
CREATE TABLE `mt_month` (
  `angka` varchar(2) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mt_month`
--

INSERT INTO `mt_month` (`angka`, `bulan`) VALUES
('01', 'januari'),
('02', 'februari'),
('03', 'maret'),
('04', 'april'),
('05', 'mei'),
('06', 'juni'),
('07', 'juli'),
('08', 'agustus'),
('09', 'september'),
('10', 'oktober'),
('11', 'november'),
('12', 'desember');
