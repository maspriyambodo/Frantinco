<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_bulan extends CI_Model {

    var $table = 'mt_brand';
    var $column_order = ['tr_product.id', 'mt_category.nama', 'mt_category_sub.nama', 'mt_product.nama', 'tr_product.kode', 'tr_product.tr_date', 'tr_product.qty']; //set column field database for datatable orderable
    var $column_search = ['mt_category.nama']; //set column field database for datatable searchable 
    var $order = ['tr_product.id' => 'ASC']; // default order

    private function _get_datatables_query($param) {
        $this->db->select('tr_product.qty,tr_product.tr_date,tr_product.kode,mt_category.nama AS nama_category,mt_category_sub.nama AS sub_category,mt_product.nama AS nama_product')
                ->from('mt_brand')
                ->join('mt_category', 'mt_category.id_brand = mt_brand.id', 'LEFT')
                ->join('mt_category_sub', 'mt_category_sub.id_category = mt_category.id', 'LEFT')
                ->join('mt_product', 'mt_product.id_category_sub = mt_category_sub.id', 'LEFT')
                ->join('tr_product', 'tr_product.kode = mt_product.kd_produk', 'LEFT')
                ->where('YEAR ( tr_product.tr_date ) =', $param[0], false)
                ->where('MONTH ( tr_product.tr_date ) =', $param[1], false)
                ->where('mt_brand.id', $param[2], false);
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

    public function lists($param) {
        $this->_get_datatables_query($param);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
//        log_message('error', $this->db->last_query());
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

}
