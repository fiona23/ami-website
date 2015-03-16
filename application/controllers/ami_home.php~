<?php

class Ami_home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ami_model');
	}

	public function logout() {
		$this->load->helper('url');
		$this->session->unset_userdata('authenticated');	
		$this->session->unset_userdata('name');	
		$this->session->unset_userdata('level');	
		$this->session->unset_userdata('id');
		redirect("http://localhost",'location');
	}
	public function homepage() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$dom = simplexml_load_file("./xml/ami_projects.xml");
		$data['dom']=$dom;
		$data['title']='AMI-Homepage';
		$data['email_taken']=FALSE;
		$data['success'] = FALSE;

		//user not login in, display login block
		if ($this->session->userdata('authenticated') === FALSE )
		{
			/*
			 * home/display shows static projects	
			 * home/signup shows the register form
			 * */
			if ($this->input->post('name') != FALSE && $this->input->post('cellphone') != FALSE && $this->input->post('email') != FALSE ) 
			{
				//the validation can be put in JS.
				$name = $_POST['name'];
				$cellphone= $_POST['cellphone'];
				$email	= $_POST['email'];
				//check database.
				//if registered before, deny. Or, insert.	
				if ($this->ami_model->check_email($email))
				{
					$this->ami_model->add_newbie();
					$data['success']=TRUE;
				}
				else
				{
					$data['email_taken']=TRUE;
				}
			}
			$this->load->view('ami/header',$data);
			$this->load->view('ami/upright_login',$data);	
			$this->load->view('ami/home/display',$data);
			$this->load->view('ami/home/signup',$data);
			$this->load->view('ami/footer',$data);
		}
		//user already login in
		else
		{
			$name=$this->session->userdata('name');
			$level=$this->session->userdata('level');
			$data['name'] = $name;
			$data['level'] = $level;
			#$this->load->view('ami/working',$data);
			$this->load->view('ami/header',$data);
			$this->load->view('ami/upright_logined',$data);	
			$this->load->view('ami/home/display',$data);
			#$this->load->view('ami/home/signup',$data);
			$this->load->view('ami/footer',$data);
		}
	}
	
	//member login 
	public function login() {
		$this->load->helper('url');
		$data['title']="Login";
		$data['old_account']='NONE';
		//form is filled. Means login in.
		if ($this->input->post('account') != FALSE && $this->input->post('password') != FALSE)
		{
			//check whether it matches.	
			if ( $this->ami_model->authenticate() )
			{
				$temp=array(
					$_POST['account'],
					array('name','level','id')
				);
				$info=$this->ami_model->getInfoByEmailSelect($temp);
				$row = $info->row_array();
				$name = $row['name'];
				$level = $row['level'];
				$id = $row['id'];
				$this->session->set_userdata('authenticated',TRUE);
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('name',$name);
				$this->session->set_userdata('level',$level);
				redirect("http://localhost/",'location');
			}
			else
			{
				$data['old_account']=$this->input->post('account');
				$this->load->view('ami/login/login_form',$data);
			}
				
		}
		//form waits to be filled.
		else
		{
			$this->load->view('ami/login/login_form',$data);
		}
	}
}

?>
