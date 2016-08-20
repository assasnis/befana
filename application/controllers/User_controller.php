<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('side_bar');
		$this->load->view('/Usuarios/index_user');
	}

	public function inventario()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('side_bar');
		$this->load->view('/Usuarios/productos');
	}

	public function validar()
	{
		

		$arreglo['user']=$this->input->post('user');
		$arreglo['pass']=$this->input->post('pass');		

		$data['usuarios']=$this->User_model->consultar_usuario($arreglo);

		if($data['usuarios']!=false)
		{	
			$aux_user=null;
			$aux_pass=null;
			$aux_rol=null;

			foreach ($data['usuarios']->result() as $atributo) {
				$aux_user=$atributo->user;
				$aux_pass=$atributo->pass;
				$aux_nombre=$atributo->name;
				$aux_rol=$atributo->role;
			}
			if($aux_user==$arreglo['user'] && $aux_pass==$arreglo['pass'] && $aux_user!=null && $aux_pass!=null)
			{
				$arreglo['role']=$aux_rol;
				$arreglo['name']=$aux_nombre;		
				$this->session->set_userdata('userdata',$arreglo); // creamos cookie
				$user_data = $this->session->userdata('userdata');
				echo  'Bienvenido '.$user_data['name'];
				if ($aux_rol!= null and $aux_rol=="gerente")
				{
					//redirect(base_url() .'index.php/Home_client'); 
					echo "gerente";
				}
				else if ($aux_rol!= null and $aux_rol=="usuario")
				{
					redirect(base_url() .'index.php/User_controller'); 
					echo "usuario";
				}
			}
			else
			{
				print '<script language="JavaScript">'; 
				print 'alert("Datos incorrectos");'; 
				print '</script>'; 
				$url='refresh:0;url='.base_url();
				header($url);
			}				
		
	
	}
}
}
