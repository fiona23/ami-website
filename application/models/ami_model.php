<?php
class Ami_model extends CI_Model {
	const DB_NEWBIE = "newbie";
	const DB_MEMBERS = "members";

	public function __construct()
	{
		$this->load->database();
	}


	public function updateById( $id, $bag )
	{
		$this->db->where('id',$id);
		return $this->db->update(self::DB_MEMBERS,$bag);
	}

	public function add_member( $row )//from newbie to member
	{
		$data = array(
			'email'=>$row->email,
			'name'=>$row->name,
			'password'=>$row->cellphone,
			'cellphone'=>$row->cellphone
		);	
		return $this->db->insert(self::DB_MEMBERS,$data);
	}

	public function delete_newbie($id)
	{
		return $this->db->delete(self::DB_NEWBIE,array('id'=>$id));
	}
	
	public function add_newbie()
	{
		$data = array(
			'email'=> $_POST['email'],
			'name'=> $_POST['name'],
			'cellphone'=> $_POST['cellphone']
		);
		return $this->db->insert(self::DB_NEWBIE,$data);
	}

	public function getAllInfo( )
	{
		$query = $this->db->get(self::DB_NEWBIE);
		if ($query->num_rows() == 0)
			return FALSE;
		else
			return $query;
	}
	
	public function check_email($new_email)
	{
		$query = $this->db->get_where(self::DB_NEWBIE,array('email'=>$new_email));
		if ($query->num_rows() ==  0)
		{
			return TRUE;
		}
		else
			return FALSE;
	}

	public function authenticate() 
	{
		$account = $this->input->post('account');
		$password= $this->input->post('password');
		$this->db->select('password');
		$query = $this->db->get_where(self::DB_MEMBERS,array('email'=>$account));
		if ($query->num_rows() == 0 )
			return FALSE;
		else
		{
			$row = $query->row();
			if (!strcmp($password,$row->password))
				return TRUE;
			else
				return FALSE;
		}
	}
	
	public function getInfoByEmailSelect( $data )
	{
		#var_dump($data);
		$email = $data[0];
		$num = count($data[1]);
		if ( $num != 0 )
		{
			$select = $data[1][0];
			for ($i = 1; $i < $num; $i++)
				$select = $select.",".$data[1][$i];
			$this->db->select( $select );
			$query=$this->db->get_where(self::DB_MEMBERS,array('email'=>$email));
			return $query;

		}
	}
	
	public function getInfoByIdSelect( $data )
	{
		$id= $data[0];
		$num = count($data[1]);
		if ( $num != 0 )
		{
			$select = $data[1][0];
			for ($i = 1; $i < $num; $i++)
				$select = $select.",".$data[1][$i];
			$this->db->select( $select );
			$query=$this->db->get_where(self::DB_MEMBERS,array('id'=>$id));
			return $query;

		}
	}
	public function getIdNameByDepartment( $department ) 
	{
		$temp = array("id","name");
		$this->db->select( $temp );
		$query = $this->db->get_where(self::DB_MEMBERS,array('department' => $department));
		return $query;
	}

//---------------------------------------------------------------------------------------------
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
		//var_dump($phone);
		//$message['data'] = $this->ami_model->send_sms($apikey,$text,$mobile);
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
//-----------------------------------------------------------------------------------

	public function sendMessage($receiver, $message) //$receiver is the id, get their cellphone and send message
	{
		$temp = array("name","cellphone");
	 	$this->db->select($temp);
	 	$query = $this->db->get_where(self::DB_MEMBERS, array('id'=>$receiver));
	 	if ($query->num_rows() > 0)
	 	{
	 		foreach ($query->result() as $row)
	 		{
	 			var_dump($row->cellphone);
	 			$this->ami_model->send_text($message, $row->cellphone);
	 		}
	 	}
	}
}

?>
