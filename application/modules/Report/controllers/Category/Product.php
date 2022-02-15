<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_product', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'year' => year_report(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Category/Product/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Category/Product/index/'),
            'siteTitle' => 'Product Report ' . date('Y') . ' | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Product Report ' . date('Y'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('product/product_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function chartdiv() {
        $this->bodo->Check_login();
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $exec = $this->model->chartdiv($tahun);
            $totdata = count($exec) + 1;
            if ($totdata != 13) {
                for ($i = $totdata; $i < 13; $i++) {
                    $bulan = date_create('01' . '-' . $i . '-' . date('Y'));
                    $data[$i] = (object) [
                                'bulan' => date_format($bulan, 'F'),
                                'qty' => 0
                    ];
                }
                $result = array_merge($exec, $data);
            } else {
                $result = $exec;
            }
        }
        return ToJson($result);
    }

    public function chartdiv_a() {
        $this->bodo->Check_login();
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $result = $this->model->chartdiv_a($tahun);
        }
        return ToJson($result);
    }

    public function dt_table() {
        $this->bodo->Check_login();
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $data_exists = $this->model->dt_table($tahun);
            $not_exists = $this->model->not_exists($tahun);
            if (count($not_exists) > 0) {
                $result = array_merge($data_exists, $not_exists);
            } else {
                $result = $data_exists;
            }
        }
        return $this->_data($result);
    }

    private function _data($param) {
        if (!empty($param)) {
            $norut = 1;
            foreach ($param as $value) {
                $tgl = date_create($value->tr_date);
                $result[] = [
                    'norut' => $norut++,
                    'kode_produk' => $value->kode_product,
                    'nama_brand' => $value->nama_brand,
                    'nama_kategori' => $value->nama_kategori,
                    'nama_produk' => $value->nama_produk,
                    'nama_kategorisub' => $value->nama_kategorisub,
                    'tr_date' => $value->tr_date,
                    'JANUARI' => ($value->JANUARI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=01' . '&c=' . $value->id_product . '&d=' . $value->JANUARI)) . '">' . number_format($value->JANUARI) . '</a>',
                    'FEBRUARI' => ($value->FEBRUARI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=02' . '&c=' . $value->id_product . '&d=' . $value->FEBRUARI)) . '">' . number_format($value->FEBRUARI) . '</a>',
                    'MARET' => ($value->MARET == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=03' . '&c=' . $value->id_product . '&d=' . $value->MARET)) . '">' . number_format($value->MARET) . '</a>',
                    'APRIL' => ($value->APRIL == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=04' . '&c=' . $value->id_product . '&d=' . $value->APRIL)) . '">' . number_format($value->APRIL) . '</a>',
                    'MEI' => ($value->MEI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=05' . '&c=' . $value->id_product . '&d=' . $value->MEI)) . '">' . number_format($value->MEI) . '</a>',
                    'JUNI' => ($value->JUNI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=06' . '&c=' . $value->id_product . '&d=' . $value->JUNI)) . '">' . number_format($value->JUNI) . '</a>',
                    'JULI' => ($value->JULI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=07' . '&c=' . $value->id_product . '&d=' . $value->JULI)) . '">' . number_format($value->JULI) . '</a>',
                    'AGUSTUS' => ($value->AGUSTUS == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=08' . '&c=' . $value->id_product . '&d=' . $value->AGUSTUS)) . '">' . number_format($value->AGUSTUS) . '</a>',
                    'SEPTEMBER' => ($value->SEPTEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=09' . '&c=' . $value->id_product . '&d=' . $value->SEPTEMBER)) . '">' . number_format($value->SEPTEMBER) . '</a>',
                    'OKTOBER' => ($value->OKTOBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=10' . '&c=' . $value->id_product . '&d=' . $value->OKTOBER)) . '">' . number_format($value->OKTOBER) . '</a>',
                    'NOVEMBER' => ($value->NOVEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=11' . '&c=' . $value->id_product . '&d=' . $value->NOVEMBER)) . '">' . number_format($value->NOVEMBER) . '</a>',
                    'DESEMBER' => ($value->DESEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=12' . '&c=' . $value->id_product . '&d=' . $value->DESEMBER)) . '">' . number_format($value->DESEMBER) . '</a>'
                ];
            }
        } else {
            $result = [];
        }
        return ToJson($result);
    }

}
