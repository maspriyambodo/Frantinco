
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table untuk master data category' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mt_category_sub`
--

INSERT INTO `mt_category_sub` (`id`, `id_category`, `nama`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'Highlight Colour', 'sub kategori untuk produk hpl', 1, 1, '2021-09-20 15:33:26', 1, '2021-09-23 13:15:05', 1, '2021-09-20 21:44:08'),
(2, 2, 'Rainbow Colour', 'Rainbow Colour', 1, 1, '2021-09-23 02:19:37', 1, '2021-09-23 12:36:55', NULL, NULL),
(3, 3, 'Solid Core', NULL, 1, 1, '2021-09-23 02:29:40', NULL, NULL, NULL, NULL),
(4, 4, 'Super Glossy', NULL, 1, 1, '2021-09-23 02:30:26', NULL, NULL, NULL, NULL),
(5, 5, 'Standard Colour', NULL, 1, 1, '2021-09-23 02:30:55', NULL, NULL, NULL, NULL),
(6, 6, 'White Colour', NULL, 1, 1, '2021-09-23 02:31:21', NULL, NULL, NULL, NULL),
(7, 7, 'Rust Colour', NULL, 1, 1, '2021-09-23 02:31:38', NULL, NULL, NULL, NULL),
(8, 8, 'Bamboo Colour', NULL, 1, 1, '2021-09-23 02:31:58', NULL, NULL, NULL, NULL),
(9, 1, 'Volcano Magma', NULL, 1, 1, '2021-09-23 02:32:14', NULL, NULL, NULL, NULL),
(10, 2, 'Textile Colour', NULL, 1, 1, '2021-09-23 02:32:30', NULL, NULL, NULL, NULL),
(11, 3, 'Natural Leather', NULL, 1, 1, '2021-09-23 02:32:47', NULL, NULL, NULL, NULL),
(12, 4, 'Leather', NULL, 1, 1, '2021-09-24 13:33:38', NULL, NULL, NULL, NULL),
(13, 5, 'Woodgrain Feeling', NULL, 1, 1, '2021-09-24 13:34:02', NULL, NULL, NULL, NULL),
(14, 6, 'Woodgrain Glossy', NULL, 1, 1, '2021-09-24 13:34:17', NULL, NULL, NULL, NULL),
(15, 7, 'Royal Woodgrain', NULL, 1, 1, '2021-09-24 13:34:34', NULL, NULL, NULL, NULL),
(16, 8, 'Woodgrain', NULL, 1, 1, '2021-09-24 13:34:56', NULL, NULL, NULL, NULL),
(17, 1, 'Flame Colour', NULL, 1, 1, '2021-09-24 13:35:12', NULL, NULL, NULL, NULL),
(18, 2, 'Gem', NULL, 1, 1, '2021-09-24 13:35:31', NULL, NULL, NULL, NULL),
(19, 3, 'Dimensi', NULL, 1, 1, '2021-09-24 13:35:46', NULL, NULL, NULL, NULL),
(20, 4, 'Mirror', NULL, 1, 1, '2021-09-24 13:36:06', NULL, NULL, NULL, NULL),
(21, 5, 'Metalic', NULL, 1, 1, '2021-09-24 13:36:21', NULL, NULL, NULL, NULL),
(22, 6, 'White Illution', NULL, 1, 1, '2021-09-24 13:36:36', NULL, NULL, NULL, NULL),
(23, 7, 'Black Illution', NULL, 1, 1, '2021-09-24 13:36:55', NULL, NULL, NULL, NULL),
(24, 8, 'Fantasy', NULL, 1, 1, '2021-09-24 13:37:09', NULL, NULL, NULL, NULL),
(25, 1, 'Pearl Colour', NULL, 1, 1, '2021-09-24 13:37:25', NULL, NULL, NULL, NULL),
(26, 2, 'Marble', NULL, 1, 1, '2021-09-24 13:37:40', NULL, NULL, NULL, NULL),
(27, 3, 'Pattern (CB)', NULL, 1, 1, '2021-09-24 13:38:29', NULL, NULL, NULL, NULL),
(28, 4, 'Solid Colour (CB)', NULL, 1, 1, '2021-09-24 13:38:49', NULL, NULL, NULL, NULL),
(29, 5, 'Woodgrain (CB)', NULL, 1, 1, '2021-09-24 13:39:03', NULL, NULL, NULL, NULL),
(30, 6, 'Wood (VT)', NULL, 1, 1, '2021-09-24 13:39:33', NULL, NULL, NULL, NULL),
(31, 7, 'Stone (VT)', NULL, 1, 1, '2021-09-24 13:39:40', NULL, NULL, NULL, NULL),
(32, 8, 'Solid Colour (PB)', NULL, 1, 1, '2021-09-24 13:40:13', NULL, NULL, NULL, NULL),
(33, 1, 'Solid Fantasy (PB)', NULL, 1, 1, '2021-09-24 13:40:26', NULL, NULL, NULL, NULL),
(34, 2, 'Woodgrain (PB)', NULL, 1, 1, '2021-09-24 13:40:49', NULL, NULL, NULL, NULL),
(35, 3, 'Metalic (PB)', NULL, 1, 1, '2021-09-24 13:41:05', NULL, NULL, NULL, NULL),
(36, 4, 'Woodgrain Glossy (PB)', NULL, 1, 1, '2021-09-24 13:41:19', NULL, NULL, NULL, NULL),
(37, 5, 'White Colour (PB)', NULL, 1, 1, '2021-09-24 13:41:33', NULL, NULL, NULL, NULL),
(38, 6, 'Solid Colour (LC)', NULL, 1, 1, '2021-09-24 13:42:07', NULL, NULL, NULL, NULL),
(39, 7, 'DESIGNER CHOICE', NULL, 1, 1, '2021-09-24 13:42:29', 1, '2021-09-24 13:42:36', NULL, NULL),
(40, 8, 'WOOD DESAIN', NULL, 1, 1, '2021-09-24 13:42:54', NULL, NULL, NULL, NULL),
(41, 1, 'Highlight Colour 2', 'sub kategori untuk produk hpl', 1, 1, '2021-10-02 00:54:18', NULL, NULL, NULL, NULL);
