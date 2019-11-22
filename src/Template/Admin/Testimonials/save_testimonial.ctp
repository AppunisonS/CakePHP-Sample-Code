<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('Testimonials', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveTestimonial/' . $id, 'id' => 'addTestimonialsForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> New Testimonial</strong></h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-9">
                        <label for="exampleInputName">Author Name</label>
                        <?php echo $this->Form->input('author', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Author Name')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputDescription">Testimonial</label>
                        <?php echo $this->Form->textarea('testimonial', array('type' => 'textarea', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Testimonial')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputDescription">Image</label>
                        <?php echo $this->Form->file('testimonial_image', array('id' => 'file', 'class' => 'inputBox', 'name' => 'testimonial_image', "size" => "20")); ?>
                        <p>&nbsp;</p>
                        <?php
                        if (!empty($id)) {
                            echo $this->Html->image('testimonial/' . $this->request->data['image'], array('id' => 'testimonialImage', 'width' => '100', 'height' => '100'));
                        } else {
                            echo $this->Html->image('noimage.png', array('id' => 'testimonialImage', 'width' => '100', 'height' => '100'));
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
                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('invalid extension!');
                        $("#file").val("");
                        return false;
                    } else {
                        $('#testimonialImage').attr('src', e.target.result);
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

