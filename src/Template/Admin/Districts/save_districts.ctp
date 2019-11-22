<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Districts', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveDistricts/' . $id, 'id' => 'addDistrictsForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add New'; ?>  District</strong></h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">District Name</label>
                        <?php echo $this->Form->input('district', array('class' => 'form-control', 'label' => false, 'placeholder' => 'District')); ?>
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