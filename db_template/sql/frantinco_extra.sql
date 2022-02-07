
--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_notif`
--
ALTER TABLE `dt_notif`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE,
  ADD KEY `syscreateuser` (`syscreateuser`) USING BTREE;

--
-- Indexes for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `syscreateuser` (`syscreateuser`) USING BTREE;

--
-- Indexes for table `dt_users`
--
ALTER TABLE `dt_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_user` (`sys_user_id`) USING BTREE,
  ADD KEY `address_provinsi` (`address_provinsi`) USING BTREE,
  ADD KEY `address_kelurahan` (`address_kelurahan`) USING BTREE,
  ADD KEY `address_kecamatan` (`address_kecamatan`) USING BTREE,
  ADD KEY `address_kabupaten` (`address_kabupaten`) USING BTREE,
  ADD KEY `negara` (`negara`) USING BTREE;

--
-- Indexes for table `mt_brand`
--
ALTER TABLE `mt_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mt_category`
--
ALTER TABLE `mt_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mt_category_ibfk_1` (`id_brand`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mt_category_sub`
--
ALTER TABLE `mt_category_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mt_country`
--
ALTER TABLE `mt_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_month`
--
ALTER TABLE `mt_month`
  ADD PRIMARY KEY (`angka`);

--
-- Indexes for table `mt_product`
--
ALTER TABLE `mt_product`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_category_sub` (`id_category_sub`) USING BTREE,
  ADD KEY `kd_produk` (`kd_produk`) USING BTREE;

--
-- Indexes for table `mt_wil_kabupaten`
--
ALTER TABLE `mt_wil_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `mt_wil_kabupaten_ibfk_1` (`id_provinsi`);

--
-- Indexes for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `mt_wil_kecamatan_ibfk_1` (`id_kabupaten`);

--
-- Indexes for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `mt_wil_kelurahan_ibfk_1` (`id_kecamatan`);

--
-- Indexes for table `mt_wil_provinsi`
--
ALTER TABLE `mt_wil_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sys_app`
--
ALTER TABLE `sys_app`
  ADD PRIMARY KEY (`favico`) USING BTREE,
  ADD KEY `favico` (`favico`) USING BTREE;

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_menu` (`group_menu`);

--
-- Indexes for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_param`
--
ALTER TABLE `sys_param`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_permissions_ibfk_1` (`role_id`),
  ADD KEY `sys_permissions_ibfk_2` (`id_menu`);

--
-- Indexes for table `sys_roles`
--
ALTER TABLE `sys_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `uname` (`uname`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- Indexes for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `kode` (`kode`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_notif`
--
ALTER TABLE `dt_notif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `dt_users`
--
ALTER TABLE `dt_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_brand`
--
ALTER TABLE `mt_brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_category`
--
ALTER TABLE `mt_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mt_category_sub`
--
ALTER TABLE `mt_category_sub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `mt_country`
--
ALTER TABLE `mt_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_product`
--
ALTER TABLE `mt_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sys_roles`
--
ALTER TABLE `sys_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_product`
--
ALTER TABLE `tr_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dt_notif`
--
ALTER TABLE `dt_notif`
  ADD CONSTRAINT `dt_notif_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_notif_ibfk_2` FOREIGN KEY (`syscreateuser`) REFERENCES `dt_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  ADD CONSTRAINT `dt_pwd_ibfk_1` FOREIGN KEY (`syscreateuser`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_users`
--
ALTER TABLE `dt_users`
  ADD CONSTRAINT `dt_users_ibfk_1` FOREIGN KEY (`sys_user_id`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_2` FOREIGN KEY (`address_provinsi`) REFERENCES `mt_wil_provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_3` FOREIGN KEY (`address_kelurahan`) REFERENCES `mt_wil_kelurahan` (`id_kelurahan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_4` FOREIGN KEY (`address_kecamatan`) REFERENCES `mt_wil_kecamatan` (`id_kecamatan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_5` FOREIGN KEY (`address_kabupaten`) REFERENCES `mt_wil_kabupaten` (`id_kabupaten`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_6` FOREIGN KEY (`negara`) REFERENCES `mt_country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_category`
--
ALTER TABLE `mt_category`
  ADD CONSTRAINT `mt_category_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `mt_brand` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_category_sub`
--
ALTER TABLE `mt_category_sub`
  ADD CONSTRAINT `mt_category_sub_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `mt_category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_product`
--
ALTER TABLE `mt_product`
  ADD CONSTRAINT `mt_product_ibfk_1` FOREIGN KEY (`id_category_sub`) REFERENCES `mt_category_sub` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kabupaten`
--
ALTER TABLE `mt_wil_kabupaten`
  ADD CONSTRAINT `mt_wil_kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `mt_wil_provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD CONSTRAINT `mt_wil_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `mt_wil_kabupaten` (`id_kabupaten`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD CONSTRAINT `mt_wil_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `mt_wil_kecamatan` (`id_kecamatan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD CONSTRAINT `sys_menu_ibfk_1` FOREIGN KEY (`group_menu`) REFERENCES `sys_menu_group` (`id`);

--
-- Constraints for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD CONSTRAINT `sys_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sys_permissions_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `sys_menu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD CONSTRAINT `sys_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD CONSTRAINT `tr_product_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `mt_product` (`kd_produk`);
