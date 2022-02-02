
-- --------------------------------------------------------

--
-- Structure for view `v_transaction`
--
DROP TABLE IF EXISTS `v_transaction`;

DROP VIEW IF EXISTS `v_transaction`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_transaction`  AS SELECT `mt_brand`.`id` AS `id_brand`, `mt_brand`.`nama` AS `nama_brand`, `mt_category`.`id` AS `id_category`, `mt_category`.`nama` AS `nama_kategori`, `mt_category_sub`.`id` AS `id_categorysub`, `mt_category_sub`.`nama` AS `nama_kategorisub`, `mt_product`.`id` AS `id_product`, `tr_product`.`kode` AS `kode_product`, `mt_product`.`nama` AS `nama_produk`, `tr_product`.`qty` AS `qty`, `tr_product`.`tr_date` AS `tr_date` FROM ((((`mt_brand` left join `mt_category` on((`mt_category`.`id_brand` = `mt_brand`.`id`))) left join `mt_category_sub` on((`mt_category_sub`.`id_category` = `mt_category`.`id`))) left join `mt_product` on((`mt_product`.`id_category_sub` = `mt_category_sub`.`id`))) left join `tr_product` on((`tr_product`.`kode` = `mt_product`.`kd_produk`))) ;
