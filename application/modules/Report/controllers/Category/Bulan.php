<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Bulan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategori', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $param = $this->bodo->Url(Post_get('token')); // output = Array ( [0] => 2021 AS tahun [1] => 09 AS bulan [2] => 1 AS id_brand [3] => 11869 AS jumlah laporan) 
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'param' => $param,
            'item_active' => 'Report/Category/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Category/Dashboard/index/'),
            'siteTitle' => 'Category Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Category Report ' . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('Report/Category/Dashboard/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Month',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategori/month_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function dt_table() {
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $exec = $this->model->dt_table2($tahun);
            foreach ($exec as $value) {
                $date = date_create($value->tr_date);
                $result[] = (object) [
                            'kode_product' => $value->kode_product,
                            'nama_kategori' => $value->nama_kategori,
                            'tr_date' => date_format($date, 'd F Y'),
                            'qty' => number_format($value->qty)
                ];
            }
        }
        return ToJson($result);
    }

}
