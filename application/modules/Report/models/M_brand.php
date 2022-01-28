<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_brand extends CI_Model {

    public function Dir_year() {
        $exec = $this->db->select()
                ->from('report_get_year')
                ->get()
                ->result();
        return $exec;
    }

    public function Brand_1($tahun) {
        $exec = $this->db->query('CALL brand_per_month(' . $tahun . ',' . 1 . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function Brand_2($tahun) {
        $exec = $this->db->query('CALL brand_per_month(' . $tahun . ',' . 2 . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function dt_table($tahun) {
        $exec = $this->db->select('v_transaction.id_brand AS id,v_transaction.nama_brand AS nama,YEAR ( v_transaction.tr_date ) AS tr_date,
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
                ->where('YEAR(`v_transaction`.`tr_date`)', $tahun, false)
                ->group_by('mt_brand.id')
                ->get()
                ->result();
//        log_message('error', $this->db->last_query());
        return $exec;
    }

    public function chart_1($tahun) {
        $exec = $this->db->select('v_transaction.nama_brand AS brand,Sum( v_transaction.qty ) AS total')
                ->from('v_transaction')
                ->where('YEAR(v_transaction.tr_date) =', $tahun, false)
                ->group_by('v_transaction.id_brand')
                ->get()
                ->result();
        return $exec;
    }

}
