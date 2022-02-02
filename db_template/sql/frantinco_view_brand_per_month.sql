
-- --------------------------------------------------------

--
-- Structure for view `brand_per_month`
--
DROP TABLE IF EXISTS `brand_per_month`;

DROP VIEW IF EXISTS `brand_per_month`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `brand_per_month`  AS SELECT `v_transaction`.`id_brand` AS `id`, `v_transaction`.`nama_brand` AS `nama`, min(`v_transaction`.`tr_date`) AS `tr_date`, sum((case when (month(`v_transaction`.`tr_date`) = 1) then `v_transaction`.`qty` else 0 end)) AS `JANUARI`, sum((case when (month(`v_transaction`.`tr_date`) = 2) then `v_transaction`.`qty` else 0 end)) AS `FEBRUARI`, sum((case when (month(`v_transaction`.`tr_date`) = 3) then `v_transaction`.`qty` else 0 end)) AS `MARET`, sum((case when (month(`v_transaction`.`tr_date`) = 4) then `v_transaction`.`qty` else 0 end)) AS `APRIL`, sum((case when (month(`v_transaction`.`tr_date`) = 5) then `v_transaction`.`qty` else 0 end)) AS `MEI`, sum((case when (month(`v_transaction`.`tr_date`) = 6) then `v_transaction`.`qty` else 0 end)) AS `JUNI`, sum((case when (month(`v_transaction`.`tr_date`) = 7) then `v_transaction`.`qty` else 0 end)) AS `JULI`, sum((case when (month(`v_transaction`.`tr_date`) = 8) then `v_transaction`.`qty` else 0 end)) AS `AGUSTUS`, sum((case when (month(`v_transaction`.`tr_date`) = 9) then `v_transaction`.`qty` else 0 end)) AS `SEPTEMBER`, sum((case when (month(`v_transaction`.`tr_date`) = 10) then `v_transaction`.`qty` else 0 end)) AS `OKTOBER`, sum((case when (month(`v_transaction`.`tr_date`) = 11) then `v_transaction`.`qty` else 0 end)) AS `NOVEMBER`, sum((case when (month(`v_transaction`.`tr_date`) = 12) then `v_transaction`.`qty` else 0 end)) AS `DESEMBER` FROM (`mt_brand` left join `v_transaction` on((`mt_brand`.`id` = `v_transaction`.`id_brand`))) GROUP BY `mt_brand`.`id` ;
