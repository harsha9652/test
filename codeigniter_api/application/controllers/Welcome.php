<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');

    }

	public function index()
	{
        // $data = array();
	}
	// Insert new data member to database
	public function insert_data()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->crud_model->check_auth_client();
			if($check_auth_client == true){ 
				// echo "Harsha";exit;
				/*
					** 1 => Conveyance, 2 => Hotel, 3 => Food, 4 => Mobile, 5 => Internet**
				*/
				$table_name = '';
				$insert_data = array();
				$category = $this->input->post('category');
				if((!empty($category)) && $category == 1) {
					$table_name = 'tbl_conveyance';

					$path = 'assets/uploads/';
		            $config['upload_path'] = $path;
		            $config['allowed_types'] = '*';
		            $config['remove_spaces'] = TRUE;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);            
		            if (!$this->upload->do_upload('attachment')) {
		                $error = array('error' => $this->upload->display_errors());
		            } else {
		                $data = array('upload_data' => $this->upload->data());
		            }
		            $purpose = $mode = 0;
		            if (!empty($this->input->post('purpose'))) {
		            	$res_purpose = $this->crud_model->getPurposes($this->input->post('purpose'));
		            	if($res_purpose) {
		            		$purpose = $res_purpose;
		            	}
		            } else {
		            	echo json_encode(array('status' => false, 'msg'=>"Purpose Cannot be Null."));exit;
		            }

		            if (!empty($this->input->post('mode'))) {
		            	$res_mode = $this->crud_model->getmodes($this->input->post('mode'));
		            	if($res_mode) {
		            		$mode = $res_mode;
		            	}
		            } else {
		            	echo json_encode(array('status' => false, 'msg'=>"Mode Cannot be Null."));exit;
		            }

					$insert_data = array(
						'from_date' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('from_date'), '/', '-'))),
						'to_date' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('to_date'), '/', '-'))),
						'sel_month' => date("Y-m-d", strtotime(strtr($this->input->post('sel_month'), '/', '-'))),
						'purpose' => $purpose,
						'mode' => $mode,
						'km' => $this->input->post('km'),
						'inv_no' => $this->input->post('inv_no'),
						'amount' => $this->input->post('amount'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified_at' => date("Y-m-d H:i:s"),

					);
					if(empty($error)){
						$insert_data['attachment'] = $data['upload_data']['file_name'];
					}
				} else if((!empty($category)) && $category == 2) {
					$table_name = 'tbl_hotel';
					
					$path = 'assets/uploads/';
		            $config['upload_path'] = $path;
		            $config['allowed_types'] = '*';
		            $config['remove_spaces'] = TRUE;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);            
		            if (!$this->upload->do_upload('attachment')) {
		                $error = array('error' => $this->upload->display_errors());
		            } else {
		                $data = array('upload_data' => $this->upload->data());
		            }
					$insert_data = array(
						'from_date' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('from_date'), '/', '-'))),
						'to_date' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('to_date'), '/', '-'))),
						'sel_month' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('sel_month'), '/', '-'))),
						'hotel_name' => $this->input->post('hotel_name'),
						'inv_no' => $this->input->post('inv_no'),
						'amount' => $this->input->post('amount'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified_at' => date("Y-m-d H:i:s"),

					);
					if(empty($error)){
						$insert_data['attachment'] = $data['upload_data']['file_name'];
					}
				} else if((!empty($category)) && $category == 3) {
					$table_name = 'tbl_food';
					
					$path = 'assets/uploads/';
		            $config['upload_path'] = $path;
		            $config['allowed_types'] = '*';
		            $config['remove_spaces'] = TRUE;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);            
		            if (!$this->upload->do_upload('attachment')) {
		                $error = array('error' => $this->upload->display_errors());
		            } else {
		                $data = array('upload_data' => $this->upload->data());
		            }
					$insert_data = array(
						'sel_month' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('sel_month'), '/', '-'))),
						'inv_no' => $this->input->post('inv_no'),
						'amount' => $this->input->post('amount'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified_at' => date("Y-m-d H:i:s"),

					);
					if(empty($error)){
						$insert_data['attachment'] = $data['upload_data']['file_name'];
					}
				} else if((!empty($category)) && $category == 4) {
					$table_name = 'tbl_mobile';
					
					$path = 'assets/uploads/';
		            $config['upload_path'] = $path;
		            $config['allowed_types'] = '*';
		            $config['remove_spaces'] = TRUE;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);            
		            if (!$this->upload->do_upload('attachment')) {
		                $error = array('error' => $this->upload->display_errors());
		            } else {
		                $data = array('upload_data' => $this->upload->data());
		            }
					$insert_data = array(
						'sel_month' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('sel_month'), '/', '-'))),
						'inv_no' => $this->input->post('inv_no'),
						'amount' => $this->input->post('amount'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified_at' => date("Y-m-d H:i:s"),

					);
					if(empty($error)){
						$insert_data['attachment'] = $data['upload_data']['file_name'];
					}
				} else if((!empty($category)) && $category == 5) {
					$table_name = 'tbl_internet';
					
					$path = 'assets/uploads/';
		            $config['upload_path'] = $path;
		            $config['allowed_types'] = '*';
		            $config['remove_spaces'] = TRUE;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);            
		            if (!$this->upload->do_upload('attachment')) {
		                $error = array('error' => $this->upload->display_errors());
		            } else {
		                $data = array('upload_data' => $this->upload->data());
		            }
					$insert_data = array(
						'sel_month' => date("Y-m-d H:i:s", strtotime(strtr($this->input->post('sel_month'), '/', '-'))),
						'inv_no' => $this->input->post('inv_no'),
						'amount' => $this->input->post('amount'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified_at' => date("Y-m-d H:i:s"),

					);
					if(empty($error)){
						$insert_data['attachment'] = $data['upload_data']['file_name'];
					}
				}
				if ((!empty($table_name)) && (!empty($insert_data))) {
					// print_r($table_name);
					// print_r($insert_data);exit;
					$res = $this->crud_model->createData($table_name,$insert_data);
					if ($res) {
						echo json_encode(array('status' => true,'msg' => "Record created succesfully."));
					} else {
						echo json_encode(array('status' => false,'msg' => "Some thing went at database please try again later."));
					}
				} else {
					echo json_encode(array('status' => false,'msg' => "Some thing went at database please try again later."));
				}
			} else {
				echo json_encode(array('status' => false,'message' => 'Unauthorized request.'));
			}
			
		}		
	}

	public function get_data()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->crud_model->check_auth_client();
			if($check_auth_client == true){ 
				// echo $category;exit;
				$category = $_GET['category'];
				$date = isset($_GET['date'])? $_GET['date']: '';
				$id = isset($_GET['id'])? $_GET['id']: '';
				// echo  $id;exit;
				if (!empty($category)) {
					$sel_date = $res_id = '';
					if (!empty($date)) {
						$sel_date = date("Y-m-d", strtotime(strtr($date, '/', '-')));
					}

					if (!empty($id)) {
						$res_id = $id;
					}
					$table = '';
					switch ($category) {
						case '1':
							$table = 'tbl_conveyance';
							break;
						case '2':
							$table = 'tbl_hotel';
							break;
						case '3':
							$table = 'tbl_food';
							break;
						case '4':
							$table = 'tbl_mobile';
							break;
						case '5':
							$table = 'tbl_internet';
							break;
						
						default:
							$table = '';
							break;
					}
					// echo $res_id;exit;
					$res = $this->crud_model->getTable_details($table,$sel_date,$res_id);
					if (!empty($res)) {
						echo json_encode($res);exit;
					} else {
						echo json_encode(array('msg' => 'Data Not Avilable'));
					}
					//print_r($res);exit;
				}
			} else {
				echo json_encode(array('status' => false,'message' => 'Unauthorized request.'));
			}			
		}
	}
}
