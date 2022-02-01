<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Bulan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategorisub_bulan', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $param = $this->bodo->Url(Post_get('token')); // output = Array ( [0] => 2021 AS tahun [1] => 09 AS bulan [2] => 1 AS id_brand [3] => 11869 AS jumlah laporan) 
        $tgl = date_create('01-' . $param[1] . '-' . $param[0]);
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'param' => $param,
            'item_active' => 'Report/Categorysub/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Categorysub/Dashboard/index/'),
            'siteTitle' => 'Sub Category | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sub Category ' . date_format($tgl, 'F Y'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('Report/Categorysub/Dashboard/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Month',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('kategorisub/month_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $param = $this->bodo->Url(Post_get('token')); // output = Array ( [0] => 2021 AS tahun [1] => 09 AS bulan [2] => 1 AS id_brand [3] => 11869 AS jumlah laporan)
        $list = $this->model->lists($param);
        $data = [];
        $no = Post_get("start");
        $privilege = $this->bodo->Check_previlege('Report/Categorysub/Dashboard/index/');
        foreach ($list as $users) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $users->nama_category;
            $row[] = $users->sub_category;
            $row[] = $users->nama_product;
            $row[] = $users->kode;
            $row[] = $users->tr_date;
            $row[] = number_format($users->qty);
            $data[] = $row;
        }
        return $this->_list($data, $privilege, $param);
    }

    private function _list($data, $privilege, $param) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => $this->model->count_all($param),
                "recordsFiltered" => $this->model->count_filtered($param),
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

}
