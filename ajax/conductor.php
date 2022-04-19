<?php
        require_once "../modelos/Conductor.php";

        $conductor =new Conductor();

        $idconductor=isset($_POST["idconductor"])? limpiarCadena($_POST["idconductor"]):"";
        $idvehiculo=isset($_POST["idvehiculo"])? limpiarCadena($_POST["idvehiculo"]):"";
        $conPrimerNombre=isset($_POST["conPrimerNombre"])? limpiarCadena($_POST["conPrimerNombre"]):"";
        $conSegundoNombre=isset($_POST["conSegundoNombre"])? limpiarCadena($_POST["conSegundoNombre"]):"";
        $conApellidos=isset($_POST["conApellidos"])? limpiarCadena($_POST["conApellidos"]):"";
        $conCedula=isset($_POST["conCedula"])? limpiarCadena($_POST["conCedula"]):"";
        $conTelefono =isset($_POST["conTelefono"])? limpiarCadena($_POST["conTelefono"]):"";
        $conCiudad =isset($_POST["conCiudad"])? limpiarCadena($_POST["conCiudad"]):"";
        $conDireccion =isset($_POST["conDireccion"])? limpiarCadena($_POST["conDireccion"]):"";
        $conCondicion =isset($_POST["conCondicion"])? limpiarCadena($_POST["conCondicion"]):"";

        switch ($_GET["op"]) {

            case 'guardaryeditar':
            if (empty($idconductor)) {
                $rspta=$conductor->insertar(
                    $idvehiculo,
                    $conPrimerNombre,
                    $conSegundoNombre,
                    $conApellidos,
                    $conCedula,
                    $conTelefono,
                    $conCiudad,
                    $conDireccion
                );
                echo $rspta ? "Conductor registrado" : "Conductor no se pudo registrar";
            } else {
                $rspta=$conductor->editar(
                    $idconductor,
                    $idvehiculo,
                    $conPrimerNombre,
                    $conSegundoNombre,
                    $conApellidos,
                    $conCedula,
                    $conTelefono,
                    $conCiudad,
                    $conDireccion
                );
                echo $rspta ? "Conductor actualizado" : "Conductor no se pudo actualizar";
            }
            break;


            case 'desactivar':
            $rspta=$conductor->desactivar($idconductor);
            echo $rspta ? "Conductor Desactivado" : "Conductor no se puede desactivar";
            break;
            case 'activar':
            $rspta=$conductor->activar($idconductor);
            echo $rspta ? "Conductor activado" : "Conductor no se puede activar";
            break;


            case 'mostrar':
            $rspta=$conductor->mostrar($idconductor);
    //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;



            case 'listar':
            $rspta=$conductor->listar();
        //Vamos a declarar un array
            $data= array();

            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->conCondicion)?'<button class="btn btn-warning"
					onclick="mostrar('.$reg->idconductor.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-danger"
					onclick="desactivar('.$reg->idconductor.')">
					<i class="fa fa-close"></i></button>':'<button class="btn btn-warning"
					onclick="mostrar('.$reg->idconductor.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-primary"
					onclick="activar('.$reg->idconductor.')">
					<i class="fa fa-check"></i></button>',
                    "1"=>$reg->idvehiculo,
                    "2"=>$reg->conPrimerNombre,
                    "3"=>$reg->conSegundoNombre,
                    "4"=>$reg->conApellidos,
                    "5"=>$reg->conCedula,
                    "6"=>$reg->conTelefono,
                    "7"=>$reg->conCiudad,
                    "8"=>$reg->conDireccion,
                    "9"=>($reg->conCondicion)?'<span class="label bg-green">Activado</span>':
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


            case "selectVehiculo":
            require_once "../modelos/Vehiculo.php";
            $vehiculo = new Vehiculo();

            $rspta = $vehiculo->select();

            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->idvehiculo . '>' . $reg->vehNombre . '</option>';
            }
            break;
        }
