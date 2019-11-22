<?php
echo $this->Html->css('appunisonadmin/intlTelInput.css');
echo $this->Html->script('appunisonadmin/intlTelInput.js');
?>
<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Admin', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveAdmin/' . $id, 'id' => 'AdminLoginForm')); ?>

                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add New'; ?>  Admin</strong></h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">First Name</label>
                        <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Firstname')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Last Name</label>
                        <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Lastname')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputFile">Email</label>
                        <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Email')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Contact No</label>
                        <?php echo $this->Form->input('contact_no', array('id' => "mobile-number", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Contact No')); ?>
                        <span id="valid-msg" class="hide valid">✓ Valid Number</span>
                        <span id="error-msg" class="hide invalid">x Invalid Number</span>
                    </div>
                    <?php if (!$id) { ?>
                        <div class="form-group col-md-9">
                            <label for="exampleInputEmail1">Password</label>
                            <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Password')); ?>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Confirm Password')); ?>
                        </div>
                    <?php } ?>
                    <div class="form-group col-md-9">
                        <label for="UploadImage">Image</label>
                        <?php echo $this->Form->hidden('x1', array('id' => 'x1', 'name' => 'x1')); ?>
                        <?php echo $this->Form->hidden('y1', array('id' => 'y1', 'name' => 'y1')); ?>
                        <?php echo $this->Form->hidden('x2', array('id' => 'x2', 'name' => 'x2')); ?>
                        <?php echo $this->Form->hidden('y2', array('id' => 'y2', 'name' => 'y2')); ?>
                        <?php echo $this->Form->file('admin_img', array('id' => 'file', 'class' => 'inputBox', 'name' => 'admin_img', "size" => "20", 'onchange' => "fileSelectHandler()")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('admin/' . $this->request->data['image'], array('id' => 'adminImg', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'adminImg', 'width' => '100', 'height' => '100'));
                        }
                        ?>
                    </div>


                </div>
                <div class="error"></div>
                <div class="step2">
                    <h2 id="crop" style="display:none;">Step2: Please select a crop region</h2>
                    <img id="preview" />
                    <div class="info">
                        <?php echo $this->Form->hidden('filesize', array('id' => 'filesize', 'name' => 'filesize')); ?>
                        <?php echo $this->Form->hidden('filetype', array('id' => 'filetype', 'name' => 'filetype')); ?>
                        <?php echo $this->Form->hidden('filedim', array('id' => 'filedim', 'name' => 'filedim')); ?>
                        <?php echo $this->Form->hidden('w', array('id' => 'w', 'name' => 'w')); ?>
                        <?php echo $this->Form->hidden('h', array('id' => 'h', 'name' => 'h')); ?></div>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->hidden('id', array('id' => 'idField')); ?>

                        <?php echo $this->Form->button(' Submit', array('type' => 'submit', 'class' => 'fa fa-save btn btn-block btn-primary')); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-block btn-info fa fa-chevron-left padding-left-lg" onclick="javascript:history.go(-1);">  Back   </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
<script>

    $(document).ready(function () {
        $("#adminImg").click(function () {
            $("#file").click();
            $("#crop").show();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var ext = $('#file').val().split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('invalid extension!');
                        $("#file").val("");
                        return false;
                    } else {
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
<script>
    $(document).ready(function () {
        $("#mobile-number").intlTelInput({
            responsiveDropdown: true,
            preferredCountries: ["in"],
            utilsScript: ajax_url + "js/appunisonadmin/utils.js"
        });
        var telInput = $("#mobile-number"),
                errorMsg = $("#error-msg"),
                validMsg = $("#valid-msg");

// initialise plugin
        telInput.intlTelInput({
            utilsScript: ajax_url + "js/appunisonadmin/utils.js"
        });

// on blur: validate
        telInput.blur(function () {
            if ($.trim(telInput.val())) {
                if (telInput.intlTelInput("isValidNumber")) {
                    validMsg.removeClass("hide");
                } else {
                    telInput.addClass("error");
                    errorMsg.removeClass("hide");
                    validMsg.addClass("hide");
                }
            }
        });

// on keydown: reset
        telInput.keydown(function () {
            telInput.removeClass("error");
            errorMsg.addClass("hide");
            validMsg.addClass("hide");
        });
    });
</script>
<style type="text/css">
    /*#file { display:none; }*/ 
</style>