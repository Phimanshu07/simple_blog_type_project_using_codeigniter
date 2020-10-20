<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends MY_Controller {

    // construct
    public function __construct() {
        parent::__construct();
        // load model

        $this->load->model('Export_model', 'export');

    }

    // export xlsx|xls file
    public function index() {
        
        $data['title'] = 'Display Feedback Data';
        $data['feedbackInfo'] = $this->export->employeeList();
           
        // load view file for output
        $this->load->view('users/feedbacklist', $data);
    }
     // create xlsx
    public function createXLS() {


    // create file name
    $fileName = 'data-'.time().'.xlsx';  
    // load excel library
    $this->load->library('excel');
    $feedbackInfo = $this->export->employeeList();
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    // set Header
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'name');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'email');
    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'feedback1');
         
    // set Row
    $rowCount = 2;
    foreach ($feedbackInfo as $list) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->name);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->email);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->feedback1);
        
        $rowCount++;
    }
    $filename = "feedback". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output'); 

}
}
   

  




//       // create file name
//      $fileName = 'feedbackdata-' . time() . '.xls';
         
//   $this->load->library("excel");
//   $object = new PHPExcel();

//   $object->setActiveSheetIndex(0);

//   $table_columns = array("Name", "Email", "Feedback");

//   $column = 0;

//   foreach($table_columns as $field)
//   {
//    $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
//    $column++;
//   }

//   $feedbackInfo = $this->export->employeeList();

//   $excel_row = 2;


//   foreach($feedbackInfo as $row)
//   {
   

//    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
//    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->email);
//    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->feedback1);
//    $excel_row++;
//   }

//   $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
//         header('Content-Type: application/vnd.ms-excel');
//         header('Content-Disposition: attachment;filename="'.$fileName.'"');
//         $object_writer->save('php://output');
//  }
//     }
        


?>