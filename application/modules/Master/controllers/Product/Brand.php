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
            'pagetitle' => 'Master Data | Brand',
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

    public function Check_nama() {
        $exec = $this->model->Check_nama(Post_get("nama"));
        if (empty($exec)) {
            $result = ['status' => false, 'msg' => 'Brand Name available to use'];
        } elseif ($exec->total == 0) {
            $result = ['status' => false, 'msg' => 'Brand Name available to use'];
        } else {
            $result = ['status' => true, 'msg' => 'Brand Name already exist!'];
        }
        return ToJson($result);
    }

    public function Get_detail() {
        $id = Dekrip(Post_get('id'));
        $data = [];
        $exec = $this->model->Get_detail($id);
        if (!empty($exec)) {
            $data['id_brand'] = Enkrip($exec->id);
            $data['nama_brand'] = $exec->nama;
            $data['desc_brand'] = $exec->description;
        } else {
            $data = null;
        }
        return ToJson($data);
    }

    public function Update() {
        $id = Dekrip(Post_input('e_id'));
        if (!empty($id)) {
            $data = [
                'nama' => Post_input('e_brand'),
                'description' => Post_input('e_desc'),
                'sysupdateuser' => $this->user + false,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ];
            $exec = $this->model->_update($data, $id);
            if ($exec <> true) {
                $this->db->trans_rollback();
                $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('err_msg', 'error while updating master brand'));
            } else {
                $this->db->trans_commit();
                $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('succ_msg', 'master brand has been updated!'));
            }
        } else {
            $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('err_msg', 'error while saving master brand'));
        }
        return $result;
    }

    public function Delete() {
        $id = Dekrip(Post_input('d_id'));
        if (!empty($id)) {
            $data = [
                'stat' => 0 + false,
                'sysdeleteuser' => $this->user + false,
                'sysdeletedate' => date('Y-m-d H:i:s')
            ];
            $exec = $this->model->_update($data, $id);
            if ($exec <> true) {
                $this->db->trans_rollback();
                $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('err_msg', 'error while deleting master brand'));
            } else {
                $this->db->trans_commit();
                $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('succ_msg', 'master brand has been deleted!'));
            }
        } else {
            $result = redirect(base_url('Master/Product/Brand/index/'), $this->session->set_flashdata('err_msg', 'error while deleting master brand'));
        }
        return $result;
    }

}
