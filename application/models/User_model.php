<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function consultar_usuario($arreglo){
			
			$user = $arreglo['user'];
			$pass = $arreglo['pass'];
			$consulta="SELECT * FROM usuarios where md5(user)='".md5($user)."'and md5(pass)='".md5($pass)."'";
			$respuesta=$this->db->query($consulta);
			if($respuesta){ 
				return $respuesta;
			}		
			else{
			 
			 	return false;
			}
		}

	function consultar_pagos_rango_actual($datos)
	{
		$pagos = $this->db->query("SELECT * FROM compras
								     WHERE fecha >= DATE_SUB(CURDATE(), INTERVAL ? DAY) AND
								           fecha <= DATE_ADD(CURDATE(), INTERVAL ? DAY)", array($datos['inicio'], 
								           $datos['fin']));
		if ($pagos)
		{
			return $pagos;
		}
		else
		{
			return false;
		}
	}

	function detalles_producto($id)
	{
		$consulta="SELECT * FROM productos where md5(id)='".md5($id)."'";
			$respuesta=$this->db->query($consulta);
			if($respuesta){ 
				return $respuesta;
				
			}		
			else{
			 
			 	return false;
			}
	}

	function inventario()
	{
		$consulta="SELECT * FROM productos";
			$respuesta=$this->db->query($consulta);
			if($respuesta){ 
				return $respuesta;				
			}		
			else{
			 
			 	return false;
			}
	}

}


