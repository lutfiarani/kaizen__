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
}