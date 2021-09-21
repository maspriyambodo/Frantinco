<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_brand extends CI_Model {

    public function index() {
        $exec = $this->db->select('mt_brand.id,mt_brand.nama,mt_brand.description')
                ->from('mt_brand')
                ->where('`mt_brand`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_brand', $data);
        return $this->db->trans_status();
    }

    public function Check_nama($nama) {
        $exec = $this->db->select('mt_brand.id AS total')
                ->from('mt_brand')
                ->where('mt_brand.nama', $nama)
                ->get()
                ->row();
        return $exec;
    }

}
