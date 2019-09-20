<!-- Bootstrap core CSS     -->
    <link href="/static/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="/static/assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="/static/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/static/assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/static/assets/css/themify-icons.css" rel="stylesheet">
    
    <!--script y CSS-->
    <script src="static/assets/js/sweetalert2.all.min.js"></script>
    <script src="static/assets/js/jquery-3.2.1.min.js"></script>

    <!--   Core JS Files   -->
    <script src="/static/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/static/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/static/assets/js/material.min.js" type="text/javascript"></script>

    <!--   Core JS Files   -->
    <script src="/static/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/static/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="/static/assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="/static/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/static/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="/static/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="/static/assets/js/demo.js"></script>
<!---->

        <body style="background: url('/static/assets/img/bg04.jpg') no-repeat center center fixed;-webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;">

            <div class="border-left-0" style="position: absolute;
              left: 50%;
              top: 50%;
              -webkit-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);">
                <h1 class="text-center"><i class="ti-lock"></i> - Consignas!</h1>
                <h3 class="text-center"><?php echo lang('login_heading');?></h3>
                <h5 class="text-center"><?php echo lang('login_subheading');?></h5>

                <div class="text-center" id="infoMessage"><?php echo $message;?></div>
                
                
                <?php echo form_open("auth/login");?>

                  <p class="text-center">
                    <?php echo lang('login_identity_label', 'identity');?>
                    <?php echo form_input($identity);?>
                  </p>

                  <p class="text-center">
                    <?php echo lang('login_password_label', 'password');?>
                    <?php echo form_input($password);?>
                  </p>

                  <p hidden class="text-center">
                    <?php echo lang('login_remember_label', 'remember');?>
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                  </p>
                  <br>
                
                  <div class="boton text-center">
                  <button type="submit" class=" btn btn-light btn-lg">Ingresar</button>
                  </div>
                  <p hidden class="text-center"><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

                <?php echo form_close();?>
                <br>
                <p class="text-center"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                </div>
            
                
        </body>
