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
                ['Maximize', 'ShowBlocks', '-', 'About'],
               
            ],
            FullPage : false,
            allowedContent : true,
            ProtectedTags : 'html|head|body'
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('CmsPage', array('novalidate' => true, 'url' => '/admin/saveCmsPage/' . $id, 'id' => 'saveCmsPagesForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?>Cms Page</strong></h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Alias*</label>
                        <?php echo $this->Form->input('page_alias', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Alias')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Page Title*</label>
                        <?php echo $this->Form->input('page_title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Page Title')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php echo $this->Form->textarea('page_content', array('id' => 'editor', 'class' => "form-control")); ?>
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
