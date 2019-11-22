<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Categories', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveFaq/' . $id, 'id' => 'addFaqsForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> New Faq</strong></h3>
                </div>
                <div class="box-body"> 

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services</label>
                        <?php echo $this->Form->select('services_id', $servicesList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Services', 'id' => 'services_id')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Question</label>
                        <?php echo $this->Form->input('question', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Question ')); ?>
                    </div>
                </div>
                <div class="box-body">                     
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Answer</label>
                        <?php echo $this->Form->input('answer', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Answer ')); ?>
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
