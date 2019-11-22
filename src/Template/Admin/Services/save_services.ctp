<?php

echo $this->Html->script('ckeditor/ckeditor.js'); ?>
<script>
    $(document).ready(function () {
        CKEDITOR.replace('editor', {
            toolbar: [

                ['Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'],
                ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
                ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                '/',
                ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                ['Link', 'Unlink', 'Anchor'],
                ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                '/',
                ['Styles', 'Format', 'Font', 'FontSize'],
                ['TextColor', 'BGColor'],
                ['Maximize', 'ShowBlocks', '-', 'About']
            ],
            FullPage: false,
            allowedContent: true,
            ProtectedTags: 'html|head|body',
        });
    });
</script>
<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('SubServices', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveServices/' . $id, 'id' => 'addServicesForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Services</strong></h3>
                </div>

                <div class="box-body">  
                    <!--                    <div class="form-group col-md-9">
                                            <label for="exampleInputEmail1">Services</label>
                        <?php // echo $this->Form->select('services_id', $servicesList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Services')); ?>
                                        </div>-->
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Name</label>
                        <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Name')); ?>
                    </div>
                    
                     <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php echo $this->Form->textarea('description', array('id' => 'editor', 'class' => "form-control")); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Image</label>
                        <?php echo $this->Form->file('image1', array('id' => 'file', 'class' => 'inputBox', 'name' => 'image1', "size" => "20")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('subservices/' . $this->request->data['image'], array('id' => 'image_service', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'image_service', 'width' => '100', 'height' => '100'));
                        }
                        ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Background Image</label>
                        <?php echo $this->Form->file('bg_image1', array('id' => 'bgfile', 'class' => 'inputBox', 'name' => 'bg_image1', "size" => "20")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('subservices/' . $this->request->data['bg_image'], array('id' => 'bg_image_service', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'bg_image_service', 'width' => '100', 'height' => '100'));
                        }
                        ?>
                    </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var ext = $('#file').val().split('.').pop().toLowerCase();
                    //alert(ext);
                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('invalid extension!');
                        $("#file").val("");
                        return false;
                    } else {
                        $('#image_service').attr('src', e.target.result);
                    }

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function () {

            readURL(this);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var ext = $('#bgfile').val().split('.').pop().toLowerCase();
                    //alert(ext);
                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('invalid extension!');
                        $("#bgfile").val("");
                        return false;
                    } else {
                        $('#bg_image_service').attr('src', e.target.result);
                    }

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#bgfile").change(function () {

            readURL(this);
        });
    });
</script>