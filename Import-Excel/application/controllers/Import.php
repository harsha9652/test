<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Import extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Import_model', 'import');
        $this->load->helper(array('url','html','form'));
    }    
 
    public function index() {
        $this->importFile();
    }
 
    public function importFile(){
  
      if ($this->input->post('submit')) {
              require_once APPPATH . "/third_party/PHPExcel.php";
                $data = array();
                $path = 'assets/uploads/';
                
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                      $import_xls_file = $data['upload_data']['file_name'];
                  } else {
                      $import_xls_file = 0;
                  }
                $inputFileName = $path . $import_xls_file;
                // echo $inputFileName;exit;
                try {
                  $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);
                  $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                  $flag = true;
                  $i=0;
                  // echo "<pre>";
                  // print_r($allDataInSheet);exir;
                  $date = $employee_id = $working_type = $start = $end = $store_id = "";
                  foreach ($allDataInSheet as $value) {
                    if($flag){
                      $flag =false;
                      continue;
                    }
                    $date = !empty($value['A'])?date("Y-m-d", strtotime($value['A'])): '';
                    $employee_id = !empty($value['B'])? $value['B']: '';
                    $working_type = !empty($value['D'])? $value['D']: '';
                    $start = !empty($value['E'])? $value['E']: '';
                    $end = !empty($value['F'])? $value['F']: '';
                    $store_id = !empty($value['G'])? $value['G']: '';

                    $inserdata[$i]['date'] = !empty($value['A'])?date("Y-m-d", strtotime($value['A'])): '';
                    $inserdata[$i]['employee_id'] = !empty($value['B'])? ($value['B']):'';
                    $inserdata[$i]['name'] = !empty($value['C'])? ($value['C']):'';
                    $inserdata[$i]['working_type'] = !empty($value['D'])? ($value['D']):'';
                    $inserdata[$i]['start'] = !empty($value['E'])? ($value['E']):'';
                    $inserdata[$i]['end'] = !empty($value['F'])? ($value['F']):'';
                    $inserdata[$i]['store_id'] = !empty($value['G'])? ($value['G']):'';
                    $inserdata[$i]['store_name'] = !empty($value['H'])? ($value['H']):'';
                    $i++;
                  }
                  //print_r($inserdata);exit;
                  if  (empty($date) || empty($employee_id) || empty($working_type) || empty($start) || empty($end) || empty($store_id)) {
                      //echo "Fields error !";
                      $data['response'] = 'Import failed! Ensure all required fields are filled properly and please check format and try again.';
                      $data['res_type'] = 'danger';
                  } else {
                      $result = $this->import->importData($inserdata);   
                      if($result){
                        $data['response'] = 'Imported successfully.';
                        $data['res_type'] = 'success';
                        //echo "Imported successfully";
                      }else{
                        $data['response'] = 'Import failed!';
                        $data['res_type'] = 'danger';
                      } 
                  }             
                                
                } catch (Exception $e) {
                  $data['response'] = 'Import failed!';
                  $data['res_type'] = 'danger';
                  /*die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                              . '": ' .$e->getMessage());*/
                }
              }else{
                  $data['response'] = 'Import failed! as error at upload..!';
                  $data['res_type'] = 'danger';
                  //echo $error['error'];
              }
                 
          $this->load->view('import',$data);         
        } else {
            $this->load->view('import'); 
        }
        
    }
     
}
?>