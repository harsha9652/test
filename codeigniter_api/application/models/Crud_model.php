<?php
class Crud_model extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "reimburstment_api";
    
    /*For checking Authorization*/
    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return false;
        }
    }

    public function getTable_details($table,$date="",$id=""){
        if (!empty($table)) {
            $this->db->order_by('id desc');
            $data_arr = array();
            if (!empty($id)) {
                $data_arr['id'] = $id;
                // $this->db->where('id', $date);
            }
            if (!empty($date)) {
                $data_arr['sel_month'] = $date;
                // $this->db->where('sel_month', $date);
            }
            $query = $this->db->get_where($table,$data_arr);
            return $query->result();
        } else {
            return false;
        }
        
    }

    

    public function createData($table='',$form_data=array()){
        // print_r($form_data);exit;
        if ((!empty($table)) && (!empty($form_data))) {

            $this->db->insert($table, $form_data);
            return ($this->db->affected_rows() != 1) ? false : true;
        } else {
            return false;
        }
        
    }

    public function getPurposes($id=''){
        if (!empty($id)) {
            $this->db->where('id', $id);
            $query = $this->db->get('purpose');
            $res = $query->result();
            if (empty($res)) {
                $purpose_data = array('name' => $id, 'created_at' => date("Y-m-d H:i:s"));
                $inst_res = $this->db->insert('purpose', $purpose_data);
                if ($inst_res) {
                    return $this->db->insert_id();
                } else {
                    return false;
                }
            }
        }
        
    }

    public function getmodes($id=''){
        if (!empty($id)) {
            $this->db->where('id', $id);
            $query = $this->db->get('mode');
            $res = $query->result();
            if (empty($res)) {
                $purpose_data = array('name' => $id, 'created_at' => date("Y-m-d H:i:s"));
                $inst_res = $this->db->insert('mode', $purpose_data);
                if ($inst_res) {
                    return $this->db->insert_id();
                } else {
                    return false;
                }
            }
        }
        
    }

}