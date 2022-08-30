<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kaizen_admin extends CI_Model {

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
    // public function welcome(){
    //     $query = $this->dboracle->query("
    //         SELECT A.NIK, A.NAME, A.TITLECODE, NVL(SUBSTR(B.DESCRIPTION, 0, INSTR(B.DESCRIPTION, ' ')-1), B.DESCRIPTION) AS DESCRIPTION FROM VIEW_EMPLOYEE A
    //         LEFT JOIN TMAIN_MASTER_ORG_STRUCTURE  B
    //         ON A.ORGANIZATIONSTRUCTURE= B.CODE
    //         WHERE A.NIK = '$nik'
    //         ORDER BY A.NIK
    //     ");
    //     return $query;
    // }

    public function welcome($param){
        $query = $this->db->query("SELECT * FROM KAIZEN_WELCOME WHERE IMG_CAT= '$param' ");
        return $query->result_array();
    }

    // public function hadiah(){}
    public function tampil_welcome(){
        $id     = $this->input->post('id');

        $query  = $this->db->query("SELECT * FROM KAIZEN_WELCOME WHERE IMG_ID='$id'");
        return $query->row();
    }

    public function edit_desc(){
        $desc = $this->input->post('desc');
        $id   =  $this->input->post('id');

        $query = ("UPDATE KAIZEN_WELCOME
                                    SET IMG_DESC = '$desc'
                                    , UPDATED_AT = GETDATE()
                                    WHERE IMG_ID = '$id'
            ");
        $run = $this->db->query($query);
        return $query;
        // echo $query;
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

    public function upload_image($img_id, $imgpath){
        $query = ("UPDATE KAIZEN_WELCOME
                        SET IMG = '$imgpath'
                        WHERE IMG_ID = $img_id
        ");

        $run  = $this->db->query($query);
        return $run;
        // echo $query;
    }

    public function kaizen_story(){
        $query = $this->db->query("SELECT * FROM KAIZEN_STORY");
        return $query->result();
    }

    public function insertKaizenStory(){
        $title          = $this->input->post('title');
        $fasilitas      = $this->input->post('fasilitas');
        $kaizen_imple   = $this->input->post('kaizen_imple');
        $hadiah         = $this->input->post('hadiah');

        $query = (
                "INSERT INTO KAIZEN_STORY(TITLE, FASILITAS, KAIZEN_IMPLE, HADIAH, UPDATED_AT, CREATED_AT)
                    VALUES ('$title', '$fasilitas', '$kaizen_imple', '$hadiah' , GETDATE(), GETDATE());
                "
        );
        $querys = $this->db->query($query);
        return $querys;
        // echo $query;
    }

    public function upload_kaizen_story($img_id, $imgpath){
        $query = ("UPDATE KAIZEN_STORY
                        SET IMG_TITLE = '$imgpath'
                        , UPDATED_AT = GETDATE()
                        WHERE ID = $img_id
        ");

        $run  = $this->db->query($query);
        return $run;
        // echo $query;
    }

    public function delete_kaizen_story(){
        $id = $this->input->post('id');
        $query = $this->db->query("DELETE FROM KAIZEN_STORY WHERE ID = '$id'");

        return $query;
    }

    public function update_kaizen_story(){
        $column         = $this->input->post('column');
        $isi_column     = $this->input->post('value');
        $id             = $this->input->post('id');

        $query = $this->db->query("UPDATE KAIZEN_STORY
                        SET ".$column." = '$isi_column'
                        , UPDATED_AT = GETDATE()
                        WHERE ID = '$id'
        ");

        return $query;
       
    }

    public function gedung(){
        $query = $this->db->query("SELECT * FROM KAIZEN_GEDUNG");
        return $query;
    }

    public function update_gedung(){
        // $nama   = $_POST["name"];
        // $nilai  = $_POST["value"];
        // $id     = $_POST["pk"];

        $column         = $this->input->post('column');
        $isi_column     = $this->input->post('value');
        $id             = $this->input->post('id');

        $query = $this->db->query("
                UPDATE KAIZEN_GEDUNG 
                SET ".$column." = '".$isi_column."' 
                WHERE ID_GEDUNG = '".$id."'
                ");

        return $query;
        // echo $query;
    }

    public function add_gedung(){
        $nama_gedung = $_POST['nama_gedung'];
        $query = $this->db->query("INSERT INTO KAIZEN_GEDUNG(NAMA_GEDUNG)
                                        VALUES ('$nama_gedung')
        ");
        return $query;
    }

    public function tampil_dept(){
        $dept = $this->input->post('nama_dept');

        $query = " SELECT * FROM KAIZEN_DEPARTMENT "; 
        if ($dept !=''){
            $query .= "WHERE NAMA_DEPARTEMEN LIKE '%".str_replace(' ', '%', $dept)."%' ";
        }
        $query .= " ORDER BY NAMA_DEPARTEMEN";
        $queryku = $this->db->query($query);
        $dept_now="";
        foreach ($queryku->result_array() as $data ){
                    $dept_now.= "<option data-tokens='$data[NAMA_DEPARTEMEN]' value='$data[ID_DEPARTEMEN]' selected>$data[NAMA_DEPARTEMEN]</option>";
                    // $model_sap .="<option value='$data[MODEL]'>$data[MODEL]</option>";
        }
        return $dept_now;
      
    }

    public function departemen(){
        $query = $this->db->query("SELECT NAMA_DEPARTEMEN, B.NAMA_GEDUNG, UPDATED_AT FROM KAIZEN_DEPARTMENT AS A
        LEFT JOIN KAIZEN_GEDUNG AS B
        ON A.NAMA_GEDUNG = B.ID_GEDUNG
        ORDER BY NAMA_DEPARTEMEN ASC");
        return $query->result();
    }

    public function update_dept($dept2, $gedung){
        $query = $this->db->query("
                UPDATE KAIZEN_DEPARTMENT
                SET NAMA_GEDUNG = '$gedung'
                , UPDATED_AT = GETDATE()
                WHERE ID_DEPARTEMEN = '$dept2'
        ");
        // return $query;
        return array($query);
        // print_r(array($query));

    }

    public function deleteGedung(){
        $id = $this->input->post('id');
        $query = $this->db->query("DELETE FROM KAIZEN_GEDUNG WHERE ID_GEDUNG ='$id'");
        return $query;
    }

    public function input_implemented(){
        $target_imp = $this->input->post('target_imp');
        $target_lab = $this->input->post('target_lab');
        $pro_imp = $this->input->post('pro_imp');
        $imp_bulanan = $this->input->post('imp_bulanan');
        $lab_bulanan= $this->input->post('lab_bulanan');

        $query = $this->db->query("
        INSERT INTO [dbo].[KAIZEN_IMPLEMENTED]
                   ([PERIODE]
                   ,[TARGET_IMP_TAHUNAN]
                   ,[TARGET_LAB_TAHUNAN]
                   ,[PROYEKSI_LAB_BULANAN]
                   ,[IMP_BULANAN]
                   ,[LAB_BULANAN]
                   ,[CREATED_AT])
             VALUES
                   ( CONVERT(CHAR(7), GETDATE(),120)
                   ,'$target_imp'
                   ,'$target_lab'
                   ,'$pro_imp'
                   ,'$imp_bulanan'
                   ,'$lab_bulanan'
                   ,getdate())");
        return $query;
    }

    public function implemented_tabel(){
        $query = $this->db->query("SELECT * FROM KAIZEN_IMPLEMENTED WHERE CREATED_AT IN (SELECT MAX(CREATED_AT) FROM KAIZEN_IMPLEMENTED) ");
        return $query->row();
    }

    public function input_impact(){
        $trt  = $this->input->post('target_rat_tahunan');
        $tet  = $this->input->post('target_eff_tahunan');
        $eb   = $this->input->post('eff_bulanan');
        $rt   = $this->input->post('rat_bulanan');

        $query = $this->db->query("INSERT INTO [dbo].[KAIZEN_IMPACT]
                                        ([PERIODE]
                                        ,[TARGET_RAT_TAHUNAN]
                                        ,[TARGET_EFF_TAHUNAN]
                                        ,[EFF_BULANAN]
                                        ,[RAT_BULANAN]
                                        ,[CREATED_AT])
                                VALUES
                                        (CONVERT(CHAR(7), GETDATE(),120)
                                        ,'$trt'
                                        ,'$tet'
                                        ,'$eb'
                                        ,'$rt'
                                        ,getdate())");

        return $query;
    }

    public function impact_tabel(){
        $query = $this->db->query("SELECT * FROM kaizen_impact WHERE CREATED_AT IN (SELECT MAX(CREATED_AT) FROM kaizen_impact)");
        return $query->row();
    }

    public function cekgedung(){
      
        $cell = "<option value = ''>Pilih Gedung</option>";
        $query = $this->db->query("SELECT * FROM KAIZEN_GEDUNG");
        foreach($query->result_array() as $c){
            $cell .= "<option value='$c[NAMA_GEDUNG]'>$c[NAMA_GEDUNG]</option>";
        }
        return $cell;
    }

    public function input_summary_imp(){
        $gedung = $this->input->post('gedung');
        $imp_bulanan = $this->input->post('imp_bulanan');
        $query = $this->db->query("INSERT INTO [dbo].[KAIZEN_SUMMARY_IMP]
                            ([PERIODE]
                            ,[NAMA_GEDUNG]
                            ,[IMP_BULANAN]
                            ,[CREATED_AT])
                    VALUES
                            (CONVERT(CHAR(7), GETDATE(), 120)
                            ,'$gedung'
                            ,'$imp_bulanan'
                            ,GETDATE())");
        return $query;
    }

}

