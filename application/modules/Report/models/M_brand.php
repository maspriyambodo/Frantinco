<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_brand extends CI_Model {

    var $table = 'mt_brand';
    var $column_order = ['v_transaction.id_brand', 'v_transaction.nama_brand', 'v_transaction.tr_date', 'JANUARI', 'FEBRUARI',
        'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER']; //set column field database for datatable orderable
    var $column_search = ['v_transaction.nama_brand', 'v_transaction.tr_date']; //set column field database for datatable searchable 
    var $order = ['v_transaction.id_brand' => 'ASC']; // default order

    private function _get_datatables_query($param) {
        $this->db->select('v_transaction.id_brand AS id,v_transaction.nama_brand AS nama,YEAR ( v_transaction.tr_date ) AS tr_date,
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
                ->where('YEAR(`v_transaction`.`tr_date`)', $param, false)
                ->group_by('mt_brand.id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_GET['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_GET['search']['value']);
                } else {
                    $this->db->or_like($item, $_GET['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_GET['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lists($param) {
        $this->_get_datatables_query($param);
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($param) {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($param) {
        $this->_get_datatables_query($param);
        return $this->db->count_all_results();
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
