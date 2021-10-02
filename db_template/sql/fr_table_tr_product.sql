
-- --------------------------------------------------------

--
-- Table structure for table `tr_product`
--

DROP TABLE IF EXISTS `tr_product`;
CREATE TABLE `tr_product` (
  `id` int NOT NULL,
  `kode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'mengambil kd_product dari tabel mt_product',
  `qty` int NOT NULL,
  `tr_date` date NOT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tr_product`
--

INSERT INTO `tr_product` (`id`, `kode`, `qty`, `tr_date`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'F5524S', 1232, '2021-09-21', 1, '2021-09-21 01:47:48', NULL, NULL, NULL, NULL),
(2, 'F5524S', 892, '2020-09-23', 1, '2021-09-23 21:23:50', NULL, NULL, NULL, NULL),
(3, 'F5522S', 781, '2021-09-24', 1, '2021-09-24 11:15:08', NULL, NULL, NULL, NULL),
(6, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:16:24', NULL, NULL, NULL, NULL),
(7, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:16:53', NULL, NULL, NULL, NULL),
(8, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:17:27', NULL, NULL, NULL, NULL),
(9, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:30:30', NULL, NULL, NULL, NULL),
(10, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:31:36', NULL, NULL, NULL, NULL),
(11, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:32:49', NULL, NULL, NULL, NULL),
(12, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:35:20', NULL, NULL, NULL, NULL),
(13, 'F5524S', 1232, '2021-09-28', 1, '2021-09-28 14:38:36', NULL, NULL, NULL, NULL),
(25, 'F5524S', 1232, '2021-10-02', 1, '2021-10-02 02:18:16', NULL, NULL, NULL, NULL),
(26, 'F5524S', 1232, '2021-10-02', 1, '2021-10-02 02:26:34', NULL, NULL, NULL, NULL),
(27, 'F5522S', 1232, '2021-10-02', 1, '2021-10-02 03:37:01', NULL, NULL, NULL, NULL),
(28, 'F5523S', 1011, '2021-10-02', 1, '2021-10-02 03:37:01', NULL, NULL, NULL, NULL),
(29, 'F5522S', 1232, '2021-10-02', 1, '2021-10-02 03:42:06', NULL, NULL, NULL, NULL),
(30, 'G5524S', 1011, '2021-10-02', 1, '2021-10-02 03:42:06', NULL, NULL, NULL, NULL);
