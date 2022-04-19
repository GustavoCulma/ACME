<?php
		require_once "../modelos/Informe.php";

		$informe =new Informe();

		$idinforme=isset($_POST["idinforme"])? limpiarCadena($_POST["idinforme"]):"";
		$vehPlaca=isset($_POST["vehPlaca"])? limpiarCadena($_POST["vehPlaca"]):"";
		$vehMarca=isset($_POST["vehMarca"])? limpiarCadena($_POST["vehMarca"]):"";
		$nomConductor=isset($_POST["nomConductor"])? limpiarCadena($_POST["nomConductor"]):"";
		$nomPropietario=isset($_POST["nomPropietario"])? limpiarCadena($_POST["nomPropietario"]):"";

		 switch($_GET["op"]){
			case 'listar':
			$rspta=$informe->listar();
		//Vamos a declarar un array
			$data= Array();
			while  ($reg=$rspta->fetch_object()){
				$data[]=array(
					"0"=>$reg->vehPlaca,
					"1"=>$reg->vehMarca,
					"2"=>$reg->nomConductor,
					"3"=>$reg->nomPropietario,
				);
			}
			$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
			echo json_encode($results);
			break;
		}
		?>
