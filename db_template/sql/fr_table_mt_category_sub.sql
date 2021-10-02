
-- --------------------------------------------------------

--
-- Table structure for table `mt_category_sub`
--

DROP TABLE IF EXISTS `mt_category_sub`;
CREATE TABLE `mt_category_sub` (
  `id` int NOT NULL,
  `id_category` int NOT NULL COMMENT 'mengambil id dari tabel mt_category',
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
(50, 10, 'Highlight Colour 2', 'sub kategori untuk produk hpl', 1, 1, '2021-10-02 00:54:18', NULL, NULL, NULL, NULL);
