var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })

    //Cargamos los items al select propietario
    $.post("../ajax/vehiculo.php?op=selectPropietario", function (r) {
        $("#idpropietario").html(r);
        $('#idpropietario').selectpicker('refresh');

    });
    $("#imagenmuestra").hide();
}

//Función limpiar
function limpiar() {
    $("#propietario").val("");
    $("#vehNombre").val("");
    $("#vehPlaca").val("");
    $("#vehColor").val("");
    $("#vehMarca").val("");
    $("#vehTipo").val("");
    $("#idvehiculo").val("");
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
                url: '../ajax/vehiculo.php?op=listar',
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
        url: "../ajax/vehiculo.php?op=guardaryeditar",
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

function mostrar(idvehiculo) {
    $.post("../ajax/vehiculo.php?op=mostrar", { idvehiculo: idvehiculo },

        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);

            $("#idpropietario").val(data.idpropietario);
            $("#vehNombre").val(data.vehNombre);
            $("#vehPlaca").val(data.vehPlaca);
            $("#vehColor").val(data.vehColor);
            $("#vehMarca").val(data.vehMarca);
            $("#vehTipo").val(data.vehTipo);
            $("#idvehiculo").val(data.idvehiculo);
        })
}

//Función para desactivar registros
function desactivar(idvehiculo) {
    bootbox.confirm("¿Está Seguro de desactivar el vehiculo?", function (result) {
        if (result) {
            $.post("../ajax/vehiculo.php?op=desactivar", { idvehiculo: idvehiculo }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idvehiculo) {
    bootbox.confirm("¿Está Seguro de activar el vehiculo?", function (result) {
        if (result) {
            $.post("../ajax/vehiculo.php?op=activar", { idvehiculo: idvehiculo }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
