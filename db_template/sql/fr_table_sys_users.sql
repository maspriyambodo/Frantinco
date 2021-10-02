
-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `id` int NOT NULL,
  `uname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `pict` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `login_attempt` int DEFAULT '0',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `uname`, `pwd`, `role_id`, `pict`, `stat`, `last_login`, `ip_address`, `login_attempt`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'bod', '$2y$10$n0NAevlNKOHXCTcwocF/C.sjYmVbzg3E.01q6cUiKbSP6EJ6pP/ie', 1, 'users22_230749.jpg', 1, '2021-10-01 23:14:46', '127.0.0.1', 0, 1, '2021-03-07 23:06:13', 1, '2021-09-22 23:07:49', 0, '2021-07-08 00:09:25'),
(2, 'Direktur 1', '$2y$10$tCIn4XedE68ZD3s5aJWIDeYn8CiIL.ZFdlGFNTdAfonIgf0l.B46m', 2, 'blank.png', 1, '2021-09-21 20:07:38', '::1', 0, 1, '2021-09-21 20:06:09', NULL, NULL, NULL, NULL);