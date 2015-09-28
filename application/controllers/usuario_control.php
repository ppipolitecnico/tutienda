<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->load->model('usuario_M');
        $this->load->helper('form');
        $this->load->library('form_validation');
   		$this->load->helper('url');
        $this->load->library('session');
        $this->load->database();

        //$this->load->view('login');

	}

	public function index()
	{
		$this->load->model('usuario_M');
		$this->load->view('login');
	}


	public function _Servicios_view($output = null)
	{
		$this->load->view('principal.php',$output);
	}


	/*public function _remap($method,$data_url)
	{
		if($this->session->userdata("user")=="")
		{
			$this->index();
		}
		
		if($this->session->userdata("user")=="admin")
		{
			if($method=="index")
			{
				redirect(base_url("administrador"));
				$this->close();
			}
			$this->$method();
		}
		
		if($method=="validar")
		{
			$this->validar();
		}
		
	}*/



	public function validar()
	{
		if(!isset($_POST['user'])){	//	Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.	
			$this->load->view('login');		//	Por lo tanto le presentamos la pantalla del formulario de ingreso.
		}
		else{								//	Si el usuario ya pasó por la pantalla inicial y presionó el botón "Ingresar"
			//$this->form_validation->set_rules('maillogin','e-mail','required|valid_email');		//	Configuramos las validaciones ayudandonos con la librería form_validation del Framework Codeigniter
			$this->form_validation->set_rules('pass','password','required');
			if(($this->form_validation->run()==FALSE)){				//	Verificamos si el usuario superó la validación
				$this->load->view('login');		
			}
			else{													//	Si ambos campos fueron correctamente rellanados por el usuario,
				$this->load->model('usuario_M');
				$ExisteUsuarioyPassoword = $this->usuario_M->ValidarUsuario($_POST['user'],$_POST['pass']);	//	comprobamos que el usuario exista en la base de datos y la password ingresada sea correcta
					if($ExisteUsuarioyPassoword)
					{	
					
						$nomUsuario  = $ExisteUsuarioyPassoword[0]->nombres;
						$this->session->set_userdata("nombre",$nomUsuario);	
						
						//$res=$this->usuario_M->tipoUsuario($_POST['user'],$_POST['pass']);

		 				if($ExisteUsuarioyPassoword[0]->nombre =='Administrador')
		 				{
				
							$this->session->set_userdata("user","admin");
							redirect(base_url("administrador"));
					     	$this->load->view('principal');
					   	}
					}
					else
					{	
						$data['error']="Usuario o Cotraseña incorrecta, por favor vuelva a intentar";
						$this->load->view('login',$data);	//	Lo regresamos a la pantalla de login y pasamos como parámetro el mensaje de error a presentar en pantalla
					}
			}
		}
	}

	public function close($datos=null)
	{

		$this->session->sess_destroy();
		$this->session->set_userdata("user","");
		$this->session->unset_userdata();
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		//redirect(base_url("usuario_control"));
		print "<script type=\"text/javascript\">alert('Sesion cerrada');</script>";
		redirect(base_url(), 'refresh');
		
	}

	public function verificarsesion()
	{
		if($this->session->userdata("user")=="")
		{
			$resSesion=false;	
			
		}else
		{

			$resSesion=true;
		}

	//redirect(base_url(), 'refresh');
	//print "<script type=\"text/javascript\">alert(' cerrada');</script>";
	echo json_encode($resSesion);
	}

	public function RegistroUsuario()
	{
		$this->load->view('registrousuario');
	}

	public function InsertarUsuario()
	{

		$arrayUsuario = array('nombres' => 	$_POST['nombres'], 
						'apellidos' => 	$_POST['apellidos'],
						 'direccion' =>	$_POST['direccion'],
						 'telefono' =>  $_POST['telefono'],
						 'celular' => 	$_POST['celular'],
						 'correo_electronico' =>  	$_POST['email'],
						 'estado' =>  	'Activo');

	 	$usuario = $this->usuario_M->insertarusuario($arrayUsuario);

		$arrayUsuarioCuenta = array(	'id_usuario' => $usuario, 
						'usuario' => 	$_POST['Usuario'],
					 	'contrasena' =>	$_POST['Contrasena'],
					 	'id_perfil' =>  $_POST['tipousuario']);

		$usuariocuenta = $this->usuario_M->insertarusuarioCuenta($arrayUsuarioCuenta);


		$this->load->view('login');
	}





}
/* End of file  */
/* Location: ./application/controllers/ */