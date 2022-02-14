<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub extends CI_Model {

    var $table = 'mt_category_sub';
    var $column_order = ['mt_category_sub.id', 'mt_category.nama', 'mt_category_sub.nama', 'mt_category_sub.id']; //set column field database for datatable orderable
    var $column_search = ['mt_category_sub.nama', 'mt_category.nama']; //set column field database for datatable searchable
    var $order = ['mt_category_sub.id' => 'asc']; // default order

    private function _get_datatables_query() {
        $this->db->select('mt_category_sub.id AS id_sub_kategori,mt_category_sub.nama AS sub_category,mt_category.nama AS category_name,mt_category_sub.stat')
                ->from($this->table)
                ->join('mt_category', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->where('`mt_category_sub`.`stat`', 1, false);
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

    public function lists() {
        $this->_get_datatables_query();
        if ($_GET['length'] != -1) {
            $this->db->limit(Post_get('length'), Post_get('start'));
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

    public function Get_category() {
        if (Post_get('q')) {
            $exec = $this->db->select('mt_category.id, mt_category.nama AS text')
                    ->from('mt_category')
                    ->like('mt_category.nama', Post_get('term'))
                    ->get()
                    ->result();
        } else {
            $exec = [];
        }
        return $exec;
    }

    public function Check_nama($nama) {
        $exec = $this->db->select('mt_category_sub.id AS total')
                ->from('mt_category_sub')
                ->where('mt_category_sub.nama', $nama)
                ->where('`mt_category_sub`.`stat`', 1, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_category_sub', $data);
        return $this->db->trans_status();
    }

    public function Get_detail($id) {
        $exec = $this->db->select('mt_category_sub.id,mt_category_sub.id_category,mt_category_sub.nama,mt_category_sub.description,mt_category.nama AS category_name')
                ->from('mt_category_sub')
                ->join('mt_category', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->where('`mt_category_sub`.`stat`', 1, false)
                ->where('`mt_category_sub`.`id`', $id, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Update($data, $id) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_category_sub`.`id`', $id, false)
                ->update('mt_category_sub');
        return $this->db->trans_status();
    }

}
