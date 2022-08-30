<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_list_ide extends CI_Controller{
    
    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_kaizen');
        $this->load->model('M_kaizen_admin');
		
       
    }


	public function index($query = NULL, $dari = NULL, $sampai = NULL)
	{
        $kontenboldabuleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'wrapText' => true
            ],
            'font' => [
                'size' => 14,
                'bold'=>true
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => array('argb' => 'c1c1c1')
            ],
        );

        $isi = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'wrapText' => true
            ],
            'font' => [
                'size' => 12
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                // 'color' => array('argb' => 'c1c1c1')
            ],
        );

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $ide = $this->M_kaizen->cari_ide_excel($query, $dari, $sampai)->result_array();
        

        $writer = new Xlsx($spreadsheet);

        $sheet->getColumnDimension('C')->setWidth(10.29);
        $sheet->getColumnDimension('D')->setWidth(15.43);
        $sheet->getColumnDimension('E')->setWidth(26.86);
        $sheet->getColumnDimension('F')->setWidth(21.57);
        $sheet->getColumnDimension('G')->setWidth(21);
        $sheet->getColumnDimension('H')->setWidth(22.29);
        $sheet->getColumnDimension('I')->setWidth(9.29);
        $sheet->getColumnDimension('J')->setWidth(73.43);
        $sheet->getColumnDimension('K')->setWidth(14.86);
        
        $sheet->setCellValue('C3', 'No')->getStyle('C3')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('D3', 'NIK')->getStyle('D3')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('E3', 'NAMA')->getStyle('E3')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('F3', 'JABATAN')->getStyle('F3')->applyFromArray($kontenboldabuleft);
		$sheet->setCellValue('G3', 'GEDUNG')->getStyle('G3')->applyFromArray($kontenboldabuleft);
        $sheet->setCellValue('H3', 'DEPT')->getStyle('H3')->applyFromArray($kontenboldabuleft);       
		$sheet->setCellValue('I3', 'CELL')->getStyle('I3')->applyFromArray($kontenboldabuleft); 
		$sheet->setCellValue('J3', 'IDE')->getStyle('J3')->applyFromArray($kontenboldabuleft); 
		$sheet->setCellValue('K3', 'STATUS')->getStyle('K3')->applyFromArray($kontenboldabuleft); 
		
        $rows = 4;
		// $i = 0;
		for ($i=0 ; $i<count($ide); $i++){
			$val = $ide[$i];
			$sheet->setCellValue('C' . $rows, ($i+1))->getStyle('C'.$rows)->applyFromArray($isi);
            $sheet->setCellValue('D' . $rows, $val['NIK'])->getStyle('D'.$rows)->applyFromArray($isi);
            $sheet->setCellValue('E' . $rows, $val['NAME'])->getStyle('E'.$rows)->applyFromArray($isi);
            $sheet->setCellValue('F' . $rows, $val['JABATAN'])->getStyle('F'.$rows)->applyFromArray($isi);
	    	$sheet->setCellValue('G' . $rows, $val['FACTORY'])->getStyle('G'.$rows)->applyFromArray($isi);
            $sheet->setCellValue('H' . $rows, $val['DEPT'])->getStyle('H'.$rows)->applyFromArray($isi);
			$sheet->setCellValue('I' . $rows, $val['LOCATION'])->getStyle('I'.$rows)->applyFromArray($isi);
			$sheet->setCellValue('J' . $rows, $val['IDE'])->getStyle('J'.$rows)->applyFromArray($isi);
			$sheet->setCellValue('K' . $rows, $val['ACTION2'])->getStyle('K'.$rows)->applyFromArray($isi);
            $rows++;
		}
        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'Report_';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

        $writer->save('php://output');
        
        // print("<pre>".print_r($data,true)."</pre>");
        // print("<pre>".print_r($report3,true)."</pre>");
        // PRINT_R($report3[0]->CODE_NAME);
        // print("<pre>".print_r($report2,true)."</pre>");


	}
}

