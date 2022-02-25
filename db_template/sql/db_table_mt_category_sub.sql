
-- --------------------------------------------------------

--
-- Table structure for table `mt_category_sub`
--

DROP TABLE IF EXISTS `mt_category_sub`;
CREATE TABLE `mt_category_sub` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL COMMENT 'mengambil id dari tabel mt_category',
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
-- Dumping data for table `mt_category_sub`
--

INSERT INTO `mt_category_sub` (`id`, `id_category`, `nama`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'Highlight Colour', 'sub kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', 1, '2021-09-23 13:15:05', 1, '2021-09-20 21:44:08'),
(9, 1, 'Rainbow Colour', 'Rainbow Colour', 1, 1, '2021-09-23 02:19:37', 1, '2021-09-23 12:36:55', NULL, NULL),
(10, 1, 'Solid Core', '', 1, 1, '2021-09-23 02:29:40', NULL, NULL, NULL, NULL),
(12, 1, 'Super Glossy', '', 1, 1, '2021-09-23 02:30:26', NULL, NULL, NULL, NULL),
(13, 1, 'Standard Colour', '', 1, 1, '2021-09-23 02:30:55', NULL, NULL, NULL, NULL),
(14, 1, 'White Colour', '', 1, 1, '2021-09-23 02:31:21', NULL, NULL, NULL, NULL),
(15, 1, 'Rust Colour', '', 1, 1, '2021-09-23 02:31:38', NULL, NULL, NULL, NULL),
(16, 1, 'Bamboo Colour', '', 1, 1, '2021-09-23 02:31:58', NULL, NULL, NULL, NULL),
(17, 1, 'Volcano Magma', '', 1, 1, '2021-09-23 02:32:14', NULL, NULL, NULL, NULL),
(18, 1, 'Textile Colour', '', 1, 1, '2021-09-23 02:32:30', NULL, NULL, NULL, NULL),
(19, 1, 'Natural Leather', '', 1, 1, '2021-09-23 02:32:47', NULL, NULL, NULL, NULL),
(21, 1, 'Leather', '', 1, 1, '2021-09-24 13:33:38', NULL, NULL, NULL, NULL),
(22, 1, 'Woodgrain Feeling', '', 1, 1, '2021-09-24 13:34:02', NULL, NULL, NULL, NULL),
(23, 1, 'Woodgrain Glossy', '', 1, 1, '2021-09-24 13:34:17', NULL, NULL, NULL, NULL),
(24, 1, 'Royal Woodgrain', '', 1, 1, '2021-09-24 13:34:34', NULL, NULL, NULL, NULL),
(25, 1, 'Woodgrain', '', 1, 1, '2021-09-24 13:34:56', NULL, NULL, NULL, NULL),
(26, 1, 'Flame Colour', '', 1, 1, '2021-09-24 13:35:12', NULL, NULL, NULL, NULL),
(27, 1, 'Gem', '', 1, 1, '2021-09-24 13:35:31', NULL, NULL, NULL, NULL),
(28, 1, 'Dimensi', '', 1, 1, '2021-09-24 13:35:46', NULL, NULL, NULL, NULL),
(29, 1, 'Mirror', '', 1, 1, '2021-09-24 13:36:06', NULL, NULL, NULL, NULL),
(30, 1, 'Metalic', '', 1, 1, '2021-09-24 13:36:21', NULL, NULL, NULL, NULL),
(31, 1, 'White Illution', '', 1, 1, '2021-09-24 13:36:36', NULL, NULL, NULL, NULL),
(32, 1, 'Black Illution', '', 1, 1, '2021-09-24 13:36:55', NULL, NULL, NULL, NULL),
(33, 1, 'Fantasy', '', 1, 1, '2021-09-24 13:37:09', NULL, NULL, NULL, NULL),
(34, 1, 'Pearl Colour', '', 1, 1, '2021-09-24 13:37:25', NULL, NULL, NULL, NULL),
(35, 1, 'Marble', '', 1, 1, '2021-09-24 13:37:40', NULL, NULL, NULL, NULL),
(36, 2, 'Pattern (CB)', '', 1, 1, '2021-09-24 13:38:29', NULL, NULL, NULL, NULL),
(37, 2, 'Solid Colour (CB)', '', 1, 1, '2021-09-24 13:38:49', NULL, NULL, NULL, NULL),
(38, 2, 'Woodgrain (CB)', '', 1, 1, '2021-09-24 13:39:03', NULL, NULL, NULL, NULL),
(39, 3, 'Wood (VT)', '', 1, 1, '2021-09-24 13:39:33', NULL, NULL, NULL, NULL),
(40, 3, 'Stone (VT)', '', 1, 1, '2021-09-24 13:39:40', NULL, NULL, NULL, NULL),
(41, 4, 'Solid Colour (PB)', '', 1, 1, '2021-09-24 13:40:13', NULL, NULL, NULL, NULL),
(42, 4, 'Solid Fantasy (PB)', '', 1, 1, '2021-09-24 13:40:26', NULL, NULL, NULL, NULL),
(43, 4, 'Woodgrain (PB)', '', 1, 1, '2021-09-24 13:40:49', NULL, NULL, NULL, NULL),
(44, 4, 'Metalic (PB)', '', 1, 1, '2021-09-24 13:41:05', NULL, NULL, NULL, NULL),
(45, 4, 'Woodgrain Glossy (PB)', '', 1, 1, '2021-09-24 13:41:19', NULL, NULL, NULL, NULL),
(46, 4, 'White Colour (PB)', '', 1, 1, '2021-09-24 13:41:33', NULL, NULL, NULL, NULL),
(47, 5, 'Solid Colour (LC)', '', 1, 1, '2021-09-24 13:42:07', NULL, NULL, NULL, NULL),
(48, 6, 'DESIGNER CHOICE', '', 1, 1, '2021-09-24 13:42:29', 1, '2021-09-24 13:42:36', NULL, NULL),
(49, 7, 'WOOD DESAIN', '', 1, 1, '2021-09-24 13:42:54', NULL, NULL, NULL, NULL),
(50, 10, 'Highlight Colour 2', 'sub kategori untuk produk hpl', 1, 1, '2021-10-02 00:54:18', NULL, NULL, NULL, NULL),
(51, 1, 'COMBINATION SERIES', '', 1, 1, '2022-02-03 00:30:55', NULL, NULL, NULL, NULL),
(52, 10, 'STANDARD WOODGRAIN', '', 1, 1, '2022-02-03 15:14:54', NULL, NULL, NULL, NULL),
(53, 10, 'fabric', '', 1, 1, '2022-02-03 15:25:32', NULL, NULL, NULL, NULL),
(96, 7, 'BODO', 'bodo sub category', 1, 1, '2022-02-03 19:59:00', NULL, NULL, NULL, NULL),
(97, 7, 'BODO SUB CATEGORY', 'BODO SUB CATEGORY', 1, 1, '2022-02-03 20:52:22', NULL, NULL, NULL, NULL),
(98, 10, 'woodgrain texture', '', 1, 1, '2022-02-03 21:57:23', NULL, NULL, NULL, NULL),
(99, 10, 'metal', '', 1, 1, '2022-02-03 21:58:32', NULL, NULL, NULL, NULL),
(100, 10, 'pattern', '', 1, 1, '2022-02-03 21:59:32', NULL, NULL, NULL, NULL),
(101, 10, 'glossy colour', '', 1, 1, '2022-02-03 22:00:44', NULL, NULL, NULL, NULL),
(102, 10, 'fine matt', '', 1, 1, '2022-02-03 22:01:20', NULL, NULL, NULL, NULL),
(103, 10, 'white colour gw', '', 1, 1, '2022-02-03 22:04:54', NULL, NULL, NULL, NULL),
(104, 10, 'standard colour gw', '', 1, 1, '2022-02-03 22:07:24', NULL, NULL, NULL, NULL),
(105, 11, 'ACESSORIES TOILET', '', 1, 1, '2022-02-23 18:38:31', NULL, NULL, NULL, NULL),
(106, 12, 'ALUMUNIUM', '', 1, 1, '2022-02-23 18:57:34', NULL, NULL, NULL, NULL),
(107, 13, 'COMPACT BOARD', 'COMPACT BOARD', 1, 1, '2022-02-23 19:02:44', NULL, NULL, NULL, NULL),
(108, 14, 'DECORATIVE', '', 1, 1, '2022-02-23 19:22:33', NULL, NULL, NULL, NULL),
(109, 15, 'HPL FRANTINCO', '', 1, 1, '2022-02-23 19:30:48', NULL, NULL, NULL, NULL),
(110, 16, 'SPC FLOORING', '', 1, 1, '2022-02-23 19:35:30', NULL, NULL, NULL, NULL),
(111, 17, 'VINYL', '', 1, 1, '2022-02-23 19:38:40', NULL, NULL, NULL, NULL),
(112, 22, 'GREATWALL', '', 1, 1, '2022-02-23 19:44:18', NULL, NULL, NULL, NULL),
(113, 18, 'KITCHEN TOP', '', 1, 1, '2022-02-23 19:47:31', NULL, NULL, NULL, NULL),
(114, 19, 'PHENOLIC', '', 1, 1, '2022-02-23 19:52:31', NULL, NULL, NULL, NULL),
(115, 20, 'FRANTINCO PVC', '', 1, 1, '2022-02-23 19:56:01', NULL, NULL, NULL, NULL),
(116, 21, 'PVC GW', '', 1, 1, '2022-02-25 20:49:03', NULL, NULL, NULL, NULL),
(117, 23, 'TOOLING', '', 1, 1, '2022-02-25 21:00:19', NULL, NULL, NULL, NULL);
