<?php
class Vital_model extends CI_Model {

        public function __construct()
        {
        }

        public function getDistrict(){
			$language = "th";
			$userAgent = "googleChrome";
			$sessionId = $_SESSION['sessionId'];
			$userId = $_SESSION['userId'];
			$sessionRefCode = '20190219105321000';
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
			);
			$url = 'setting/get';
			$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
			$ret =[];
			$data = $res["data"];
			if($data["responseCode"]=="0000"){
				$ret["code"] = $data["responseCode"];
				$ret["data"] = $data;
			}else{
				$ret["code"] = $data["responseCode"];
				$ret["data"] = "fail";
			}
			return $ret;
		}
}

