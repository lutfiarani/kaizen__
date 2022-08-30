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
		$this->load->model('M_kaizen_admin');
	 }

	public function index()
	{
		
		$pemberian_hadiah 			= $this->M_kaizen->get_pemberian_hadiah()->result();
		$jenis_hadiah 	  			= $this->M_kaizen->get_jenis_hadiah()->result();
		$hadiah = array(
			'pemberian_hadiah' 	=> $pemberian_hadiah,
			'jenis_hadiah'		=> $jenis_hadiah
		);
        $data['slide'] 			= $this->M_kaizen_admin->welcome('welcome');
		$data['tentang_kami'] 		= $this->M_kaizen_admin->welcome('tentang_kami');
		$data['aktivitas_kaizen'] 	= $this->M_kaizen_admin->welcome('aktivitas_kaizen');
		$data['kaizen_story'] 		= $this->M_kaizen_admin->kaizen_story();
		$data['gedung']  			= $this->M_kaizen->gedung();
		$this->load->view('header');
		// $this->load->view('beranda/isi', $data);
        $this->load->view('beranda/tentang_kami', $data); //sudah
		// $this->load->view('beranda/aktivitas_kaizen', $data);//sudah
		// $this->load->view('beranda/kaizen_story', $data); //sudah
		// $this->load->view('beranda/hadiah2', $hadiah); 
		// $this->load->view('beranda/isi_ide', $data);
		$this->load->view('beranda/footer');
	}

	public function isi_ide()
	{
		
		$pemberian_hadiah 			= $this->M_kaizen->get_pemberian_hadiah()->result();
		$jenis_hadiah 	  			= $this->M_kaizen->get_jenis_hadiah()->result();
		$hadiah = array(
			'pemberian_hadiah' 	=> $pemberian_hadiah,
			'jenis_hadiah'		=> $jenis_hadiah
		);
        $data['slide'] 			= $this->M_kaizen_admin->welcome('welcome');
		$data['tentang_kami'] 		= $this->M_kaizen_admin->welcome('tentang_kami');
		$data['aktivitas_kaizen'] 	= $this->M_kaizen_admin->welcome('aktivitas_kaizen');
		$data['kaizen_story'] 		= $this->M_kaizen_admin->kaizen_story();
		$data['gedung']  			= $this->M_kaizen->gedung();
		$this->load->view('header');
		$this->load->view('beranda/isi_ide', $data);
		$this->load->view('beranda/footer');
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
		// $search     = $this->input->post('query');
        $dari       = $this->input->post('dari');
        $sampai     = $this->input->post('sampai');

		$data = $this->M_kaizen->cari_ide()->result();
		echo json_encode($data);
	}

	public function cari_ide_datatable(){
		$draw 	= intval($this->input->get("draw"));
		$start 	= intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$list = $this->M_kaizen->cari_ide();
		$data = array();
		$no = $start;
		foreach($list->result() as $a){
			if($a->ACTION=='1'){
				$text = 'Perlu Follow Up';
			}else if($a->ACTION=='2'){
				$text = 'Sudah Pernah';
			}else if($a->ACTION=='3'){
				$text = 'Komplain (bukan ide)';
			}

			$no++;
			$data[] = array(
				$no,
				$a->LMNT_DTTM,
				$a->NIK,
				$a->NAME,
				$a->JABATAN,
				$a->FACTORY,
				$a->DEPT,
				$a->LOCATION,
				$a->IDE,
				$text,
				'<button type="button" id="status" data-id="'.$a->RECORDID.'" data-status="1" class="btn btn-primary btn-sm">Perlu Follow Up</button>
				<button type="button" id="status" data-id="'.$a->RECORDID.'" data-status="2" class="btn btn-warning btn-sm">Sudah Pernah</button>
				<button type="button" id="status" data-id="'.$a->RECORDID.'" data-status="3" class="btn btn-danger btn-sm">Komplain</button>'
			);
		}
		$output = array(
			"draw"=> $draw,
			"recordsTotal" => $list->num_rows(),
			"recordsFiltered" => $list->num_rows(),
			"data" =>$data
		);
		echo json_encode($output);
	}

	public function export_excel_(){
		$search     = $this->input->get('query');
        $dari       = $this->input->get('dari');
        $sampai     = $this->input->get('sampai');

		$url = base_url('C_list_ide/index/'.$search.'/'.$dari.'/'.$sampai);
		echo json_encode($url);
	}
	
	public function export_excel($query = NULL, $dari = NULL, $sampai = NULL){
		// $query = $_GET['query'];
		// echo 'query adalah '.$query;
		// $query = parse_str($_SERVER['query'], $_GET); 
		// $dari = isset($_GET['dari']);
		// $sampai = isset($_GET['sampai']);
		// echo 'querynya adalah'.$query;

		// $search     = $this->input->post($parameter['query']);
        // $dari       = $this->input->post('dari');
        // $sampai     = $this->input->post('sampai');
		// $search     = $parameterquery;


		$tanggal = date('Ymd');
		$filename = 'employee-'.$tanggal;  
		$ide = $this->M_kaizen->cari_ide_excel($query, $dari, $sampai)->result_array();
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
		for ($i=0 ; $i<count($ide); $i++){
			$val = $ide[$i];
			$sheet->setCellValue('A' . $rows, ($i+1));
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
		
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

        $writer->save('php://output');

        
	}

	public function edit_ide(){
		$data = $this->M_kaizen->edit_ide();
		echo json_encode($data);
	}


	public function taget_kaizen_implemented()
	{
		$data['level'] = $this->session->userdata('level');
		$this->load->view('header');
        $data['implemented']  = $this->M_kaizen->implemented();
		$data['kaizen_submit']  = $this->M_kaizen->implemented();
		$this->load->view('kaizen_implemented', $data);
		$this->load->view('kaizen_summary', $data);
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

	function cobalagi(){
		$this->load->view('header');
		$this->load->view('beranda/isi');
	}

}
