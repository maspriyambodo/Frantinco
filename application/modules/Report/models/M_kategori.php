<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_kategori extends CI_Model {

    public function Dir_year() {
        $exec = $this->db->select()
                ->from('report_get_year')
                ->get()
                ->result();
        return $exec;
    }

    public function dt_table($tahun) {
        $exec = $this->db->select('v_transaction.id_category,
	v_transaction.nama_kategori,
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
                ->from('mt_category')
                ->join('v_transaction', 'mt_category.id = v_transaction.id_category', 'LEFT')
                ->where('`mt_category`.`stat`', 1, false)
                ->where('YEAR ( `v_transaction`.`tr_date` ) = ', $tahun, false)
                ->group_by('mt_category.id')
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
        $exec = $this->db->select('v_transaction.nama_kategori,SUM(v_transaction.qty) AS qty,v_transaction.kode_product')
                ->from('mt_category')
                ->join('v_transaction', 'mt_category.id = v_transaction.id_category ')
                ->where('YEAR ( v_transaction.tr_date ) =', $tahun, false)
                ->group_by('mt_category.id')
                ->limit(30)
                ->get()
                ->result();
        return $exec;
    }

}
