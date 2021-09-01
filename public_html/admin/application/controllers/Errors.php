<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	
	private static $solapa = "errors";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
        $this->load->model('paginas_model');
	}

	public function error_404()
	{
		$this->load->view('errors/html/error_404');
	}
}
