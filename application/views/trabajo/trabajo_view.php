
		<nav class="navbar navbar-default" style="position: relative;z-index:0 !important;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Autorizaciones de Trabajo</a>
                    <div id="botones">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="ti-pin-alt"></i> Generar A.T</button><br>
                    <strong style="color:#FF0000"><i class="ti-alert"></i>  Hay x Autorizaciones de Trabajo Abiertas. <i class="ti-alert"></i> </strong>
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
                                <h4 class="title">Listado de autorizaciones de trabajo</h4>
                                <p class="category">En este listado se muestran las Autorizaciones de trabajo.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <!--<th class="text-center">ID</th>-->
                                    	<th class="text-center">ID</th>
                                    	<th class="text-center">Inicio</th>
                                        <th class="text-center">Fin</th>
                                        <th class="text-center">Responsable</th>
                                        <th class="text-center">Operador</th>
                                        <th class="text-center">Consigna</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($trabajo as $item):?>
                                          <tr>
                                            <td class="text-center"><?php echo $item['idTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['horaInicioTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['horaFinTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['responsableTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['operadorTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['idConsigna']; ?></td>
                                             <?php
                                             if (empty($item['horaFinTrabajo'])){
                                                 echo "<td class='text-center danger'>Abierta</td>";
                                             }else{
                                                 echo "<td class='text-center success'>Cerrada</td>";
                                             }
                                             ?>  
                                            <td class="text-center"><?php echo $item['descripcionTrabajo']; ?></td>
                                            <td class="text-center"> 
                                            <a  href="" data-toggle="modal" data-target="#<?php echo $item['idTrabajo']; ?>">Ver</a>
                                            <!-- Modal para editar linea -->
                                                <div id="<?php echo $item['idTrabajo']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-pin-alt"></i> Detalles de la A.T</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Estos son los datos de la <?php echo $item['idTrabajo']?>.</p>
                                                        <!--formulario-->
                                                        <?php echo form_open('trabajo_controller/edit/'.$item['idTrabajo']); ?>
                                                        <div class="form-group col-md-4">
                                                        <label for="idTrabajo">Id</label>
                                                        <input readonly type="text" class="form-control border-input" id="idTrabajo" name="idTrabajo" value="<?php echo ($this->input->post('idTrabajo') ? $this->input->post('idTrabajo') : $item['idTrabajo']); ?>" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                        <label for="idTrabajo">Inicio</label>
                                                        <input readonly type="text" class="form-control border-input" id="horaInicioTrabajo" name="horaInicioTrabajo" value="<?php echo ($this->input->post('horaInicioTrabajo') ? $this->input->post('horaInicioTrabajo') : $item['horaInicioTrabajo']); ?>" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                        <label for="idTrabajo">Fin</label>
                                                        <input readonly type="text" class="form-control border-input" id="horaFinTrabajo" name="horaFinTrabajo" value="<?php echo ($this->input->post('horaFinTrabajo') ? $this->input->post('horaFinTrabajo') : $item['horaFinTrabajo']); ?>" />
                                                        </div>
                                                       
                                                      </div>
                                                      <div class="modal-footer">
                                                        <?php echo form_close(); ?> 
                                                        <!--formulario-->
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="ti-pin-alt"></i> Generar Autorización de trabajo</h4>
      </div>
      <div class="modal-body">
        <p>Ingresa los datos de la autorización.</p><br><br>
        <!--formulario-->
            <?php echo form_open('trabajo_controller/add'); ?>
                
                <div>
                    idTrabajo : 
                    <input type="text" name="idTrabajo" value="<?php echo $this->input->post('idTrabajo'); ?>" />
                </div>
                <div>
                    HoraInicioTrabajo : 
                    <input type="text" name="horaInicioTrabajo" value="<?php echo $this->input->post('horaInicioTrabajo'); ?>" />
                </div>
                
                <div>
                    IdConsigna : 
                    <input type="text" name="idConsigna" value="<?php echo $this->input->post('idConsigna'); ?>" />
                </div>
                <div>
                    ResponsableTrabajo : 
                    <input type="text" name="responsableTrabajo" value="<?php echo $this->input->post('responsableTrabajo'); ?>" />
                </div>
                <div>
                    OperadorTrabajo : 
                    <input type="text" name="operadorTrabajo" value="<?php echo $this->input->post('operadorTrabajo'); ?>" />
                </div>
                <div>
                    DescripcionTrabajo : 
                    <input type="text" name="descripcionTrabajo" value="<?php echo $this->input->post('descripcionTrabajo'); ?>" />
                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Agregar</button>
        <?php echo form_close(); ?> 
        <!--formulario-->
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>



<!--estos scripts son solo para las notificaciones al enviar un formulario-->
<script>
function notificacionModificar() {
}
</script>






