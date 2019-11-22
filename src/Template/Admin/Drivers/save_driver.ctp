<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Drivers', array('enctype' => 'multipart/form-data', 'url' => '/admin/saveDriver/' . $id, 'id' => 'addDriverForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Route</strong></h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services Name</label>
                        <?php echo $this->Form->input('service_name', array('id' => 'service_name', 'value' => 'Driver', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Name', 'readonly' => true)); ?>
                        <?php echo $this->Form->hidden('services_id', array('id' => 'services_id', 'value' => '3')); ?>

                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Destination To</label>
                        <?php echo $this->Form->input('destination_to', array('id' => 'destination_to', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Destination To')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Destination From</label>
                        <?php echo $this->Form->input('destination_from', array('id' => 'destination_from', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Destination From')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Price</label>
                        <?php echo $this->Form->input('price', array('id' => 'price', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Price')); ?>
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

 

