<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajo_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('trabajo_model');
        $this->load->model('operario_model');
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
        $all_trabajos = $this->trabajo_model->get_all_trabajo();   
        $data['trabajo'] = $all_trabajos;
        //
		$data['path'] = $path_1;
		// load dashboard
		$data['content'] = $this->load->view( $path_1, $data, TRUE);
		$this->load->view( 'base', $data);
		return;
    }
    
    /*
     * Adding a new trabajo
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'idTrabajo' => $this ->input->post('idTrabajo'),
				'horaInicioTrabajo' => $this->input->post('horaInicioTrabajo'),
				'horaFinTrabajo' => $this->input->post('horaFinTrabajo'),
				'idConsigna' => $this->input->post('idConsigna'),
				'responsableTrabajo' => $this->input->post('responsableTrabajo'),
				'operadorTrabajo' => $this->input->post('operadorTrabajo'),
				'descripcionTrabajo' => $this->input->post('descripcionTrabajo'),
            );
            
            $trabajo_id = $this->trabajo_model->add_trabajo($params);
            redirect('trabajo_controller');
        }
        else
        {            
            $data['_view'] = 'trabajo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a trabajo
     */
    /*function edit($idTrabajo)
    {   
        // check if the trabajo exists before trying to edit it
        $data['trabajo'] = $this->Trabajo_model->get_trabajo($idTrabajo);
        
        if(isset($data['trabajo']['idTrabajo']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'horaInicioTrabajo' => $this->input->post('horaInicioTrabajo'),
					'horaFinTrabajo' => $this->input->post('horaFinTrabajo'),
					'idConsigna' => $this->input->post('idConsigna'),
					'responsableTrabajo' => $this->input->post('responsableTrabajo'),
					'operadorTrabajo' => $this->input->post('operadorTrabajo'),
					'descripcionTrabajo' => $this->input->post('descripcionTrabajo'),
                );

                $this->Trabajo_model->update_trabajo($idTrabajo,$params);            
                redirect('trabajo_controller/index');
            }
            else
            {
                $data['_view'] = 'trabajo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The trabajo you are trying to edit does not exist.');
    } */

    /*
     * Deleting trabajo
     *//*
    function remove($idTrabajo)
    {
        $trabajo = $this->Trabajo_model->get_trabajo($idTrabajo);

        // check if the trabajo exists before trying to delete it
        if(isset($trabajo['idTrabajo']))
        {
            $this->Trabajo_model->delete_trabajo($idTrabajo);
            redirect('trabajo_controller/index');
        }
        else
            show_error('The trabajo you are trying to delete does not exist.');
    }*/
}