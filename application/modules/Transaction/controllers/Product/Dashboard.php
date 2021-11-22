<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_trans', 'model');
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

    public function Upload() {
        $file = $_FILES['doctxt'];
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file['tmp_name']);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        if ($inputFileType !== 'Xlsx' and $inputFileType !== 'Xls') {
            $result = redirect(base_url('Transaction/Product/Dashboard/index/'), $this->session->set_flashdata('err_msg', 'please select excel document!'));
        } elseif ($sheetData[0][0] !== 'kode' and $sheetData[0][1] !== 'qty') {
            $result = redirect(base_url('Transaction/Product/Dashboard/index/'), $this->session->set_flashdata('err_msg', 'error format excel data!'));
        } elseif (!$sheetData) {
            $result = redirect(base_url('Transaction/Product/Dashboard/index/'), $this->session->set_flashdata('err_msg', 'error format excel data!'));
        } else {
            for ($i = 1; $i < count($sheetData); $i++) {
                $field = $sheetData[$i][0]; //field kode
                $field1 = $sheetData[$i][1]; //field qty
                $field2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($sheetData[$i][2]); //field tanggal
                $tr_date = $field2->format('Y-m-d');
                $data[] = [
                    'kode' => str_replace(' ', '', $field),
                    'qty' => $field1,
                    'tr_date' => $tr_date,
                    'syscreateuser' => $this->user,
                    'syscreatedate' => date('Y-m-d H:i:s')
                ];
            }
            $result = $this->_uploads($data);
        }
        return $result;
    }

    /* private function _uploads
     * Array
      (
      [0] => Array
      (
      [kode] => Fs1827bh
      [qty] => 891
      [tr_date] => 2021-09-28
      [syscreateuser] => 1
      [syscreatedate] => 2021-09-28 16:49:20
      )
      )
     */

    private function _uploads($data) {
        $exec = $this->model->Insert($data);
        if ($exec <> true) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Transaction/Product/Dashboard/index/'), $this->session->set_flashdata('err_msg', 'error while adding new data transaction'));
        } else {
            $this->db->trans_commit();
            $totdata = count($data);
            $result = redirect(base_url('Transaction/Product/Dashboard/index/'), $this->session->set_flashdata('succ_msg', '<b>' . $totdata . '</b> new data transaction has been added!'));
        }
        return $result;
    }
    
    public function Download() {
        $token = Dekrip(Post_get('token'));
        if ($token == 'benar') {
            header('Content-Disposition: attachment; filename=' . md5(date('Y-m-d H:i:s')) . '.xlsx');
            readfile(FCPATH . 'assets/media/tr_product.xlsx');
        } else {
            echo "your token not match!";
        }
    }

}
