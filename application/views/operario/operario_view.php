    <!--<script src="static/assets/js/sweetalert2.all.min.js"></script>-->
		<nav class="navbar navbar-default" style="position: relative;z-index:0 !important;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Operarios</a>
                    <div id="botones">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="ti-pin-alt"></i> Agregar Operario</button>
                    <!--<a href="/linea_controller"><p class="">Logout</p></a>-->
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    
                        <?php $this->load->view( '/common/auth'); ?>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Listado de Operarios</h4>
                                <p class="category">En este listado se muestran los <?php echo ($cant_operarios); ?> operarios del sistema</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <!--<th class="text-center">ID</th>-->
                                    	<th class="text-center">Nombre</th>
                                    	<th class="text-center">Apellido</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">@mail</th>
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($operarios as $item):?>
                                          <tr>
                                            <!--<td class="text-center"><?php echo $item['idOperario']; ?></td>-->
                                            <td class="text-center"><?php echo $item['nombreOperario']; ?></td>
                                            <td class="text-center"><?php echo $item['apellidoOperario']; ?></td>
                                            <td class="text-center"><?php echo $item['celularOperario']; ?></td>
                                            <td class="text-center"><?php echo $item['emailOperario']; ?></td>
                                            <td class="text-center">
                                            <a  href="" data-toggle="modal" data-target="#<?php echo $item['idOperario']; ?>">Editar</a> |  
                                            <a onclick="msjSweetBorrar()"href="operario_controller/remove/<?php echo ($item['idOperario']); ?>">Borrar</a>
                                            <!-- Modal para editar operario -->
                                                <div id="<?php echo $item['idOperario']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-pin-alt"></i> Editar Operario</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Modifica los datos del operario <?php echo $item['apellidoOperario']?>.</p><br><br>
                                                        <!--formulario-->
                                                        <?php echo form_open('operario_controller/edit/'.$item['idOperario']); ?>
                                                                <div class="form-group">
                                                                <label for="nombreOperario">Nombre</label>
                                                                <input required type="text" class="form-control border-input" id="nombreOperario" name="nombreOperario" value="<?php echo ($this->input->post('nombreOperario') ? $this->input->post('nombreOperario') : $item['nombreOperario']); ?>" />
                                                                <small class="form-text">Ingresa el nombre del operario.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="apellidoOperario">Apellido</label>
                                                                <input required type="text" class="form-control border-input" id="apellidoOperario" name="apellidoOperario" value="<?php echo ($this->input->post('apellidoOperario') ? $this->input->post('apellidoOperario') : $item['apellidoOperario']); ?>" />
                                                                <small class="form-text">Ingresa el apellido del operario.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="celularOperario">Celular</label>
                                                                <input required type="text" class="form-control border-input" id="celularOperario" name="celularOperario" value="<?php echo ($this->input->post('celularOperario') ? $this->input->post('celularOperario') : $item['celularOperario']); ?>" />
                                                                <small class="form-text">Ingresa el celular del operario.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="emailOperario">E-mail</label>
                                                                <input required type="text" class="form-control border-input" id="emailOperario" name="emailOperario" value="<?php echo ($this->input->post('emailOperario') ? $this->input->post('emailOperario') : $item['emailOperario']); ?>" />
                                                                <small class="form-text">Ingresa el e-mail del operario.</small>
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

<!-- Modal para agregar operario -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="ti-pin-alt"></i> Agregar Operario</h4>
      </div>
      <div class="modal-body">
        <p>Ingresa los datos del operario.</p><br>
        <!--formulario-->
        <?php echo form_open('operario_controller/add'); ?>
	    <div class="form-group">
        <label for="nombreOperario">Nombre</label>
        <input required type="text" class="form-control border-input" id="nombreOperario" name="nombreOperario" value="<?php echo $this->input->post('nombreOperario'); ?>" />
        <small class="form-text">Ingresa el nombre del operario.</small>
        </div>
        <div class="form-group">
        <label for="apellidoOperario">Apellido</label>
        <input required type="text" class="form-control border-input" id="apellidoOperario" name="apellidoOperario" value="<?php echo $this->input->post('apellidoOperario'); ?>" />
        <small class="form-text">Ingresa el apellido del operario.</small>
        </div>
        <div class="form-group">
        <label for="celularOperario">Celular</label>
        <input required type="text" class="form-control border-input" id="celularOperario" name="celularOperario" value="<?php echo $this->input->post('celularOperario'); ?>" />
        <small class="form-text">Ingresa el celular del operario.</small>
        </div>
        <div class="form-group">
        <label for="emailOperario">E-mail</label>
        <input type="email" class="form-control border-input" id="emailOperario" name="emailOperario" value="<?php echo $this->input->post('emailOperario'); ?>" />
        <small class="form-text">Ingresa el e-mail del operario.</small>
        </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default btn-success" onclick="msjSweet()">Agregar</button>
        <?php echo form_close(); ?> 
        <!--formulario-->
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>





<script>
    function msjSweet(){
    Swal({
      //position: 'top-end',
      type: 'success',
      title: 'Operario creado',
      showConfirmButton: false,
      timer: 100000
     })}
    
    function msjSweetBorrar(){
    Swal({
      //position: 'top-end',
      type: 'error',
      title: 'Operario eliminado.',
      showConfirmButton: false,
      timer: 100000
     })}
</script>


