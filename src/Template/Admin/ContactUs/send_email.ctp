<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary"> 
                <?php echo $this->Form->create('Emails', array('novalidate' => true, 'url' => '/admin/sendEmail/'.$Results['id'], 'id' => 'sendEmailForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo (@$id) ? 'Edit' : 'Send'; ?> Email</strong></h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">To</label>
                        <div class="example example_markup">
                            <?php echo $this->Form->input('email', ['class' => 'form-control', 'value' => $Results['email'],'id' => 'email', 'label' => false, 'readonly']); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Query Message</label>
                        <?php echo $this->Form->input('query', array('type' => 'textarea', 'class' => 'form-control', 'value' => $Results['message'], 'label' => false, 'readonly')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Message</label>
                        <?php echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Message')); ?>
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
        $('#sendEmailForm').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
</script>



