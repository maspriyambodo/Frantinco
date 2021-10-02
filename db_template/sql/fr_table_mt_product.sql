
-- --------------------------------------------------------

--
-- Table structure for table `mt_product`
--

DROP TABLE IF EXISTS `mt_product`;
CREATE TABLE `mt_product` (
  `id` int NOT NULL,
  `id_category_sub` int NOT NULL COMMENT 'mengambil id dari table mt_category_sub',
  `kd_produk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '1',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mt_product`
--

INSERT INTO `mt_product` (`id`, `id_category_sub`, `kd_produk`, `nama`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'F5524S', 'SHOCKING PINK', 1, NULL, NULL, 1, '2021-09-23 19:05:04', NULL, NULL),
(2, 1, 'F5523S', 'LIGHT ORANGE', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'F5522S', 'AQUA GREEN', 1, 1, '2021-09-23 16:21:07', NULL, NULL, NULL, NULL),
(4, 49, 'FSPC008', 'LEGNO ELM', 1, 1, '2021-09-24 13:45:29', NULL, NULL, NULL, NULL),
(5, 49, 'FSPC007', 'HERMES OAK', 1, 1, '2021-09-24 13:46:06', NULL, NULL, NULL, NULL),
(6, 49, 'FSPC006', 'AVA CHERRY', 1, 1, '2021-09-24 13:46:36', NULL, NULL, NULL, NULL),
(7, 49, 'FSPC005', 'JAVA TEAK', 1, 1, '2021-09-24 13:47:05', NULL, NULL, NULL, NULL),
(8, 49, 'FSPC004', 'GOLD MAPLE', 1, 1, '2021-09-24 13:47:42', NULL, NULL, NULL, NULL),
(9, 49, 'FSPC003', 'SOHO OAK', 1, 1, '2021-09-24 13:48:10', NULL, NULL, NULL, NULL),
(10, 49, 'FSPC002', 'COSTA MAPLE', 1, 1, '2021-09-24 13:48:35', NULL, NULL, NULL, NULL),
(11, 49, 'FSPC001', 'DALTON OAK', 1, 1, '2021-09-24 13:49:08', NULL, NULL, NULL, NULL),
(12, 50, 'G5524S', 'SHOCKING PINK', 1, 1, '2021-10-02 00:55:10', NULL, NULL, NULL, NULL);
