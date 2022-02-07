
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
(1, 'FRANTINCO', 'deskripsikan brand', 1, 1, '2021-09-20 15:33:26', 1, '2022-02-01 02:25:40', 1, '2021-09-22 16:35:09'),
(2, 'GW', 'deskripsikan keterangan brand', 1, 1, '2021-09-21 18:48:23', 1, '2022-02-01 02:25:58', 1, '2021-09-22 15:44:55');
