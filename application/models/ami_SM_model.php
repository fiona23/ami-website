<?php
class Ami_SM_model extends CI_Model {

	const DB_NEWBIE = "newbie";
	const DB_MEMBERS = "members";

	public function __construct()
	{
		$this->load->database();
	}

	function sock($url,$query)
	{
		$data = "";
		$info=parse_url($url);
		$fp=fsockopen($info["host"],80,$errno,$errstr,30);
		if(!$fp){
			return $data;
		}
		$head="POST ".$info['path']." HTTP/1.0\r\n";
		$head.="Host: ".$info['host']."\r\n";
		$head.="Referer: http://".$info['host'].$info['path']."\r\n";
		$head.="Content-type: application/x-www-form-urlencoded\r\n";
		$head.="Content-Length: ".strlen(trim($query))."\r\n";
		$head.="\r\n";
		$head.=trim($query);
		$write=fputs($fp,$head);
		$header = "";
		while ($str = trim(fgets($fp,4096))) {
			$header.=$str;
		}
		while (!feof($fp)) {
			$data .= fgets($fp,4096);
		}
		return $data;
	}

	/**
	* 模板接口发短信
	* apikey 为云片分配的apikey
	* tpl_id 为模板id
	* tpl_value 为模板值
	* mobile 为接受短信的手机号
	*/
	function tpl_send_sms($apikey, $tpl_id, $tpl_value, $mobile){
		$url="http://yunpian.com/v1/sms/tpl_send.json";
		$encoded_tpl_value = urlencode("$tpl_value");
		$post_string="apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
		return sock_post($url, $post_string);
	}

	/**
	* 普通接口发短信
	* apikey 为云片分配的apikey
	* text 为短信内容
	* mobile 为接受短信的手机号
	*/
	function send_sms($apikey, $text, $mobile){
		$url="http://yunpian.com/v1/sms/send.json";
		$encoded_text = urlencode("$text");
		$post_string="apikey=$apikey&text=$encoded_text&mobile=$mobile";
		return sock($url, $post_string);
	}

	public function send_text($text,$phone)
	{
		$apikey ='19828e583b807551700746e84bc201b8';
		var_dump($phone);
		//$message['data'] = send_sms($apikey,$text,$mobile);
		//$this->response($message,200);
	}

	/*
	public function send_post(){
		$apikey ='19828e583b807551700746e84bc201b8';
		$mobile = $this->input->post('mobile', TRUE);
		$tpl_id = $this->input->post('tpl_id', TRUE);
		$tpl_value = $this->input->post('tpl_value', TRUE);
		$message['data'] = tpl_send_sms($apikey,$tpl_id,$tpl_value, $mobile);
		$this->response($message, 200);
	}
	*/

}
?>