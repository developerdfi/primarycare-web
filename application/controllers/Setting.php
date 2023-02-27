<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');
	}

	public function index(){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$systolicList = $this->sysMaster();
			$diastolicList = $this->diaMaster();
			$pulseList = $this->pulMaster();
			$sugarList = $this->sugarMaster();
			$sessionList = $this->sessionMaster();
			$cholList = $this->cholMaster();
			$settingList = $this->getSetting();
			$data = [];
			$data["systolicList"] = $systolicList;
			$data["diastolicList"] = $diastolicList;
			$data["pulseList"] = $pulseList;
			$data["sugarList"] = $sugarList;
			$data["sessionList"] = $sessionList;
			$data["settingList"] = $settingList;
			$data["cholList"] = $cholList;
			$this->load->view('header/header');
			$this->load->view('body/setting', $data);
		}
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
        return $ret;
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
        return $ret;
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
        return $ret;
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
        return $ret;
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
        return $ret;
	}

	public function sessionMaster(){
		$language = "en";
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
        return $ret;
	}

	public function getSetting(){
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

	public function updateSetting(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		$sessionExpire = $this->input->post('sessionExpire');
		$pulseWarning = $this->input->post('pulseWarning');
		$pulseCritical = $this->input->post('pulseCritical');
		$bloodPressureDiaWarning = $this->input->post('bloodPressureDiaWarning');
		$bloodPressureDiaCritical = $this->input->post('bloodPressureDiaCritical');
		$bloodPressureSysWarning = $this->input->post('bloodPressureSysWarning');
		$bloodPressureSysCritical = $this->input->post('bloodPressureSysCritical');
		$glucoseWarning = $this->input->post('glucoseWarning');
		$glucoseCritical = $this->input->post('glucoseCritical');
		$cholesterolWarning = $this->input->post('cholesterolWarning');
		$cholesterolCritical = $this->input->post('cholesterolCritical');

		$body_param = array(
			'userId' => $userId,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'sessionRefCode' => $sessionRefCode,
			'sessionExpire' => $sessionExpire,
			'pulseWarning' => $pulseWarning,
			'pulseCritical' => $pulseCritical,
			'bloodPressureDiaWarning' => $bloodPressureDiaWarning,
			'bloodPressureDiaCritical' => $bloodPressureDiaCritical,
			'bloodPressureSysWarning' => $bloodPressureSysWarning,
			'bloodPressureSysCritical' => $bloodPressureSysCritical,
			'glucoseWarning' => $glucoseWarning,
			'glucoseCritical' => $glucoseCritical,
			'cholesterolWarning' => $cholesterolWarning,
			'cholesterolCritical' => $cholesterolCritical,
			'language' => $language,
		);
		$url = 'setting/update';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]!=null && $data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "complete";
		}else{
			$ret["code"] = $data["responseCode"] ? $data["responseCode"] : $res["code"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}
}
