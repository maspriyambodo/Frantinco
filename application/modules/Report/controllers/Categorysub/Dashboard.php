<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategorisub', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'year' => year_report(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Categorysub/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Categorysub/Dashboard/index/'),
            'siteTitle' => 'Sub Category Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sub Category Report ' . year_report()[0]->text,
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
        return $this->_dttables($result);
    }

    private function _dttables($param) {
        if (!empty($param)) {
            foreach ($param as $value) {
                $tgl = date_create($value->tr_date);
                $data[] = [
                    'id_categorysub' => $value->id_categorysub,
                    'nama_kategorisub' => $value->nama_kategorisub,
                    'tr_date' => $value->tr_date,
                    'JANUARI' => ($value->JANUARI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=01' . '&c=' . $value->id_categorysub . '&d=' . $value->JANUARI)) . '">' . number_format($value->JANUARI) . '</a>',
                    'FEBRUARI' => ($value->FEBRUARI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=02' . '&c=' . $value->id_categorysub . '&d=' . $value->FEBRUARI)) . '">' . number_format($value->FEBRUARI) . '</a>',
                    'MARET' => ($value->MARET == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=03' . '&c=' . $value->id_categorysub . '&d=' . $value->MARET)) . '">' . number_format($value->MARET) . '</a>',
                    'APRIL' => ($value->APRIL == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=04' . '&c=' . $value->id_categorysub . '&d=' . $value->APRIL)) . '">' . number_format($value->APRIL) . '</a>',
                    'MEI' => ($value->MEI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=05' . '&c=' . $value->id_categorysub . '&d=' . $value->MEI)) . '">' . number_format($value->MEI) . '</a>',
                    'JUNI' => ($value->JUNI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=06' . '&c=' . $value->id_categorysub . '&d=' . $value->JUNI)) . '">' . number_format($value->JUNI) . '</a>',
                    'JULI' => ($value->JULI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=07' . '&c=' . $value->id_categorysub . '&d=' . $value->JULI)) . '">' . number_format($value->JULI) . '</a>',
                    'AGUSTUS' => ($value->AGUSTUS == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=08' . '&c=' . $value->id_categorysub . '&d=' . $value->AGUSTUS)) . '">' . number_format($value->AGUSTUS) . '</a>',
                    'SEPTEMBER' => ($value->SEPTEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=09' . '&c=' . $value->id_categorysub . '&d=' . $value->SEPTEMBER)) . '">' . number_format($value->SEPTEMBER) . '</a>',
                    'OKTOBER' => ($value->OKTOBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=10' . '&c=' . $value->id_categorysub . '&d=' . $value->OKTOBER)) . '">' . number_format($value->OKTOBER) . '</a>',
                    'NOVEMBER' => ($value->NOVEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=11' . '&c=' . $value->id_categorysub . '&d=' . $value->NOVEMBER)) . '">' . number_format($value->NOVEMBER) . '</a>',
                    'DESEMBER' => ($value->DESEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan3%23?token=' . Enkrip('?a=' . date_format($tgl, 'Y') . '&b=12' . '&c=' . $value->id_categorysub . '&d=' . $value->DESEMBER)) . '">' . number_format($value->DESEMBER) . '</a>'
                ];
            }
        } else {
            $data = [];
        }
        return ToJson($data);
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
