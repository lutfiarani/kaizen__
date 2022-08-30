<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('M_login');
		}
		
		public function index(){
		
			$this->load->view('beranda/login_baru');
			//$this->load->view('new',$data);
		}
		
		public function masuk(){
			$akun = $this->input->post('username');
			$pass = $this->input->post('password');
			$login = $this->M_login->getUser($akun); 
			$logina = $login->row();
			if ($login->num_rows() > 0){
				
				if(password_verify($pass, $logina->password)){
					$this->session->set_userdata('username', $logina->username);
					$level = $this->session->set_userdata('level', $logina->leanandtier_admin);
					redirect(base_url('C_kaizen_admin')); 	
					// echo $level;
				}
			}else{
				redirect('C_login');
			}
			
			if('username' == null || 'username'==""){
				alert ("username harus diisi");
				redirect('C_login');
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('C_kaizen/');
		}
	 }

