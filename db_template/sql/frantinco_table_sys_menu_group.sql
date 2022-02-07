
-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_group`
--

DROP TABLE IF EXISTS `sys_menu_group`;
CREATE TABLE `sys_menu_group` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_no` int DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_menu_group`
--

INSERT INTO `sys_menu_group` (`id`, `nama`, `description`, `order_no`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'Applications', 'default menu on system, menghapus grup ini akan membuat error pada system.\r\nmohon untuk tidak menghapus grup ini!', 1, 1, 1, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00'),
(3, 'Master Data', 'menu group untuk aplikasi master data', 2, 1, 1, '2021-09-21 13:02:23', NULL, NULL, NULL, NULL),
(4, 'Transaction', 'Group menu untuk transaksi produk', 3, 1, 1, '2021-09-21 13:34:27', NULL, NULL, NULL, NULL),
(5, 'Report', 'menu untuk laporan penjualan', 4, 1, 1, '2021-09-21 18:54:15', NULL, NULL, NULL, NULL),
(999, 'Systems', 'default menu on system, menghapus grup ini akan membuat error pada system.\r\nmohon untuk tidak menghapus grup ini!', 999, 1, 1, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00');
