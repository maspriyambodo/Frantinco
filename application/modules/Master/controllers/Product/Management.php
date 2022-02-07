<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_product', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Product/Management/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Product/Management/index/'),
            'siteTitle' => 'Master Product | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Master Data | Product',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('product/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $list = $this->model->lists();
        $data = [];
        $no = Post_get("start");
        $privilege = $this->bodo->Check_previlege('Master/Product/Management/index/');
        foreach ($list as $value) {
            $id = Enkrip($value->id);
            if ($privilege['update']) {
                $editbtn = '<button id="editbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Edit ' . $value->kd_produk . '" value="' . $id . '" onclick="Edit(this.value)" data-toggle="modal" data-target="#modal_edit"><i class="far fa-edit text-warning"></i></button>';
            } else {
                $editbtn = null;
            }
            if ($privilege['delete'] and $value->stat) {
                $delbtn = '<button id="delbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Delete ' . $value->kd_produk . '" value="' . $id . '" onclick="Delete(this.value)" data-toggle="modal" data-target="#modal_delete"><i class="far fa-trash-alt text-danger"></i></button>';
            } elseif ($privilege['delete'] and!$value->stat) {
                $delbtn = null;
            } else {
                $delbtn = null;
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->kd_produk;
            $row[] = $value->nama;
            $row[] = $value->subkategori;
            $row[] = '<div class="btn-group">' . $editbtn . $delbtn . '</div>';
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data
            ];
        } else {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
        ToJson($output);
    }

    public function Get_category() {
        $exec = $this->model->Get_category();
        $category = [];
        if ($exec) {
            foreach ($exec as $key => $value) {
                $category[$key] = (object) [
                            'id' => Enkrip($value->id),
                            'text' => $value->text
                ];
            }
        } else {
            $category[0] = (object) [
                        'id' => '',
                        'text' => 'not found'
            ];
        }
        ToJson($category);
    }

    public function Get_detail() {
        $id = Dekrip(Post_get('id'));
        $data = [];
        $exec = $this->model->Get_detail($id);
        if (!empty($exec)) {
            $data['id_subkategori'] = Enkrip($exec->id_category_sub);
            $data['e_subtxt'] = $exec->subkategori;
            $data['e_codetxt'] = $exec->kd_produk;
            $data['e_product'] = $exec->nama;
        } else {
            $data = null;
        }
        return ToJson($data);
    }

    public function Check_product() {
        $nama = str_replace(' ', '', Post_get("nama"));
        $exec = $this->model->Check_nama($nama);
        if (empty($exec)) {
            $result = ['status' => false, 'msg' => 'Product Line Name available to use'];
        } elseif ($exec->total == 0) {
            $result = ['status' => false, 'msg' => 'Product Line Name available to use'];
        } else {
            $result = ['status' => true, 'msg' => 'Product Line Name already exist!'];
        }
        return ToJson($result);
    }

    public function Save() {
        $id_category_sub = Dekrip(Post_input('subtxt'));
        $kd_produk = str_replace(' ', '', Post_input("codetxt"));
        if (!$id_category_sub) {
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while saving new master product'));
        } else {
            $data = [
                '`mt_product`.`id_category_sub`' => $id_category_sub + false,
                '`mt_product`.`kd_produk`' => $kd_produk,
                '`mt_product`.`nama`' => Post_input('producttxt'),
                '`mt_product`.`syscreateuser`' => $this->user,
                '`mt_product`.`syscreatedate`' => date('Y-m-d H:i:s')
            ];
            $result = $this->_save($data);
        }
        return $result;
    }

    private function _save($data) {
        $exec = $this->model->Add($data);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while saving new master product'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('succ_msg', 'master product has been added!'));
        }
    }

    public function Update() {
        $id = Dekrip(Post_input('e_id'));
        $id_category_sub = Dekrip(Post_input('e_subtxt'));
        if (!$id or!$id_category_sub) {
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while updating master product'));
        } else {
            $data = [
                'mt_product.id_category_sub' => $id_category_sub + false,
                'mt_product.kd_produk' => Post_input('e_codetxt'),
                'mt_product.nama' => Post_input('e_product'),
                'sysupdateuser' => $this->user + false,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ];
            $result = $this->_update($data, $id);
        }
        return $result;
    }

    private function _update($data, $id) {
        $exec = $this->model->Update($data, $id);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while updating master product'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('succ_msg', 'master data product has been updated!'));
        }
        return $result;
    }

    public function Delete() {
        $id = Dekrip(Post_input('d_id'));
        if (!$id) {
            $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while deleting master data product'));
        } else {
            $data = [
                'stat' => 0 + false,
                'sysupdateuser' => $this->user + false,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ];
            $exec = $this->model->Update($data, $id);
            if ($exec <> true) {
                $this->db->trans_rollback();
                $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('err_msg', 'error while deleting master data product'));
            } else {
                $this->db->trans_commit();
                $result = redirect(base_url('Master/Product/Management/index/'), $this->session->set_flashdata('succ_msg', 'master data product has been deleted!'));
            }
        }
        return $result;
    }

}
