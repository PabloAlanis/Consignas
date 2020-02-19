<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operario_controller extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('operario_model');
        $this->load->model('trabajo_model');
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
            //$data = array();
            $data[ 'assets' ] = $this->assets;
            if ( FALSE == has_text( $path_1 ) ) {

                $path_1 = 'operario/operario_view';
            }
            //carga de las lineas BD
            $all_operarios = $this->operario_model->get_operarios();
            $data['operarios'] = $all_operarios;
            $count_operarios = $this->operario_model->count_operario();
            $data['cant_operarios'] = $count_operarios;
            $trabajos_abiertos = $this->trabajo_model->contar_trabajos_abiertos();
            //cargo las consignas abiertas
            $consigna_abiertos = $this->consigna_model->contar_consigna_abiertos();
            $data['consigna_abiertos'] = $consigna_abiertos;
            //
            $data['trabajo_abiertos'] = $trabajos_abiertos;
            //
            $data['path'] = $path_1;
            // load dashboard
            $data['content'] = $this->load->view( $path_1, $data, TRUE);
            $this->load->view( 'base', $data);
            return;
        }
    }

     /*
     * Adding a new operario
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
        $params = array(
				'nombreOperario' => $this->input->post('nombreOperario'),
				'apellidoOperario' => $this->input->post('apellidoOperario'),
				'emailOperario' => $this->input->post('emailOperario'),
				'celularOperario' => $this->input->post('celularOperario'),
				//'estadoOperario' => $this->input->post('estadoOperario'),
            );

            $operario_id = $this->operario_model->add_operario($params);
            redirect('operario_controller', 'refresh');
        }
        else
        {
            $data['_view'] = 'operario/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a operario
     */
    function edit($idOperario)
    {
        // check if the operario exists before trying to edit it
        $data['operario'] = $this->operario_model->get_operario($idOperario);

        if(isset($data['operario']['idOperario']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'nombreOperario' => $this->input->post('nombreOperario'),
					'apellidoOperario' => $this->input->post('apellidoOperario'),
					'emailOperario' => $this->input->post('emailOperario'),
					'celularOperario' => $this->input->post('celularOperario'),
					//'estadoOperario' => $this->input->post('estadoOperario'),
                );

                $this->operario_model->update_operario($idOperario,$params);
                redirect('operario_controller');
            }
            else
            {
                $data['_view'] = 'operario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The operario you are trying to edit does not exist.');
    }

    /*
     * Deleting operario
     */
    function remove($idOperario)
    {
        $operario = $this->operario_model->get_operario($idOperario);

        // check if the operario exists before trying to delete it
        if(isset($operario['idOperario']))
        {
            $this->operario_model->delete_operario($idOperario);
            redirect('operario_controller');
        }
        else
            show_error('The operario you are trying to delete does not exist.');
    }


}
