<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Propietario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar
	(
		$proPrimerNombre,$proSegundoNombre,
		$proApellidos, $proCedula, $proTelefono, $proCiudad,
		$proDireccion
	)
	{
		$sql="INSERT INTO propietario
		(
		proPrimerNombre,proSegundoNombre,proApellidos,proCedula,
		proTelefono,proCiudad,proDireccion,
		proCondicion
		)

		VALUES ('$proPrimerNombre','$proSegundoNombre',
		'$proApellidos','$proCedula', '$proTelefono',
		'$proCiudad', '$proDireccion', '1' )";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar

	(
		$idpropietario,$proPrimerNombre,
		$proSegundoNombre, $proApellidos,
		$proCedula, $proTelefono, $proCiudad,
		$proDireccion
	)
	{
		$sql="UPDATE propietario

		SET
		proPrimerNombre='$proPrimerNombre',
		proSegundoNombre='$proSegundoNombre',
		proApellidos='$proApellidos',
		proCiudad='$proCiudad',
		proDireccion='$proDireccion'

		WHERE idpropietario='$idpropietario'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar propietarios
	public function desactivar($idpropietario)
	{
		$sql="UPDATE propietario SET proCondicion='0' WHERE idpropietario='$idpropietario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar propietarios
	public function activar($idpropietario)
	{
		$sql="UPDATE propietario SET proCondicion='1' WHERE idpropietario='$idpropietario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpropietario)
	{
		$sql="SELECT * FROM propietario WHERE idpropietario='$idpropietario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM propietario";
		return ejecutarConsulta($sql);
	}


	public function select()
	{
		$sql="SELECT * FROM propietario WHERE proCondicion=1";
		return ejecutarConsulta($sql);
	}

}

?>
