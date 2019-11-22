<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('SubServices', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveXetras/' . $id, 'id' => 'addXertasForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Xetra Services</strong></h3>
                </div>

                <div class="box-body">  
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services</label>
                        <?php echo $this->Form->select('services_id', $servicesList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Services', 'id' => 'services_id')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Sub Services</label>
                        <?php echo $this->Form->select('sub_services_id', [], array('class' => 'form-control', 'label' => false, 'empty' => 'Select Sub Services', 'id' => 'sub_services_id')); ?>
                    </div>
                    
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Title</label>
                        <?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Title')); ?>
                    </div>
                     <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Xetra Time</label>
                        <?php echo $this->Form->number('xetra_time', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Time')); ?>
                    </div>
                    
                    
                    

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Price</label>
                        <?php echo $this->Form->number('price', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Price')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php echo $this->Form->textarea('description', array( 'class' => "form-control")); ?>
                    </div>
                    
                    <div class="form-group col-md-9">
                        <label for="exampleInputDescription">Image</label>
                        <?php
                        if (!empty($id)) {
                            echo $this->Form->file('xetra_image', array('id' => 'file', 'class' => 'inputBox', 'name' => 'xetra_image', "size" => "20"));
                        } else {
                            echo $this->Form->file('xetra_image', array('id' => 'file', 'class' => 'inputBox', 'name' => 'xetra_image', "size" => "20", "required" => "required"));
                        }
                        ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('xetra/' . $this->request->data['image'], array('id' => 'Image', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'Image', 'width' => '100', 'height' => '100'));
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
<script>
    $(document).ready(function () {
        $('#services_id').change(function () {
            getList(ajax_url + '/admin/getList/SubServices/services_id/' + $(this).val(), 'sub_services_id');
        });
       
<?php if (!empty($id)) { ?>
            getList(ajax_url + 'admin/getList/SubServices/id/' +<?= $this->request->data['sub_services_id'] ?>, 'sub_services_id',<?= $this->request->data['sub_services_id'] ?>);
<?php } ?>
    });
</script>

<script>
    $(document).ready(function () {
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
                        $('#Image').attr('src', e.target.result);
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