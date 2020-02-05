

            <ul class="nav">
                <li class="<?php echo ($path == 'dashboard' ? 'active':''); ?>">
                    <a href="dashboard">
                        <i class="ti-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="<?php echo ($path == 'consigna/consigna_view' ? 'active':''); ?>">
                    <a href="consigna_controller">
                        <i class="ti-lock"></i>
                        <p>Consignas<br></p>
                        <?php
                        if ($consigna_abiertos==1){
                           echo "( ".$consigna_abiertos." abierta )";
                        }else if($consigna_abiertos>1){
                           echo "( ".$consigna_abiertos." abiertas )";
                        }
                        ?>
                    </a>
                </li>
                <li class="<?php echo ($path == 'trabajo/trabajo_view' ? 'active':''); ?>">
                    <a href="trabajo_controller">
                        <i class="ti-key"></i>
                        <p>Autorización Trabajo <br></p>
                        <?php
                        if ($trabajo_abiertos==1){
                           echo "( ".$trabajo_abiertos." abierta )";
                        }else if($trabajo_abiertos>1){
                           echo "( ".$trabajo_abiertos." abiertas )";
                        }
                        ?>
                    </a>
                </li>
                <li class="<?php echo ($path == 'linea/linea_view' ? 'active':''); ?>">
                    <a href="linea_controller">
                        <i class="ti-align-justify"></i>
                        <p>Lineas</p>
                    </a>
                </li>
                <li class="<?php echo ($path == 'operario/operario_view' ? 'active':''); ?>">
                    <a href="operario_controller">
                        <i class="ti-user"></i>
                        <p>Operarios</p>
                    </a>
                </li>
                <li class="<?php echo ($path == 'user' ? 'active':''); ?>">
                    <a href="user">
                        <i class="ti-book"></i>
                        <p>Mapa</p>
                    </a>
                </li>
                <!--<li class="<?php echo ($path == 'table' ? 'active':''); ?>">
                    <a href="table">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li class="<?php echo ($path == 'typography' ? 'active':''); ?>">
                    <a href="typography">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>-->
                <!--<li class="<?php echo ($path == 'icons' ? 'active':''); ?>">
                    <a href="icons">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li class="<?php echo ($path == 'notifications' ? 'active':''); ?>">
                    <a href="notifications">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>-->
                <li><h4 class="text-center" id="txt"></h4></li>
            </ul>
