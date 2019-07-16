<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
www.AppSeed.us - App builder & automated deployer
Php / CodeIgniter Aplication Template
Licence: RoSoft all rights reserved
*/

class Cidx extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('operario_model');
        $this->load->model('linea_model');
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

                $path_1 = 'dashboard';
            }
            //aca cargo los modelos y los mando ala pagina principal del dashboard
            $all_operarios = $this->operario_model->count_operario();   
            $data['operarios'] = $all_operarios;
            $all_lineas = $this->linea_model->count_linea();   
            $data['lineas'] = $all_lineas;
            $trabajos_abiertos = $this->trabajo_model->contar_trabajos_abiertos();   
            $data['trabajo_abiertos'] = $trabajos_abiertos;
            $trabajos_cerrados = $this->trabajo_model->contar_cerrados();   
            $data['trabajo_cerrados'] = $trabajos_cerrados;
            $trabajos = $this->trabajo_model->contar_trabajos();   
            $data['trabajo'] = $trabajos;
            $trabajos_anio = $this->trabajo_model->contar_anio();   
            $data['trabajo_anio'] = $trabajos_anio;
            $consigna_abiertos = $this->consigna_model->contar_consigna_abiertos();   
            $data['consigna_abiertos'] = $consigna_abiertos;
            $trabajos_hoy = $this->trabajo_model->contar_trabajos_hoy();   
            $data['trabajos_hoy'] = $trabajos_hoy;
            //$data['users'] = $this->ion_auth->users()->result();
            //
            $data['path'] = $path_1;


            // load dashboard
            $data['content'] = $this->load->view( $path_1, $data, TRUE);

            $this->load->view( 'base', $data);
            return;
		}
	
	}


	public function page_not_found( )
	{
		echo br() . "Si, it's a 404!";
		return ;
	}

	public function api( )
	{
		$data = array();
		
		$input_section = $this->input->post( "section" );
		$input_action  = $this->input->post( "action"  );
		$input_data    = $this->input->post( "data"    );

		// Ajax stuff !!!

		$data[ "status" ] = 0;
		$data[ "info"   ] = 'success, new id = ' . $page->getId();
		
		echo json_encode( $data );
		return;
	}	

	public function mail_me( )
	{
		$data = array();
		
		$input_name    = $this->input->post( "name"    );
		$input_mail    = $this->input->post( "mail"    );
		$input_message = $this->input->post( "message" );
		
		$aBodyText  = '';
		$aBodyText .= '';
		
		$aBodyText  = '<br/> REQUEST > '; 
		$aBodyText .= '<br/> input_name    : ' . $input_name;
		$aBodyText .= '<br/> input_mail    : ' . $input_mail;
		$aBodyText .= '<br/> input_message : ' . $input_message; 

		$mail=new PHPMailer();
		
		$mail->From         = $input_mail;
		$mail->FromName     = 'Client : ' . $input_mail;
		
		$mail->Sender = 'office@your_company.ro';
		$mail->AddAddress( 'target_1@yahoo.com'     );
		$mail->AddAddress( 'target_2@yahoo.com'     );
		
		$mail->Subject = 'XXXX - order - ' . $input_mail;
		$mail->Body    = $aBodyText ;  
		
		$mail->IsHTML( true  ); 		
		$mail->Send();

		$data[ "info" ] = 'success';
		$data[ "msg"  ] = 'Thank you!.';
		
		echo json_encode( $data );
		return;
	}	

}
