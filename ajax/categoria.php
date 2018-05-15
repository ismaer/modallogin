<?php
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcategoria)) {
			$rspta=$categoria->insertar($nombre, $descripcion);
			echo $rspta ? "Categoria registrada": "Categoria no se pudo registrar";
		}
		else{
			$rspta=$categoria->editar($idcategoria, $nombre, $descripcion);
			echo $rspta ? "Categoria actualizada": "Categoria no se pudo Actualizar";
		}
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