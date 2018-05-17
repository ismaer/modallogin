<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../modelos/Login.php";

$login=new Login();

$register_username=isset($_POST["register_username"])? limpiarCadena($_POST["register_username"]):"";
$register_lastname=isset($_POST["register_lastname"])? limpiarCadena($_POST["register_lastname"]):"";
$register_email=isset($_POST["register_email"])? limpiarCadena($_POST["register_email"]):"";
$register_password=isset($_POST["register_password"])? limpiarCadena($_POST["register_password"]):"";
$lost_email=isset($_POST["lost_email"])? limpiarCadena($_POST["lost_email"]):"";
$login_username=isset($_POST["login_username"])? limpiarCadena($_POST["login_username"]):"";
$login_password=isset($_POST["login_password"])? limpiarCadena($_POST["login_password"]):"";

switch ($_GET["op"]){
	case 'inserusr':
			$rspta=$login->inserusr($register_username, $register_lastname, $register_email, $register_password);
			echo $rspta ? "Usuario registrado": "Usuario no registrado";
	break;
		
	case 'actclave':
		$rspta=$login->actclave($lost_email);
		
		if ($rspta ) {
			$codigo = mt_rand();
			$rspta = $login->insercod($lost_email, $codigo);

			//$emailTo = 'ismaelgomez.98@gmail.com';
			$email_ori = 'ismaelgomez.98@gmail.com';
			$subject = 'Recuperar clave';
			//$sendCopy = trim($_POST['sendCopy']);
			$body = "Hemos recibido una solicitud para de recuperar clave del correo $lost_email \r\n Ingrese al siguiente al siguiente enlace para restablecer su clave \r\n unprofe.com";
			$headers = 'From: My Site <'.$email_ori.'>' . "\r\n" . 'Reply-To: ' . $lost_email;
			var_dump($lost_email, $subject, $body, $headers ); die;

			$enviar = mail($lost_email, $subject, $body, $headers);
			
		}
		echo $rspta ? "accede al enlace que enviamos a tu email": "accede al enlace que enviamos a tu email";
	break;
	
	case 'activar':
		$rspta=$categoria->activar($idcategoria);
		echo $rspta ? "Categoria Activada": "Categoria no se pudo Activar";
	break;
	
	case 'validarusr':
		$rspta=$login->validarusr($login_username, MD5($login_password));
		
		echo $rspta ? "Usuario registrado": "usuario no registrado";
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