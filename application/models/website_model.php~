<?php
class Website_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_info($name=FAlSE)
	{
		if ($name == FALSE)
		{
			$query = $this->db->get('members');
			return $query->result_array();
		}

		$query = $this->db->get_where('members',array('name'=>$name));
		return $query->row_array();
	}	
	public function add_member()
	{
		$data = array(
			'name'=>$this->input->post('name'),
			'gender'=>1,
			'email'=>$this->input->post('email'),
			'grade'=>$this->input->post('grade'),
			'apartment'=>$this->input->post('apartment'),
			'cellphone'=>$this->input->post('cellphone')
		);
		return $this->db->insert('members',$data);
	}
}
?>
