<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_kaizen extends CI_Controller {

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
	 }

	public function index()
	{
		$this->load->view('header');
		$pemberian_hadiah = $this->M_kaizen->get_pemberian_hadiah()->result();
		$jenis_hadiah 	  = $this->M_kaizen->get_jenis_hadiah()->result();
		$hadiah = array(
			'pemberian_hadiah' 	=> $pemberian_hadiah,
			'jenis_hadiah'		=> $jenis_hadiah
		);
        $this->load->view('beranda/isi');
        $this->load->view('beranda/tentang_kami');
		$this->load->view('beranda/aktivitas_kaizen');
		$this->load->view('beranda/hadiah2', $hadiah); 
		$data['gedung']  = $this->M_kaizen->gedung();
		$this->load->view('beranda/isi_ide', $data);
		// $this->load->view('footer');

	}

	function ceknik($nik){
        $this->dboracle = $this->load->database('oracle', TRUE);
        $data = $this->M_kaizen->ceknik($nik);
        header('Content-Type: application/json');
        if($data->num_rows()>0){
            echo json_encode(array('status'=>'ok','data'=>($data->row())));
        }else{
            echo json_encode(array('status'=>'error','msg'=>'Data Not Found'));
        }
        // print_r($data);
    }

	function cekcell($gedung){
		$data = $this->M_kaizen->cekcell($gedung);
		header('Content-Type: application/json');
		echo json_encode(array('status'=>'ok', 'data'=>($data)));
	}

	function simpan_ide(){
		$data = $this->M_kaizen->simpan_ide();
		header('Content-Type: application/json');
		echo json_encode('data berhasil disimpan');
	}

	public function pencarian_ide()
	{
		$this->load->view('header');
        $data['gedung']  = $this->M_kaizen->gedung();
		$this->load->view('pencarian_ide', $data);

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

	public function edit_ide(){
		$data = $this->M_kaizen->edit_ide();
		echo json_encode($data);
	}


	public function taget_kaizen_implemented()
	{
		$this->load->view('header');
        $data['implemented']  = $this->M_kaizen->implemented();
		$data['kaizen_submit']  = $this->M_kaizen->implemented();
		$this->load->view('kaizen_implemented', $data);
		// $aa['implemented']  = $this->M_kaizen->implemented();
		// $this->load->view('kaizen_submit', $aa);
		// print("<pre>".print_r($data,true)."</pre>");
		// print_r($data);
		// var_dump($data);

	}

	public function kaizen_submit()
	{
		$this->load->view('header');
        $data['implemented']  = $this->M_kaizen->implemented();
		$this->load->view('kaizen_submit', $data);

	}




	public function coba_carousel(){
		$this->load->view('coba_carousel');
	}

}
