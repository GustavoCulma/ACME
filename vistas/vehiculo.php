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
            <h1 class="box-title">Vehículo  <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>propietario</th>
                <th>Nombre</th>
                <th>placa</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <th>Opciones</th>
                <th>propietario</th>
                <th>Nombre</th>
                <th>placa</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Estado</th>
              </tfoot>
            </table>
          </div>




          <div class="panel-body" style="height: 400px;" id="formularioregistros">

            <form name="formulario" id="formulario" method="POST">


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Propietario</label>
                <select name="idpropietario" id="idpropietario" class="form-control selectpicker" data-live-search="true" required></select>
              </div>


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <input type="hidden" name="idvehiculo" id="idvehiculo">
                <label>Nombre Vehículo</label>

                <input type="hidden" name="idvehiculo" id="idvehiculo">

                <input type="text" class="form-control" name="vehNombre" id="vehNombre" maxlength="50" placeholder="Nombre Vehículo" required>
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Placa</label>
                <input type="text" class="form-control" name="vehPlaca" id="vehPlaca" maxlength="256" placeholder="Placa">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Color</label>
                <input type="text" class="form-control" name="vehColor" id="vehColor" maxlength="256" placeholder="Color">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Marca</label>
                <input type="text" class="form-control" name="vehMarca" id="vehMarca" maxlength="256" placeholder="Marca">
              </div>


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Tipo</label>
                <input type="text" class="form-control" name="vehTipo" id="vehTipo" maxlength="256" placeholder="Tipo">
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
<script type="text/javascript" src="scripts/vehiculo.js"></script>
