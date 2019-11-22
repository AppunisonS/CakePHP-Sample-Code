<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('PlanTypes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/savePlanType/' . $id, 'id' => 'addPlanTypeForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add New'; ?>  Plan</strong></h3>
                </div>
                <div class="box-body">
                    <?php if (!empty($id) && $this->request->data['duration'] == 14) { ?>

                    <?php } else { ?>
                        <div class="form-group col-md-9">
                            <label for="exampleInputEmail1">Duration</label>
                            <?php
                            echo $this->Form->select('duration', json_decode(DURATION, TRUE), array('class' => 'form-control', 'label' => false, 'empty' => 'Select Duration'));
                            ?>
                        </div>
                    <?php } ?>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">List of Plans</label>
                        <?php
                        if (empty($id)) {
                            echo $this->Form->select('plans', $list, array('class' => 'form-control', 'label' => false, 'multiple' => true, 'id' => 'multiselect'));
                        } else {
                            echo $this->Form->select('plans', $list, array('class' => 'form-control', 'label' => false, 'multiple' => true, 'value' => array_keys($planValues), 'id' => 'multiselect'));
                        }
                        ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Price</label>
                        <?php
                        if (isset($this->request->data['duration']) && $this->request->data['duration'] == TRIAL) {
                            echo $this->Form->input('price', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Price', 'readOnly'));
                        } else {
                            echo $this->Form->input('price', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Price'));
                        }
                        ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Limit</label>
                        <?php echo $this->Form->input('plan_limit', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Limit')); ?>
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
    $('select[multiple]').multiselect({
        columns: 3,
        placeholder: 'Select Plans',
        search: true,
        selectAll: true,

    });
</script>
<script>
    $(function () {
        $('form').submit(function () {
            var options = $('#multiselect > option:selected');
            if (options.length == 0) {
                alert('Please select atleast one type');
                return false;
            }
        });
    });
</script>