<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub extends CI_Model {

    var $table = 'mt_category_sub';
    var $column_order = ['id_sub_kategori', 'sub_category', 'category_name']; //set column field database for datatable orderable
    var $column_search = ['mt_category_sub.nama', 'mt_category.nama']; //set column field database for datatable searchable 
    var $order = ['id_sub_kategori' => 'asc']; // default order

    private function _get_datatables_query() {
        $this->db->select('mt_category_sub.id AS id_sub_kategori,mt_category_sub.nama AS sub_category,mt_category.nama AS category_name,mt_category_sub.stat')
                ->from($this->table)
                ->join('mt_category', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->where('`mt_category_sub`.`stat`', 1, false);
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
        $exec = $this->db->select('mt_category_sub.id AS id_sub_kategori,mt_category_sub.nama AS sub_category,mt_category.nama AS category_name')
                ->from($this->table)
                ->join('mt_category', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->where('`mt_category_sub`.`stat`', 1, false);
        return $exec->count_all_results();
    }

}
