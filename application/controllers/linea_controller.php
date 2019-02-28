<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linea_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('linea_model');
        $this->load->model('trabajo_model');
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

			$path_1 = 'linea/linea_view';
		}
        //carga de las lineas BD
        $all_lineas = $this->linea_model->get_lineas();   
        $data['lineas'] = $all_lineas;
        //cargo las autorizaciones abiertas
        $trabajos_abiertos = $this->trabajo_model->contar_trabajos_abiertos();   
        $data['trabajo_abiertos'] = $trabajos_abiertos;
        //
		$data['path'] = $path_1;
		// load dashboard
		$data['content'] = $this->load->view( $path_1, $data, TRUE);
		$this->load->view( 'base', $data);
		return;
    }

    /*
     * Adding a new linea
     */
    public function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreLinea' => $this->input->post('nombreLinea'),
				'abreviLinea' => $this->input->post('abreviLinea'),
				'obsLinea' => $this->input->post('obsLinea'),
            );
            
            $linea_id = $this->linea_model->add_linea($params);
            redirect('linea_controller');
        }
        else
        {            
            $data['_view'] = 'linea/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a linea
     */
    public function edit($idLinea)
    {   
        // check if the linea exists before trying to edit it
        $data['linea'] = $this->linea_model->get_linea($idLinea);
        
        if(isset($data['linea']['idLinea']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreLinea' => $this->input->post('nombreLinea'),
					'abreviLinea' => $this->input->post('abreviLinea'),
					'obsLinea' => $this->input->post('obsLinea'),
                );

                $this->linea_model->update_linea($idLinea,$params);            
                redirect('linea_controller');
            }
            else
            {
                $data['_view'] = 'linea/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La linea no existe.');
    } 

    /*
     * Deleting linea
     */
    public function remove($idLinea)
    {
        $linea = $this->linea_model->get_linea($idLinea);

        // check if the linea exists before trying to delete it
        if(isset($linea['idLinea']))
        {
            $this->linea_model->delete_linea($idLinea);
            redirect('linea_controller');
        }
        else
            echo ('Esta linea no existe.');
        $this->linea_model->delete_linea($idLinea);
    }
    
}



