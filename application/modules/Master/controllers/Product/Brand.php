<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_brand', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->model->index(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Product/Brand/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Product/Brand/index/'),
            'siteTitle' => 'Brand of Product | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Brand Master',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('brand/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Add() {
        $data = [
            'nama' => Post_input('brandtxt'),
            'description' => Post_input('desctxt'),
            'syscreateuser' => $this->user,
            'syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->Add($data);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('err_msg', 'error while saving master brand'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('succ_msg', 'master brand has been added!'));
        }
        return $result;
    }

}
