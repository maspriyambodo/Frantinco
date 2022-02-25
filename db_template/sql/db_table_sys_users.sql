
-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `pict` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `login_attempt` int(11) DEFAULT '0',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `uname`, `pwd`, `role_id`, `pict`, `stat`, `last_login`, `ip_address`, `login_attempt`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'bod', '$2y$10$tCIn4XedE68ZD3s5aJWIDeYn8CiIL.ZFdlGFNTdAfonIgf0l.B46m', 1, 'users22_230749.jpg', 1, '2022-02-23 22:20:03', '125.160.232.177', 0, 1, '2021-03-07 23:06:13', 1, '2021-09-22 23:07:49', 0, '2021-07-08 00:09:25'),
(2, 'Direktur 1', '$2y$10$tCIn4XedE68ZD3s5aJWIDeYn8CiIL.ZFdlGFNTdAfonIgf0l.B46m', 2, 'blank.png', 1, '2021-09-21 20:07:38', '::1', 0, 1, '2021-09-21 20:06:09', NULL, NULL, NULL, NULL);
