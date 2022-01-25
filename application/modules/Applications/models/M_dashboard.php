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
        $exec = $this->db->select('mt_brand.nama,SUM(`tr_product`.`qty`) AS qty')
                ->from('mt_brand')
                ->join('mt_category', 'mt_category.id_brand = mt_brand.id')
                ->join('mt_category_sub', 'mt_category_sub.id_category = mt_category.id')
                ->join('mt_product', 'mt_product.id_category_sub = mt_category_sub.id')
                ->join('tr_product', 'tr_product.kode = mt_product.kd_produk')
                ->group_by('mt_brand.id')
                ->having('YEAR ( tr_product.tr_date )', 'YEAR ( NOW( ) )', false)
                ->order_by('tr_product.qty DESC')
                ->get()
                ->result();
        return $exec;
    }

    public function chart_category() {
        $exec = $this->db->select('')
                ->from()
                ->join()
                ->order_by()
                ->get()
                ->result();
        return $exec;
    }

}
