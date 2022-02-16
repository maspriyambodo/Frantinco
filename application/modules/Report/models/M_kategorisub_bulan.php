<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_kategorisub_bulan extends CI_Model {

    var $table = 'v_transaction';
    var $column_order = ['v_transaction.id_categorysub', 'v_transaction.nama_kategori', 'v_transaction.nama_kategorisub', 'v_transaction.nama_produk', 'v_transaction.kode_product', 'v_transaction.tr_date', 'v_transaction.qty']; //set column field database for datatable orderable
    var $column_search = ['v_transaction.qty', 'v_transaction.tr_date', 'v_transaction.kode_product', 'v_transaction.nama_kategori', 'v_transaction.nama_kategorisub', 'v_transaction.nama_produk']; //set column field database for datatable searchable 
    var $order = ['v_transaction.id_categorysub' => 'ASC']; // default order

    private function _get_datatables_query($param) {
        $this->db->select('v_transaction.id_categorysub,v_transaction.qty,v_transaction.tr_date,v_transaction.kode_product AS kode,v_transaction.nama_kategori AS nama_category,v_transaction.nama_kategorisub AS sub_category,v_transaction.nama_produk AS nama_product')
                ->from('v_transaction')
                ->where('YEAR ( v_transaction.tr_date ) =', $param[0], false)
                ->where('MONTH ( v_transaction.tr_date ) =', $param[1], false)
                ->where('`v_transaction`.`id_categorysub`', $param[2], false);
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

}
