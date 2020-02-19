<script>//mensajes sweet al enviar formulario
		function altaLinea(){
		Swal({
			//position: 'top-end',
			type: 'success',
			title: 'Linea Creada',
			showConfirmButton: false,
			timer: 100000
		 })}
</script>
		<nav class="navbar navbar-default" style="position: relative;z-index:0 !important;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <h2>Lineas</h2>
                    <div id="botones">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="ti-pin-alt"></i> Agregar Linea</button>
                    <!--<a href="/linea_controller"><p class="">Logout</p></a>-->
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php $this->load->view( '/common/auth'); ?>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
        <br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Listado de Lineas</h4>
                                <p class="category">En este listado se muestran las lineas registradas</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <!--<th class="text-center">ID</th>-->
                                    	<th class="text-center">Nombre</th>
                                    	<th class="text-center">Abreviatura</th>
                                        <th class="text-center">Observación</th>
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lineas as $item):?>
                                          <tr>
                                            <!--<td class="text-center"><?php echo $item['idLinea']; ?></td>-->
                                            <td class="text-center"><?php echo $item['nombreLinea']; ?></td>
                                            <td class="text-center"><?php echo $item['abreviLinea']; ?></td>
                                            <td class="text-center"><?php echo $item['obsLinea']; ?></td>
                                            <td class="text-center">
                                            <a  href="" data-toggle="modal" data-target="#<?php echo $item['idLinea']; ?>">Editar</a> |
                                            <a href="linea_controller/remove/<?php echo ($item['idLinea']); ?>">Borrar</a>
                                            <!-- Modal para editar linea -->
                                                <div id="<?php echo $item['idLinea']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-pin-alt"></i> Editar Linea</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Modifica los datos de la linea <?php echo $item['nombreLinea']?>.</p><br><br>
                                                        <!--formulario-->
                                                        <?php echo form_open('linea_controller/edit/'.$item['idLinea']); ?>
                                                        <div class="form-group">
                                                        <label for="nombreLinea">Nombre</label>
                                                        <input required type="text" class="form-control border-input" id="nombreLinea" name="nombreLinea" value="<?php echo ($this->input->post('nombreLinea') ? $this->input->post('nombreLinea') : $item['nombreLinea']); ?>" />
                                                        <small class="form-text">Ingresa el nombre de la linea.</small>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="abreviLinea">Abreviación</label>
                                                        <input required type="text" class="form-control border-input" id="abreviLinea" name="abreviLinea" value="<?php echo ($this->input->post('abreviLinea') ? $this->input->post('abreviLinea') : $item['abreviLinea']); ?>" />
                                                        <small class="form-text">Ingresa la abreviación de la linea.</small>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="obsLinea">Observación</label>
                                                        <input type="text" class="form-control border-input" id="obsLinea" name="obsLinea" value="<?php echo ($this->input->post('obsLinea') ? $this->input->post('obsLinea') : $item['obsLinea']); ?>" />
                                                        <small class="form-text">Ingresa alguna observación sobre la linea.</small>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" onclick="javascript:notificacionModificar();" class="btn btn-default btn-success">Modificar</button>
                                                        <?php echo form_close(); ?>
                                                        <!--formulario-->
                                                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancelar</button>
                                                      </div>
                                                    </div>

                                                  </div>
                                                </div>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal para agregar linea -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="ti-pin-alt"></i> Agregar Linea</h4>
      </div>
      <div class="modal-body">
        <p>Ingresa los datos de la linea.</p><br><br>
        <!--formulario-->
        <?php echo form_open('linea_controller/add','id="formLinea"'); ?>
        <div class="form-group">
        <label for="nombreLinea">Nombre</label>
        <input required type="text" class="form-control border-input" id="nombreLinea" name="nombreLinea" value="<?php echo $this->input->post('nombreLinea'); ?>" />
        <small class="form-text">Ingresa el nombre de la linea.</small>
        </div>
        <div class="form-group">
        <label for="abreviLinea">Abreviación</label>
        <input required type="text" class="form-control border-input" id="abreviLinea" name="abreviLinea" value="<?php echo $this->input->post('abreviLinea'); ?>" />
        <small class="form-text">Ingresa la abreviación de la linea.</small>
        </div>
        <div class="form-group">
        <label for="obsLinea">Observación</label>
        <input type="text" class="form-control border-input" id="obsLinea" name="obsLinea" value="<?php echo $this->input->post('obsLinea'); ?>" />
        <small class="form-text">Ingresa alguna observación sobre la linea.</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default btn-success">Agregar</button>
				<button type="reset" class="btn btn-default btn-info">En Blanco</button>

				<script>//llama a sweetalert y manda el form
					$( "#formLinea" ).submit(function( event ) {
					altaLinea();
					event.preventDefault();
					setTimeout(function () {
						$( "#formLinea" ).submit();
					}, 1000);
					});
				</script>

        <?php echo form_close(); ?>
        <!--formulario-->
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>



<!--estos scripts son solo para las notificaciones al enviar un formulario-->
<script>
function notificacionModificar() {
}
</script>
