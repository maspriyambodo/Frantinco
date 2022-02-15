<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_trans extends CI_Model {

    var $table = 'tr_product';
    var $column_order = ['tr_product.id', 'tr_product.kode', 'tr_product.qty', 'tr_product.tr_date']; //set column field database for datatable orderable
    var $column_search = ['tr_product.kode', 'tr_product.qty', 'tr_product.tr_date']; //set column field database for datatable searchable 
    var $order = ['tr_product.id' => 'asc']; // default order

    private function _get_datatables_query($year) {
        $this->db->select('tr_product.kode,tr_product.qty,DATE_FORMAT(tr_product.tr_date,"%d %M %Y") AS tr_date,tr_product.id')
                ->from($this->table)
                ->where('YEAR(tr_product.tr_date)', $year, false);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (Post_get('search')['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, Post_get('search')['value']);
                } else {
                    $this->db->or_like($item, Post_get('search')['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (Post_get('order')) { // here order processing
            $this->db->order_by($this->column_order[Post_get('order')['0']['column']], Post_get('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lists($year) {
        $this->_get_datatables_query($year);
        if (Post_get('length') != -1) {
            $this->db->limit(Post_get('length'), Post_get('start'));
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($year) {
        $this->_get_datatables_query($year);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($year) {
        $exec = $this->db->select()
                ->from($this->table)
                ->where('YEAR(tr_product.tr_date)', $year, false);
        return $exec->count_all_results();
    }

    public function Insert($data) {//lanjutin disini
        $this->db->trans_begin();
        $this->db->insert_batch('tr_product', $data);
        return $this->db->trans_status();
    }

    public function cek_kode($kode) {
        $exec = $this->db->select('mt_product.id')
                ->from('mt_product')
                ->where('mt_product.kd_produk', $kode)
                ->limit(1)
                ->get()
                ->row();
        return $exec;
    }

}
