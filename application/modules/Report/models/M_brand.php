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

    public function SHOCKINGPINK() {//untuk laporan penjualan seluruh produk berdasarkan tahun
        $exec = $this->db->select('mt_product.kd_produk,mt_product.nama AS nama_produk,mt_product.id_category_sub, mt_category_sub.nama AS nama_subkategori, mt_category_sub.id_category, mt_category.nama AS nama_kategori, mt_category.id_brand, mt_brand.nama AS nama_brand')
                ->select('CASE WHEN `tr_product`.`qty` IS NULL THEN 0 ELSE SUM(`tr_product`.`qty`) END AS `quantity`', false)
                ->select('CASE WHEN `tr_product`.`tr_date` IS NULL THEN "1970-01-01" ELSE `tr_product`.`tr_date` END AS `trs_date`', false)
                ->from('mt_product')
                ->join('tr_product', 'mt_product.kd_produk = tr_product.kode', 'LEFT')
                ->join('mt_category_sub', 'mt_product.id_category_sub = mt_category_sub.id ', 'LEFT')
                ->join('mt_category', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->join('mt_brand', 'mt_category.id_brand = mt_brand.id', 'LEFT')
                ->where('YEAR(`tr_product`.`tr_date`)', 2021, false)//variabel tahun bisa berubah sesuai parameter.
                ->or_where('OR YEAR(CASE WHEN `tr_product`.`tr_date` IS NULL THEN "1970-01-01" ELSE `tr_product`.`tr_date` END)', 1970, false)
                ->group_by()
                ->order_by();
        return $exec;
    }

}
