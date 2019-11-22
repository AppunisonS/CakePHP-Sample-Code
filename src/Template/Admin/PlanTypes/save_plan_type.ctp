<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('PlanTypes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/savePlanType/' . $id, 'id' => 'addPlanTypeForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add New'; ?>  Plan</strong></h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Duration</label>
                        <?php
                        echo $this->Form->select('duration', json_decode(DURATION, TRUE), array('class' => 'form-control', 'label' => false, 'empty' => 'Select Duration'));
                        ?>
                    </div>
 
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">3 Months(% discount)</label>
                        <?php
                            echo $this->Form->input('per_3_month', array('class' => 'form-control', 'label' => false, 'placeholder' => '3 Months (% discount)'));
                        ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">6 Months (% discount)</label>
                        <?php echo $this->Form->input('per_6_month', array('class' => 'form-control', 'label' => false, 'placeholder' => '6 Months (% discount)')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">12 Months (% discount) </label>
                        <?php echo $this->Form->input('per_12_month', array('class' => 'form-control', 'label' => false, 'placeholder' => '12 Months (% discount)')); ?>
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
 