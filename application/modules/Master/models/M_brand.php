<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_brand extends CI_Model {

    public function index() {
        $exec = $this->db->select('mt_brand.id,mt_brand.nama,mt_brand.description')
                ->from('mt_brand')
                ->where('`mt_brand`.`id`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->set('mt_brand', $data);
        return $this->db->trans_status();
    }

}
