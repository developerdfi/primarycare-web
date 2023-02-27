<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vital extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');
	}

	public function main(){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$this->load->view('header/header');
			$this->load->view('body/vital_main');
		}
	}

	public function detail($cid){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$data = [];
			$data["cid"] = $cid;
			$this->load->view('header/header');
			$this->load->view('body/vital_detail', $data);
		}
	}

	public function listPatient($startDate, $endDate,$cid=null, $districtId=null, $subDistrictId=null, $selectSet=0, $selectLimit=1000){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
        $selectSet = $selectSet;
        $selectLimit = $selectLimit;
        $cid = $cid;
        $districtId = $districtId;
        $subDistrictId = $subDistrictId;
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
			'startDate' => $startDate,
			'endDate' => $endDate
		);
		$url = 'history/list';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["historyList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function listPatientDetail($cid, $selectSet=0, $selectLimit=1000){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
        $selectSet = $selectSet;
        $selectLimit = $selectLimit;
        $cid = $cid;
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'cid' => $cid,
			'sessionRefCode' => $sessionRefCode,
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'history/detail';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["detailList"];
			$ret["name"] = $data["name"];
			$ret["total"] = $data["totalRow"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}
}
