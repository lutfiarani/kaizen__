<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kaizen extends CI_Model {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
    ////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function __construct(){
        parent::__construct();
        
    }
    public function ceknik($nik){
        $query = $this->dboracle->query("
            SELECT A.NIK, A.NAME, A.TITLECODE, NVL(SUBSTR(B.DESCRIPTION, 0, INSTR(B.DESCRIPTION, ' ')-1), B.DESCRIPTION) AS DESCRIPTION FROM VIEW_EMPLOYEE A
            LEFT JOIN TMAIN_MASTER_ORG_STRUCTURE  B
            ON A.ORGANIZATIONSTRUCTURE= B.CODE
            WHERE A.NIK = '$nik'
            ORDER BY A.NIK
        ");
        return $query;
    }

    public function gedung(){
        $mes = $this->load->database('mes', TRUE);
        $query = $mes->query("SELECT FACTORY2 FROM TMCELL GROUP BY FACTORY2");
        return $query->result_array();
    }

    public function cekcell($gedung){
        $mes = $this->load->database('mes', TRUE);
        $cell = "<option value = ''>Pilih Cell</option>";
        $query = $mes->query("SELECT CELL_CODE FROM TMCELL WHERE FACTORY2 = '$gedung'
                             AND USE_FLAG='Y'");
        foreach($query->result_array() as $c){
            $cell .= "<option value='$c[CELL_CODE]'>$c[CELL_CODE]</option>";
        }
        return $cell;
    }


    public function simpan_ide(){
        $nik     = $this->input->post('nik');
        $nama    = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $gedung  = $this->input->post('gedung');
        $bagian  = $this->input->post('bagian');
        $cell    = $this->input->post('cell');
        $ide     = $this->input->post('ide');
        $kategori= $this->input->post('kategori');

        $query = $this->db->query("
                INSERT INTO [T_IDEKU_TEST]
                        ([NIK]
                        ,[NAME]
                        ,[DEPT]
                        ,[JABATAN]
                        ,[FACTORY]
                        ,[CATEGORY]
                        ,[LOCATION]
                        ,[IDE]
                        ,[ACTION]
                        ,[REMARK]
                        ,[USED]
                        ,[LMNT_USER]
                        ,[LMNT_DTTM]
                        ,[UPDATED_AT])
                VALUES
                        ('$nik'
                        ,'$nama'
                        ,'$bagian'
                        ,'$jabatan'
                        ,'$gedung'
                        ,'$kategori'
                        ,'$cell'
                        ,'$ide'
                        ,''
                        ,''
                        ,'Y'
                        ,'$nik'
                        ,GETDATE()
                        ,GETDATE())
        ");

        return $query;
    }


    public function cari_ide(){
        $search     = $this->input->post('query');
        $dari       = $this->input->post('dari');
        $sampai     = $this->input->post('sampai');
		
        $query      = "SELECT * FROM (SELECT * FROM T_IDEKU_TEST";
        if($search !=''){
            $query .= "
        
            WHERE NIK LIKE '%".str_replace(' ', '%', $search)."%' 
            OR NAME LIKE '%".str_replace(' ', '%', $search)."%' 
            OR DEPT LIKE '%".str_replace(' ', '%', $search)."%' 
            OR FACTORY LIKE '%".str_replace(' ', '%', $search)."%' 
            OR LOCATION LIKE '%".str_replace(' ', '%', $search)."%' 
            OR IDE LIKE '%".str_replace(' ', '%', $search)."%' 
            OR JABATAN LIKE '%".str_replace(' ', '%', $search)."%' 
         
		";
        }
        $query .= ") AS A";
		if(($dari !='')&&($sampai !=''))
		{
            $query .= "
                WHERE CAST(LMNT_DTTM AS DATE) BETWEEN '$dari' AND '$sampai'";
        }
        
		$query .= ' ORDER BY ACTION DESC ';

        $run = $this->db->query($query);
		return $run;
        // echo $query;
        
	}

    public function edit_ide(){
        $id = $this->input->post('id');
        $action = $this->input->post('action');
        $query = "UPDATE T_IDEKU_TEST
                    SET ACTION = '$action',
                    UPDATED_AT = GETDATE()
                    WHERE RECORDID = '$id'
        ";
        $run = $this->db->query($query);
        return $run;
    }

    public function implemented(){
        $query = $this->db->query("select FORMAT(CONVERT(date, PERIODE + '01'),'MMM') AS BULAN
		--, CONVERT(NUMERIC, RIGHT(PERIODE,2)) AS PERIODE
		, RIGHT(PERIODE, 2) AS PERIODE
		, JML_KARYAWAN
		, ACTUAL_IDE
		, CAST(ACTUAL_IDE AS FLOAT)/cast(JML_KARYAWAN AS FLOAT) AS RATIO
		, 1.0 AS TARGET
        FROM T_IDEKU_IMPLEMENT");
        return $query->result_array();
    }


    function get_pemberian_hadiah(){
        $query = $this->db->query("
            select * from kaizen_pemberian_hadiah where aktif = 'Y' order by diupdate desc
        ");
        return $query;
    }

    function get_jenis_hadiah(){
        $query = $this->db->query("
            select * from kaizen_jenis_hadiah where aktif = 'Y' order by diupdate desc
        ");
        return $query;
    }

}
