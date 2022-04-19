<?php
        require_once "../modelos/Propietario.php";

        $propietario =new Propietario();
        $idpropietario=isset($_POST["idpropietario"])? limpiarCadena($_POST["idpropietario"]):"";
        $proPrimerNombre=isset($_POST["proPrimerNombre"])? limpiarCadena($_POST["proPrimerNombre"]):"";
        $proSegundoNombre=isset($_POST["proSegundoNombre"])? limpiarCadena($_POST["proSegundoNombre"]):"";
        $proApellidos=isset($_POST["proApellidos"])? limpiarCadena($_POST["proApellidos"]):"";
        $proCedula=isset($_POST["proCedula"])? limpiarCadena($_POST["proCedula"]):"";
        $proTelefono =isset($_POST["proTelefono"])? limpiarCadena($_POST["proTelefono"]):"";
        $proCiudad =isset($_POST["proCiudad"])? limpiarCadena($_POST["proCiudad"]):"";
        $proDireccion =isset($_POST["proDireccion"])? limpiarCadena($_POST["proDireccion"]):"";
        $proCondicion =isset($_POST["proCondicion"])? limpiarCadena($_POST["proCondicion"]):"";

        switch ($_GET["op"]) {

            case 'guardaryeditar':
            if (empty($idpropietario)) {
                $rspta=$propietario->insertar($proPrimerNombre, $proSegundoNombre, $proApellidos, $proCedula, $proTelefono, $proCiudad, $proDireccion);
                echo $rspta ? "propietario registrado" : "propietario no se pudo registrar";
            } else {
                $rspta=$propietario->editar($idpropietario, $proPrimerNombre, $proSegundoNombre, $proApellidos, $proCedula, $proTelefono, $proCiudad, $proDireccion);
                echo $rspta ? "propietario actualizado" : "propietario no se pudo actualizar";
            }
            break;


            case 'desactivar':
            $rspta=$propietario->desactivar($idpropietario);
            echo $rspta ? "propietario Desactivada" : "propietario no se puede desactivar";
            break;
            case 'activar':
            $rspta=$propietario->activar($idpropietario);
            echo $rspta ? "propietario activado" : "propietario no se puede activar";
            break;


            case 'mostrar':
            $rspta=$propietario->mostrar($idpropietario);
    //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;



            case 'listar':
            $rspta=$propietario->listar();
        //Vamos a declarar un array
            $data= array();

            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->proCondicion)?'<button class="btn btn-warning"
					onclick="mostrar('.$reg->idpropietario.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-danger"
					onclick="desactivar('.$reg->idpropietario.')">
					<i class="fa fa-close"></i></button>':'<button class="btn btn-warning"
					onclick="mostrar('.$reg->idpropietario.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-primary"
					onclick="activar('.$reg->idpropietario.')">
					<i class="fa fa-check"></i></button>',
                    "1"=>$reg->proPrimerNombre,
                    "2"=>$reg->proSegundoNombre,
                    "3"=>$reg->proApellidos,
                    "4"=>$reg->proCedula,
                    "5"=>$reg->proTelefono,
                    "6"=>$reg->proCiudad,
                    "7"=>$reg->proDireccion,
                    "8"=>($reg->proCondicion)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-red">Desactivado</span>'
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
