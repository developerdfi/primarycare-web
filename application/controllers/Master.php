<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');
	}

	public function sysMaster(){
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
		$url = 'master/bpSys';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["bloodPressureSysList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function diaMaster(){
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
		$url = 'master/bpDia';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["bloodPressureDiaList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function pulMaster(){
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
		$url = 'master/pulse';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["pulseList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function sugarMaster(){
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
		$url = 'master/glucose';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["glucoseList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function cholMaster(){
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
		$url = 'master/cholesterol';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["cholesterolList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function sessionMaster(){
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
		$url = 'master/session';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["sessionList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function provinceMaster(){
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
		$url = 'master/province';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["provinceList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function districtMaster($provinceId=0){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		if($provinceId>0){
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
				'provinceId' => $provinceId
			);
		}else{
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
			);
		}
		$url = 'master/district';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["districtList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function subDistrictMaster($provinceId=0, $districtId=0){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		if($provinceId>0 && $districtId>0){
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
				'provinceId' => $provinceId,
				'districtId' => $districtId
			);
		}else{
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
			);
		}
		$url = 'master/subDistrict';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["subDistrictList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}
}
