<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."third_party/vendor/phpexcel/PHPExcel.php";  
require_once APPPATH."third_party/vendor/phpexcel/PHPExcel/IOFactory.php";
class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}

// $this->load->library('excel');
// $path = APPPATH."../cdn/template/laporan.xls";
// $objReader = PHPExcel_IOFactory::createReader('Excel5');
// $document = $objReader->load($path);

// $data = array(array('title'		=> 'Excel for dummies',
// 		'price'		=> 17.99,
// 		'quantity'	=> 2
// 	   ),
//   array('title'		=> 'PHP for dummies',
// 		'price'		=> 15.99,
// 		'quantity'	=> 1
// 	   ),
//   array('title'		=> 'Inside OOP',
// 		'price'		=> 12.95,
// 		'quantity'	=> 1
// 	   )
//  );

// $document->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

// $baseRow = 5;
// foreach($data as $r => $dataRow) {
// 	$row = $baseRow + $r;
// 	$document->getActiveSheet()->insertNewRowBefore($row,1);

// 	$document->getActiveSheet()->setCellValue('A'.$row, $r+1)
// 	                              ->setCellValue('B'.$row, $dataRow['title'])
// 	                              ->setCellValue('C'.$row, $dataRow['price'])
// 	                              ->setCellValue('D'.$row, $dataRow['quantity'])
// 	                              ->setCellValue('E'.$row, '=C'.$row.'*D'.$row);
// }
// $document->getActiveSheet()->removeRow($baseRow-1,1);
// $filename = 'test-template.xls';
// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename="'.$filename.'"');
// header('Cache-Control: max-age=0');
// $objWriter = PHPExcel_IOFactory::createWriter($document, 'Excel5');
// $objWriter->save('php://output');