<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_menu');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->M_menu->index()->result(),
            'name_group' => $this->M_menu->name_group(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Menu/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Menu/index/'),
            'siteTitle' => 'Menu Management | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Menu Management',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Menu Management',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('menu/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Save() {
        if (Post_input('menu_parent')) {
            $parent = $this->bodo->Dec(Post_input('menu_parent'));
        } else {
            $parent = "NULL";
        }
        $order = Post_input('order_no');
        if ($order == 'undefined') {
            $order = $this->bodo->Dec(Post_input('gr_menu')) . '00';
        } else {
            $order = Post_input('order_no') + 1;
        }
        $data = [
            'parent' => $parent,
            'description' => Post_input('desc_txt'),
            'nama_menu' => Post_input('nama_menu'),
            'link_menu' => Post_input('link_menu'),
            'gr_menu' => $this->bodo->Dec(Post_input('gr_menu')),
            'ico_menu' => Post_input('ico_menu'),
            'order_no' => $order,
            'user_login' => $this->user
        ];
        $exec = $this->M_menu->Save($data);
        if ($exec['status'] == false) {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('err_msg', $exec['pesan']));
        } else {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('succ_msg', 'Menu has been added'));
        }
    }

    public function Delete() {
        $id = $this->bodo->dec(Post_input("d_id_menu"));
        $data = [
            'id' => $id,
            'user_login' => $this->user
        ];
        $exec = $this->M_menu->Delete($data);
        if ($exec['status'] == false) {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('err_msg', $exec['pesan']));
        } else {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('succ_msg', 'Success deleting menu <b>' . $exec['menu_nama'] . '</b>'));
        }
    }

    public function Set_active() {
        $id = $this->bodo->dec(Post_input("a_id_menu"));
        $data = [
            'id' => $id,
            'user_login' => $this->user
        ];
        $exec = $this->M_menu->Set_active($data);
        if ($exec['status'] == false) {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('err_msg', $exec['pesan']));
        } else {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('succ_msg', 'Success activating menu <b>' . $exec['menu_nama'] . '</b>'));
        }
    }

    public function Edit() {
        $id = $this->bodo->dec(Post_get("id"));
        $data = [
            'data' => $this->M_menu->Edit($id),
            'menu' => $this->M_menu->index()->result(),
            'name_group' => $this->M_menu->name_group(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Menu/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Menu/index/'),
            'siteTitle' => 'Edit Menu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Menu Management',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Menu Management',
                    'link' => base_url('Systems/Menu/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Edit',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('menu/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Update() {
        $parent = $this->bodo->dec(Post_input("menu_parent"));
        if ($parent) {
            $id_parent = $parent;
        } else {
            $id_parent = "NULL";
        }
        $data = [
            'parent' => $id_parent,
            'description' => Post_input('desc_txt'),
            'menu' => Post_input("nama_menu"),
            'location' => Post_input("link_menu"),
            'nomor_order' => Post_input("order_no"),
            'grup' => $this->bodo->dec(Post_input("gr_menu")),
            'icon_menu' => Post_input("ico_menu"),
            'user_login' => $this->user,
            'id_menu' => $this->bodo->dec(Post_input("id_menu"))
        ];
        $exec = $this->M_menu->Update($data);
        if ($exec['status'] == false) {
            redirect(base_url('Systems/Menu/Edit?id=' . Post_input("id_menu")), $this->session->set_flashdata('err_msg', $exec['pesan']));
        } else {
            redirect(base_url('Systems/Menu/index/'), $this->session->set_flashdata('succ_msg', 'Success update menu <b>' . $exec['menu_nama'] . '</b>'));
        }
    }

    public function Get_order() {
        $role_id = $this->bodo->Dec(Post_get("id"));
        $exec = $this->M_menu->Get_order($role_id);
        ToJson($exec->result());
    }

    public function Get_detail() {
        $data = [
            'id_menu' => Post_get('id_menu'),
            'group_id' => Post_get('group_id'),
            'order_no' => Post_get('order_no'),
            'menu_parent' => Post_get('menu_parent')
        ];
        $exec = $this->M_menu->Get_detail($data);
        ToJson($exec);
    }

    public function Change_order() {
        $arr = explode(',', Post_input('new_order'));
        $data = [
            'old_id' => Post_input('old_menu_id'),
            'old_order' => Post_input('old_order_no'),
            'new_id' => $arr[0],
            'new_order' => $arr[1]
        ];
        $this->M_menu->Change_order($data);
    }

}
