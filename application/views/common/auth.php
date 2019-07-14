
    <li>
        <!--Ion_auth-->
        <a href="/auth/logout/"><?php echo $user_login['first_name'].$user_login['last_name']; ?>
            <p class="">Logout</p>
        </a>
        <a href="/auth/create_user/">
            <p class="">Crear<?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'); ?></p>
        </a>
        
    <!--
    <?php  if(logged_in()) {  ?>

        <a href="/logout/dashboard/">
            <p class="">Logout</p>
        </a>

    <?php  } else { ?>

        <a href="/login/dashboard/">
            <p class="">Login</p>
        </a>

    <?php  } ?>-->

    </li>
