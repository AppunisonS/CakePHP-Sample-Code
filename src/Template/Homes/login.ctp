<div class="comment-form spb-30">

    <?php
    echo $this->Form->postLink(
            'Login with Google', ['controller' => 'Homes', 'action' => 'login', '?' => ['provider' => 'Google']]
    );
//    echo $this->Form->create('Login', array('enctype' => 'multipart/form-data', 'url' => '/login/', 'id' => 'login-form'));
    ?>
    <div class="modal-body">
        <div id="div-login-msg">
            <h2 class="comment-title text-uppercase f2 fw-8 c-3b spb-30 spt-20" id="text-login-msg">Login</h2>
        </div>
        <?php //echo $this->Form->text('email', array('class' => "form-control  mb-20 f2 fw-5",'id' => 'login_username', 'label' => false, 'placeholder' =>"Username / Email Id"));   ?>

        <div>
            <input type="text" name="email" placeholder="Enter your Email" value="<?php echo isset($email) ? $email : '' ?>" class="form-control  mb-20 f2 fw-5">

            <?php //echo $this->Form->password('password', array('id' => "login_password", 'class' => "form-control  mb-20 f2 fw-5", 'label' => false, 'placeholder' =>"Password" ));   ?>
        </div>
        <div>
            <input type="password" name="password" placeholder="Enter your Password" value="<?php echo isset($password) ? $password : '' ?>" class="form-control  mb-20 f2 fw-5">
        </div>

    </div>
    <div class="modal-footer">
        <div class="text-left">
            <?php
            echo $this->Form->button('Login', array("type" => "submit", 'class' => 'f2 fw-5 text-uppercase tnz-2'));
            ?>
            <a id="login_lost_btn" type="button" class="btn btn-link pull-right">Lost Password?</a>
        </div>

    </div>
    <?php echo $this->Form->end(); ?>
    <!-- End # Login Form -->



</div>