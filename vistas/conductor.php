<?php
require 'header.php';
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title">Conductor <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Vehiculo</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <th>Opciones</th>
                <th>Vehiculo</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th>Estado</th>
              </tfoot>
            </table>
          </div>

          <div class="panel-body" style="height: 400px;" id="formularioregistros">

            <form name="formulario" id="formulario" method="POST">


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Vehiculo</label>
                <input type="hidden" name="idconductor" id="idconductor">
                <select name="idvehiculo" id="idvehiculo" class="form-control selectpicker" data-live-search="true" required></select>
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <label>Primer nombre</label>
                <input type="text" class="form-control" name="conPrimerNombre" id="conPrimerNombre" maxlength="50" placeholder="Primer nombre" required>
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Segundo nombre</label>
                <input type="text" class="form-control" name="conSegundoNombre" id="conSegundoNombre" maxlength="256" placeholder="Segundo nombre">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="conApellidos" id="conApellidos" maxlength="256" placeholder="Apellidos">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cedula</label>
                <input type="text" class="form-control" name="conCedula" id="conCedula" maxlength="256" placeholder="Cedula">
              </div>


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Telefono</label>
                <input type="text" class="form-control" name="conTelefono" id="conTelefono" maxlength="256" placeholder="Telefono">
              </div>



              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="conCiudad" id="conCiudad" maxlength="256" placeholder="Ciudad">
              </div>



              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Direccion</label>
                <input type="text" class="form-control" name="conDireccion" id="conDireccion" maxlength="256" placeholder="Direccion">
              </div>




              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
              </div>

            </form>


          </div>
          <!--Fin centro -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/conductor.js"></script>
