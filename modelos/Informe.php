<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Informe
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT v.vehPlaca, v.vehMarca,
		CONCAT (c.conPrimerNombre, c.conSegundoNombre,c.conApellidos)
		AS nomConductor,
		CONCAT (p.proPrimerNombre, p.proSegundoNombre,p.proApellidos)
		AS nomPropietario
		FROM vehiculo v
		inner JOIN propietario p
		ON v.idpropietario = p.idpropietario
		inner JOIN conductor c
		ON v.idvehiculo = c.idvehiculo";
		return ejecutarConsulta($sql);
	}

}

?>
