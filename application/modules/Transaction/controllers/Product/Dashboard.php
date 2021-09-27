<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_trans', 'model');
        $this->load->model('Report/M_year', 'm_report');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'year' => $this->Dir_year(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Transaction/Product/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Transaction/Product/Dashboard/index/'),
            'siteTitle' => 'Data Transaction | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data | Transaction ' . date('Y'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('product/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $tahun = Dekrip(Post_get('token'));
        $list = $this->model->lists($tahun);
        $data = [];
        $no = Post_input("start");
        $privilege = $this->bodo->Check_previlege('Transaction/Product/Dashboard/index/');
        $privilege['tahun'] = $tahun;
        foreach ($list as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->kode;
            $row[] = $value->qty;
            $row[] = $value->tr_date;
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => $this->model->count_all($privilege['tahun']),
                "recordsFiltered" => $this->model->count_filtered($privilege['tahun']),
                "data" => $data
            ];
        } else {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
        ToJson($output);
    }

    private function Dir_year() {
        $exec = $this->m_report->Dir_year();
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

    public function Upload() {
        $file = $_FILES['doctxt'];
        /*
         * Array
          (
          [name] => Daftar Aplikasi Bimas Islam.xlsx
          [type] => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
          [tmp_name] => /tmp/phpbcxiR5
          [error] => 0
          [size] => 11013
          )
         */
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        for ($i = 1; $i < count($sheetData); $i++) {
            $field = $sheetData[$i]['0']; //field kode
            $field1 = $sheetData[$i]['1']; //field qty
            $field2 = $sheetData[$i]['2']; //field tanggal
            $arr_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($field2);
            $tr_date = date('Y-m-d', $arr_date['date']);
            $data[] = [
                'kode' => str_replace(' ', '', $field),
                'qty' => $field1,
                'tr_date' => $tr_date,
                'syscreateuser' => $this->user,
                'syscreatedate' => date('Y-m-d H:i:s')
            ];
        }
        print_array($data);
        die;
        $this->model->Insert($data);
    }

}
