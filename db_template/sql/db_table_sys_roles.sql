
-- --------------------------------------------------------

--
-- Table structure for table `sys_roles`
--

DROP TABLE IF EXISTS `sys_roles`;
CREATE TABLE `sys_roles` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '1' COMMENT '1. aktif 0. non-aktif',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_roles`
--

INSERT INTO `sys_roles` (`id`, `parent_id`, `name`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 0, 'Super User', 'Super administrators', 1, 1, '2021-02-25 02:27:34', 1, '2021-03-08 08:29:08', 1, '2021-06-08 23:51:23'),
(2, 0, 'Direktur', 'level user direktur', 1, 1, '2021-09-21 20:05:47', NULL, NULL, NULL, NULL);
