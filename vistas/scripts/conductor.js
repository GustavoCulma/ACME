var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })


    //Cargamos los items al select vehiculo
    $.post("../ajax/conductor.php?op=selectVehiculo", function (r) {
        $("#idvehiculo").html(r);
        $('#idvehiculo').selectpicker('refresh');

    });
    $("#imagenmuestra").hide();


}

//Función limpiar
function limpiar() {
    $("#idvehiculo").val("");
    $("#conPrimerNombre").val("");
    $("#conSegundoNombre").val("");
    $("#conApellidos").val("");
    $("#conCedula").val("");
    $("#conTelefono").val("");
    $("#conCiudad").val("");
    $("#conDireccion").val("");
    $("#idconductor").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    }
    else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar() {
    tabla = $('#tbllistado').dataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax":
            {
                url: '../ajax/conductor.php?op=listar',
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "iDisplayLength": 3,//Paginación
            "order": [[0, "desc"]]//Ordenar (columna,orden)
        }).DataTable();
}
//Función para guardar o editar
function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/conductor.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idconductor) {
    $.post("../ajax/conductor.php?op=mostrar",

        { idconductor: idconductor },

        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);


            $("#idvehiculo").val(data.idvehiculo);
            $("#conPrimerNombre").val(data.conPrimerNombre);
            $("#conSegundoNombre").val(data.conSegundoNombre);
            $("#conApellidos").val(data.conApellidos);
            $("#conCedula").val(data.conCedula);
            $("#conTelefono").val(data.conTelefono);
            $("#conCiudad").val(data.conCiudad);
            $("#conDireccion").val(data.conDireccion);
            $("#idconductor").val(data.idconductor);

        })
}

//Función para desactivar registros
function desactivar(idconductor) {
    bootbox.confirm("¿Está Seguro de desactivar el conductor?", function (result) {
        if (result) {
            $.post("../ajax/conductor.php?op=desactivar", { idconductor: idconductor }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idconductor) {
    bootbox.confirm("¿Está Seguro de activar el conductor?", function (result) {
        if (result) {
            $.post("../ajax/conductor.php?op=activar", { idconductor: idconductor }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
