
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
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `mt_wil_provinsi`
--
ALTER TABLE `mt_wil_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_roles`
--
ALTER TABLE `sys_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dt_users`
--
ALTER TABLE `dt_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_brand`
--
ALTER TABLE `mt_brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_category`
--
ALTER TABLE `mt_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mt_category_sub`
--
ALTER TABLE `mt_category_sub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mt_country`
--
ALTER TABLE `mt_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_product`
--
ALTER TABLE `mt_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sys_roles`
--
ALTER TABLE `sys_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_product`
--
ALTER TABLE `tr_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5719;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD CONSTRAINT `tr_product_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `mt_product` (`kd_produk`);
