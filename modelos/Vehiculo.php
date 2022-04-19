<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Vehiculo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar
	(
		$idpropietario, $vehNombre,$vehPlaca,
		$vehColor, $vehMarca,$vehTipo
	)
	{
		$sql="INSERT INTO vehiculo
		(
		idpropietario,vehNombre,vehPlaca,vehColor,
		vehMarca,vehTipo,vehCondicion
		)

		VALUES ('$idpropietario','$vehNombre',
		'$vehPlaca','$vehColor', '$vehMarca',
		'$vehTipo','1' )";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar

	(
		$idvehiculo,$idpropietario,$vehNombre, $vehPlaca,
		$vehColor,$vehMarca, $vehTipo
	)
	{
		$sql="UPDATE vehiculo

		SET
		idpropietario='$idpropietario',
		vehNombre='$vehNombre',
		vehPlaca='$vehPlaca',
		vehColor='$vehColor',
		vehMarca='$vehMarca',
		vehTipo='$vehTipo';

		WHERE idvehiculo='$idvehiculo'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar propietarios
	public function desactivar($idvehiculo)
	{
		$sql="UPDATE vehiculo SET vehCondicion='0' WHERE idvehiculo='$idvehiculo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar vehiculos

	public function activar($idvehiculo)
	{
		$sql="UPDATE vehiculo SET vehCondicion='1'
		WHERE idvehiculo='$idvehiculo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idvehiculo)
	{
		$sql="SELECT * FROM vehiculo
		WHERE idvehiculo='$idvehiculo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="
		SELECT v.idvehiculo,p.idpropietario
		AS propietario, v.vehNombre,v.vehPlaca,
		v.vehColor,v.vehMarca,v.vehTipo, v.vehCondicion
		FROM vehiculo v
		INNER JOIN propietario p
		ON v.idpropietario = p.idpropietario";
		return ejecutarConsulta($sql);

	}


	public function select()
	{
		$sql="SELECT * FROM vehiculo WHERE vehCondicion=1";
		return ejecutarConsulta($sql);
	}

}

?>
