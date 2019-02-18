
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
                                <?php
                                 if ($contador_abiertos > 0 && $contador_abiertos!==1){
                                     echo "<strong><i class='ti-alert'></i>  Hay ".$contador_abiertos." Autorizaciones de Trabajo Abiertas. <i class='ti-alert'></i> </strong>";
                                    }else if($contador_abiertos ==1){
                                     echo "<strong><i class='ti-alert'></i>  Hay ".$contador_abiertos." Autorización de Trabajo Abierta. <i class='ti-alert'></i> </strong>";
                                    }
                                ?>
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
                                        <!--<th class="text-center">Descripción</th>-->
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($trabajo as $item):?>
                                          <tr>
                                            <td class="text-center"><?php echo $item['idTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['horaInicioTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['horaFinTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['responsable']; ?></td>
                                            <td class="text-center"><?php echo $item['apellidoOperario']; ?></td>
                                            <?php
                                             if (empty($item['idConsigna'])){
                                                 echo "<td class='text-center'>-</td>";
                                             }else{
                                                 echo "<td class='text-center'>".$item['idConsigna']."</td>";
                                             }
                                             ?> 
                                             <?php
                                             if (empty($item['horaFinTrabajo'])){
                                                 echo "<td class='text-center danger'><i class='ti-unlock'></i> Abierta</td>";
                                             }else{
                                                 echo "<td class='text-center success'><i class='ti-lock'></i> Cerrada</td>";
                                             }
                                             ?>  
                                            <!--<td class="text-center"><?php echo $item['descripcionTrabajo']; ?></td>-->
                                            <td class="text-center"> 
                                            <a  href="" data-toggle="modal" data-target="#<?php echo $item['idTrabajo']; ?>Ver">Ver</a>
                                            
                                             <?php
                                             if (empty($item['horaFinTrabajo'])){
                                                 echo " | <a href='' data-toggle='modal' data-target='#".$item['idTrabajo']."'>Cerrar</a>";
                                             }
                                             ?> 
                                            <!-- Modal para ver trabajo -->
                                                <div id="<?php echo $item['idTrabajo']; ?>Ver" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;">
                                                  <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-pin-alt"></i> Detalles de la A.T <?php echo $item['idTrabajo']?></h4>
                                                        <p>Estos son los datos de la Autorización</p>
                                                      </div>
                                                        
                                                      <div class="modal-body">
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>ID: <?php echo $item['idTrabajo']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Inicio: <?php echo $item['horaInicioTrabajo']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Fin: <?php echo $item['horaFinTrabajo']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Consigna: <?php echo $item['idConsigna']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Responsable: <?php echo $item['responsable']?><?php echo " ".$item['nombreResponsable']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Operador: <?php echo $item['apellidoOperario']?><?php echo " ".$item['nombreOperario']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p>Descripción del Trabajo:</p><br>
                                                        <textarea readonly class="form-control"><?php echo $item['descripcionTrabajo']?></textarea>
                                                        </div>
                                                      </div>
                                                        
                                                      <div>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                      </div>
                                                    </div>
                                                
                                                  </div>
                                                </div>
                                                <!--fin modal-->    
                                                
                                                <!-- Modal para cerrar trabajo -->
                                                <div id="<?php echo $item['idTrabajo']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-lock"></i> Cierre de Autorización de Trabajo</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Estas seguro de cerrar la Autorización de Trabajo <?php echo $item['idTrabajo']?> abierta por el operario <?php echo $item['reponsable'] ;echo " ".$item['responsable']; ?>?</p>
                                                        <!--formulario-->
                                                        <?php echo form_open('trabajo_controller/edit/'.$item['idTrabajo']); ?>
                                                        <div hidden class="form-group col-md-4">
                                                        <label for="idTrabajo">Id</label>
                                                        <input  type="text" class="form-control border-input" id="idTrabajo" name="idTrabajo" value="<?php echo ($this->input->post('idTrabajo') ? $this->input->post('idTrabajo') : $item['idTrabajo']); ?>" />
                                                        </div>
                                                        <div hidden class="form-group col-md-4">
                                                        <label for="horaInicioTrabajo">Inicio</label>
                                                        <input  type="datetime" class="form-control border-input" id="horaInicioTrabajo" name="horaInicioTrabajo" value="<?php echo ($this->input->post('horaInicioTrabajo') ? $this->input->post('horaInicioTrabajo') : $item['horaInicioTrabajo']); ?>" />
                                                        </div>
                                                        
                                                        <div hidden class="form-group col-md-4">
                                                        <label for="idConsigna">idConsigna</label>
                                                        <input  type="text" class="form-control border-input" id="idConsigna" name="idConsigna" value="<?php echo ($this->input->post('idConsigna') ? $this->input->post('idConsigna') : $item['idConsigna']); ?>" />
                                                        </div>
                                                        <div hidden class="form-group col-md-4">
                                                        <label for="responsableTrabajo">responsableTrabajo</label>
                                                        <input  type="text" class="form-control border-input" id="responsableTrabajo" name="responsableTrabajo" value="<?php echo ($this->input->post('responsableTrabajo') ? $this->input->post('responsableTrabajo') : $item['responsableTrabajo']); ?>" />
                                                        </div>
                                                        <div hidden class="form-group col-md-4">
                                                        <label for="operadorTrabajo">operadorTrabajo</label>
                                                        <input  type="text" class="form-control border-input" id="operadorTrabajo" name="operadorTrabajo" value="<?php echo ($this->input->post('operadorTrabajo') ? $this->input->post('operadorTrabajo') : $item['operadorTrabajo']); ?>" />
                                                        </div>
                                                        <div hidden class="form-group col-md-12">
                                                        <label for="descripcionTrabajo">descripcionTrabajo</label>
                                                        <input  type="text" class="form-control border-input" id="descripcionTrabajo" name="descripcionTrabajo" value="<?php echo ($this->input->post('descripcionTrabajo') ? $this->input->post('descripcionTrabajo') : $item['descripcionTrabajo']); ?>" />
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger btn-lg">Cerrar Autorización</button>
                                                        <?php echo form_close(); ?> 
                                                        <!--formulario-->
                                                        <button type="button" class="btn btn-success btn-lg" data-dismiss="modal">Todavia no</button>
                                                      </div>
                                                    </div>

                                                  </div>
                                                </div>
                                                <!--fin modal-->
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

<!-- Modal para generar autorizacion de trabajo -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="ti-lock"></i> Autorización <?php echo $contador+1 ;echo "-"; echo date( "Y") ?> - <?php date_default_timezone_set('America/Buenos_Aires');echo date("d/m/Y - G:i ")?> </h4>
      </div>
      <div class="modal-body">
        <p>Ingresa los datos de la autorización.</p><br>
        <!--formulario-->
            <?php echo form_open('trabajo_controller/add'); ?>
          
                <div hidden>
                    idTrabajo : 
                    <input type="text" name="idTrabajo" value="<?php echo $contador+1 ;echo "-"; echo date( "Y") ?><?php echo $this->input->post('idTrabajo'); ?>" />
                </div>
                <div hidden>
                    HoraInicioTrabajo : 
                    <input type="datetime" name="horaInicioTrabajo" value="<?php echo date("Y/m/d G:i:h ")?><?php echo $this->input->post('horaInicioTrabajo'); ?>" />
                </div>              
                <div class="form-group">
                <label for="idConsigna">Consigna</label>
                <input type="text" class="form-control border-input" name="idConsigna" id="idConsigna" value="<?php echo $this->input->post('idConsigna'); ?>" />
                <small class="form-text">Indica si la autorización perteneze a una consigna.</small>
                </div>
                <div class="form-group col-md-6">
                <label for="responsableTrabajo">Responsable</label>
                <select name="responsableTrabajo" id="responsableTrabajo" class="form-control border-input">
                <?php foreach ($operarios as $operario)
                  echo '<option value="'.$operario['idOperario'].'">'.$operario['nombreOperario']." ".$operario['apellidoOperario'].'</option>';   
                ?>
                </select>
                <small class="form-text">Selecciona al responsable del trabajo.</small>    
                </div>
                <div class="form-group col-md-6">
                <label for="operadorTrabajo">Operario</label>
                <select name="operadorTrabajo" id="operadorTrabajo" class="form-control border-input">
                <?php foreach ($operarios as $operario)
                  echo '<option value="'.$operario['idOperario'].'">'.$operario['nombreOperario']." ".$operario['apellidoOperario'].'</option>';   
                ?>
                </select>
                <small class="form-text">Selecciona al operador.</small>    
                </div>
                <div class="form-group">
                <label for="descripcionTrabajo">Descripción</label>: 
                <textarea class="form-control border-input" name="descripcionTrabajo" id="descripcionTrabajo" value="<?php echo $this->input->post('descripcionTrabajo'); ?>"></textarea>
                <small class="form-text">Ingresa los detalles del trabajo.</small>  
                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Generar</button>
        <?php echo form_close(); ?> 
        <!--formulario-->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>



<!--estos scripts son solo para las notificaciones al enviar un formulario-->
<script>
function notificacionModificar() {
}
</script>






