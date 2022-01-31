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
            'pagetitle' => 'Category Report ' . date('Y'),
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
        $this->bodo->Check_login();
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $exec = $this->model->dt_table($tahun);
            $norut = 0;
            foreach ($exec as $value) {
                $result[] = [
                    'nama_kategori' => $value->nama_kategori,
                    'tr_date' => $value->tr_date,
                    'JANUARI' => ($value->JANUARI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=01' . '&c=' . $value->id_category . '&d=' . $value->JANUARI)) . '">' . number_format($value->JANUARI) . '</a>',
                    'FEBRUARI' => ($value->FEBRUARI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=02' . '&c=' . $value->id_category . '&d=' . $value->FEBRUARI)) . '">' . number_format($value->FEBRUARI) . '</a>',
                    'MARET' => ($value->MARET == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=03' . '&c=' . $value->id_category . '&d=' . $value->MARET)) . '">' . number_format($value->MARET) . '</a>',
                    'APRIL' => ($value->APRIL == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=04' . '&c=' . $value->id_category . '&d=' . $value->APRIL)) . '">' . number_format($value->APRIL) . '</a>',
                    'MEI' => ($value->MEI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=05' . '&c=' . $value->id_category . '&d=' . $value->MEI)) . '">' . number_format($value->MEI) . '</a>',
                    'JUNI' => ($value->JUNI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=06' . '&c=' . $value->id_category . '&d=' . $value->JUNI)) . '">' . number_format($value->JUNI) . '</a>',
                    'JULI' => ($value->JULI == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=07' . '&c=' . $value->id_category . '&d=' . $value->JULI)) . '">' . number_format($value->JULI) . '</a>',
                    'AGUSTUS' => ($value->AGUSTUS == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=08' . '&c=' . $value->id_category . '&d=' . $value->AGUSTUS)) . '">' . number_format($value->AGUSTUS) . '</a>',
                    'SEPTEMBER' => ($value->SEPTEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=09' . '&c=' . $value->id_category . '&d=' . $value->SEPTEMBER)) . '">' . number_format($value->SEPTEMBER) . '</a>',
                    'OKTOBER' => ($value->OKTOBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=10' . '&c=' . $value->id_category . '&d=' . $value->OKTOBER)) . '">' . number_format($value->OKTOBER) . '</a>',
                    'NOVEMBER' => ($value->NOVEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=11' . '&c=' . $value->id_category . '&d=' . $value->NOVEMBER)) . '">' . number_format($value->NOVEMBER) . '</a>',
                    'DESEMBER' => ($value->DESEMBER == 0) ? 0 : '<a href="' . base_url('Laporan2%23?token=' . Enkrip('?a=' . $tahun . '&b=12' . '&c=' . $value->id_category . '&d=' . $value->DESEMBER)) . '">' . number_format($value->DESEMBER) . '</a>'
                ];
            }
        }
        return ToJson($result);
    }

    public function chartdiv() {
        $this->bodo->Check_login();
        $tahun = Dekrip(Post_get('token'));
        if (!$tahun) {
            $result = [];
        } else {
            $exec = $this->model->chartdiv($tahun);
            $totdata = count($exec) + 1;
            for ($i = $totdata; $i < 13; $i++) {
                $bulan = date_create('01' . '-' . $i . '-' . date('Y'));
                $data[$i] = (object) [
                            'bulan' => date_format($bulan, 'F'),
                            'qty' => 0
                ];
            }
            $result = array_merge($exec, $data);
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

}
