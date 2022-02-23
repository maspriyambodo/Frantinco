
-- --------------------------------------------------------

--
-- Table structure for table `dt_notif`
--

DROP TABLE IF EXISTS `dt_notif`;
CREATE TABLE `dt_notif` (
  `id` int(11) NOT NULL,
  `title_notif` varchar(255) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon_text` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '1' COMMENT '1. unread, 0. read',
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
