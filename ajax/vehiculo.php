<?php
        require_once "../modelos/Vehiculo.php";

        $vehiculo =new Vehiculo();

        $idvehiculo=isset($_POST["idvehiculo"])? limpiarCadena($_POST["idvehiculo"]):"";

        $idpropietario=isset($_POST["idpropietario"])? limpiarCadena($_POST["idpropietario"]):"";

        $vehNombre=isset($_POST["vehNombre"])? limpiarCadena($_POST["vehNombre"]):"";

        $vehPlaca=isset($_POST["vehPlaca"])? limpiarCadena($_POST["vehPlaca"]):"";

        $vehColor=isset($_POST["vehColor"])? limpiarCadena($_POST["vehColor"]):"";

        $vehMarca=isset($_POST["vehMarca"])? limpiarCadena($_POST["vehMarca"]):"";

        $vehTipo =isset($_POST["vehTipo"])? limpiarCadena($_POST["vehTipo"]):"";

        $vehCondicion =isset($_POST["vehCondicion"])? limpiarCadena($_POST["vehCondicion"]):"";



        switch ($_GET["op"]) {

            case 'guardaryeditar':

            if (empty($idvehiculo)) {
                $rspta=$vehiculo->insertar(
                    $idpropietario,
                    $vehNombre,
                    $vehPlaca,
                    $vehColor,
                    $vehMarca,
                    $vehTipo
                );
                echo $rspta ? "Vehiculo registrado" : "Vehiculo no se pudo registrar";
            } else {
                $rspta=$vehiculo->editar(
                    $idvehiculo,
                    $idpropietario,
                    $vehNombre,
                    $vehPlaca,
                    $vehColor,
                    $vehMarca,
                    $vehTipo
                );
                echo $rspta ? "Vehiculo actualizado" : "Vehiculo no se pudo actualizar";
            }

            break;


            case 'desactivar':
            $rspta=$vehiculo->desactivar($idvehiculo);
            echo $rspta ? "Vehiculo Desactivada" : "Vehiculo no se puede desactivar";
            break;
            case 'activar':
            $rspta=$vehiculo->activar($idvehiculo);
            echo $rspta ? "Vehiculo activado" : "Vehiculo no se puede activar";
            break;


            case 'mostrar':
            $rspta=$vehiculo->mostrar($idvehiculo);
    //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;



            case 'listar':
            $rspta=$vehiculo->listar();
        //Vamos a declarar un array
            $data= array();

            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->vehCondicion)?'<button class="btn btn-warning"
					onclick="mostrar('.$reg->idvehiculo.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-danger"
					onclick="desactivar('.$reg->idvehiculo.')">
					<i class="fa fa-close"></i></button>':

                    '<button class="btn btn-warning"
					onclick="mostrar('.$reg->idvehiculo.')">
					<i class="fa fa-pencil"></i>
					</button>'.'
					<br><br>
					<button class="btn btn-primary"
					onclick="activar('.$reg->idvehiculo.')">
					<i class="fa fa-check"></i></button>',
                    "1"=>$reg->propietario,//aqui estoy utilizando el alias
                    "2"=>$reg->vehNombre,
                    "3"=>$reg->vehPlaca,
                    "4"=>$reg->vehColor,
                    "5"=>$reg->vehMarca,
                    "6"=>$reg->vehTipo,
                    "7"=>($reg->vehCondicion)?'<span class="label bg-green">Activado</span>':
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

            case "selectPropietario":
            require_once "../modelos/Propietario.php";
            $propietario = new Propietario();

            $rspta = $propietario->select();

            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->idpropietario . '>' . $reg->proPrimerNombre . '</option>';
            }
            break;


        }
