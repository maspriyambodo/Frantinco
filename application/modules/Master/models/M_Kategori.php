<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model {

    public function index() {
        $exec = $this->db->select('mt_category.id,mt_category.nama,mt_category.description')
                ->from('mt_category')
                ->where('`mt_category`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Get_brand() {
        $exec = $this->db->select('mt_brand.id,mt_brand.nama')
                ->from('mt_brand')
                ->where('`mt_brand`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Get_detail($id) {
        $exec = $this->db->select('mt_category.id,mt_category.id_brand,mt_category.nama,mt_category.description')
                ->from('mt_category')
                ->where('`mt_category`.`stat`', 1, false)
                ->where('`mt_category`.`id`', $id, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Update($data, $id) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_category`.`id`', $id, false)
                ->update('mt_category');
        return $this->db->trans_status();
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_category', $data);
        return $this->db->trans_status();
    }

    public function Check_nama($nama) {
        $exec = $this->db->select('mt_category.id AS total')
                ->from('mt_category')
                ->where('mt_category.nama', $nama)
                ->get()
                ->row();
        return $exec;
    }

}
