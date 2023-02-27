<?php
class Vital_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }


        public function getVital(){
			$this->db->trans_start();
			$this->db->select('systolic, diastolic, pulse, sugar, vitalrecord.update_date as ltime, prefix, fname, lname');
			$this->db->join('patient', 'patient.patient_id = vitalrecord.patient_id', 'inner');
            $this->db->order_by('vitalrecord.update_date desc');
            $query = $this->db->get('vitalrecord');
			$result = $query->result_array();
			$this->db->trans_complete();
			$status = $this->db->trans_status();
			if($status==1){
				$res["data"] = $result;
				http_response_code(200);
			}else{
				$res["error"] = $status;
				http_response_code(500);
			}
			header('Content-Type: application/json');
			echo str_replace('\\/', '/', strip_tags( json_encode( $res ) ) );
        }

        public function saveVital($systolic, $diastolic, $pulse, $chol, $sugar, $thisUser, $patientId){
            $thisDate = date("Y-m-d H:i:s");

            $data = array(
                    'systolic' => $systolic,
                    'diastolic' => $diastolic,
                    'pulse' => $pulse,
                    'cholesterol' => $chol,
                    'sugar' => $sugar,
                    'create_by' => $thisUser,
                    'update_by' => $thisUser,
                    'create_date' => $thisDate,
                    'patient_id' => $patientId,
                    'update_date' => $thisDate
            );
            $query = $this->db->insert('vitalrecord', $data);
			$insert_id = $this->db->insert_id();
		 
			if($insert_id>0){
				http_response_code(200);
				$res = $data;
			}else{
				$res["error"] = $this->db->error();
				http_response_code(404);
			}
			header('Content-Type: application/json');
			echo str_replace('\\/', '/', strip_tags( json_encode( $res ) ) );
        }

        public function editVital($systolic, $diastolic, $pulse, $chol, $sugar, $thisUser, $thisVitalId, $finish){
            $thisDate = date("Y-m-d H:i:s");

            $data = array(
                    'systolic' => $systolic,
                    'diastolic' => $diastolic,
                    'pulse' => $pulse,
                    'chol' => $chol,
                    'sugar' => $sugar,
                    'finish' => $finish,
                    'update_by' => $thisUser,
                    'update_date' => $thisDate
			);
			$this->db->trans_start();
            $this->db->where('id', $thisVitalId);
            $query = $this->db->update('vitalrecord', $data);
			$this->db->trans_complete();
			$status = $this->db->trans_status();
			if($status==1){
				http_response_code(200);
				$res["data"] = 'complete';
			}else{
				$res["error"] = $status;
				http_response_code(500);
			}
			header('Content-Type: application/json');
			echo str_replace('\\/', '/', strip_tags( json_encode( $res ) ) );
        }
}
