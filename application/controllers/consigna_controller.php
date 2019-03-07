<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consigna_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('trabajo_model');
        $this->load->model('operario_model');
        $this->load->model('linea_model');
        $this->load->model('consigna_model');
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

			$path_1 = 'consigna/consigna_view';
		}
        //carga de las consignas
        $all_consignas = $this->consigna_model->get_all_consigna();   
        $data['consigna'] = $all_consignas;
        //
        $all_trabajos = $this->trabajo_model->get_all_trabajo();   
        $data['trabajo'] = $all_trabajos;
        //cuenta las autorizaciones de trabajo en total
        $contador_trabajos=$this->trabajo_model->contar_trabajos();
        $data['contador']=$contador_trabajos;
        //cuenta las consignas en total
        $contador=$this->consigna_model->contar_consignas();
        $data['contador_consignas']=$contador;
        //cuenta las autorizaciones de trabajo abiertas
        $contador_trabajos_abiertos=$this->trabajo_model->contar_trabajos_abiertos();
        $data['contador_abiertos']=$contador_trabajos_abiertos;
        //carga los select de operarios
        $all_operarios = $this->operario_model->get_operarios();   
        $data['operarios'] = $all_operarios;
        //cargo las consignas abiertas
        $consigna_abiertos = $this->consigna_model->contar_consigna_abiertos();   
        $data['consigna_abiertos'] = $consigna_abiertos;
        //
        //cargo las autorizaciones abiertas
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
    
    /*
     * Adding a new consigna
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'idConsigna' => $this ->input->post('idConsigna'),
				'horaInicioConsigna' => $this->input->post('horaInicioConsigna'),
				'horaFinConsigna' => null,
				'responsableConsigna' => $this->input->post('responsableConsigna'),
				'operadorConsigna' => $this->input->post('operadorConsigna'),
				'descripcionConsigna' => $this->input->post('descripcionConsigna'),
            );
            
            $consigna_id = $this->consigna_model->add_consigna($params);
            redirect('consigna_controller');
        }
        else
        {            
            $data['_view'] = 'consigna/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a consigna
     */
    function edit($idConsigna)
    {   
        // check if the consigna exists before trying to edit it
        $data['consigna'] = $this->Consigna_model->get_consigna($idConsigna);
        
        if(isset($data['consigna']['idConsigna']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'idConsigna' => $this ->input->post('idConsigna'),
					'horaInicioConsigna' => $this->input->post('horaInicioConsigna'),
					'horaFinConsigna' => date("Y/m/d G:i:h"),
					'responsableConsigna' => $this->input->post('responsableConsigna'),
					'operadorConsigna' => $this->input->post('operadorConsigna'),
					'descripcionConsigna' => $this->input->post('descripcionConsigna'),
                );

                $this->consigna_model->update_consigna($idConsigna,$params);            
                redirect('consigna_controller');
            }
            else
            {
                $data['_view'] = 'consigna/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The consigna you are trying to edit does not exist.');
    } 

    /*
     * Deleting consigna
     
    function remove($idConsigna)
    {
        $consigna = $this->Consigna_model->get_consigna($idConsigna);

        // check if the consigna exists before trying to delete it
        if(isset($consigna['idConsigna']))
        {
            $this->Consigna_model->delete_consigna($idConsigna);
            redirect('consigna/index');
        }
        else
            show_error('The consigna you are trying to delete does not exist.');
    }*/
}