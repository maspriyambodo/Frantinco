
-- --------------------------------------------------------

--
-- Table structure for table `mt_brand`
--

DROP TABLE IF EXISTS `mt_brand`;
CREATE TABLE `mt_brand` (
  `id` int NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stat` int NOT NULL DEFAULT '1',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table untuk master brand produk' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mt_brand`
--

INSERT INTO `mt_brand` (`id`, `nama`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'BA', 'Brand product frantinco', 1, 1, '2022-01-30 04:55:48', 1, '2022-01-31 19:16:41', NULL, NULL),
(2, 'GW', 'Brand product GW', 1, 1, '2022-01-30 04:56:02', NULL, NULL, NULL, NULL);
