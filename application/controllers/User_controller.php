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

	public function ordenes_compra()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('side_bar');
		$this->load->view('/Usuarios/orden_compra');
	}

	public function aprobar_orden_compra()
	{

		$id = $this->input->get('id');
		$cons= $this->User_model->selec_orden($id);

		$id_orden=null;

		foreach ($cons->result() as $atributo) {
				$id_orden=$atributo->id;
				$aux['producto']=$atributo->producto;
				$aux_marca=$atributo->marca;
				$aux['proveedor']=$atributo->proveedor;	
				$aux['precio']=$atributo->precio;
				$aux_peso=$atributo->peso;
				$aux['cantidad']=$atributo->cantidad;
			}

		if($id_orden==$id){

			$consulta=$this->User_model->id_producto($aux['producto'],$aux_marca,$aux_peso);
			$aux_id=null;

			$nombre=null;

			foreach ($consulta->result() as $atributo) {
					$aux_id=$atributo->id;	
					$marca=$atributo->marca;
					$peso=$atributo->peso;
					$nombre=$atributo->nombre;		
				}
				

			if($nombre==$aux['producto'])
			{	
				$hoy = date('d-m-Y');
				$fecha= date('Y-m-d', strtotime($hoy));
				echo $fecha;
				$aux['producto']=$aux_id;	
				$aux['fecha']=$fecha;
				echo $aux['producto'];
				$this->User_model->aceptar_compra($aux);
				$this->User_model->borrar_orden($id_orden);

			}
			else
			{
				$array['marca']=$aux_marca;
				$array['nombre']=$aux['producto'];				
				$array['peso']=$aux_peso;
				$array['cantidad']=0;
				$this->User_model->nuevo_producto($array);
				$hoy = date('d-m-Y');
				$fecha= date('Y-m-d', strtotime($hoy));			
				
				$aux['fecha']=$fecha;

				$consulta=$this->User_model->id_producto($aux['producto'],$aux_marca,$aux_peso);

					foreach ($consulta->result() as $atributo) {
					$aux_id=$atributo->id;							
				}
				$aux['producto']=$aux_id;	
				$this->User_model->aceptar_compra($aux);
				$this->User_model->borrar_orden($id_orden);

			}			
			
		}
		
		redirect(base_url()); 
		
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
