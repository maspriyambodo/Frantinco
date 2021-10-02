
-- --------------------------------------------------------

--
-- Structure for view `report_get_year`
--
DROP TABLE IF EXISTS `report_get_year`;

DROP VIEW IF EXISTS `report_get_year`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_get_year`  AS SELECT year(`tr_product`.`tr_date`) AS `tahun` FROM `tr_product` GROUP BY year(`tr_product`.`tr_date`) ;
