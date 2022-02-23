
-- --------------------------------------------------------

--
-- Table structure for table `tr_product`
--

DROP TABLE IF EXISTS `tr_product`;
CREATE TABLE `tr_product` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL COMMENT 'mengambil kd_product dari tabel mt_product',
  `qty` int(11) NOT NULL,
  `tr_date` date NOT NULL,
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
