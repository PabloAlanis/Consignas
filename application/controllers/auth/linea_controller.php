<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linea_controller extends CI_Controller
{
	public function __construct()
	{
        //$this->load->helper('url');
		parent::__construct();
        //$this->load->model('linea_model');
	}
	
	public function index()
	{
        $all_lineas = $this->linea_model->get_lineas();
        $data = array();   
        $data['lineas'] = $all_lineas;
        $this->load->view('linea_view', $lineas);
    }
      
}
