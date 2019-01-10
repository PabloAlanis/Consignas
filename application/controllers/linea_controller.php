<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linea_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('linea_model');
	}
	
	public function index( $path_1=null, 
						   $path_2=NULL, 
						   $path_3=NULL, 
						   $path_4=NULL, 
						   $path_5=NULL )   
	{

		$data = array();
		$data[ 'assets' ] = $this->assets;
		if ( FALSE == has_text( $path_1 ) ) {

			$path_1 = 'linea_view';
		}
        //carga de las lineas BD
        $all_lineas = $this->linea_model->get_lineas();   
        $data['lineas'] = $all_lineas;
        //
		$data['path'] = $path_1;
		// load dashboard
		$data['content'] = $this->load->view( $path_1, $data, TRUE);
		$this->load->view( 'base', $data);
		return;
    }
      
}



