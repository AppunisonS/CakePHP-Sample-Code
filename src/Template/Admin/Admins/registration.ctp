<div class="login-box">
    <div class="login-logo">
        <?php echo $this->Html->link('Appunison Admin', ['controller' => 'Admins', 'action' => 'login', '_full' => true, 'prefix' => 'appunisonadmin']); ?>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Welcome to Admin Panel - Registration</p>
        <?php echo $this->Form->create('Admin', array('enctype' => 'multipart/form-data','novalidate' => true, 'url' => '/appunisonadmin/registration', 'id' => 'registrationAdminForm')); ?>

        <div class="form-group has-feedback">
            <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Firstname')); ?>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Lastname')); ?>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Email')); ?>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('contact', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Contact')); ?>
            <span class="fa fa-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Password')); ?>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Confirm Password')); ?>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="form-group col-md-9">
                        <label for="UploadImage">Image</label>
                        <?php echo $this->Form->file('admin_img', array('id' => 'file', 'class' => 'inputBox', 'name' => 'admin_img', "size" => "20")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) { 
                            echo $this->Html->image('admin/' . $this->request->data['image'], array('id' => 'adminImg', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'adminImg', 'width' => '100', 'height' => '100'));
                        }
                        ?>
        </div>
        <?php
        echo $this->Form->button('Submit', array('class' => 'btn btn-primary btn-block btn-flat'));
        echo $this->Form->end();
        ?>
        <div class="social-auth-links text-center">
            <?php echo $this->Html->link('Back to login', ['controller' => 'Admins', 'action' => 'login', '_full' => true, 'prefix' => 'appunisonadmin']); ?>

        </div>

    </div>

</div>
<script>

    $(document).ready(function () {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var ext = $('#file').val().split('.').pop().toLowerCase();
                    //alert(ext);
                    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                        alert('invalid extension!');
                         $("#file").val("");
                        return false;
                    }else{
                        $('#adminImg').attr('src', e.target.result);
                    }
                    
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function () {
            readURL(this);
        });
    })
</script>