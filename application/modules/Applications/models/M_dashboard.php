<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->role = $this->bodo->Dec($this->session->userdata('role_id'));
    }

    public function Search($searchtxt) {
        $exec = $this->db->select('sys_menu.nama AS menu_nama,sys_menu.icon,sys_menu.link,sys_menu_group.nama AS grup_nama')
                ->from('sys_menu')
                ->join('sys_menu_group', 'sys_menu.group_menu = sys_menu_group.id')
                ->join('sys_permissions', 'sys_menu.id = sys_permissions.id_menu ')
                ->where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.nama', $searchtxt)
                ->or_where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.link', $searchtxt)
                ->get()
                ->result();
        return $exec;
    }

    public function chart_brand() {
        $exec = $this->db->select('mt_brand.nama,
	Sum( v_transaction.qty ) AS qty,
	MIN( v_transaction.tr_date ) AS tr_date')
                ->from('mt_brand')
                ->join('v_transaction', 'mt_brand.id = v_transaction.id_brand')
                ->where('YEAR ( v_transaction.tr_date ) =', 'YEAR ( NOW( ) )', false)
                ->group_by('mt_brand.id')
                ->get()
                ->result();
        return $exec;
    }

    public function chart_category() {
        $exec = $this->db->select('mt_category.nama,SUM( v_transaction.qty ) AS qty,MIN( v_transaction.tr_date ) AS tr_date,v_transaction.kode_product AS kd_produk')
                ->from('mt_category')
                ->join('v_transaction', 'mt_category.id = v_transaction.id_category', 'LEFT')
                ->where('mt_category.stat', 1, false)
                ->where('YEAR( v_transaction.tr_date ) =', 'YEAR ( NOW( ) )', false)
                ->group_by('mt_category.id')
                ->order_by('v_transaction.qty DESC')
                ->limit(5)
                ->get()
                ->result();
        return $exec;
    }

    public function chart_categorysub() {
        $exec = $this->db->select('mt_category_sub.nama,SUM( tr_product.qty ) AS qty,tr_product.tr_date,mt_product.kd_produk')
                ->from('mt_category_sub')
                ->join('mt_product', 'mt_product.id_category_sub = mt_category_sub.id', 'LEFT')
                ->join('tr_product', 'tr_product.kode = mt_product.kd_produk ', 'LEFT')
                ->group_by('mt_category_sub.id')
                ->having('YEAR ( tr_product.tr_date ) =', 'YEAR ( NOW( ) )', false)
                ->order_by('tr_product.qty DESC')
                ->limit(5)
                ->get()
                ->result();
        return $exec;
    }

    public function chart_product() {
        $exec = $this->db->select('mt_product.nama,SUM( tr_product.qty ) AS qty,tr_product.tr_date,mt_product.kd_produk')
                ->from('mt_product')
                ->join('tr_product', 'tr_product.kode = mt_product.kd_produk', 'LEFT')
                ->group_by('mt_product.id')
                ->having('YEAR ( tr_product.tr_date ) =', 'YEAR(NOW())', false)
                ->order_by('tr_product.qty DESC ')
                ->limit(5)
                ->get()
                ->result();
        return $exec;
    }

    public function tot_brand() {
        $exec = $this->db->select('Count( mt_brand.id ) AS tot_brand')
                ->from('mt_brand')
                ->where('`mt_brand`.`stat`', 1, false)
                ->get()
                ->row();
        return $exec;
    }

    public function tot_category() {
        $exec = $this->db->select('Count( mt_category.id ) AS tot_category')
                ->from('mt_category')
                ->where('`mt_category`.`stat`', 1, false)
                ->get()
                ->row();
        return $exec;
    }

    public function tot_categorysub() {
        $exec = $this->db->select('Count(mt_category_sub.id) AS tot_categorysub')
                ->from('mt_category_sub')
                ->where('`mt_category_sub`.`stat`', 1, false)
                ->get()
                ->row();
        return $exec;
    }

    public function tot_product() {
        $exec = $this->db->select('Count( mt_product.id ) AS tot_product')
                ->from('mt_product')
                ->where('`mt_product`.`stat`', 1, false)
                ->get()
                ->row();
        return $exec;
    }

    public function tot_transact() {
        $exec = $this->db->select('COUNT(v_transaction.id_brand) AS tot_transact')
                ->from('v_transaction')
                ->where('`v_transaction`.`qty` IS NOT NULL')
                ->get()
                ->row();
        return $exec;
    }

    public function tot_qty() {
        $exec = $this->db->select('Sum(v_transaction.qty) AS tot_qty')
                ->from('v_transaction')
                ->get()
                ->row();
        return $exec;
    }

}
