
   
<!--   Core JS Files   -->
<script src="/static/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/static/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/static/assets/js/material.min.js" type="text/javascript"></script> 



        <!--Ion_auth-->
        
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-headphone-alt"></i>
                    <p><?php echo " ".$x->first_name." ";echo $x->last_name; ?></p>
                    <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/auth/create_user/"><i class="ti-pencil"></i>  - Crear</a></li>
                <li><a href="/auth/index1/"><i class="ti-search"></i> - Usuarios</a></li>
                <li><a href="/auth/logout/"><i class="ti-shift-right"></i>  - Salir</a></li>
              </ul>
        </li>