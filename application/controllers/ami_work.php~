<?php

class Ami_work extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ami_model');
	}

	public function completeInfo() { //work1
		$this->load->helper('url');
		if ($this->session->userdata('authenticated') === FALSE)
		{
			$this->load->view('ami/bug');	
		}
		else
		{
			if ( $this->input->post('name') != FALSE )	
			{
				$data['para'] = "I get your form.";
				$data['title'] = "WORK";
				$id = $this->session->userdata('id');
				$bag = array(
					'name' => $this->input->post('name')	
				);
				$this->ami_model->updateById( $id, $bag );
				$this->session->unset_userdata("authenticated");
				$this->session->unset_userdata("name");
				$this->session->unset_userdata("level");
				$this->session->unset_userdata("id");
				redirect("http://localhost","location");
				//update the databaselek
				//redirect("url","location");
			}
			$data['title'] = "WORK";
			$this->load->view('ami/work/work1',$data);
		}
		
	}
	public function changePassword() { //work3
		$this->load->helper('url');
		$data['wrong_pass']=false;
		if ($this->session->userdata('authenticated') === FALSE)
		{
			$this->load->view('ami/bug');	
		}
		else
		{
			$data['name']=$this->session->userdata('name');
			if ($this->input->post("old") != FALSE && $this->input->post("new") != FALSE && $this->input->post("comfirmed") != FALSE)
			{
				$temp=array(
					$this->session->userdata('id'),
					array('password')
				);
				$info = $this->ami_model->getInfoByIdSelect( $temp );
				$row = $info->row_array();
				$password = $row['password'];
				if ( (!strcmp($password,$this->input->post('old'))) && ( !strcmp($this->input->post('new'),$this->input->post('comfirmed'))) )
				{
					//update db with new password, log out.
					$new_password=$this->input->post("new");
					$pass=array(
						'password' => $new_password
					);
					$this->ami_model->updateById($this->session->userdata('id'),$pass);
					$this->session->unset_userdata('authenticated');	
					$this->session->unset_userdata('name');	
					$this->session->unset_userdata('level');	
					$this->session->unset_userdata('id');
					redirect("http://localhost",'location');
					#$this->load->view('ami/bug');
				}
				else
				{
					//show error. Form to be filled again.
					$data['wrong_pass'] = true;
					$this->load->view('ami/work/work3',$data);
				}
			}		
			else
			{
				$this->load->view("ami/work/work3",$data);
			}
		}
	}

	public function getNew() {  //work2
		if ($this->session->userdata('authenticated') === FALSE)
		{
			$this->load->view('ami/bug');	
		}
		else
		{
			$query = $this->ami_model->getAllInfo();
			if ($query !== FALSE )
			{
				foreach ($query->result() as $row)
				{
					$state = $this->input->post($row->id);
					var_dump($state);
					if ( $state )
					{
						if (!strcmp($state,"yes"))
						{
							$this->ami_model->add_member($row);	
							$this->ami_model->delete_newbie($row->id);
						}
						else if (!strcmp($state,"no"))
						{
							//delete from newbies
							$this->ami_model->delete_newbie($row->id);
						}
					}
				}			
				$query = $this->ami_model->getAllInfo();
				if ($query !== FALSE)
				{
					$data['query'] = $query;
					$this->load->view('ami/work/work2',$data);
				}
				else
					$this->load->view('ami/work/work2_none');
					
			}
			else
			{
				$this->load->view('ami/work/work2_none');
			}
		}
	}

	public function deliverText() 
	{
		if ($this->session->userdata('authenticated') === FALSE )
		{
	
		}
		else
		{
			if ( $this->input->post('select') != FALSE)
			{
				$list = array();
				foreach ($this->input->post('select') as $department )
				{
					$query = $this->ami_model->getIdByDepartment($department);
					if ($query->num_rows() > 0)
						$list = array_merge($list, $query->result() );
				}
				$data['list'] = $list;
				$this->load->view("ami/work/work4",$data);
				//all needed id in $list
				
			}
		}

	}

	public function mainpage() 
	{
		#$this->load->library('Jquery');
		if ($this->session->userdata('authenticated') === FALSE )
		{
	
		}
		else
		{
			$name = $this->session->userdata('name');
			$level= $this->session->userdata('level');
			$data['name']=$name;
			if ( $level == 0 ) //have all options
			{
				$this->load->view("ami/work/work_frame",$data);
			}

		}
				
	}

}

?>
