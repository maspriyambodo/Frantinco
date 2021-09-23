<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {

    var $table = 'mt_product';
    var $column_order = ['id', 'kd_produk', 'nama', 'subkategori', null]; //set column field database for datatable orderable
    var $column_search = ['mt_product.nama', 'mt_product.kd_produk', 'mt_category_sub.nama']; //set column field database for datatable searchable 
    var $order = ['id' => 'asc']; // default order

    private function _get_datatables_query() {
        $this->db->select('mt_product.id,mt_product.kd_produk,mt_product.nama,mt_product.stat,mt_category_sub.nama AS subkategori')
                ->from($this->table)
                ->join('mt_category_sub', 'mt_product.id_category_sub = mt_category_sub.id', 'LEFT')
                ->where('`mt_product`.`stat`', 1, false);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lists() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $exec = $this->db->select('mt_product.id,mt_product.kd_produk,mt_product.nama,mt_product.stat,mt_category_sub.nama AS subkategori')
                ->from($this->table)
                ->join('mt_category_sub', 'mt_product.id_category_sub = mt_category_sub.id', 'LEFT')
                ->where('`mt_product`.`stat`', 1, false);
        return $exec->count_all_results();
    }

    public function Get_category() {
        if (Post_get('q')) {
            $exec = $this->db->select('mt_category_sub.id, mt_category_sub.nama AS text')
                    ->from('mt_category_sub')
                    ->like('mt_category_sub.nama', Post_get('term'))
                    ->get()
                    ->result();
        } else {
            $exec = [];
        }
        return $exec;
    }

    public function Check_nama($nama) {
        $exec = $this->db->select('mt_product.id AS total')
                ->from('mt_product')
                ->where('mt_product.kd_produk', $nama)
                ->get()
                ->row();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_product', $data);
        return $this->db->trans_status();
    }

}
