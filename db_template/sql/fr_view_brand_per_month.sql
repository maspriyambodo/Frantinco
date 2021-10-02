
-- --------------------------------------------------------

--
-- Structure for view `brand_per_month`
--
DROP TABLE IF EXISTS `brand_per_month`;

DROP VIEW IF EXISTS `brand_per_month`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `brand_per_month`  AS SELECT `mt_brand`.`id` AS `id`, `mt_brand`.`nama` AS `nama`, `tr_product`.`tr_date` AS `tr_date`, sum((case when (month(`tr_product`.`tr_date`) = 1) then `tr_product`.`qty` end)) AS `JANUARI`, sum((case when (month(`tr_product`.`tr_date`) = 2) then `tr_product`.`qty` end)) AS `FEBRUARI`, sum((case when (month(`tr_product`.`tr_date`) = 3) then `tr_product`.`qty` end)) AS `MARET`, sum((case when (month(`tr_product`.`tr_date`) = 4) then `tr_product`.`qty` end)) AS `APRIL`, sum((case when (month(`tr_product`.`tr_date`) = 5) then `tr_product`.`qty` end)) AS `MEI`, sum((case when (month(`tr_product`.`tr_date`) = 6) then `tr_product`.`qty` end)) AS `JUNI`, sum((case when (month(`tr_product`.`tr_date`) = 7) then `tr_product`.`qty` end)) AS `JULI`, sum((case when (month(`tr_product`.`tr_date`) = 8) then `tr_product`.`qty` end)) AS `AGUSTUS`, sum((case when (month(`tr_product`.`tr_date`) = 9) then `tr_product`.`qty` end)) AS `SEPTEMBER`, sum((case when (month(`tr_product`.`tr_date`) = 10) then `tr_product`.`qty` end)) AS `OKTOBER`, sum((case when (month(`tr_product`.`tr_date`) = 11) then `tr_product`.`qty` end)) AS `NOVEMBER`, sum((case when (month(`tr_product`.`tr_date`) = 12) then `tr_product`.`qty` end)) AS `DESEMBER` FROM ((((`mt_product` left join `tr_product` on((`mt_product`.`kd_produk` = `tr_product`.`kode`))) left join `mt_category_sub` on((`mt_product`.`id_category_sub` = `mt_category_sub`.`id`))) left join `mt_category` on((`mt_category_sub`.`id_category` = `mt_category`.`id`))) left join `mt_brand` on((`mt_category`.`id_brand` = `mt_brand`.`id`))) GROUP BY `mt_brand`.`id` ;
