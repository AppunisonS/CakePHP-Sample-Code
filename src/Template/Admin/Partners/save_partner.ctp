<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Plans', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/savePartner/' . $id, 'id' => 'addPartnerForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> New Plan</strong></h3>
                </div>
                <div class="box-body">                     
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Name</label>
                        <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Name')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Category</label>
                        <?php echo $this->Form->select('category_id',$categoryList ,array('class' => 'form-control', 'label' => false, 'empty' => 'Select Category')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Time</label>
                        <?php echo $this->Form->select('duration',PLAN_TIME, array('class' => 'form-control', 'label' => false, 'placeholder' => 'Name', 'empty' => 'Select Duartion')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Commission</label>
                        <?php echo $this->Form->input('commission', array('class' => 'form-control', 'label' => false, 'placeholder' => 'commission')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Price</label>
                        <?php echo $this->Form->input('price', array('class' => 'form-control', 'label' => false, 'placeholder' => 'price')); ?>
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

