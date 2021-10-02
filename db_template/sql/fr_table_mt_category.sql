
-- --------------------------------------------------------

--
-- Table structure for table `mt_category`
--

DROP TABLE IF EXISTS `mt_category`;
CREATE TABLE `mt_category` (
  `id` int NOT NULL,
  `id_brand` int NOT NULL COMMENT 'mengambil id dari tabel mt_brand',
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stat` int NOT NULL DEFAULT '1',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table untuk master data category';

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
(10, 2, 'High Pressure Laminate 2', 'kategori untuk produk hpl', 1, 1, '2021-10-02 00:53:35', NULL, NULL, NULL, NULL);
