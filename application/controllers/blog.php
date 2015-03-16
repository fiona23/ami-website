<?php

class Blog extends CI_Controller 
{
	function index()
	{
		$data['myName'] = "Bob";
		$data['head'] = "'s Blog!";
		$data['todo'] = array('eat','sleep','call');

		$this->load->view('blog_view',$data);
	}



	function hello(){
		echo 'Hello Bob!';
	}
}

?>
