<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategorisub', 'model');
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
            'item_active' => 'Report/Categorysub/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Categorysub/Dashboard/index/'),
            'siteTitle' => 'Sub Category Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sub Category Report ' . $this->Dir_year()[0]->text,
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategorisub/kategori_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function dt_table() {
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $dt_table = $this->model->dt_table($tahun);
            $not_exists = $this->model->not_exists($tahun);
            if (count($not_exists) > 0) {
                $result = array_merge($dt_table, $not_exists);
            } else {
                $result = $dt_table;
            }
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
