
<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('TrustAndSecurities', array('enctype' => 'multipart/form-data', 'url' => '/admin/saveTrustAndSecurities/' . $id, 'id' => 'addTrustAndSecuritiesForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Trust And Securities</strong></h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Name</label>
                        <?php echo $this->Form->input('name', array('id' => 'name', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Name')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php echo $this->Form->textarea('description', array('class' => "form-control")); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Image</label>
                        <?php echo $this->Form->file('image1', array('id' => 'file', 'class' => 'inputBox', 'name' => 'image1', "size" => "20")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('tas/'.$this->request->data['image'], array('id' => 'image_service', 'width' => '100', 'height' => '100','style'=>'background-color: #00c0ef;'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'image_service', 'width' => '100', 'height' => '100'));
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
    })
</script>
