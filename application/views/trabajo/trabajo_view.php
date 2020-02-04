
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
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php $this->load->view( '/common/auth'); ?>
                    </ul>

                </div>

                <div class="col-md-12" id="botones">
									<?php echo form_open('trabajo_fecha_controller'); ?>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="ti-pin-alt"></i> Generar A.T</button>
                    <a href="trabajo_open_controller" class="btn btn-danger"><i class="ti-unlock"></i> Mostrar A.T Abiertas</a>
                    <a href="trabajo_controller" class="btn btn-success"><i class="ti-lock"></i> Mostrar todas las A.T</a>
                    <!--Boton para buscar trabajos por fecha-->

                    <button type="submit" class="btn btn-success"><i class="ti-calendar"> </i> Buscar por fecha</button>
                    <input class="border-input" required type="date" name="horaInicioTrabajo" value="<?php echo $this->input->post('horaInicioTrabajo'); ?>" />
                    <?php echo form_close(); ?>
                    <!--Boton para buscar trabajos por fecha-->

                    <!--<a href="/linea_controller"><p class="">Logout</p></a>-->
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
                                <h4 class="title">Listado de autorizaciones de trabajo</h4>
                                <p class="category">En este listado se muestran las Autorizaciones de trabajo.</p>
                                <?php
                                 if ($contador_abiertos > 0 && $contador_abiertos!==1){
                                     echo "<i class='ti-alert'></i>  Hay ".$contador_abiertos." Autorizaciones de Trabajo Abiertas.  ";
                                    }else if($contador_abiertos ==1){
                                     echo "<i class='ti-alert'></i>  Hay ".$contador_abiertos." Autorización de Trabajo Abierta.  ";
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
                                        <th class="text-center">Linea</th>
                                        <th class="text-center">Estado</th>
                                        <!--<th class="text-center">Descripción</th>-->
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($trabajo as $item):?>
                                          <tr>
                                            <td class="text-center"><?php echo $item['idTrabajo']; ?></td>
                                            <!--conversion de datetime-->
                                            <?php
                                             $fechaInicio=$item['horaInicioTrabajo'];
                                             $Inicio = date("d-m-Y / G:i", strtotime($fechaInicio));

                                             if (empty($item['horaFinTrabajo'])){
                                                 $fechaFin=$item['horaFinTrabajo'];
                                                 $Fin =$fechaFin;
                                             }else{
                                                 $fechaFin=$item['horaFinTrabajo'];
                                                 $Fin = date("d-m-Y / G:i", strtotime($fechaFin));
                                             }
                                            ?>
                                            <td class="text-center"><?php echo $Inicio; ?></td>
                                            <!--<td class="text-center"><?php echo $item['horaInicioTrabajo']; ?></td>
                                            <td class="text-center"><?php echo $item['horaFinTrabajo']; ?></td>-->
                                            <td class="text-center"><?php echo $Fin; ?></td>
                                            <td class="text-center"><?php echo $item['responsable']; ?></td>
                                            <td class="text-center"><?php echo $item['last_name']; ?></td>
                                            <?php
                                             if (empty($item['idConsigna'])){
                                                 echo "<td class='text-center'>-</td>";
                                             }else{
                                                 echo "<td class='text-center'>".$item['idConsigna']."</td>";
                                             }
                                             ?>

                                             <?php
                                             if (empty($item['idLinea'])){
                                                 echo "<td class='text-center'>-</td>";
                                             }else{
                                                 echo "<td class='text-center'>".$item['abreviLinea']."</td>";
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
                                                <div id="<?php echo $item['idTrabajo']; ?>Ver" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
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
                                                        <p><strong>ID:</strong> <?php echo $item['idTrabajo']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Inicio:</strong> <?php echo $Inicio;?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Fin:</strong> <?php echo $Fin;?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Consigna:</strong> <?php echo $item['idConsigna']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Linea:</strong> <?php echo $item['abreviLinea']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Responsable:</strong> <?php echo $item['responsable']?><?php echo " ".$item['nombreResponsable']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Operador:</strong> <?php echo $item['last_name']?><?php echo " ".$item['first_name']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Descripción del Trabajo:</strong></p><br>
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
                                                <div id="<?php echo $item['idTrabajo']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
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
                                                        <label for="idLinea">idLinea</label>
                                                        <input  type="text" class="form-control border-input" id="idLinea" name="idLinea" value="<?php echo ($this->input->post('idLinea') ? $this->input->post('idLinea') : $item['idLinea']); ?>" />
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
                                                        <button type="submit" class="btn btn-danger">Cerrar Autorización</button>
                                                        <?php echo form_close(); ?>
                                                        <!--formulario-->
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Todavia no</button>
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
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
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
                <div class="form-group col-md-6">
                <label for="idConsigna">Consigna</label>
                <select name="idConsigna" id="idConsigna" class="form-control border-input">
                <option selected="selected" disabled="disabled">Ninguna</option>
                <?php foreach ($consigna as $c)
                //paso a formato la hora y fecha de la consigna
                  //$fechaInicioConsigna=$c['horaInicioConsigna'];
                  //$InicioConsigna = date("d-m-Y / G:i", strtotime($fechaInicioConsigna));
                  echo '<option value="'.$c['idConsigna'].'">'.$c['idConsigna'].' ( '.$c['horaInicioConsigna'].')</option>';
                ?>
                </select>
                <small class="form-text">La A.T es sobre una consigna abierta?</small>
                </div>

                <div class="form-group col-md-6">
                <label for="idLinea">Linea</label>
                <select name="idLinea" id="idLinea" class="form-control border-input">
                <option selected="selected" disabled="disabled">Ninguna</option>
                <?php foreach ($linea as $lineas)
                  echo '<option value="'.$lineas['idLinea'].'">'.$lineas['abreviLinea'].'</option>';
                ?>
                </select>
                <small class="form-text">Selecciona si es sobre una linea.</small>
                </div>

                <div class="form-group col-md-12">
                <label for="responsableTrabajo">Responsable</label>
                <select required name="responsableTrabajo" id="responsableTrabajo" class="form-control border-input">
                <option selected="selected" disabled="disabled"></option>
                <?php foreach ($operarios as $operario)
                  echo '<option value="'.$operario['idOperario'].'">'.$operario['nombreOperario']." ".$operario['apellidoOperario'].'</option>';
                ?>
                </select>
                <small class="form-text">Selecciona al responsable del trabajo.</small>
                </div>

                <!--carga al user logueado-->
                <div hidden class="form-group col-md-6">
                <label for="operadorTrabajo">Operario</label>
                <input type="text" value="<?php echo $x->id; ?>" readonly name="operadorTrabajo" id="operadorTrabajo" class="form-control border-input"/>
                <?php echo $x->first_name.' ';echo $x->last_name; ?>
                </div>

                <!--esto no va-->
                <div hidden class="form-group col-md-6">
                <label for="operadorTrabajo">Operario</label>
                <select  class="form-control border-input">
                <option  disabled="disabled"></option>
                <option selected="selected" value="<?php echo $x->id; ?>"><?php echo $x->first_name.' ';echo $x->last_name; ?></option>
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
