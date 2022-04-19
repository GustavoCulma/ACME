var tabla;
//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })
}
//Función limpiar
function limpiar() {
    $("#proPrimerNombre").val("");
    $("#proSegundoNombre").val("");
    $("#proApellidos").val("");
    $("#proCedula").val("");
    $("#proTelefono").val("");
    $("#proCiudad").val("");
    $("#proDireccion").val("");
    $("#idpropietario").val("");
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
                url: '../ajax/propietario.php?op=listar',
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
        url: "../ajax/propietario.php?op=guardaryeditar",
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

function mostrar(idpropietario) {
    $.post("../ajax/propietario.php?op=mostrar",

        { idpropietario: idpropietario },

        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);


            $("#proPrimerNombre").val(data.proPrimerNombre);
            $("#proSegundoNombre").val(data.proSegundoNombre);
            $("#proApellidos").val(data.proApellidos);
            $("#proCedula").val(data.proCedula);
            $("#proTelefono").val(data.proTelefono);
            $("#proCiudad").val(data.proCiudad);
            $("#proDireccion").val(data.proDireccion);
            $("#idpropietario").val(data.idpropietario);

        })
}

//Función para desactivar registros
function desactivar(idpropietario) {
    bootbox.confirm("¿Está Seguro de desactivar el propietario?", function (result) {
        if (result) {
            $.post("../ajax/propietario.php?op=desactivar", { idpropietario: idpropietario }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idpropietario) {
    bootbox.confirm("¿Está Seguro de activar el propietario?", function (result) {
        if (result) {
            $.post("../ajax/propietario.php?op=activar", { idpropietario: idpropietario }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
