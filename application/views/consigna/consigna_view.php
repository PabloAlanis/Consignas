
		<nav class="navbar navbar-default" style="position: relative;z-index:0 !important;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <h2>Consignas</h2>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php $this->load->view( '/common/auth'); ?>
                    </ul>

                </div>
                <div class="col-md-12" id="botones">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="ti-pin-alt"></i> Generar Consigna</button>
                    <a href="consigna_open_controller" class="btn btn-danger"><i class="ti-unlock"></i> Mostrar Consignas Abiertas</a>
                    <a href="consigna_controller" class="btn btn-success"><i class="ti-lock"></i> Mostrar todas las Consignas</a>

                    <br>
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
                                <h4 class="title">Listado de Consignas</h4>
                                <p class="category">En este listado se muestran las Consignas generadas.</p>
                                <?php
                                 if ($consigna_abiertos > 0 && $consigna_abiertos!==1){
                                     echo "<i class='ti-alert'></i>  Hay ".$consigna_abiertos." Consignas Abiertas.  ";
                                    }else if($consigna_abiertos ==1){
                                     echo "<i class='ti-alert'></i>  Hay ".$consigna_abiertos." Consigna Abierta.  ";
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
                                        <!--<th class="text-center">Consigna</th>-->
                                        <!--<th class="text-center">Linea</th>-->
                                        <th class="text-center">Estado</th>
                                        <!--<th class="text-center">Descripción</th>-->
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($consigna as $item):?>
                                          <tr>
                                            <td class="text-center"><?php echo $item['idConsigna']; ?></td>
                                            <!--conversion de datetime-->
                                            <?php
                                             $fechaInicio=$item['horaInicioConsigna'];
                                             $Inicio = date("d-m-Y / G:i", strtotime($fechaInicio));

                                             if (empty($item['horaFinConsigna'])){
                                                 $fechaFin=$item['horaFinConsigna'];
                                                 $Fin =$fechaFin;
                                             }else{
                                                 $fechaFin=$item['horaFinConsigna'];
                                                 $Fin = date("d-m-Y / G:i", strtotime($fechaFin));
                                             }
                                            ?>
                                            <td class="text-center"><?php echo $Inicio; ?></td>
                                            <!--<td class="text-center"><?php echo $item['horaInicioConsigna']; ?></td>
                                            <td class="text-center"><?php echo $item['horaFinConsigna']; ?></td>-->
                                            <td class="text-center"><?php echo $Fin; ?></td>
                                            <td class="text-center"><?php echo $item['responsable']; ?></td>
                                            <td class="text-center"><?php echo $item['apellidoOperario']; ?></td>


                                             <?php
                                             if (empty($item['horaFinConsigna'])){
                                                 echo "<td class='text-center danger'><i class='ti-unlock'></i> Abierta</td>";
                                             }else{
                                                 echo "<td class='text-center success'><i class='ti-lock'></i> Cerrada</td>";
                                             }
                                             ?>
                                            <!--<td class="text-center"><?php echo $item['descripcionConsigna']; ?></td>-->
                                            <td class="text-center">
                                            <a  href="" data-toggle="modal" data-target="#<?php echo $item['idConsigna']; ?>Ver">Ver</a>

                                             <?php
                                             if (empty($item['horaFinConsigna'])){
                                                 echo " | <a href='' data-toggle='modal' data-target='#".$item['idConsigna']."'>Cerrar</a>";
                                             }
                                             ?>
                                            <!-- Modal para ver consigna -->
                                                <div id="<?php echo $item['idConsigna']; ?>Ver" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
                                                  <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-pin-alt"></i> Detalles de la Consigna <?php echo $item['idConsigna']?></h4>
                                                        <p>Estos son los datos de la Consigna</p>
                                                      </div>

                                                      <div class="modal-body">
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>ID:</strong> <?php echo $item['idConsigna']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Inicio:</strong> <?php echo $Inicio;?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Fin:</strong> <?php echo $Fin;?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Responsable:</strong> <?php echo $item['responsable']?><?php echo " ".$item['nombreResponsable']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Operador:</strong> <?php echo $item['apellidoOperario']?><?php echo " ".$item['nombreOperario']?></p>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                        <p><strong>Descripción de la consigna:</strong></p><br>
                                                        <textarea readonly class="form-control"><?php echo $item['descripcionConsigna']?></textarea>
                                                        </div>
                                                      </div>

                                                      <div>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                      </div>
                                                    </div>

                                                  </div>
                                                </div>
                                                <!--fin modal-->

                                                <!-- Modal para cerrar consigna -->
                                                <div id="<?php echo $item['idConsigna']; ?>" class="modal fade text-left" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="ti-lock"></i> Cierre de Autorización de Trabajo</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Estas seguro de cerrar la Consigna <?php echo $item['idConsigna']?> abierta por el operario <?php echo $item['reponsable'] ;echo " ".$item['responsable']; ?>?</p>
                                                        <!--formulario-->
                                                        <?php echo form_open('consigna_controller/edit/'.$item['idConsigna']); ?>
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

<!-- Modal para generar consigna -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="false" style="position: abolute;z-index:3 !important;background-color: rgba(0, 0, 0, 0.5);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="ti-lock"></i> Consigna <?php echo $contador_consignas+1 ;echo "-"; echo date( "Y") ?> - <?php date_default_timezone_set('America/Buenos_Aires');echo date("d/m/Y - G:i ")?> </h4>
      </div>
      <div class="modal-body">
        <p>Ingresa los datos de la consigna.</p><br>
        <!--formulario-->
            <?php echo form_open('consigna_controller/add'); ?>

                <div hidden>
                    idConsigna :
                    <input type="text" name="idConsigna" value="<?php echo $contador_consignas+1 ;echo "-"; echo date( "Y") ?><?php echo $this->input->post('idConsigna'); ?>" />
                </div>
                <div hidden>
                    HoraInicioConsigna :
                    <input type="datetime" name="horaInicioConsigna" value="<?php echo date("Y/m/d G:i:h ")?><?php echo $this->input->post('horaInicioConsigna'); ?>" />
                </div>



                <div class="form-group col-md-6">
                <label for="responsableConsigna">Responsable</label>
                <select required name="responsableConsigna" id="responsableConsigna" class="form-control border-input">
                <option selected="selected" disabled="disabled"></option>
                <?php foreach ($operarios as $operario)
                  echo '<option value="'.$operario['idOperario'].'">'.$operario['nombreOperario']." ".$operario['apellidoOperario'].'</option>';
                ?>
                </select>
                <small class="form-text">Selecciona al responsable del trabajo.</small>
                </div>
                <div class="form-group col-md-6">
                <label for="operadorConsigna">Operario</label>
                <select required name="operadorConsigna" id="operadorConsigna" class="form-control border-input">
                <option selected="selected" disabled="disabled"></option>
                <?php foreach ($operarios as $operario)
                  echo '<option value="'.$operario['idOperario'].'">'.$operario['nombreOperario']." ".$operario['apellidoOperario'].'</option>';
                ?>
                </select>
                <small class="form-text">Selecciona al operador.</small>
                </div>

                <div class="form-group">
                <label>Carga las lineas involucradas:</label><br>
                <select required name="idLinea" id="idLinea" class="form-control border-input">
                <option selected="selected" disabled="disabled"></option>
                <!--<option value="">No es sobre ninguna Linea</option>    -->
                <?php foreach ($linea as $lineas)
                  echo '<option value="'.$lineas['idLinea'].'">'.$lineas['abreviLinea'].'</option>';
                ?>
                </select><button class="btn btn-success"><i class="ti-plus"></i> Agregar</button>
                </div>

                <div class="form-group">
                <label for="descripcionConsigna">Descripción</label>:
                <textarea class="form-control border-input" name="descripcionConsigna" id="descripcionConsigna" value="<?php echo $this->input->post('descripcionConsigna'); ?>"></textarea>
                <small class="form-text">Ingresa los detalles de la consigna.</small>
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
