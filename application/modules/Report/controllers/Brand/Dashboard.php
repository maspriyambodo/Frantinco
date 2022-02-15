<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_brand', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'year' => year_report(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Brand/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Brand/Dashboard/index/'),
            'siteTitle' => 'Brand Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Brand Report ' . year_report()[0]->text,
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('brand/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $param = Dekrip(Post_get('token'));
        $list = $this->model->lists($param);
        $data = [];
        $no = Post_get("start");
        $privilege = $this->bodo->Check_previlege('Report/Brand/Dashboard/index/');
        foreach ($list as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->nama;
            $row[] = ($value->JANUARI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=01' . '&c=' . $value->id . '&d=' . $value->JANUARI)) . '">' . number_format($value->JANUARI) . '</a>';
            $row[] = ($value->FEBRUARI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=02' . '&c=' . $value->id . '&d=' . $value->FEBRUARI)) . '">' . number_format($value->FEBRUARI) . '</a>';
            $row[] = ($value->MARET == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=03' . '&c=' . $value->id . '&d=' . $value->MARET)) . '">' . number_format($value->MARET) . '</a>';
            $row[] = ($value->APRIL == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=04' . '&c=' . $value->id . '&d=' . $value->APRIL)) . '">' . number_format($value->APRIL) . '</a>';
            $row[] = ($value->MEI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=05' . '&c=' . $value->id . '&d=' . $value->MEI)) . '">' . number_format($value->MEI) . '</a>';
            $row[] = ($value->JUNI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=06' . '&c=' . $value->id . '&d=' . $value->JUNI)) . '">' . number_format($value->JUNI) . '</a>';
            $row[] = ($value->JULI == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=07' . '&c=' . $value->id . '&d=' . $value->JULI)) . '">' . number_format($value->JULI) . '</a>';
            $row[] = ($value->AGUSTUS == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=08' . '&c=' . $value->id . '&d=' . $value->AGUSTUS)) . '">' . number_format($value->AGUSTUS) . '</a>';
            $row[] = ($value->SEPTEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=09' . '&c=' . $value->id . '&d=' . $value->SEPTEMBER)) . '">' . number_format($value->SEPTEMBER) . '</a>';
            $row[] = ($value->OKTOBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=10' . '&c=' . $value->id . '&d=' . $value->OKTOBER)) . '">' . number_format($value->OKTOBER) . '</a>';
            $row[] = ($value->NOVEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=11' . '&c=' . $value->id . '&d=' . $value->NOVEMBER)) . '">' . number_format($value->NOVEMBER) . '</a>';
            $row[] = ($value->DESEMBER == 0) ? '<span class="text-danger">0</span>' : '<a href="' . base_url('Laporan1%23?token=' . Enkrip('?a=' . $param . '&b=12' . '&c=' . $value->id . '&d=' . $value->DESEMBER)) . '">' . number_format($value->DESEMBER) . '</a>';
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

    public function Chart_1($param) {
        $tahun = Dekrip($param);
        if (!$tahun) {
            $result = [];
        } else {
            $result = $this->model->chart_1($tahun);
        }
        return ToJson($result);
    }

}
