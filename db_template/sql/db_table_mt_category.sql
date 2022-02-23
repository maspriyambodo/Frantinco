
-- --------------------------------------------------------

--
-- Table structure for table `mt_category`
--

DROP TABLE IF EXISTS `mt_category`;
CREATE TABLE `mt_category` (
  `id` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL COMMENT 'mengambil id dari tabel mt_brand',
  `nama` varchar(200) NOT NULL,
  `description` text,
  `stat` int(11) NOT NULL DEFAULT '1',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table untuk master data category';

--
-- Dumping data for table `mt_category`
--

INSERT INTO `mt_category` (`id`, `id_brand`, `nama`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'High Pressure Laminate', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', 1, '2021-09-23 12:50:09', 1, '2021-09-20 21:44:08'),
(2, 1, 'Compact Laminate Board', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(3, 1, 'Luxury Vinyl Flooring', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(4, 1, 'Compact Phenolic Board', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(5, 1, 'Compact Chemical Laboratory', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(6, 1, 'Kitchen Top Table', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(7, 1, 'Stone Plastic Composite flooring', 'kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', NULL, NULL, NULL, NULL),
(10, 2, 'High Pressure Laminate 2', 'kategori untuk produk hpl', 1, 1, '2021-10-02 00:53:35', NULL, NULL, NULL, NULL),
(11, 1, 'ACESSORIES TOILET', 'ACESSORIES TOILET', 1, 1, '2022-02-23 18:28:08', NULL, NULL, NULL, NULL),
(12, 1, 'ALUMUNIUM', 'ALUMUNIUM', 1, 1, '2022-02-23 18:28:28', NULL, NULL, NULL, NULL),
(13, 1, 'COMPACT BOARD', 'COMPACT BOARD', 1, 1, '2022-02-23 18:28:44', NULL, NULL, NULL, NULL),
(14, 1, 'DECORATIVE', 'DECORATIVE', 1, 1, '2022-02-23 18:30:00', NULL, NULL, NULL, NULL),
(15, 1, 'HPL FRANTINCO', 'HPL FRANTINCO', 1, 1, '2022-02-23 18:30:13', NULL, NULL, NULL, NULL),
(16, 1, 'SPC FLOORING', 'SPC FLOORING', 1, 1, '2022-02-23 18:30:29', NULL, NULL, NULL, NULL),
(17, 1, 'VINYL', 'VINYL\r\nkode FV', 1, 1, '2022-02-23 18:32:00', NULL, NULL, NULL, NULL),
(18, 1, 'KITCHEN TOP', 'KITCHEN TOP\r\nkode KT', 1, 1, '2022-02-23 18:32:30', NULL, NULL, NULL, NULL),
(19, 1, 'PHENOLIC', 'PHENOLIC\r\nkode PB', 1, 1, '2022-02-23 18:35:09', NULL, NULL, NULL, NULL),
(20, 1, 'PVC', 'PVC', 1, 1, '2022-02-23 18:35:32', NULL, NULL, NULL, NULL),
(21, 2, 'PVC GW', 'PVC brand GW', 1, 1, '2022-02-23 18:36:07', NULL, NULL, NULL, NULL),
(22, 2, 'GREATWALL', '2022-02-23 18:41:54', 1, 1, '2022-02-23 19:44:00', NULL, NULL, NULL, NULL);
