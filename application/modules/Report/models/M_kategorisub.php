<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_kategorisub extends CI_Model {

    public function dt_table($tahun) {
        $exec = $this->db->select('v_transaction.id_categorysub,v_transaction.nama_kategorisub,
	MIN(v_transaction.tr_date) AS tr_date,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 01 ) THEN v_transaction.qty ELSE 0 END ) AS `JANUARI`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 02 ) THEN v_transaction.qty ELSE 0 END ) AS `FEBRUARI`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 03 ) THEN v_transaction.qty ELSE 0 END ) AS `MARET`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 04 ) THEN v_transaction.qty ELSE 0 END ) AS `APRIL`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 05 ) THEN v_transaction.qty ELSE 0 END ) AS `MEI`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 06 ) THEN v_transaction.qty ELSE 0 END ) AS `JUNI`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 07 ) THEN v_transaction.qty ELSE 0 END ) AS `JULI`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 08 ) THEN v_transaction.qty ELSE 0 END ) AS `AGUSTUS`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 09 ) THEN v_transaction.qty ELSE 0 END ) AS `SEPTEMBER`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 10 ) THEN v_transaction.qty ELSE 0 END ) AS `OKTOBER`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 11 ) THEN v_transaction.qty ELSE 0 END ) AS `NOVEMBER`,
	sum( CASE WHEN ( MONTH ( v_transaction.tr_date ) = 12 ) THEN v_transaction.qty ELSE 0 END ) AS `DESEMBER`')
                ->from('mt_category_sub')
                ->join('v_transaction', 'mt_category_sub.id = v_transaction.id_categorysub', 'LEFT')
                ->where('`mt_category_sub`.`stat`', 1, false)
                ->where('YEAR ( `v_transaction`.`tr_date` ) = ', $tahun, false)
                ->group_by('mt_category_sub.id')
                ->get()
                ->result();
        return $exec;
    }

    public function not_exists($tahun) {
        $exec = $this->db->select('v_transaction.id_categorysub,v_transaction.nama_kategorisub,NOW() AS tr_date,0 AS JANUARI,0 AS FEBRUARI,0 AS MARET,0 AS APRIL,0 AS MEI,0 AS JUNI,0 AS JULI,0 AS AGUSTUS,0 AS SEPTEMBER,0 AS OKTOBER,0 AS NOVEMBER,0 AS DESEMBER')
                ->from('mt_category_sub')
                ->join('v_transaction', 'mt_category_sub.id = v_transaction.id_categorysub', 'LEFT')
                ->where('`mt_category_sub`.`id` NOT IN', '( SELECT v_transaction.id_categorysub FROM v_transaction WHERE YEAR ( tr_date ) = ' . $tahun . ' )', false)
                ->group_by('mt_category_sub.id')
                ->order_by('mt_category_sub.nama ASC')
                ->get()
                ->result();
        return $exec;
    }

    public function chartdiv($tahun) {
        $exec = $this->db->select('mt_month.bulan,
	SUM( CASE WHEN v_transaction.qty > 0 THEN v_transaction.qty ELSE 0 END ) AS qty')
                ->from('mt_month')
                ->join('v_transaction', 'mt_month.angka = MONTH ( v_transaction.tr_date )', 'LEFT')
                ->where('EXISTS( SELECT MONTH ( v_transaction.tr_date) FROM v_transaction WHERE YEAR ( v_transaction.tr_date ) = ' . $tahun . ' AND mt_month.angka = MONTH ( v_transaction.tr_date ) )')
                ->or_where('NOT EXISTS( SELECT MONTH ( v_transaction.tr_date) FROM v_transaction WHERE YEAR ( v_transaction.tr_date ) = ' . $tahun . ' AND mt_month.angka = MONTH ( v_transaction.tr_date ) )', null, false)
                ->group_by('mt_month.angka')
                ->get()
                ->result();
        return $exec;
    }

    public function chartdiv_a($tahun) {
        $exec = $this->db->select('v_transaction.nama_kategorisub,SUM( v_transaction.qty ) AS qty,v_transaction.kode_product')
                ->from('mt_category_sub')
                ->join('v_transaction', 'mt_category_sub.id = v_transaction.id_categorysub')
                ->where('YEAR ( v_transaction.tr_date ) =', $tahun, false)
                ->group_by('mt_category_sub.id')
                ->limit(30)
                ->get()
                ->result();
        return $exec;
    }

}
