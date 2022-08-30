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

	
	public function index()
	{
		$level = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($level == 1){
			$data['sub'] = 0;
			$this->load->view('admin/template_admin', $data);
			$data['gedung']  = $this->M_kaizen->gedung();
			$this->load->view('admin/content/list_ide', $data);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}
		// echo $level;

		

	}

	public function welcoming_page($param)
	{
		$level = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($level == 1){
			if($param== 'welcome'){
				$data['sub'] = 1;
			}else if($param == 'tentang_kami'){
				$data['sub'] = 2;
			}else if($param == 'tim_kaizen'){
				$data['sub'] = 3;
			}
			else if($param == 'aktivitas_kaizen'){
				$data['sub'] = 4;
			}
			else if($param == 'pemberian_hadiah'){
				$data['sub'] = 5;
			}else if($param == 'hadiah'){
				$data['sub'] = 6;
			};
			$this->load->view('admin/template_admin', $data);
			$data['data']  = $this->M_kaizen_admin->welcome($param);
			$data['param'] =  $param;
			$judul = str_replace('_', ' ', $param);
			$data['judul1'] = ucwords($judul);
			$data['judul2'] = 'List '.ucwords($judul);
			$this->load->view('admin/content/input_welcoming_page', $data);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}

	}

    public function welcome($param){
        $data = $this->M_kaizen_admin->welcome($param);
        echo json_encode($data);
    }

	public function edit_desc(){
		$data = $this->M_kaizen_admin->edit_desc();
		echo json_encode($data);

	}

	public function upload_image(){
        $config['upload_path']="./template/images/welcoming_page";
        $config['allowed_types']='gif|jpg|png';

        $this->load->library('upload',$config);

        if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload->data());
			$img_id = $this->input->post('img_id');
			$imgpath = $data['upload_data']['file_name'];
			

			$result= $this->M_kaizen_admin->upload_image($img_id, $imgpath);
			if ($result == TRUE) {
				echo "true";
			}
        }

	}

	public function kaizen_story(){
		$level = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($level == 1){
			$data['sub'] = 7;
			$this->load->view('admin/template_admin', $data);
			// $data['gedung']  = $this->M_kaizen->gedung();
			$this->load->view('admin/content/kaizen_story');
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}
	}

	public function kaizen_story_(){
		$data = $this->M_kaizen_admin->kaizen_story();
		echo json_encode($data);
	}

	public function insertKaizenStory(){
		$data = $this->M_kaizen_admin->insertKaizenStory();
		echo json_encode($data);
	}


	public function upload_kaizen_story(){
        $config['upload_path']="./template/images/welcoming_page";
        $config['allowed_types']='gif|jpg|png';

        $this->load->library('upload',$config);

        if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload->data());
			$img_id = $this->input->post('img_id');
			$imgpath = $data['upload_data']['file_name'];
			

			$result= $this->M_kaizen_admin->upload_kaizen_story($img_id, $imgpath);
			if ($result == TRUE) {
				echo "true";
			}
        }

	}

	public function delete_kaizen_story(){
		$data = $this->M_kaizen_admin->delete_kaizen_story();
		echo json_encode($data);
	}

	public function update_kaizen_story(){
		$data = $this->M_kaizen_admin->update_kaizen_story();
		echo json_encode($data);
	}

	public function gedung(){
		$level = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($level == 1){
			$data['sub'] = 0;
			$data['judul']  = 'Gedung';
			$data['judul1']  = 'Gedung';
			$this->load->view('admin/template_admin', $data);
			$data['gedung']  = $this->M_kaizen_admin->gedung()->result_array();
			
			$this->load->view('admin/content/gedung_editable', $data);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}
	}

	public function gedung_(){
		$data = $this->M_kaizen_admin->gedung()->result();
		echo json_encode($data);
	}
	// public function gedung_(){
	// 	// $data = $this->M_kaizen_admin->gedung();
	// 	// echo json_encode($data);
	// 		$draw = intval($this->input->get("draw"));
	// 		$start = intval($this->input->get("start"));
	// 		$length = intval($this->input->get("length"));
	
	// 		$list = $this->M_kaizen_admin->gedung();
	// 		$data = array();
	// 		$no = $start;
	// 		foreach($list->result() as $a){
	// 			$no++;
	// 			$data[] = array(
	// 				$no,
	// 				$a->NAMA_GEDUNG
	// 			);
	// 		}
	// 		$output = array(
	// 			"draw"=> $draw,
	// 			"recordsTotal" => $list->num_rows(),
	// 			"recordsFiltered" => $list->num_rows(),
	// 			"data" =>$data
	// 		);
	// 		 echo json_encode($output);
	// }

	public function update_gedung(){
		$data = $this->M_kaizen_admin->update_gedung();
		echo json_encode($data);
	}

	public function add_gedung(){
		$data = $this->M_kaizen_admin->add_gedung();
		echo json_encode($data);
	}

	public function tampil_welcome(){
		$data = $this->M_kaizen_admin->tampil_welcome();
		echo json_encode($data);
	}

	public function tampil_dept(){
		echo $this->M_kaizen_admin->tampil_dept();
        // echo json_encode($tampil);
    }

	public function departemen(){
		$data = $this->M_kaizen_admin->departemen();
		echo json_encode($data);
	}

	public function update_dept(){
        // sesscheck();
        $dept2     = $this->input->post('model_tampil');
        $dept      = $this->input->post('dept');
        $gedung      = $this->input->post('gedung');
		foreach ($dept2 as $modelhaha) 
		{
			$result = $this->M_kaizen_admin->update_dept($modelhaha, $gedung);
			
		}
	    echo json_decode('hore');
    
    }

	public function deleteGedung(){
		$data = $this->M_kaizen_admin->deleteGedung();
		echo json_encode($data);
	}

	public function input_implemented(){
		$data = $this->M_kaizen_admin->input_implemented();
		echo json_encode($data);
	}

	public function implemented_tabel(){
		$data = $this->M_kaizen_admin->implemented_tabel();
		echo json_encode($data);
	}

	public function input_impact(){
		$data = $this->M_kaizen_admin->input_impact();
		echo json_encode($data);
	}

	public function impact_tabel(){
		$data = $this->M_kaizen_admin->impact_tabel();
		echo json_encode($data);
	}

	function cekgedung(){
		$data = $this->M_kaizen_admin->cekgedung();
		echo json_encode(array('status'=>'ok', 'data'=>($data)));
	}
	
	public function input_summary_imp(){
		$data = $this->M_kaizen_admin->input_summary_imp();
		echo json_encode($data);
	}

	public function kaizen_implemented(){
		$data['level'] = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($data['level'] == 1){
			$data['sub'] = 8;
			$data['judul']  = 'Kaizen Implemented';
			$data['judul1']  = 'Update Kaizen Implemented';
			$data['implemented']  = $this->M_kaizen->implemented();
			$data['kaizen_submit']  = $this->M_kaizen->implemented();
			$this->load->view('admin/template_admin', $data);
			// $data['gedung']  = $this->M_kaizen_admin->gedung()->result_array();
			
			$this->load->view('kaizen_implemented', $data);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}
	}

	public function kaizen_summary(){
		$data['level'] = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('username');
		if ($data['level'] == 1){
			$data['sub'] = 9;
			$data['judul']  = 'Kaizen Implemented';
			$data['judul1']  = 'Update Kaizen Implemented';
			$data['implemented']  = $this->M_kaizen->implemented();
			$data['kaizen_submit']  = $this->M_kaizen->implemented();
			$this->load->view('admin/template_admin', $data);
			// $data['gedung']  = $this->M_kaizen_admin->gedung()->result_array();
			
			$this->load->view('kaizen_summary', $data);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url('C_kaizen'));
		}
	}
}
