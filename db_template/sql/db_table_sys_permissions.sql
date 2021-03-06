
-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

DROP TABLE IF EXISTS `sys_permissions`;
CREATE TABLE `sys_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `v` int(11) DEFAULT NULL COMMENT 'view',
  `c` int(11) DEFAULT NULL COMMENT 'create',
  `r` int(11) DEFAULT NULL COMMENT 'read',
  `u` int(11) DEFAULT NULL COMMENT 'update',
  `d` int(11) DEFAULT NULL COMMENT 'delete',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_permissions`
--

INSERT INTO `sys_permissions` (`id`, `role_id`, `id_menu`, `v`, `c`, `r`, `u`, `d`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(2, 1, 2, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(3, 1, 3, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(4, 1, 4, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(5, 1, 5, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(6, 1, 6, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(7, 1, 7, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(8, 1, 8, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(9, 1, 9, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(10, 1, 10, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(11, 1, 11, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(12, 1, 12, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(13, 1, 13, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(14, 1, 14, 1, 1, 1, 1, 1, 1, '2021-09-15 14:46:08', NULL, NULL, NULL, NULL),
(15, 1, 15, 1, 1, 1, 1, 1, 1, '2021-09-21 13:04:05', NULL, NULL, NULL, NULL),
(16, 1, 16, 1, 1, 1, 1, 1, 1, '2021-09-21 13:09:25', NULL, NULL, NULL, NULL),
(17, 1, 17, 1, 1, 1, 1, 1, 1, '2021-09-21 13:10:44', NULL, NULL, NULL, NULL),
(18, 1, 18, 1, 1, 1, 1, 1, 1, '2021-09-21 13:48:55', NULL, NULL, NULL, NULL),
(19, 1, 19, 1, 1, 1, 1, 1, 1, '2021-09-21 18:58:13', NULL, NULL, NULL, NULL),
(20, 2, 1, 1, 1, 1, 1, 1, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(21, 2, 2, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(22, 2, 3, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(23, 2, 4, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(24, 2, 5, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(25, 2, 6, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(26, 2, 7, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(27, 2, 8, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(28, 2, 9, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(29, 2, 10, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(30, 2, 11, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(31, 2, 12, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(32, 2, 13, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(33, 2, 14, 0, 0, 0, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(34, 2, 15, 1, 0, 1, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(35, 2, 16, 1, 0, 1, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(36, 2, 17, 1, 0, 1, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(37, 2, 18, 1, 0, 1, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(38, 2, 19, 1, 0, 1, 0, 0, 1, '2021-09-21 20:05:48', 1, '2021-09-23 13:29:31', NULL, NULL),
(39, 1, 20, 1, 1, 1, 1, 1, 1, '2021-09-22 23:04:44', NULL, NULL, NULL, NULL),
(40, 2, 20, 1, 0, 1, 0, 0, 1, '2021-09-22 23:04:44', 1, '2021-09-23 13:29:31', NULL, NULL),
(41, 1, 21, 1, 1, 1, 1, 1, 1, '2021-09-23 13:20:47', NULL, NULL, NULL, NULL),
(42, 2, 21, 1, 0, 1, 0, 0, 1, '2021-09-23 13:20:47', 1, '2021-09-23 13:29:31', NULL, NULL),
(43, 1, 22, 1, 1, 1, 1, 1, 1, '2022-01-27 14:15:49', NULL, NULL, NULL, NULL),
(44, 2, 22, 0, 0, 0, 0, 0, 1, '2022-01-27 14:15:49', NULL, NULL, NULL, NULL),
(45, 1, 23, 1, 1, 1, 1, 1, 1, '2022-01-29 18:10:23', NULL, NULL, NULL, NULL),
(46, 2, 23, 0, 0, 0, 0, 0, 1, '2022-01-29 18:10:23', NULL, NULL, NULL, NULL),
(47, 1, 24, 1, 1, 1, 1, 1, 1, '2022-01-29 18:10:23', NULL, NULL, NULL, NULL),
(48, 2, 24, 0, 0, 0, 0, 0, 1, '2022-01-29 18:10:23', NULL, NULL, NULL, NULL),
(49, 1, 25, 1, 1, 1, 1, 1, 1, '2022-01-31 22:09:12', NULL, NULL, NULL, NULL),
(50, 2, 25, 0, 0, 0, 0, 0, 1, '2022-01-31 22:09:12', NULL, NULL, NULL, NULL),
(51, 1, 26, 1, 1, 1, 1, 1, 1, '2022-02-02 16:24:48', NULL, NULL, NULL, NULL),
(52, 2, 26, 0, 0, 0, 0, 0, 1, '2022-02-02 16:24:48', NULL, NULL, NULL, NULL),
(53, 1, 27, 1, 1, 1, 1, 1, 1, '2022-02-02 16:25:57', NULL, NULL, NULL, NULL),
(54, 2, 27, 0, 0, 0, 0, 0, 1, '2022-02-02 16:25:57', NULL, NULL, NULL, NULL);
