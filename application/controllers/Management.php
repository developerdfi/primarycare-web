<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');
	}

	public function deviceList($tab=1){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$provinceList = $this->provinceMaster();
			$cardReaderList = $this->getCardReader();
			$gluList = $this->getGlucoseList(0,1000,false);
			$bpList = $this->getBpList(0,1000,false);
			$spo2List = $this->getSpo2List(0,1000,false);
			$weightList = $this->getWeightList(0,1000,false);
			$weightHeightList = $this->getWeightHeightList(0,1000,false);
			$tempList = $this->getTempList(0,1000,false);
			$data = [];
			$data["cardReaderList"] = $cardReaderList;
			$data["bpList"] = $bpList;
			$data["gluList"] = $gluList;
			$data["spo2List"] = $spo2List;
			$data["weightList"] = $weightList;
			$data["weightHeightList"] = $weightHeightList;
			$data["tempList"] = $tempList;
			$data["provinceList"] = $provinceList;
			$data["tab"] = $tab;
			$this->load->view('header/header');
			$this->load->view('body/deviceList', $data);
		}
	}

	public function staffList(){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$provinceList = $this->provinceMaster();
			$cardReaderList = $this->getCardReader();
			$data = [];
			$data["provinceList"] = $provinceList;
			$data["cardReaderList"] = $cardReaderList;
			$this->load->view('header/header');
			$this->load->view('body/staffList', $data);
		}
	}

	public function admin(){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
			$provinceList = $this->provinceMaster();
			$userLevelList = $this->getUserLevelMaster();
			$data = [];
			$data["provinceList"] = $provinceList;
			$data["userLevelList"] = $userLevelList;
			$this->load->view('header/header');
			$this->load->view('body/admin', $data);
		}
	}

	public function getCardReaderMaster($provinceId=0, $districtId=0, $subDistrictId=0, $hospitalId=0){
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
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospitalId' => $hospitalId,
		);
		$url = 'master/androidDevice';
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
        echo json_encode($ret);
	}

	public function getUserLevelMaster($selectSet=0, $selectLimit=1000){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'master/userLevel';
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

	public function getCardReader($selectSet=0, $selectLimit=1000){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'androidDevice/list';
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

	public function getStaffList($selectSet=0, $selectLimit=1000){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'volunteer/list';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			foreach($data["volunteerList"] as $index=>$staff){
				$body_param2 = array(
					'language' => $language,
					'userAgent' => $userAgent,
					'sessionId' => $sessionId,
					'userId' => $userId,
					'sessionRefCode' => $sessionRefCode,
					'volunteerId' => $staff["volunteerId"],
				);
				$url2 = 'volunteer/detail';
				$res2 = $this->Login_model->getAPIResource($url2, 'POST' , $body_param2);
				$data["volunteerList"][$index] = $res2["data"];
				$data["volunteerList"][$index]["volunteerId"] = $staff["volunteerId"];
			}
			$ret["data"] = $data;
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function getAdminList($selectSet=0, $selectLimit=1000){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'user/list';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			foreach($data["userList"] as $index=>$staff){
				$body_param2 = array(
					'language' => $language,
					'userAgent' => $userAgent,
					'sessionId' => $sessionId,
					'userId' => $userId,
					'sessionRefCode' => $sessionRefCode,
					'userCode' => $staff["userCode"],
				);
				$url2 = 'user/detail';
				$res2 = $this->Login_model->getAPIResource($url2, 'POST' , $body_param2);
				$res2["data"]["lastLogin"] = $staff["lastLogin"];
				$data["userList"][$index] = $res2["data"];
			}
			$ret["data"] = $data;
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function getBpList($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'bpDevice/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}

	public function getGlucoseList($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'gcDevice/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}

	public function getCardReaderList($selectSet=0, $selectLimit=1000){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'androidDevice/list';
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
		return $ret;
	}

	public function districtMaster($provinceId=null){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		if($provinceId!=null){
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

	public function subDistrictMaster($provinceId=null, $districtId=null){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		if($provinceId!=null && $districtId!=null){
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

	public function hospitalMaster($provinceId=null, $districtId=null, $subDistrictId=null){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
        $sessionRefCode = '20190219105321000';
		if($provinceId!=null && $districtId!=null){
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
				'provinceId' => $provinceId,
				'districtId' => $districtId,
				'subDistrictId' => $subDistrictId
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
		$url = 'master/hospital';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]=="0000"){
			$ret["code"] = $data["responseCode"];
			$ret["data"] = $data["hospitalList"];
		}else{
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function addCardReader(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$bpDeviceId = $this->input->post('bpDeviceId');
		$glucoseDeviceId = $this->input->post('glucoseDeviceId');
		$spo2DeviceId = $this->input->post('spo2DeviceId');
		$tempDeviceId = $this->input->post('tempDeviceId');
		$weightDeviceId = $this->input->post('weightDeviceId');
		$weightHeightDeviceId = $this->input->post('weightHeightDeviceId');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		if($bpDeviceId!=""){
			$body_param["bpDeviceId"] = $bpDeviceId;
		}
		if($glucoseDeviceId!=""){
			$body_param["glucoseDeviceId"] = $glucoseDeviceId;
		}
		if($spo2DeviceId!=""){
			$body_param["spo2DeviceId"] = $spo2DeviceId;
		}
		if($tempDeviceId!=""){
			$body_param["tempDeviceId"] = $tempDeviceId;
		}
		if($weightDeviceId!=""){
			$body_param["weightDeviceId"] = $weightDeviceId;
		}
		if($weightHeightDeviceId!=""){
			$body_param["scaleDeviceId"] = $weightHeightDeviceId;
		}
		$url = 'androidDevice/add';
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
        echo json_encode($ret);
	}

	public function updateCardReader(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$bpDeviceId = $this->input->post('bpDeviceId');
		$glucoseDeviceId = $this->input->post('glucoseDeviceId');
		$spo2DeviceId = $this->input->post('spo2DeviceId');
		$tempDeviceId = $this->input->post('tempDeviceId');
		$weightDeviceId = $this->input->post('weightDeviceId');
		$weightHeightDeviceId = $this->input->post('weightHeightDeviceId');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'bpDeviceId' => $bpDeviceId,
			'glucoseDeviceId' => $glucoseDeviceId,
			'spo2DeviceId' => $spo2DeviceId,
			'tempDeviceId' => $tempDeviceId,
			'weightDeviceId' => $weightDeviceId,
			'scaleDeviceId' => $weightHeightDeviceId,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'androidDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteCardReader(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'androidDevice/delete';
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
        echo json_encode($ret);
	}

	public function addBp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'bpDevice/add';
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
        echo json_encode($ret);
	}

	public function updateBp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'bpDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteBp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'bpDevice/delete';
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
        echo json_encode($ret);
	}

	public function addGlucose(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'gcDevice/add';
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
        echo json_encode($ret);
	}

	public function updateGlucose(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'gcDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteGlucose(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'gcDevice/delete';
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
        echo json_encode($ret);
	}

	public function addStaff(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$cid = $this->input->post('cid');
		$deviceId = $this->input->post('deviceId');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$mobileNo = $this->input->post('mobileNo');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$provinceId = $this->input->post('provinceId');
		$hospId = $this->input->post('hospId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'cid' => $cid,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'mobileNo' => $mobileNo,
		);
		$url = 'volunteer/add';
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
        echo json_encode($ret);
	}

	public function updateStaff(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$cid = $this->input->post('cid');
		$deviceId = $this->input->post('deviceId');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$mobileNo = $this->input->post('mobileNo');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$provinceId = $this->input->post('provinceId');
		$hospId = $this->input->post('hospId');
		$volunteerId = $this->input->post('volunteerId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'cid' => $cid,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'mobileNo' => $mobileNo,
			'volunteerId' => $volunteerId,
		);
		$url = 'volunteer/update';
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
        echo json_encode($ret);
	}

	public function deleteStaff(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$volunteerId = $this->input->post('volunteerId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'volunteerId' => $volunteerId,
		);
		$url = 'volunteer/delete';
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
        echo json_encode($ret);
	}

	public function addAdmin(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$userCode = $this->input->post('userCode');
		$password = $this->input->post('password');
		$displayName = $this->input->post('displayName');
		$userLevelId = $this->input->post('userLevelId');
		$userCid = $this->input->post('userCid');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$provinceId = $this->input->post('provinceId');
		$hospId = $this->input->post('hospId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'userCid' => $userCid,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'userCode' => $userCode,
			'password' => $password,
			'displayName' => $displayName,
			'userLevelId' => $userLevelId,
		);
		$url = 'user/add';
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
        echo json_encode($ret);
	}

	public function updateAdmin(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$userCode = $this->input->post('userCode');
		$password = $this->input->post('password');
		$displayName = $this->input->post('displayName');
		$userLevelId = $this->input->post('userLevelId');
		$userCid = $this->input->post('userCid');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$provinceId = $this->input->post('provinceId');
		$hospId = $this->input->post('hospId');

		if($password!=""){
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
				'userCid' => $userCid,
				'provinceId' => $provinceId,
				'districtId' => $districtId,
				'subDistrictId' => $subDistrictId,
				'hospId' => $hospId,
				'userCode' => $userCode,
				'password' => $password,
				'displayName' => $displayName,
				'userLevelId' => $userLevelId,
			);
		}else{
			$body_param = array(
				'language' => $language,
				'userAgent' => $userAgent,
				'sessionId' => $sessionId,
				'userId' => $userId,
				'sessionRefCode' => $sessionRefCode,
				'userCid' => $userCid,
				'provinceId' => $provinceId,
				'districtId' => $districtId,
				'subDistrictId' => $subDistrictId,
				'hospId' => $hospId,
				'userCode' => $userCode,
				'displayName' => $displayName,
				'userLevelId' => $userLevelId,
			);
		}
		$url = 'user/update';
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
        echo json_encode($ret);
	}

	public function deleteAdmin(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$userCode = $this->input->post('userCode');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'userCode' => $userCode,
		);
		$url = 'user/delete';
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
        echo json_encode($ret);
	}

	public function getAdminDetail($userCode){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$userCode = $userCode;
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'userCode' => $userCode,
		);
		$url = 'user/detail';
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

	public function getBpDetail($deviceId){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $deviceId;
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'gcDevice/detail';
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
		echo json_encode($ret);
	}

	public function getWeightList($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'weightDevice/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}

	public function getWeightHeightList($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'scaleDevice/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}

	public function getTempList($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'tempDevice/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}

	public function getSpo2List($selectSet=0, $selectLimit=1000, $jsonRet=true){
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
			'selectSet' => $selectSet,
			'selectLimit' => $selectLimit,
		);
		$url = 'spo2Device/list';
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
		if($jsonRet){
			echo json_encode($ret);
		}else{
			return $ret;
		}
	}
	
	public function addSpo2(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'spo2Device/add';
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
        echo json_encode($ret);
	}

	public function updateSpo2(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'spo2Device/update';
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
        echo json_encode($ret);
	}

	public function deleteSpo2(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'spo2Device/delete';
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
        echo json_encode($ret);
	}
	
	public function addWeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'weightDevice/add';
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
        echo json_encode($ret);
	}

	public function updateWeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'weightDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteWeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'weightDevice/delete';
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
        echo json_encode($ret);
	}
	
	public function addWeightHeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'scaleDevice/add';
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
        echo json_encode($ret);
	}

	public function updateWeightHeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'scaleDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteWeightHeight(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'scaleDevice/delete';
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
        echo json_encode($ret);
	}
	
	public function addTemp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'tempDevice/add';
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
        echo json_encode($ret);
	}

	public function updateTemp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$deviceName = $this->input->post('deviceName');
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$subDistrictId = $this->input->post('subDistrictId');
		$hospId = $this->input->post('hospId');
		$description = $this->input->post('descript');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
			'deviceName' => $deviceName,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subDistrictId' => $subDistrictId,
			'hospId' => $hospId,
			'description' => $description,
		);
		$url = 'tempDevice/update';
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
        echo json_encode($ret);
	}

	public function deleteTemp(){
		$language = "th";
		$userAgent = "googleChrome";
		$sessionId = $_SESSION['sessionId'];
		$userId = $_SESSION['userId'];
		$sessionRefCode = '20190219105321000';
		$deviceId = $this->input->post('deviceId');
		$body_param = array(
			'language' => $language,
			'userAgent' => $userAgent,
			'sessionId' => $sessionId,
			'userId' => $userId,
			'sessionRefCode' => $sessionRefCode,
			'deviceId' => $deviceId,
		);
		$url = 'tempDevice/delete';
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
        echo json_encode($ret);
	}

}
