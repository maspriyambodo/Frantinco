<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategori', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    private function Dir_year() {
        $exec = $this->model->Dir_year();
        if ($exec) {
            foreach ($exec as $key => $value) {
                $response[$key] = (object) [
                            'id' => Enkrip($value->tahun),
                            'text' => $value->tahun
                ];
            }
        } else {
            $response[0] = (object) [
                        'id' => null,
                        'text' => 'not found'
            ];
        }
        return $response;
    }

    public function index() {
        $data = [
            'year' => $this->Dir_year(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Category/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Category/Dashboard/index/'),
            'siteTitle' => 'Category Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Category Report ' . $this->Dir_year()[0]->text,
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategori/kategori_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function dt_table() {
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $result = $this->model->dt_table($tahun);
        }
        return ToJson($result);
    }

    public function chartdiv() {
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $result = $this->model->chartdiv($tahun);
        }
        return ToJson($result);
    }
    
    public function chartdiv_a() {
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $result = $this->model->chartdiv_a($tahun);
        }
        return ToJson($result);
    }

}
