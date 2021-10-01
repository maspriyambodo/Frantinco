<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_trans extends CI_Model {

    var $table = 'tr_product';
    var $column_order = [null, 'kode', 'qty', 'tr_date']; //set column field database for datatable orderable
    var $column_search = ['tr_product.kode', 'tr_date', 'tr_product.qty']; //set column field database for datatable searchable 
    var $order = ['id' => 'asc']; // default order

    private function _get_datatables_query($year) {
        $this->db->select('tr_product.kode,tr_product.qty,DATE_FORMAT(tr_product.tr_date,"%d %M %Y") AS tr_date,tr_product.id')
                ->from($this->table)
                ->where('YEAR(tr_product.tr_date)', $year, false);
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

    public function lists($year) {
        $this->_get_datatables_query($year);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
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

    public function Dir_year() {
        $exec = $this->db->select()
                ->from('report_get_year')
                ->get()
                ->result();
        return $exec;
    }

}
