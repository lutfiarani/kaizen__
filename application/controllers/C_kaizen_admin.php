<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_kaizen_admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 function __construct(){
		parent::__construct();
		$this->load->model('M_kaizen');
        $this->load->model('M_kaizen_admin');
	 }

	// public function index()
	// {
	// 	$this->load->view('admin/template_admin');
    //     $this->load->view('admin/footer');
	// 	// $this->load->view('isi_ide', $data);

	// }

	public function index()
	{
		$this->load->view('admin/template_admin');
        $data['gedung']  = $this->M_kaizen->gedung();
		$this->load->view('admin/content/list_ide', $data);
        $this->load->view('admin/footer');

	}

	public function cari_ide(){
		$data = $this->M_kaizen->cari_ide()->result();
		echo json_encode($data);
	}

	public function export_excel(){
		$tanggal = date('Ymd');
		$fileName = 'employee-'.$tanggal.'.xlsx';  
		$employeeData = $this->M_kaizen->cari_ide()->result_array();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'NAMA');
        $sheet->setCellValue('D1', 'JABATAN');
		$sheet->setCellValue('E1', 'FACTORY');
        $sheet->setCellValue('F1', 'DEPT');       
		$sheet->setCellValue('G1', 'CELL'); 
		$sheet->setCellValue('H1', 'IDE'); 
		$sheet->setCellValue('I1', 'ACTION'); 
		
        $rows = 2;
		// $i = 0;
		for ($i=0 ; $i<count($employeeData); $i++){
			$val = $employeeData[$i];
			$sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $val['NIK']);
            $sheet->setCellValue('C' . $rows, $val['NAME']);
            $sheet->setCellValue('D' . $rows, $val['JABATAN']);
	    	$sheet->setCellValue('E' . $rows, $val['FACTORY']);
            $sheet->setCellValue('F' . $rows, $val['DEPT']);
			$sheet->setCellValue('G' . $rows, $val['LOCATION']);
			$sheet->setCellValue('H' . $rows, $val['IDE']);
			$sheet->setCellValue('I' . $rows, $val['ACTION']);
            $rows++;
		}
		
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);

		header("Content-Disposition: attachment; filename=\"$fileName\""); 
		header("Content-Type: application/vnd.ms-excel");
		// $writer->save('php://output');
		// exit();
        redirect(base_url()."/upload/".$fileName);              
        
	}

	public function welcoming_page()
	{
		$this->load->view('admin/template_admin');
        // $data['data']  = $this->M_kaizen_admin->welcome();
		$this->load->view('admin/content/input_welcoming_page');
        $this->load->view('admin/footer');
	}

    public function welcome(){
        $data = $this->M_kaizen_admin->welcome();
        echo json_encode($data);
    }
}
