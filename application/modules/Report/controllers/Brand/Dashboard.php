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
            'year' => $this->Dir_year(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Brand/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Brand/Dashboard/index/'),
            'siteTitle' => 'Brand Report | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Brand Report ' . $this->Dir_year()[0]->text,
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

    public function dt_table($param) {
        $tahun = Dekrip($param);
        if (empty($tahun)) {
            $data = [];
        } else {
            $norut = 0;
            foreach ($this->model->dt_table($tahun) as $value) {
                $norut++;
                $data[] = [
                    'id' => $norut,
                    'nama' => $value->nama,
                    'tr_date' => $value->tr_date,
                    'JANUARI' => ($value->JANUARI == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=01' . '&c=' . $value->id . '&d=' . $value->JANUARI))) . '">' . number_format($value->JANUARI) . '</a>',
                    'FEBRUARI' => ($value->FEBRUARI == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=02' . '&c=' . $value->id . '&d=' . $value->FEBRUARI))) . '">' . number_format($value->FEBRUARI) . '</a>',
                    'MARET' => ($value->MARET == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=03' . '&c=' . $value->id . '&d=' . $value->MARET))) . '">' . number_format($value->MARET) . '</a>',
                    'APRIL' => ($value->APRIL == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=04' . '&c=' . $value->id . '&d=' . $value->APRIL))) . '">' . number_format($value->APRIL) . '</a>',
                    'MEI' => ($value->MEI == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=05' . '&c=' . $value->id . '&d=' . $value->MEI))) . '">' . number_format($value->MEI) . '</a>',
                    'JUNI' => ($value->JUNI == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=06' . '&c=' . $value->id . '&d=' . $value->JUNI))) . '">' . number_format($value->JUNI) . '</a>',
                    'JULI' => ($value->JULI == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=07' . '&c=' . $value->id . '&d=' . $value->JULI))) . '">' . number_format($value->JULI) . '</a>',
                    'AGUSTUS' => ($value->AGUSTUS == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=08' . '&c=' . $value->id . '&d=' . $value->AGUSTUS))) . '">' . number_format($value->AGUSTUS) . '</a>',
                    'SEPTEMBER' => ($value->SEPTEMBER == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->SEPTEMBER))) . '">' . number_format($value->SEPTEMBER) . '</a>',
                    'OKTOBER' => ($value->OKTOBER == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=10' . '&c=' . $value->id . '&d=' . $value->OKTOBER))) . '">' . number_format($value->OKTOBER) . '</a>',
                    'NOVEMBER' => ($value->NOVEMBER == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=11' . '&c=' . $value->id . '&d=' . $value->NOVEMBER))) . '">' . number_format($value->NOVEMBER) . '</a>',
                    'DESEMBER' => ($value->DESEMBER == 0) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=12' . '&c=' . $value->id . '&d=' . $value->DESEMBER))) . '">' . number_format($value->DESEMBER) . '</a>'
                ];
            }
        }
        return ToJson($data);
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

}
