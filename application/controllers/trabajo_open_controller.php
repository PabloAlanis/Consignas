<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajo_open_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('trabajo_model');
        $this->load->model('operario_model');
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

			$path_1 = 'trabajo/trabajo_view';
		}
        //carga de las lineas BD
        $all_trabajos = $this->trabajo_model->get_all_trabajo_abiertos();   
        $data['trabajo'] = $all_trabajos;
        //cuenta las autorizaciones de trabajo en total
        $contador_trabajos=$this->trabajo_model->contar_trabajos();
        $data['contador']=$contador_trabajos;
        //cuenta las autorizaciones de trabajo abiertas
        $contador_trabajos_abiertos=$this->trabajo_model->contar_trabajos_abiertos();
        $data['contador_abiertos']=$contador_trabajos_abiertos;
        //carga los select de operarios
        $all_operarios = $this->operario_model->get_operarios();   
        $data['operarios'] = $all_operarios;
        //
        $trabajos_abiertos = $this->trabajo_model->contar_trabajos_abiertos();   
        $data['trabajo_abiertos'] = $trabajos_abiertos;
        //carga el select de lineas
        $all_lineas = $this->linea_model->get_all_linea();   
        $data['linea'] = $all_lineas;
        //
		$data['path'] = $path_1;
		// load dashboard
		$data['content'] = $this->load->view( $path_1, $data, TRUE);
		$this->load->view( 'base', $data);
		return;
    }
    

}