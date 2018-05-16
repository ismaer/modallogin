<?php
require_once "../modelos/Login.php";

$login=new Login();

$register_username=isset($_POST["register_username"])? limpiarCadena($_POST["register_username"]):"";
$register_lastname=isset($_POST["register_lastname"])? limpiarCadena($_POST["register_lastname"]):"";
$register_email=isset($_POST["register_email"])? limpiarCadena($_POST["register_email"]):"";
$register_password=isset($_POST["register_password"])? limpiarCadena($_POST["register_password"]):"";


switch ($_GET["op"]){
	case 'inserusr':
			$rspta=$login->inserusr($register_username, $register_lastname, $register_email, $register_password);
			echo $rspta ? "Usuario registrado": "Usuario no registrado";
	break;
		
	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
		echo $rspta ? "Categoria Desactivada": "Categoria no se puede Desactivar";
	break;
	
	case 'activar':
		$rspta=$categoria->activar($idcategoria);
		echo $rspta ? "Categoria Activada": "Categoria no se pudo Activar";
	break;
	
	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;
		
	case 'listar':
		$rspta=$categoria->listar();
		//Vamos a declarar un array
		$data= array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"> </i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->descripcion,
				"3"=>$reg->condicion
				);
		}
		$results = array(
			"sEcho"=>1, //Informacion para el datatables
			"iTotalRecords"=>count($data), //Enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //Enviamos el total registros a visualizar
			"aaData"=>$data
			);
		echo json_encode($results);
	break;
}

?>