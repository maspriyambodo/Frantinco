
-- --------------------------------------------------------

--
-- Table structure for table `sys_param`
--

DROP TABLE IF EXISTS `sys_param`;
CREATE TABLE `sys_param` (
  `id` varchar(32) NOT NULL,
  `param_group` varchar(32) DEFAULT NULL,
  `param_value` varchar(32) DEFAULT NULL,
  `param_desc` varchar(128) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_param`
--

INSERT INTO `sys_param` (`id`, `param_group`, `param_value`, `param_desc`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
('DEFAULT_PASSWORD', 'SYSTEM_PARAM', 'password', 'default password system', 1, 1, '2021-12-08 14:39:44', 1, '2021-12-08 22:18:03', 1, '2021-12-08 22:37:16'),
('SUPER_USER', 'GROUP_LEVEL', '1', 'super user', 1, 1, '2021-12-08 12:20:36', 1, '2021-12-08 23:14:24', NULL, NULL);
