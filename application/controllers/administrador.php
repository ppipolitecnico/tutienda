<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administrador extends CI_Controller {

public function __construct()
	{
		parent::__construct();


		$this->load->model('usuario_M');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('usuario_M');

		$this->load->library('grocery_CRUD');
		$this->load->library('image_CRUD');
        //$this->load->view('login');

	}

public function _remap($method,$data_url)
    {
        if($this->session->userdata("user")=="admin")
        {
           //echo "admin";
            $this->$method();
        }else
        {

        	redirect(base_url(), 'refresh');
            redirect(base_url("usuario_control"));
        }
    }
   
public function index()
	{
		//$this->_Servicios_view((object) array('output' => '', 'js_files' => array(),  'css_files' => array()));
		$nomUsuario= $this->session->userdata("nombre");


		$this->_principal((object) array('output' => '', 'js_files' => array(),  'css_files' => array(),'nomUsuario'=> $nomUsuario));
	}

public function _principal($output = null)
	{
		$this->load->view('admin/adminprincipal',$output);
	}

public function _Servios_view($output = null)
	{
		$this->load->view('admin',$output);
	}

public function _Servicios_view($output = null)
	{
		$this->load->view('admin/adminprincipal',$output);
	}

public function _usuarioPerfil_view($output = null)
	{
		$this->load->view('template/index',$output);
	}

public function servicios()	
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tblservicios');
			$crud->set_subject('Servicios');
			$crud->columns('n_nota','nit_cc','nombre','direccion','barrio','telefono','descripcion','cantidad','fecha','hora_servicio','fechainicial', 'fechafinal', 'cod_usuario','cod_zona', 'cod_estado');
			 $crud->set_relation('cod_usuario', 'tblusuario_datos', '{nombre1} {nombre2} {apellido1}');
			 $crud->set_relation('cod_estado', 'tblestado', 'nombre');
			  $crud->set_relation('cod_zona', 'tblzona', 'descripcion');
			 $crud->display_as('cod_usuario', 'asignar a')
			 		->display_as('fechainicial', 'Fecha inicial')
			 		->display_as('fechafinal', 'Fecha final')
        			->display_as('cod_estado', 'Estado')
        			->display_as('cod_zona', 'Zonas');
                
			//$crud->unset_columns('productDescription');
			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_Servicios_view($output);
	}

public function estado()	
	{
			$crud = new grocery_CRUD();
			//$crud->set_theme('twitter-bootstrap');

			$crud->set_table('tblestado');
			$crud->set_subject('Estado Servicios');
			$crud->unset_jquery();
  
			//$crud->unset_columns('productDescription');
			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));
			
			$output = $crud->render();

			 //$resultado = "<div id='grocery'><?php echo  $output; </div> ";


			//echo $output;
     
			//echo $resultado;
			$this->load->view('admin/adminprincipal',$output);
 	}

public function user_datos()	
	{

		$respuesta=$this->usuario_M->ver();
	
		echo json_encode($respuesta);

 	}

public function prueba()	
	{

		$this->load->view('admin/usuariok');	
 	}

public function pru()	
	{

		$this->load->view('admin/usua');	
 	}

public function usuarios_perfil() 
	{
        $crud = new grocery_CRUD();

        $crud->set_table('tblusuario');
     	$crud->unset_columns('usuario','pass','correo');
        $crud->columns('cod_usuario','cod_perfil');
        $crud->display_as('cod_usuario', 'Nombre')
        		->display_as('cod_perfil', 'Perfil');
         		
        $crud->unset_jquery();
        $crud->set_subject('Perfiles de usuarios');

        $crud->edit_fields('cod_usuario','cod_perfil');
        $crud->set_relation('cod_perfil', 'tblperfil', 'nombre');
        $crud->field_type('cod_usuario', 'readonly');
        

        $crud->set_relation('cod_usuario', 'tblusuario_datos', '{nombre1} {nombre2} {apellido1}');

        $output = $crud->render();

        $this->_principal($output);
	}

public function datos_usuarios() {
        
        $crud = new grocery_CRUD();
      

        $crud->set_table('tblusuario_datos');
      	$crud->set_subject('Datos usuarios');
      	$crud->columns('cedula','nombre1', 'apellido1', 'telefono','direccion','estado');
	    $crud->display_as('nombre1', 'Nombre')
	      	->display_as('nombre2', 'Segundo Nombre')
	      	->display_as('apellido1', 'Apellido')
	      	->display_as('apellido2', 'Segundo Apellido');

		$crud->field_type('estado', 'readonly');
		$crud->unset_jquery();
        $output = $crud->render();
        $this->_principal($output); }

public function zona()	
	{
			$crud = new grocery_CRUD();
			$crud->set_table('tblzona');
			$crud->set_subject('Zonas');
		
                
			//$crud->unset_columns('productDescription');
			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_Servicios_view($output);
 	}

public function habilitar_deshabilitar()
 	{
 		      $crud = new grocery_CRUD();

        $crud->set_table('tblestado_usuario');
      	$crud->set_subject('habilitar Deshabilitar');
		$crud->display_as('cod_usuario', 'Nombre');
		$crud->set_relation('cod_usuario', 'tblusuario_datos', '{nombre1} {nombre2} {apellido1}');
  		$crud->unset_delete();
		$crud->unset_jquery();
        $output = $crud->render();


        $this->_principal($output);
 	}

public function Perfil()	
	{
			$crud = new grocery_CRUD();
			$crud->set_table('tblusuario');
			$crud->set_subject('Perfiles');
		
                
			$crud->unset_columns('usuario','pass','correo');

			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_Servicios_view($output);
 	}

public function image()
	{
		$image_crud = new image_CRUD();
		
	
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_1')
			->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
		
		$this->_principal($output);
	}
public function mapa()
{
		$this->load->view('tecnico/mapa');	
}


}

/* End of file  */
/* Location: ./application/controllers/ */