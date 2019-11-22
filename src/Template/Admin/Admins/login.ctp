<div class="login-box">
    <div class="login-logo">
        <?php echo $this->Html->link($WebsiteSettings->title ." ADMIN PANEL", ['controller' => 'Admins', 'action' => 'login', '_full' => true, 'prefix' => 'admin']); ?>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Welcome to admin panel</p>
        <?php echo $this->Form->create('Admin', array('novalidate' => true, 'id' => 'AdminLoginForm')); ?>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Email')); ?>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Password')); ?>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <?php
        echo $this->Form->button('Submit', array('class' => 'btn btn-primary btn-block btn-flat'));
        echo $this->Form->end();
        ?>
    </div>

</div>