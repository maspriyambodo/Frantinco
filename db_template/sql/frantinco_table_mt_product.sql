
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mt_product`
--

INSERT INTO `mt_product` (`id`, `id_category_sub`, `kd_produk`, `nama`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'DQ62', 'UQ63', 1, NULL, NULL, 1, '2021-09-23 19:05:04', NULL, NULL),
(2, 2, 'LS28', 'QW33', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'AQ16', 'BX10', 1, 1, '2021-09-23 16:21:07', NULL, NULL, NULL, NULL),
(4, 4, 'BF78', 'OR55', 1, 1, '2021-09-24 13:45:29', NULL, NULL, NULL, NULL),
(5, 5, 'EU55', 'FX14', 1, 1, '2021-09-24 13:46:06', NULL, NULL, NULL, NULL),
(6, 6, 'OC50', 'CW81', 1, 1, '2021-09-24 13:46:36', NULL, NULL, NULL, NULL),
(7, 7, 'FY84', 'IZ32', 1, 1, '2021-09-24 13:47:05', NULL, NULL, NULL, NULL),
(8, 8, 'QF80', 'RE15', 1, 1, '2021-09-24 13:47:42', NULL, NULL, NULL, NULL),
(9, 9, 'KQ31', 'DL11', 1, 1, '2021-09-24 13:48:10', NULL, NULL, NULL, NULL),
(10, 10, 'LD49', 'NI43', 1, 1, '2021-09-24 13:48:35', NULL, NULL, NULL, NULL),
(11, 11, 'LQ17', 'IL31', 1, 1, '2021-09-24 13:49:08', NULL, NULL, NULL, NULL),
(12, 12, 'JZ99', 'CF60', 1, 1, '2021-10-02 00:55:10', NULL, NULL, NULL, NULL),
(13, 13, 'MC98', 'HW50', 1, NULL, NULL, 1, '2021-09-23 19:05:04', NULL, NULL),
(14, 14, 'IL69', 'IC73', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, 'IO11', 'VB80', 1, 1, '2021-09-23 16:21:07', NULL, NULL, NULL, NULL),
(16, 16, 'XA46', 'JE64', 1, 1, '2021-09-24 13:45:29', NULL, NULL, NULL, NULL),
(17, 17, 'TD31', 'UD68', 1, 1, '2021-09-24 13:46:06', NULL, NULL, NULL, NULL),
(18, 18, 'KX15', 'GB94', 1, 1, '2021-09-24 13:46:36', NULL, NULL, NULL, NULL),
(19, 19, 'CV66', 'NQ62', 1, 1, '2021-09-24 13:47:05', NULL, NULL, NULL, NULL),
(20, 20, 'IE40', 'DK21', 1, 1, '2021-09-24 13:47:42', NULL, NULL, NULL, NULL),
(21, 21, 'JG70', 'ZW56', 1, 1, '2021-09-24 13:48:10', NULL, NULL, NULL, NULL),
(22, 22, 'IH35', 'GI30', 1, 1, '2021-09-24 13:48:35', NULL, NULL, NULL, NULL),
(23, 23, 'LI59', 'OE76', 1, 1, '2021-09-24 13:49:08', NULL, NULL, NULL, NULL),
(24, 24, 'TQ73', 'OB62', 1, 1, '2021-10-02 00:55:10', NULL, NULL, NULL, NULL),
(25, 25, 'CL54', 'BD87', 1, NULL, NULL, 1, '2021-09-23 19:05:04', NULL, NULL),
(26, 26, 'LO93', 'PK79', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 27, 'QZ76', 'NW74', 1, 1, '2021-09-23 16:21:07', NULL, NULL, NULL, NULL),
(28, 28, 'TD20', 'IY67', 1, 1, '2021-09-24 13:45:29', NULL, NULL, NULL, NULL),
(29, 29, 'DF98', 'AA86', 1, 1, '2021-09-24 13:46:06', NULL, NULL, NULL, NULL),
(30, 30, 'UL26', 'YJ91', 1, 1, '2021-09-24 13:46:36', NULL, NULL, NULL, NULL),
(31, 31, 'NM46', 'YL18', 1, 1, '2021-09-24 13:47:05', NULL, NULL, NULL, NULL),
(32, 32, 'TH61', 'QC51', 1, 1, '2021-09-24 13:47:42', NULL, NULL, NULL, NULL),
(33, 33, 'JW40', 'RP89', 1, 1, '2021-09-24 13:48:10', NULL, NULL, NULL, NULL),
(34, 34, 'BL69', 'FY59', 1, 1, '2021-09-24 13:48:35', NULL, NULL, NULL, NULL),
(35, 35, 'GF21', 'OM75', 1, 1, '2021-09-24 13:49:08', NULL, NULL, NULL, NULL),
(36, 36, 'BO57', 'XP42', 1, 1, '2021-10-02 00:55:10', NULL, NULL, NULL, NULL),
(37, 37, 'CB79', 'II63', 1, NULL, NULL, 1, '2021-09-23 19:05:04', NULL, NULL),
(38, 38, 'JW38', 'OB32', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 39, 'PE67', 'XU82', 1, 1, '2021-09-23 16:21:07', NULL, NULL, NULL, NULL),
(40, 40, 'NB76', 'YG29', 1, 1, '2021-09-24 13:45:29', NULL, NULL, NULL, NULL),
(41, 41, 'SX54', 'JO33', 1, 1, '2021-09-24 13:46:06', NULL, NULL, NULL, NULL);
