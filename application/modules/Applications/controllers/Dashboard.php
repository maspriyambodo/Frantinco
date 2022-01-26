<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'token' => str_replace(['+', '/', '='], ['-', '_', '~'], $this->session->userdata('id_user')),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Dashboard Application | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Dashboard',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('v_dashboard', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Search() {
        $data = [
            'result' => $this->model->Search(Post_input('searchtxt')),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Search Result | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Search Result',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Search',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('v_search', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Chart_brand() {
        $token = Dekrip(Post_get('token'));
        if ($token != $this->user) {
            $data = [];
        } else {
            $data = $this->model->chart_brand();
        }
        return ToJson($data);
    }

    public function chart_category() {
        $token = Dekrip(Post_get('token'));
        if ($token != $this->user) {
            $data = [];
        } else {
            $data = $this->model->chart_category();
        }
        return ToJson($data);
    }

    public function chart_categorysub() {
        $token = Dekrip(Post_get('token'));
        if ($token != $this->user) {
            $data = [];
        } else {
            $data = $this->model->chart_categorysub();
        }
        return ToJson($data);
    }

    public function chart_product() {
        $token = Dekrip(Post_get('token'));
        if ($token != $this->user) {
            $data = [];
        } else {
            $data = $this->model->chart_product();
        }
        return ToJson($data);
    }

    public function info_sum() {
        $tot_brand = $this->model->tot_brand();
        $tot_category = $this->model->tot_category();
        $tot_categorysub = $this->model->tot_categorysub();
        
    }

}
