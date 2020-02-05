<!doctype html>
<html lang="en">
<head>

	<!-- Theme header -->
    <?php $this->load->view( '/header'); ?>

</head>
<body onload="startTime();">

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">

            <div class="logo">
                <a href="dashboard" class="simple-text">
                   <i class="ti-lock"></i> - Consignas!
                </a>
            </div>

            <?php $this->load->view( '/sidebar'); ?>

    	</div>
    </div>

    <div class="main-panel">

        <?php echo $content; ?>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    <i class='ti-unlock'></i> - Consignas! Hecho por Pablo Alanis , &copy; <script>document.write(new Date().getFullYear())</script><br>
                    Dashboard : &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                    <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

	<!-- Theme header -->
    <?php $this->load->view( '/footer'); ?>

</html>

<!--reloj js-->
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
