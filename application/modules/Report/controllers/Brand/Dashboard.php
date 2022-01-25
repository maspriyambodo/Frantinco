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
                    'JANUARI' => ($value->JANUARI == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->JANUARI))) . '">' . number_format($value->JANUARI) . '</a>',
                    'FEBRUARI' => ($value->FEBRUARI == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->FEBRUARI))) . '">' . number_format($value->FEBRUARI) . '</a>',
                    'MARET' => ($value->MARET == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->MARET))) . '">' . number_format($value->MARET) . '</a>',
                    'APRIL' => ($value->APRIL == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->APRIL))) . '">' . number_format($value->APRIL) . '</a>',
                    'MEI' => ($value->MEI == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->MEI))) . '">' . number_format($value->MEI) . '</a>',
                    'JUNI' => ($value->JUNI == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->JUNI))) . '">' . number_format($value->JUNI) . '</a>',
                    'JULI' => ($value->JULI == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->JULI))) . '">' . number_format($value->JULI) . '</a>',
                    'AGUSTUS' => ($value->AGUSTUS == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->AGUSTUS))) . '">' . number_format($value->AGUSTUS) . '</a>',
                    'SEPTEMBER' => ($value->SEPTEMBER == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->SEPTEMBER))) . '">' . number_format($value->SEPTEMBER) . '</a>',
                    'OKTOBER' => ($value->OKTOBER == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->OKTOBER))) . '">' . number_format($value->OKTOBER) . '</a>',
                    'NOVEMBER' => ($value->NOVEMBER == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->NOVEMBER))) . '">' . number_format($value->NOVEMBER) . '</a>',
                    'DESEMBER' => ($value->DESEMBER == null) ? 0 : '<a href="' . base_url('Laporan1%23?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=09' . '&c=' . $value->id . '&d=' . $value->DESEMBER))) . '">' . number_format($value->DESEMBER) . '</a>'
                ];
            }
        }
        return ToJson($data);
    }

    public function Chart_1($param) {
        $tahun = Dekrip($param);
        if (!$tahun) {
            $result = $this->_brand(null, null);
        } else {
            $brand_1 = $this->model->Brand_1($tahun)->result();
            $brand_2 = $this->model->Brand_2($tahun)->result();
            $result = $this->_chart2($brand_1, $brand_2);
        }
        return $result;
    }

    public function Chart_2($param) {
        $tahun = Dekrip($param);
        if (!$tahun) {
            $result = $this->_brand(null, null);
        } else {
            $brand_1 = $this->model->Brand_1($tahun)->result();
            $brand_2 = $this->model->Brand_2($tahun)->result();
            $result = $this->_brand($brand_1, $brand_2);
        }
        return $result;
    }

    private function _chart2($brand_1, $brand_2) {
        $brand = array_merge($brand_1, $brand_2);
        if (empty($brand)) {
            $data = null;
        } else {
            $tot_1 = 0;
            $tot_2 = 0;
            $tot_1 += $brand[0]->JANUARI + $brand[0]->FEBRUARI + $brand[0]->MARET + $brand[0]->APRIL + $brand[0]->MEI + $brand[0]->JUNI + $brand[0]->JULI + $brand[0]->AGUSTUS + $brand[0]->SEPTEMBER + $brand[0]->OKTOBER + $brand[0]->NOVEMBER + $brand[0]->DESEMBER;
            $tot_2 += $brand[1]->JANUARI + $brand[1]->FEBRUARI + $brand[1]->MARET + $brand[1]->APRIL + $brand[1]->MEI + $brand[1]->JUNI + $brand[1]->JULI + $brand[1]->AGUSTUS + $brand[1]->SEPTEMBER + $brand[1]->OKTOBER + $brand[1]->NOVEMBER + $brand[1]->DESEMBER;
            $data = [
                [
                    'brand' => $brand_1[0]->nama,
                    'total' => $tot_1
                ],
                [
                    'brand' => $brand_2[0]->nama,
                    'total' => $tot_2
                ]
            ];
        }
        return ToJson($data);
    }

    private function _brand($brand_1, $brand_2) {
        $brand = array_merge($brand_1, $brand_2);
        if ($brand) {
            $data = [
                [
                    'bulan' => 'Jan',
                    'brand_1' => $brand[0]->JANUARI,
                    'brand_2' => $brand[1]->JANUARI
                ],
                [
                    'bulan' => 'Feb',
                    'brand_1' => $brand[0]->FEBRUARI,
                    'brand_2' => $brand[1]->FEBRUARI
                ],
                [
                    'bulan' => 'Mar',
                    'brand_1' => $brand[0]->FEBRUARI,
                    'brand_2' => $brand[1]->FEBRUARI
                ],
                [
                    'bulan' => 'Apr',
                    'brand_1' => $brand[0]->APRIL,
                    'brand_2' => $brand[1]->APRIL
                ],
                [
                    'bulan' => 'Mei',
                    'brand_1' => $brand[0]->MEI,
                    'brand_2' => $brand[1]->MEI
                ],
                [
                    'bulan' => 'Jun',
                    'brand_1' => $brand[0]->JUNI,
                    'brand_2' => $brand[1]->JUNI
                ],
                [
                    'bulan' => 'Jul',
                    'brand_1' => $brand[0]->JULI,
                    'brand_2' => $brand[1]->JULI
                ],
                [
                    'bulan' => 'Aug',
                    'brand_1' => $brand[0]->AGUSTUS,
                    'brand_2' => $brand[1]->AGUSTUS
                ],
                [
                    'bulan' => 'Sep',
                    'brand_1' => $brand[0]->SEPTEMBER,
                    'brand_2' => $brand[1]->SEPTEMBER
                ],
                [
                    'bulan' => 'Oct',
                    'brand_1' => $brand[0]->OKTOBER,
                    'brand_2' => $brand[1]->OKTOBER
                ],
                [
                    'bulan' => 'Nov',
                    'brand_1' => $brand[0]->NOVEMBER,
                    'brand_2' => $brand[1]->NOVEMBER
                ],
                [
                    'bulan' => 'Dec',
                    'brand_1' => $brand[0]->DESEMBER,
                    'brand_2' => $brand[1]->DESEMBER
                ]
            ];
        } else {
            $data = null;
        }
        return ToJson($data);
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
