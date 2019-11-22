<?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>
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
                <?php echo $this->Form->create('Services', array('enctype' => 'multipart/form-data', 'url' => '/admin/saveSubServices/' . $id, 'id' => 'addSubServicesForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Sub Services</strong></h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services</label>
                        <?php echo $this->Form->select('services_id', $servicesNameList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Services')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Name</label>
                        <?php echo $this->Form->input('name', array('id' => 'name', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Name')); ?>
                    </div>

                    <!-----------------Bedroom Checkbox Start---------------------------->
                    <div class="box-body" id="bedroom">
                        <div class="row form-group col-md-9">
                            <div class="col-xs-2">
                                <?php echo $this->Form->checkbox('bedroom[type]', array(isset($this->request->data['bedroom']['type']) ? 'checked' : '', 'class' => 'checkboxuncheck', 'value' => 'bedroom', 'id' => 'bedroomchek')); ?>
                                &nbsp; &nbsp; Bedroom
                                <?php
                                if (isset($id) && !empty($id)) {
                                    echo $this->Form->hidden('bedroom[id]', array('value' => isset($this->request->data['bedroom']['id']) ? $this->request->data['bedroom']['id'] : '', 'id' => 'bedroom'));
                                }
                                ?>
                            </div>
                            <div class="row form-group col-md-12" style="margin-top: 20px;">
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[unit]', array('value' => isset($this->request->data['bedroom']['unit']) ? $this->request->data['bedroom']['unit'] : '', 'id' => 'bedroomList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Unit')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[price]', array('value' => isset($this->request->data['bedroom']['price']) ? $this->request->data['bedroom']['price'] : '', 'id' => 'bedroomPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Price')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[xetra_unit]', array('value' => isset($this->request->data['bedroom']['xetra_unit']) ? $this->request->data['bedroom']['xetra_unit'] : '', 'id' => 'bedroomXetraList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Unit')); ?>
                                </div>
                            </div>
                            <div class="row form-group col-md-12" style="margin-top: 20px;">
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[xetra_price]', array('value' => isset($this->request->data['bedroom']['xetra_price']) ? $this->request->data['bedroom']['xetra_price'] : '', 'id' => 'bedroomXetraPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Base Price')); ?>
                                </div>

                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[defult_time]', array('value' => isset($this->request->data['bedroom']['defult_time']) ? $this->request->data['bedroom']['defult_time'] : '', 'id' => 'bedroomDefultTime', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Defult Time')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bedroom[xetra_time]', array('value' => isset($this->request->data['bedroom']['xetra_time']) ? $this->request->data['bedroom']['xetra_time'] : '', 'id' => 'bedroomXetraTime', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Time')); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-----------------Bedroom Checkbox END---------------------------->

                    <!-----------------BathRoom Checkbox Start---------------------------->
                    <div class="box-body" id="bathroom">
                        <div class="row form-group col-md-9">
                            <div class="col-xs-2">
                                <?php echo $this->Form->checkbox('bathroom[type]', array(isset($this->request->data['bathroom']['type']) ? 'checked' : '', 'class' => 'checkboxuncheck', 'value' => 'bathroom', 'id' => 'bathroomchek')); ?>&nbsp; &nbsp; Bathroom
                                <?php
                                if (isset($id) && !empty($id)) {
                                    echo $this->Form->hidden('bathroom[id]', array('value' => isset($this->request->data['bathroom']['id']) ? $this->request->data['bathroom']['id'] : '', 'id' => 'bathroom'));
                                }
                                ?>
                            </div>
                            <div class="row form-group col-md-12" style="margin-top: 20px;">
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[unit]', array('value' => isset($this->request->data['bathroom']['unit']) ? $this->request->data['bathroom']['unit'] : '', 'id' => 'bathroomList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Unit')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[price]', array('value' => isset($this->request->data['bathroom']['price']) ? $this->request->data['bathroom']['price'] : '', 'id' => 'bathroomPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Price')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[xetra_unit]', array('value' => isset($this->request->data['bathroom']['xetra_unit']) ? $this->request->data['bathroom']['xetra_unit'] : '', 'id' => 'bathroomXetraList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Unit')); ?>
                                </div>

                            </div>
                            <div class="row form-group col-md-12" style="margin-top: 20px;">
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[xetra_price]', array('value' => isset($this->request->data['bathroom']['xetra_price']) ? $this->request->data['bathroom']['xetra_price'] : '', 'id' => 'bathroomXetraPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Base Price')); ?>
                                </div>

                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[defult_time]', array('value' => isset($this->request->data['bathroom']['defult_time']) ? $this->request->data['bathroom']['defult_time'] : '', 'id' => 'bathroomDefultTime', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Defult Time')); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo $this->Form->input('bathroom[xetra_time]', array('value' => isset($this->request->data['bathroom']['xetra_time']) ? $this->request->data['bathroom']['xetra_time'] : '', 'id' => 'bathroomXetraTime', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Time')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------------Bathroom Checkbox END---------------------------->

                    <!-----------------Hours Checkbox Start---------------------------->
                    <div class="box-body" id="hour">
                        <div class="row form-group col-md-12">
                            <div class="col-xs-2">
                                <?php echo $this->Form->checkbox('hour[type]', array(isset($this->request->data['hour']['type']) ? 'checked' : '', 'value' => 'hour', 'id' => 'hourchek')); ?>&nbsp;&nbsp;&nbsp; &nbsp; hour
                                <?php
                                if (isset($id) && !empty($id)) {
                                    echo $this->Form->hidden('hour[id]', array('value' => isset($this->request->data['hour']['id']) ? $this->request->data['hour']['id'] : '', 'id' => 'hour'));
                                }
                                ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo $this->Form->input('hour[unit]', array('value' => isset($this->request->data['hour']['unit']) ? $this->request->data['hour']['unit'] : '', 'id' => 'hourList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Hour')); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo $this->Form->input('hour[price]', array('value' => isset($this->request->data['hour']['price']) ? $this->request->data['hour']['price'] : '', 'id' => 'hourPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Base Price')); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo $this->Form->input('hour[xetra_unit]', array('value' => isset($this->request->data['hour']['xetra_unit']) ? $this->request->data['hour']['xetra_unit'] : '', 'id' => 'hourXetraList', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Hour')); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo $this->Form->input('hour[xetra_price]', array('value' => isset($this->request->data['hour']['xetra_price']) ? $this->request->data['hour']['xetra_price'] : '', 'id' => 'hourXetraPrice', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Base Price')); ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php echo $this->Form->textarea('description', array('id' => 'editor', 'class' => "form-control")); ?>
                    </div>

                </div>
                <div class="box-body">
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->hidden('id', array('value' => isset($id) ? $id : '', 'id' => 'idField')); ?>
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
        //set initial state.
        $('#bedroomchek').click(function () {
            $('#bedroomList').toggle();
            $('#bedroomPrice').toggle();
            $('#bedroomXetraList').toggle();
            $('#bedroomXetraPrice').toggle();
            $('#bedroomDefultTime').toggle();
            $('#bedroomXetraTime').toggle();


            $('#hourchek').removeAttr('checked');
            $('#hourList').hide();
            $('#hourPrice').hide();
            $('#hourXetraList').hide();
            $('#hourXetraPrice').hide();

        });

        $('#bathroomchek').click(function () {
            $('#bathroomList').toggle();
            $('#bathroomPrice').toggle();
            $('#bathroomXetraList').toggle();
            $('#bathroomXetraPrice').toggle();
            $('#bathroomDefultTime').toggle();
            $('#bathroomXetraTime').toggle();

            $('#hourchek').removeAttr('checked');
            $('#hourList').hide();
            $('#hourPrice').hide();
            $('#hourXetraList').hide();
            $('#hourXetraPrice').hide();

        });



        $('#hourchek').click(function () {
            $('#hourList').toggle();
            $('#hourPrice').toggle();
            $('#hourXetraList').toggle();
            $('#hourXetraPrice').toggle();

            $('.checkboxuncheck').removeAttr('checked');
            $('#bathroomList').hide();
            $('#bathroomPrice').hide();
            $('#bathroomXetraList').hide();
            $('#bathroomXetraPrice').hide();
            $('#bathroomDefultTime').hide();
            $('#bathroomXetraTime').hide();

            $('#bedroomList').hide();
            $('#bedroomPrice').hide();
            $('#bedroomXetraList').hide();
            $('#bedroomXetraPrice').hide();
            $('#bedroomDefultTime').hide();
            $('#bedroomXetraTime').hide();


<?php if (!empty($id)) { ?>
                $.ajax({
                    type: 'GET',
                    url: ajax_url + 'admin/deleteSubServiceUnit/' + <?= $id; ?>,

                    success: function (msg) {

                        hideLoder('#loaderID');
                    }
                })
<?php } ?>
        });




<?php if (!empty($id)) { ?>

            if ($("#bedroomchek").prop('checked') == true) {
                $('#bedroomList').show();
                $('#bedroomPrice').show();
                $('#bedroomXetraList').show();
                $('#bedroomXetraPrice').show();
                $('#bedroomDefultTime').show();
                $('#bedroomXetraTime').show();
            }

            if ($("#bathroomchek").prop('checked') == true) {
                $('#bathroomList').show();
                $('#bathroomPrice').show();
                $('#bathroomXetraList').show();
                $('#bathroomXetraPrice').show();
                $('#bathroomDefultTime').show();
                $('#bathroomXetraTime').show();
            }

            if ($("#hourchek").prop('checked') == true) {
                $('#hourList').show();
                $('#hourPrice').show();
                $('#hourXetraList').show();
                $('#hourXetraPrice').show();
            }


<?php } ?>
    });

</script>

<style>
    #bedroomList,#bedroomPrice,#bathroomList,#bathroomPrice,#bedroomXetraList,#bedroomXetraPrice
    ,#bathroomXetraList,#bathroomXetraPrice,#hourList,#hourPrice,#hourXetraList,#hourXetraPrice
    ,#bedroomXetraTime,#bedroomDefultTime,#bathroomXetraTime,#bathroomDefultTime
    {
        display:none;
    }
</style>
