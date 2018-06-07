<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class Login
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un metodo para insertar registros
	public function inserusr($nombres, $apellidos, $correo, $clave)
	{
		$sql = "INSERT INTO usuarios (nombres, apellidos, correo, clave)
		VALUES ('$nombres', '$apellidos', '$correo', MD5($clave))";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcategoria, $nombre, $descripcion)
	{
		$sql = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion'
		WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorias
	public function actclave($lost_email)
	{
		$sql = "SELECT nombres FROM usuarios
		WHERE correo='$lost_email'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function insercod($lost_email, $codigo){
		$sql = "INSERT INTO recordarcod (email, codigo) VALUES ('$lost_email', '$codigo')";
		return ejecutarConsulta($sql);
	}
	public function validarusr($login_username, $login_password){
		$sql = "SELECT apellidos FROM usuarios
		WHERE correo='$login_username'  and  clave='$login_password' "; 
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementamos un método para activar categorias
	public function activar($idcategoria)
	{
		$sql = "UPDATE categoria SET condicion='1'
		WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcategoria)
	{
		$sql = "SELECT * FROM categoria 
		WHERE idcategoria='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT * FROM categoria";
		return ejecutarConsulta($sql);
	}
}



?>