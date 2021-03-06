
-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `group_menu` int(11) DEFAULT NULL COMMENT '1. applications\r\n2. report\r\n3. systems',
  `icon` varchar(50) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `menu_parent`, `nama`, `link`, `order_no`, `group_menu`, `icon`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, NULL, 'Dashboard', 'Applications/Dashboard/index/', 100, 1, 'fas fa-tachometer-alt', 'menu default systems', 1, 1, '2021-03-11 04:07:27', 1, '2021-09-12 05:22:21', 0, '2021-07-07 23:54:26'),
(2, NULL, 'Master Wilayah', '#', 300, 3, 'fas fa-globe-asia', 'menu untuk master data wilayah indonesia', 0, 1, '2021-03-13 12:29:43', 1, '2021-09-21 13:05:29', 1, '2022-02-23 21:36:33'),
(3, NULL, 'Master Country', 'Master/Country/index/', 305, 3, 'fas fa-globe', 'menu untuk master data negara', 0, 1, '2021-03-13 19:35:02', 1, '2021-09-21 13:04:41', 1, '2022-02-23 21:36:43'),
(4, 2, 'Provinsi', 'Master/Wilayah/Provinsi/index/', 301, 3, '', NULL, 0, 1, '2021-03-13 12:31:34', 0, '0000-00-00 00:00:00', 1, '2022-02-23 21:36:33'),
(5, 2, 'Kabupaten', 'Master/Wilayah/Kabupaten/index/', 302, 3, '', NULL, 0, 1, '2021-03-13 19:21:17', 0, '0000-00-00 00:00:00', 1, '2022-02-23 21:36:33'),
(6, 2, 'Kecamatan', 'Master/Wilayah/Kecamatan/index/', 303, 3, '', NULL, 0, 1, '2021-03-13 19:22:00', 0, '0000-00-00 00:00:00', 1, '2022-02-23 21:36:33'),
(7, 2, 'Kelurahan', 'Master/Wilayah/Kelurahan/index/', 304, 3, '', NULL, 0, 1, '2021-03-13 19:22:30', 0, '0000-00-00 00:00:00', 1, '2022-02-23 21:36:33'),
(8, NULL, 'Menu Management', 'Systems/Menu/index/', 900, 999, 'fas fa-bars', NULL, 1, 1, '2021-03-11 04:10:12', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, NULL, 'Menu Group', 'Systems/Menu_group/index/', 901, 999, 'fas fa-th-list', NULL, 1, 1, '2021-03-13 20:23:14', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(10, NULL, 'Systems', 'Systems/index/', 902, 999, 'fas fa-cogs', NULL, 1, 1, '2021-03-11 16:05:08', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, NULL, 'User Management', 'Systems/Users/index/', 903, 999, 'fas fa-user-cog', NULL, 1, 1, '2021-03-11 15:59:24', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, NULL, 'Permissions', 'Systems/Permissions/index/', 905, 999, 'fas fa-key', NULL, 1, 1, '2021-03-11 16:00:24', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, NULL, 'Blocked Account', 'Systems/Locked/index/', 906, 999, 'fas fa-lock', NULL, 1, 1, '2021-06-07 11:33:39', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, NULL, 'Password Management', 'Applications/Password_management/index/', 101, 1, 'fas fa-key', 'menu untuk aplikasi penyimpanan password', 0, 1, '2021-09-15 14:46:08', NULL, NULL, 1, '2022-02-07 16:29:41'),
(15, NULL, 'Product', 'Master/Product/index/ ', 306, 3, 'fas fa-box', 'menu untuk group aplikasi product', 1, 1, '2021-09-21 13:04:05', NULL, NULL, NULL, NULL),
(16, 15, 'Brand', 'Master/Product/Brand/index/', 307, 3, '', 'menu untuk mater data brand product', 1, 1, '2021-09-21 13:09:25', NULL, NULL, NULL, NULL),
(17, 15, 'Category', 'Master/Product/Kategori/index/', 308, 3, '', 'menu untuk master data category product', 1, 1, '2021-09-21 13:10:44', NULL, NULL, NULL, NULL),
(18, NULL, 'Product', 'Transaction/Product/Dashboard/index/', 400, 4, 'fas fa-dolly-flatbed', 'menu untuk aplikasi transaksi produk', 1, 1, '2021-09-21 13:48:55', 1, '2022-02-07 12:04:24', 1, '2022-02-04 01:10:13'),
(19, NULL, 'Brand', 'Report/Brand/Dashboard/index/', 500, 5, 'fas fa-print', 'menu untuk laporan penjualan produk per-tahun', 1, 1, '2021-09-21 18:58:13', 1, '2021-10-02 03:01:19', NULL, NULL),
(20, 15, 'Sub Category', 'Master/Product/Sub/index/', 309, 3, '', 'menu untuk sub kategori produk', 1, 1, '2021-09-22 23:04:44', 1, '2021-09-23 02:26:44', NULL, NULL),
(21, 15, 'Product', 'Master/Product/Management/index/', 310, 3, '', 'menu untuk master data produk / kode produk', 1, 1, '2021-09-23 13:20:47', 1, '2021-09-23 13:26:04', NULL, NULL),
(22, NULL, 'Category', 'Report/Category/Dashboard/index/', 501, 5, 'fas fa-box', 'laporan berdasarkan kategori', 1, 1, '2022-01-27 14:15:49', NULL, NULL, NULL, NULL),
(23, NULL, 'Parameter', 'Systems/Parameter/index/', 904, 999, 'fas fa-code-branch', 'menu untuk aplikasi parameter sistem', 1, 1, '2022-01-29 18:10:23', NULL, NULL, NULL, NULL),
(24, NULL, 'Sub Category', 'Report/Categorysub/Dashboard/index/', 502, 5, 'fas fa-box-open', 'laporan sub category', 1, 1, '2022-01-29 21:07:11', NULL, NULL, NULL, NULL),
(25, NULL, 'Report Product', 'Report/Produk/Dashboard/index/', 504, 5, 'fas fa-box', 'laporan penjualan product', 0, 1, '2022-01-31 22:09:12', NULL, NULL, 1, '2022-02-02 16:23:51'),
(26, NULL, 'Product', 'Report/Product/index/', 505, 5, '', 'laporan transaksi by produk', 0, 1, '2022-02-02 16:24:48', 1, '2022-02-07 12:03:34', 1, '2022-02-02 16:25:11'),
(27, NULL, 'Product', 'Report/Category/Product/index/', 503, 5, 'fas fa-boxes', 'laporan berdasarkan produk', 1, 1, '2022-02-02 16:25:57', 1, '2022-02-02 16:51:43', 1, '2022-02-20 23:45:54');
