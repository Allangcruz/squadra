<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function index()
	{
		$this->load->view('header', ['title' => 'Manter Sistema']);
		$this->load->view('side-bar');
		$this->load->view('sistema');
		$this->load->view('footer');
	}
}
