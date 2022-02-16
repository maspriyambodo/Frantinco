<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Product_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_product', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $param = $this->bodo->Url(Post_get('token')); // output = Array ( [0] => 2021 AS tahun [1] => 09 AS bulan [2] => 1 AS id_product [3] => 11869 AS jumlah laporan) 
        $tgl = date_create('01' . '-' . $param[1] . '-' . $param[0]);
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'param' => $param,
            'item_active' => 'Report/Category/Product/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Category/Product/index/'),
            'siteTitle' => 'Details Report Product | ' . date_format($tgl, 'F Y'),
            'pagetitle' => 'Details Report Product | ' . date_format($tgl, 'F Y'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('Report/Category/Product/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'details',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('product/v_report', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function dt_table() {
        $token = $this->bodo->Url(Post_get('token')); // output = Array ([0] => 2021 AS tahun [1] => 09 AS bulan [2] => 235 AS id_product)
        if (!$token) {
            $result = [];
        } else {
            $exec = $this->model->dt_table2($token);
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
