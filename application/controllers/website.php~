<?php

class Website extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('website_model');
	}

	public function view($page='homepage')
	{
		$data['title'] = ucfirst($page);	
		if (!strcmp($page,'register') )
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$config = array(
				array(
					'field'=>'name',
					'label'=>'Name',
					'rules'=>'required'
				),
					array(
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required'
				),
					array(
					'field'=>'grade',
					'label'=>'Grade',
					'rules'=>'required'
				),
					array(
					'field'=>'apartment',
					'label'=>'Apartment',
					'rules'=>'required'
				),
					array(
					'field'=>'cellphone',
					'label'=>'Cellphone',
					'rules'=>'required'
				)
			);
			$this->form_validation->set_rules($config);	
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header',$data);
				$this->load->view('pages/'.$page,$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				$this->website_model->add_member();	
				$data['members'] = $this->website_model->get_info();
				$this->load->view('templates/header',$data);
				$this->load->view('pages/homepage',$data);
				$this->load->view('templates/footer',$data);
			}
		}
		else if (!strcmp($page,'homepage'))
		{
			$data['members'] = $this->website_model->get_info();
		
			$this->load->view('templates/header',$data);
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer',$data);
		}
	}
}
?>
