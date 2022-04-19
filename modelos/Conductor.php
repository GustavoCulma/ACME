<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Conductor
{
    //Implementamos nuestro constructor
    public function __construct()
    {
    }

    //Implementamos un método para insertar registros
    public function insertar(
        $idvehiculo,
        $conPrimerNombre,
        $conSegundoNombre,
        $conApellidos,
        $conCedula,
        $conTelefono,
        $conCiudad,
        $conDireccion
    ) {
        $sql="INSERT INTO conductor
		(
		idvehiculo,conPrimerNombre,conSegundoNombre,
		conApellidos,conCedula,conTelefono,conCiudad,
		conDireccion,conCondicion
		)

		VALUES ('$idvehiculo','$conPrimerNombre',
		'$conSegundoNombre','$conApellidos','$conCedula',
		'$conTelefono','$conCiudad', '$conDireccion', '1' )";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar(
        $idconductor,
        $conPrimerNombre,
        $conSegundoNombre,
        $conApellidos,
        $conCedula,
        $conTelefono,
        $conCiudad,
        $conDireccion
    ) {
        $sql="UPDATE conductor

		SET conPrimerNombre='$conPrimerNombre',
		conSegundoNombre='$conSegundoNombre',
		conApellidos='$conApellidos',
		conCiudad='$conCiudad',
		conDireccion='$conDireccion'

		WHERE idconductor='$idconductor'";

        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar conductores
    public function desactivar($idconductor)
    {
        $sql="UPDATE conductor SET conCondicion='0' WHERE idconductor='$idpropietario'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar conductores
    public function activar($idconductor)
    {
        $sql="UPDATE conductor SET conCondicion='0' WHERE idconductor='$idpropietario'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idconductor)
    {
        $sql="SELECT * FROM conductor
		WHERE idconductor='$idconductor'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="
		SELECT c.idconductor,c.idvehiculo,v.vehNombre
		AS vehiculo, c.conPrimerNombre,c.conSegundoNombre,
		c.conApellidos,c.conCedula,c.conTelefono,c.conCiudad,
		c.conDireccion,c.conCondicion
		FROM conductor c
		INNER JOIN vehiculo v
		ON c.idvehiculo = v.idvehiculo";
        return ejecutarConsulta($sql);
    }


    public function select()
    {
        $sql="SELECT * FROM conductor WHERE conCondicion=1";
        return ejecutarConsulta($sql);
    }
}
