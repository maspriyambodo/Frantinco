
-- --------------------------------------------------------

--
-- Table structure for table `dt_users`
--

DROP TABLE IF EXISTS `dt_users`;
CREATE TABLE `dt_users` (
  `id` int(11) NOT NULL,
  `sys_user_id` int(11) DEFAULT NULL COMMENT 'relasi dengan ID table sys_users',
  `nama` varchar(65) COLLATE utf8mb4_bin DEFAULT NULL,
  `jenis_kelamin` int(11) NOT NULL DEFAULT '0' COMMENT '1. Male\r\n2. Female',
  `id_number` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'bisa nomor ktp, nomor induk pegawai, nomor induk karyawan',
  `lahir_1` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'tempat lahir',
  `lahir_2` date DEFAULT NULL COMMENT 'tanggal_lahir',
  `address_1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'alamat nama jalan',
  `address_provinsi` char(2) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address_kabupaten` char(4) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address_kecamatan` char(6) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address_kelurahan` char(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `negara` int(11) DEFAULT '101',
  `mail` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `syscreateuser` int(11) DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int(11) DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int(11) DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `dt_users`
--

INSERT INTO `dt_users` (`id`, `sys_user_id`, `nama`, `jenis_kelamin`, `id_number`, `lahir_1`, `lahir_2`, `address_1`, `address_provinsi`, `address_kabupaten`, `address_kecamatan`, `address_kelurahan`, `negara`, `mail`, `telp`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'XNXX', 1, '3175061303940001', 'JAKARTA', '1994-03-13', 'Jl. Raya Penggilingan No. 45', '31', '3175', '317506', '3175061003', 101, 'maspriyambodo@gmail.com', '081282309100', 1, 1, '1970-01-01 00:00:00', 1, '2021-09-22 23:07:49', 1, '1970-01-01 00:00:00'),
(2, 2, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 101, NULL, NULL, 1, 1, '2021-09-21 20:06:09', NULL, NULL, NULL, NULL);
