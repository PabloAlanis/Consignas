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
        //cargo ion_auth from third party
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library('ion_auth');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
        //
	}
	
	public function index( $path_1=null, 
						   $path_2=NULL, 
						   $path_3=NULL, 
						   $path_4=NULL, 
						   $path_5=NULL )   
	{

		//bloque ion_auth
        if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}
		else
		{
            $data = array();
            
			$data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$data['users'] = $this->ion_auth->users()->result();
			
			//USAGE NOTE - you can do more complicated queries like this
			//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

            //aca redirecciono al controlador cidx con la data del login
            //$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $this->data);
            //$this->session->flashdata($data);
            $data['x'] = $this->ion_auth->user()->row();
            //controlador
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