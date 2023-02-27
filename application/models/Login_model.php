<?php
class Login_model extends CI_Model {

        public function __construct()
        {
        }

        public function getConfig(){
			$ret = array(
				'BASE_API_URL' => 'http://111.223.48.229:8080/smartMOPH/',
			);
			return $ret;
		}
		function getAPIResource($req_path , $method , $body_param) {
	
			$ch = curl_init();
			$RESOURCE_URI = 'http://111.223.48.229:8080/smartMOPH/'.$req_path;
			switch ($method) {
				case 'GET':
					curl_setopt($ch, CURLOPT_HTTPGET, 1);
					break;
				case 'POST':
					$_body_param = ($body_param != NULL ) ? json_encode($body_param): '';
					curl_setopt($ch, CURLOPT_POSTFIELDS, $_body_param);
					break;
				default:
					return FALSE;
					break;
			}
	
			$headers = array(
						'Content-Type: application/json; charset=UTF-8');
	
			curl_setopt($ch, CURLOPT_URL, $RESOURCE_URI);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$res = curl_exec($ch);
			// get http code
			$ret['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$ret['url'] = $RESOURCE_URI;
			$ret['body'] = $body_param;
			//get res
			$ret['data'] = json_decode($res, true);
	
			curl_close($ch); 
	
			return $ret;
		}
}
