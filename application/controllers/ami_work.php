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
			if ( $this->input->post('name') != FALSE&&$this->input->post('email') != FALSE&&$this->input->post('cellphone') != FALSE &&$this->input->post('department') != FALSE)	
			{
				$data['para'] = "I get your form.";
				$data['title'] = "WORK";
				$id = $this->session->userdata('id');
				$bag = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'cellphone' => $this->input->post('cellphone'),
					'department' => $this->input->post('department')
				);
				$this->ami_model->updateById( $id, $bag );
				/*
				$this->session->unset_userdata("authenticated");
				$this->session->unset_userdata("name");
				$this->session->unset_userdata("level");
				$this->session->unset_userdata("id");
				*/
				$this->session->set_userdata("name",$this->input->post("name"));
				redirect("http://localhost/index.php/ami_work/mainpage","location");
				//update the databaselek
				//redirect("url","location");
			}
			$data['title'] = "WORK";
			/*
			$temp=array(
					$this->session->userdata('id'),
					array('cellphone','name','email','department')
				);
				$info = $this->ami_model->getInfoByIdSelect( $temp );
				$row = $info->row_array();
			$data['name']=$row['name'];
			$data['cellphone']=$row['cellphone'];
			$data['email']=$row['email'];
			$data['department']=$row['department'];
			*/
			//$this->load->view('ami/work/work1',$data);
			redirect("http://localhost/index.php/ami_work/mainpage","location");
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
					/*
					$data['wrong_pass'] = true;
					$this->load->view('ami/work/work3',$data);
					*/
					redirect("http://localhost/index.php/ami_work/mainpage","location");

				}
			}		
			else
			{
				redirect("http://localhost/index.php/ami_work/mainpage","location");
			}
		}
	}

	public function getNew() {  //work2
		$this->load->helper('url');
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
						if (!strcmp($state,"yes") )
						{
							$this->ami_model->add_member($row);	
							$this->ami_model->delete_newbie($row->id);
						}
						else if (!strcmp($state,"no") )
						{
							//delete from newbies
							$this->ami_model->delete_newbie($row->id);
						}
					}
				}	
				redirect("http://localhost/index.php/ami_work/mainpage","location");
				/*
				$query = $this->ami_model->getAllInfo();

				if ($query !== FALSE)
				{
					$data['query'] = $query;
					$this->load->view('ami/header',$data);
					$this->load->view('ami/work/work2',$data);
				}
				else
				{
					$this->load->view('ami/header',$data);
					$this->load->view('ami/work/work2_none');
				}
				*/		
			}
			else
			{	
				redirect("http://localhost/index.php/ami_work/mainpage","location");
				/*
				$this->load->view('ami/work/work2_none');
				$this->load->view('ami/work/work2_none');
				*/
			}
		}
	}

	public function deliverText()
	{
		$this->load->helper('url');
		if ($this->session->userdata('authenticated') === FALSE)
		{
			$this->load->view('ami/bug');	
		}
		else
		{
			if ( $this->input->post('select') != FALSE  ) // select the department, no members
			{
				
				$list = array();
				foreach ( $this->input->post('select') as $department )
				{
					var_dump($department);
					$temp_num=intval($department,10);
					var_dump($temp_num);
					$query = $this->ami_model->getIdNameByDepartment($temp_num);
					if ($query->num_rows() > 0)
						$list = array_merge($list, $query->result() );
				}
				$data['list'] = $list;
				$this->load->view("ami/work/work_4_one");
				$this->load->view("ami/work/work_4_two",$data);
				//$this->load->view("ami/work/work_4_end");
				//all needed id in $list
			}
			else if ( $this ->input->post('send') != FALSE && $this->input->post('message') != FALSE) //receivers are selected
			{
				//send text.
				$message = $this->input->post('message');
				var_dump($message);
				foreach ($this->input->post('send') as $receiver)
				{
					$this->ami_model->sendMessage($receiver,$message);
				}
				$this->load->view("ami/work/work_4_one");
				//$this->load->view("ami/work/work_4_end");			
			}
			else
			{
				$this->load->view("ami/work/work_4_one");
				//$this->load->view("ami/work/work_4_one");
				//$this->load->view("ami/work/work_4_end");
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
			$temp=array(
					$this->session->userdata('id'),
					array('cellphone','name','email','department')
				);
			$info = $this->ami_model->getInfoByIdSelect( $temp );
			$row = $info->row_array();
			$data['name']=$row['name'];
			$data['cellphone']=$row['cellphone'];
			$data['email']=$row['email'];
			$data['department']=$row['department'];
			$data['level']=$level;
			$this->load->view("ami/header",$data);
			$this->load->view("ami/work/work_frame",$data);
			$this->load->view("ami/work/work_1",$data);
			$this->load->view("ami/work/work_3",$data);
			if ( $this->session->userdata("level") == 0 )
			{
				$query = $this->ami_model->getAllInfo();
				$data['query'] = $query;
				if ($query != FALSE)
					$this->load->view("ami/work/work_2",$data);
				else
				{
					$this->load->view("ami/work/work_2_none");
				}
				//-------------------------------------------------------------------------------------
				/*
				if ( $this->input->post('select') != FALSE  ) // select the department, no members
				{
					$list = array();
					foreach ( $this->input->post('select') as $department )
					{
						var_dump($department);
						$temp_num=intval($department,10);
						var_dump($temp_num);
						$query = $this->ami_model->getIdNameByDepartment($temp_num);
						if ($query->num_rows() > 0)
							$list = array_merge($list, $query->result() );

					}
					$data['list'] = $list;
					$this->load->view("ami/work/work_4_one",$data);
					$this->load->view("ami/work/work_4_two",$data);
					$this->load->view("ami/work/work_4_end");
					//all needed id in $list
				}
				else if ( $this ->input->post('send') != FALSE && $this->input->post('message') != FALSE) //receivers are selected
				{
					//send text.
					$message = $this->input->post('message');
					var_dump($message);
					foreach ($this->input->post('send') as $receiver)
					{
						$this->ami_model->sendMessage($receiver,$message);
					}
					$this->load->view("ami/work/work_4_one");
					$this->load->view("ami/work/work_4_end");			
				}
				else
				{
					$this->load->view("ami/work/work_4_one");
					$this->load->view("ami/work/work_4_end");
				}
			//$this->load->view("ami/work/work_4",$data);
			*/
				$this->load->view("ami/work/work_4_one",$data);
			}

			$this->load->view("ami/footer",$data);

		}
				
	}

}

?>
