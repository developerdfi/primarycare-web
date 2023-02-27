<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');
	}

	public function main(){
		$this->load->view('body/login');
	}

	public function login(){
		$userName = $this->input->post('userName');
        $password = $this->input->post('password');
        $userAgent = $this->input->post('userAgent');
        $sessionRefCode = $this->input->post('sessionRefCode');
		$language = $this->input->post('language');
		$body_param = array(
			'userName' => $userName,
			'password' => $password,
			'userAgent' => $userAgent,
			'sessionRefCode' => $sessionRefCode,
			'language' => $language,
		);
		$url = 'login';
		$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
		$ret =[];
		$data = $res["data"];
		if($data["responseCode"]!=null && $data["responseCode"]=="0000"){
			$this->session->set_userdata('userId', $data["userId"]);
			$this->session->set_userdata('userLevel', $data["userLevelId"]);
			$this->session->set_userdata('sessionId', $data["sessionId"]);
			$this->session->set_userdata('userName', $data["userName"]);
			$ret["code"] = $data["responseCode"];
			$ret["data"] = "complete";
		}else{
			$ret["code"] = $data["responseCode"] ? $data["responseCode"] : $res["code"];
			$ret["data"] = "fail";
		}
        echo json_encode($ret);
	}

	public function logout(){
		if(!isset($_SESSION["sessionId"])){
			$this->load->view('body/login');
		}else{
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
			$url = 'logout';
			$res = $this->Login_model->getAPIResource($url, 'POST' , $body_param);
			$ret =[];
			$data = $res["data"];
			if($data["responseCode"]!=null && $data["responseCode"]=="0000"){
				$this->session->unset_userdata('userId');
				$this->session->unset_userdata('userLevel');
				$this->session->unset_userdata('userName');
				$this->session->unset_userdata('sessionId');
				$ret["code"] = $data["responseCode"];
				$ret["data"] = "complete";
				$this->load->view('body/login');
			}else{
				$ret["code"] = $data["responseCode"] ? $data["responseCode"] : $res["code"];
				$ret["data"] = "fail";
			}
		}
	}
}
