
-- --------------------------------------------------------

--
-- Table structure for table `mt_brand`
--

DROP TABLE IF EXISTS `mt_brand`;
CREATE TABLE `mt_brand` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `description` text,
  `stat` int(11) NOT NULL DEFAULT '1',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table untuk master brand produk';

--
-- Dumping data for table `mt_brand`
--

INSERT INTO `mt_brand` (`id`, `nama`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'FRANTINCO', 'deskripsikan brand', 1, 1, '2021-09-20 15:33:26', 1, '2022-02-01 02:25:40', 1, '2021-09-22 16:35:09'),
(2, 'GREATWALL', 'deskripsikan keterangan brand', 1, 1, '2021-09-21 18:48:23', 1, '2022-02-20 23:38:03', 1, '2021-09-22 15:44:55'),
(3, 'ACCESSORIES TOILET', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:38:20', NULL, NULL, 1, '2022-02-21 13:51:29'),
(4, 'ALUMUNIUM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:38:38', NULL, NULL, 1, '2022-02-21 13:51:33'),
(5, 'COMPACT BOARD', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:39:09', NULL, NULL, 1, '2022-02-23 13:20:29'),
(6, 'DECORATIVE', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:39:25', NULL, NULL, 1, '2022-02-23 13:20:43'),
(7, 'SPC FLOORING', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:39:42', NULL, NULL, 1, '2022-02-23 13:20:51'),
(8, 'VINYL', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:39:58', NULL, NULL, 1, '2022-02-23 13:20:55'),
(9, 'KITCHEN TOP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:40:18', NULL, NULL, 1, '2022-02-23 13:20:59'),
(10, 'PHENOLIC', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:40:35', NULL, NULL, 1, '2022-02-23 13:21:06'),
(11, 'PVC', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:40:52', NULL, NULL, 1, '2022-02-23 13:21:10'),
(12, 'TOOLING', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, 1, '2022-02-20 23:41:08', NULL, NULL, 1, '2022-02-23 13:21:16');
