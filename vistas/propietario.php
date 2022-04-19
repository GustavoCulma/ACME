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
            <h1 class="box-title">Propietario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
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
                <label>Primer nombre</label>

                <input type="hidden" name="idpropietario" id="idpropietario">

                <input type="text" class="form-control" name="proPrimerNombre" id="proPrimerNombre" maxlength="50" placeholder="Primer nombre" required>
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Segundo nombre</label>
                <input type="text" class="form-control" name="proSegundoNombre" id="proSegundoNombre" maxlength="256" placeholder="Segundo nombre">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="proApellidos" id="proApellidos" maxlength="256" placeholder="Apellidos">
              </div>

              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cedula</label>
                <input type="text" class="form-control" name="proCedula" id="proCedula" maxlength="256" placeholder="Cedula">
              </div>


              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Telefono</label>
                <input type="text" class="form-control" name="proTelefono" id="proTelefono" maxlength="256" placeholder="Telefono">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="proCiudad" id="proCiudad" maxlength="256" placeholder="Ciudad">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Direccion</label>
                <input type="text" class="form-control" name="proDireccion" id="proDireccion" maxlength="256" placeholder="Direccion">
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
<script type="text/javascript" src="scripts/propietario.js"></script>
