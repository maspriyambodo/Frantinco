<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_brand extends CI_Model {

    public function not_exists($tahun) {
        $exec = $this->db->select('`v_transaction`.`id_brand`,`v_transaction`.`nama_brand`,NOW( ) AS tr_date,0 AS `JANUARI`,0 AS `FEBRUARI`,0 AS `MARET`,0 AS `APRIL`,0 AS `MEI`,0 AS `JUNI`,0 AS `JULI`,0 AS `AGUSTUS`,0 AS `SEPTEMBER`,0 AS `OKTOBER`,0 AS `NOVEMBER`,0 AS `DESEMBER` ')
                ->from('mt_brand')
                ->join('v_transaction', 'mt_brand.id = v_transaction.id_brand', 'LEFT')
                ->where('`mt_brand`.`id` NOT IN', '( SELECT v_transaction.id_brand FROM v_transaction WHERE YEAR ( tr_date ) = ' . $tahun . ' )', false)
                ->group_by('mt_brand.id')
                ->order_by('mt_brand.nama ASC')
                ->get()
                ->result();
        log_message('error', $this->db->last_query());
        return $exec;
    }

    public function dt_table($tahun) {
        $exec = $this->db->select('`v_transaction`.`id_brand`,
	`v_transaction`.`nama_brand`,
	MIN( v_transaction.tr_date ) AS tr_date,
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
                ->from('mt_brand')
                ->join('v_transaction', 'mt_brand.id = v_transaction.id_brand', 'LEFT')
                ->where('`mt_brand`.`stat`', 1, false)
                ->where('YEAR ( `v_transaction`.`tr_date` ) = ', $tahun, false)
                ->group_by('mt_brand.id')
                ->get()
                ->result();
        return $exec;
    }

    public function chartdiv($tahun) {
        $exec = $this->db->select('mt_month.bulan,
	SUM( CASE WHEN v_transaction.qty > 0 THEN v_transaction.qty ELSE 0 END ) AS qty')
                ->from('mt_month')
                ->join('v_transaction', 'mt_month.angka = MONTH ( v_transaction.tr_date )', 'LEFT')
                ->where('YEAR(tr_date) =', $tahun, false)
                ->group_by('mt_month.angka')
                ->get()
                ->result();
        return $exec;
    }

    public function chartdiv_a($tahun) {
        $exec = $this->db->select('`v_transaction`.`nama_brand`,SUM( v_transaction.qty ) AS qty,`v_transaction`.`kode_product`')
                ->from('mt_brand')
                ->join('v_transaction', 'mt_brand.id = v_transaction.id_brand ')
                ->where('YEAR ( v_transaction.tr_date ) =', $tahun, false)
                ->group_by('mt_brand.id')
                ->limit(30)
                ->get()
                ->result();
        return $exec;
    }

    public function dt_table2($token) {
        $exec = $this->db->select('v_transaction.kode_product,v_transaction.nama_kategori,v_transaction.tr_date,v_transaction.qty')
                ->from('mt_category')
                ->join('v_transaction', 'mt_category.id = v_transaction.id_category', 'LEFT')
                ->where('YEAR(v_transaction.tr_date) =', $token[0], false)
                ->where('MONTH(v_transaction.tr_date) =', $token[1], false)
                ->where('v_transaction.id_category', $token[2], false)
                ->get()
                ->result();
        return $exec;
    }

}
