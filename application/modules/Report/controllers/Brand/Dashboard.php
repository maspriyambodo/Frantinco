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
            'pagetitle' => 'Brand Report ' . date('Y'),
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

    /* public function Month
     * Array
      (
      [0] => 1 id brand
      [1] => September month name
      [2] => BRAND 1 brand name
      [3] => 2021 year
      [4] => 09 month
      )
     */

    public function Month() {
        $param = $this->bodo->Url(Post_get('token'));
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Brand/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Brand/Dashboard/index/'),
            'siteTitle' => 'Report ' . $param[2] . ' | ' . $param[1] . ' ' . $param[3],
            'pagetitle' => $param[2] . ' | ' . $param[1] . ' ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('Report/Brand/Dashboard/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Month',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('brand/v_month', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function dt_table($param) {
        $tahun = Dekrip($param);
        if (empty($tahun)) {
            $data = [];
        } else {
            $brand_1 = $this->model->Brand_1($tahun)->result();
            $brand_2 = $this->model->Brand_2($tahun)->result();
            if ($brand_1 and $brand_2) {
                $norut = 0;
                $tot = 0;
                foreach (array_merge($brand_1, $brand_2) as $value) {
                    $norut++;
                    $tot += $value->TOTAL;
                    $data[] = [
                        'id' => $norut,
                        'nama' => $value->nama,
                        'tr_date' => $value->tr_date,
                        'JANUARI' => ($value->JANUARI == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Januari&c=' . $value->nama . '&d=' . $tahun . '&e=01'))) . '">' . number_format($value->JANUARI) . '</a>',
                        'FEBRUARI' => ($value->FEBRUARI == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Februari&c=' . $value->nama . '&d=' . $tahun . '&e=02'))) . '">' . number_format($value->FEBRUARI) . '</a>',
                        'MARET' => ($value->MARET == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Maret&c=' . $value->nama . '&d=' . $tahun . '&e=03'))) . '">' . number_format($value->MARET) . '</a>',
                        'APRIL' => ($value->APRIL == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=April&c=' . $value->nama . '&d=' . $tahun . '&e=04'))) . '">' . number_format($value->APRIL) . '</a>',
                        'MEI' => ($value->MEI == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Mei&c=' . $value->nama . '&d=' . $tahun . '&e=05'))) . '">' . number_format($value->MEI) . '</a>',
                        'JUNI' => ($value->JUNI == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Juni&c=' . $value->nama . '&d=' . $tahun . '&e=06'))) . '">' . number_format($value->JUNI) . '</a>',
                        'JULI' => ($value->JULI == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Juli&c=' . $value->nama . '&d=' . $tahun . '&e=07'))) . '">' . number_format($value->JULI) . '</a>',
                        'AGUSTUS' => ($value->AGUSTUS == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Agustus&c=' . $value->nama . '&d=' . $tahun . '&e=08'))) . '">' . number_format($value->AGUSTUS) . '</a>',
                        'SEPTEMBER' => ($value->SEPTEMBER == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=September&c=' . $value->nama . '&d=' . $tahun . '&e=09'))) . '">' . number_format($value->SEPTEMBER) . '</a>',
                        'OKTOBER' => ($value->OKTOBER == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Oktober&c=' . $value->nama . '&d=' . $tahun . '&e=10'))) . '">' . number_format($value->OKTOBER) . '</a>',
                        'NOVEMBER' => ($value->NOVEMBER == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=November&c=' . $value->nama . '&d=' . $tahun . '&e=11'))) . '">' . number_format($value->NOVEMBER) . '</a>',
                        'DESEMBER' => ($value->DESEMBER == null) ? 0 : '<a href="' . base_url('Report/Brand/Dashboard/Month?token=' . str_replace(['+', '/', '='], ['-', '_', '~'], Enkrip('?a=' . $value->id . '&b=Desember&c=' . $value->nama . '&d=' . $tahun . '&e=12'))) . '">' . number_format($value->DESEMBER) . '</a>',
                        'total' => $value->TOTAL,
                        'summary' => $tot
                    ];
                }
            } else {
                $data = [];
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
            $data = [
                [
                    'brand' => 'brand_1',
                    'total' => $brand[0]->TOTAL
                ],
                [
                    'brand' => 'brand_2',
                    'total' => $brand[1]->TOTAL
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
