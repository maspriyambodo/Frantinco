<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sub', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Product/Sub/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Product/Sub/index/'),
            'siteTitle' => 'Master Sub Category | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sub Category',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategori_sub/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $list = $this->model->lists();
        $data = [];
        $no = Post_input("start");
        $privilege = $this->bodo->Check_previlege('Master/Product/Sub/index/');
        foreach ($list as $value) {
            $id = Enkrip($value->id_sub_kategori);
            if ($privilege['update']) {
                $editbtn = '<button id="editbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Edit ' . $value->sub_category . '" value="' . $id . '" onclick="Edit(this.value)"><i class="far fa-edit text-warning"></i></button>';
            } else {
                $editbtn = null;
            }
            if ($privilege['delete'] and $value->stat) {
                $delbtn = '<button id="delbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Delete ' . $value->sub_category . '" value="' . $id . '" onclick="Delete(this.value)"><i class="far fa-trash-alt text-danger"></i></button>';
            } elseif ($privilege['delete'] and!$value->stat) {
                $delbtn = null;
            } else {
                $delbtn = null;
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->category_name;
            $row[] = $value->sub_category;
            $row[] = '<div class="btn-group">' . $editbtn . $delbtn . '</div>';
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data
            ];
        } else {
            $output = [
                "draw" => Post_input('draw'),
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

    public function Check_sub() {
        $exec = $this->model->Check_nama(Post_get("nama"));
        if (empty($exec)) {
            $result = ['status' => false, 'msg' => 'Sub-Category Name available to use'];
        } elseif ($exec->total == 0) {
            $result = ['status' => false, 'msg' => 'Sub-Category Name available to use'];
        } else {
            $result = ['status' => true, 'msg' => 'Sub-Category Name already exist!'];
        }
        return ToJson($result);
    }

    public function Save() {
        $id_category = Dekrip(Post_input('categorytxt'));
        $data = [
            'id_category' => $id_category,
            'nama' => Post_input('subtxt'),
            'description' => Post_input('desctxt'),
            'syscreateuser' => $this->user + false,
            'syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->Add($data);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Master/Product/Sub/index/'), $this->session->set_flashdata('err_msg', 'error while saving new master sub-category'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Master/Product/Sub/index/'), $this->session->set_flashdata('succ_msg', 'master sub-category has been added!'));
        }
        return $result;
    }

}
