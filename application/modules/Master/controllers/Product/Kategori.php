<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Kategori', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->model->index(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Product/Kategori/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Product/Kategori/index/'),
            'siteTitle' => 'Master Category | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Master Data | Category',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategori/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Get_detail() {
        $id = Dekrip(Post_get('id'));
        $data = [];
        $exec = $this->model->Get_detail($id);
        if (!empty($exec)) {
            $data['id_kategori'] = Enkrip($exec->id);
            $data['brand_id'] = $exec->id_brand;
            $data['nama_kategori'] = $exec->nama;
            $data['desc_kategori'] = $exec->description;
        } else {
            $data = null;
        }
        return ToJson($data);
    }

    public function Get_brand() {
        $exec = $this->model->Get_brand();
        ToJson($exec);
    }

    public function Update() {
        $id = Dekrip(Post_input('e_id'));
        $data = [
            'nama' => Post_input('e_nama'),
            'description' => Post_input('e_desc'),
            'id_brand' => Post_input('e_brand'),
            'sysupdateuser' => $this->user + false,
            'sysupdatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->Update($data, $id);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('err_msg', 'error while updating master category'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('succ_msg', 'master category has been updated!'));
        }
        return $result;
    }

    public function Delete() {
        $id = Dekrip(Post_input('d_id'));
        $data = [
            'stat' => 0 + false,
            'sysdeleteuser' => $this->user + false,
            'sysdeletedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->Update($data, $id);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('err_msg', 'error while deleting master category'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('succ_msg', 'master category has been deleted!'));
        }
        return $result;
    }

    public function Add() {
        $data = [
            'id_brand' => Post_input('brandtxt'),
            'nama' => Post_input('namatxt'),
            'description' => Post_input('desctxt'),
            'syscreateuser' => $this->user + false,
            'syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->Add($data);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('err_msg', 'error while saving new master category'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Kategori/index/'), $this->session->set_flashdata('succ_msg', 'master category has been added!'));
        }
        return $result;
    }

    public function Check_nama() {
        $exec = $this->model->Check_nama(Post_get("nama"));
        if (empty($exec)) {
            $result = ['status' => false, 'msg' => 'Category Name available to use'];
        } elseif ($exec->total == 0) {
            $result = ['status' => false, 'msg' => 'Category Name available to use'];
        } else {
            $result = ['status' => true, 'msg' => 'Category Name already exist!'];
        }
        return ToJson($result);
    }

}
