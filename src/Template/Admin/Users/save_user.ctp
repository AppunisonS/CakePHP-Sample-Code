<!--<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBEZCufQ0L9qkDeOtuBBvoUdIOeQDWuZNc'></script>

<script>
    $(document).ready(function () {
        var long = <?php // echo isset($this->request->data['UserAddress']['longitude']) ? $this->request->data['UserAddress']['longitude'] : 2.7470703125;  ?>;
        var lat = <?php // echo isset($this->request->data['UserAddress']['latitude']) ? $this->request->data['UserAddress']['latitude'] : 46.15242437752303;  ?>;

        $('#us2').locationpicker({
            location: {latitude: lat, longitude: long},
            radius: 0,
            inputBinding: {
                latitudeInput: $('#us2-lat'),
                longitudeInput: $('#us2-lon'),
                locationNameInput: $('#us2-address'),
            },
            enableAutocomplete: true,
            onchanged: function (currentLocation, radius, isMarkerDropped) {
                var addressComponents = $(this).locationpicker('map').location.addressComponents;
                $('#us5-zip').val(addressComponents.postalCode);

            }
        });
    })
</script>-->
<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create(' ', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveUser/' . $id, 'id' => 'addUserForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> New User</strong></h3>
                </div>
                <div class="box-body">                     
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">First Name</label>
                        <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'First Name')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Last Name</label>
                        <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Last Name')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Email</label>
                        <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Email')); ?>
                    </div>
                    <?php if (empty($id)) { ?>
                        <div class="form-group col-md-9">
                            <label for="exampleInputEmail1">Password</label>
                            <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => '*****')); ?>
                        </div>
                    <?php } ?>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Phone</label>
                        <?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => false, 'placeholder' => 'xxxxxx')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">States</label>
                        <?php echo $this->Form->input('states', array('id' => "states", 'class' => 'form-control', 'label' => false, 'placeholder' => 'States')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">City</label>
                        <?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => false, 'placeholder' => 'City')); ?>
                    </div>
                    <!--                    <div class="form-group col-md-9">
                                            <label for="exampleInputEmail1">Image</label>
                    <?php echo $this->Form->file('user_image', array('type' => 'file', 'label' => false)); ?>
                                        </div>-->
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputZip1">Zip*</label>

                            <?php echo $this->Form->input('zip', array('id' => "zip", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Zip')); ?>

                            <?php // echo $this->Form->input('zip', array('id' => "us5-zip", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Zip')); ?>

                            <?php // echo $this->Form->hidden('longitude', array('id' => "us2-lon", "placeholder" => "Enter Longitude", 'class' => "inputBox", 'readonly')); ?>
                            <?php // echo $this->Form->hidden('latitude', array('id' => "us2-lat", "placeholder" => "Enter Latitude", 'class' => "inputBox", 'readonly')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Address*</label>

                            <?php echo $this->Form->text('location', array('id' => "address", "placeholder" => "Enter Address", 'class' => "form-control", 'minlength' => 3, 'maxlength' => 100)); ?>

                            <?php // echo $this->Form->text('location', array('id' => "us2-address", "placeholder" => "Enter Address", 'class' => "form-control", 'minlength' => 3, 'maxlength' => 100)); ?>

                            <!--                            <div style="padding-top: 10px;">
                                                            <div id="us2" style="width: 100%; height:330px;" class="form-group col-md-9"></div>
                                                        </div>-->
                        </div>
                        <!--                        <div class="form-group">
                                                    <div id="us2"></div>
                                                </div>-->

                        <div class="form-group col-md-9">
                            <label for="exampleInputPassword1">Vendor Image</label>
                            <?php echo $this->Form->file('user_image', array('id' => 'file', 'class' => 'inputBox', 'name' => 'user_image', "size" => "20")); ?>
                            <p>&nbsp;</p>
                            <?php
                            if (!empty($id)) {
                                echo $this->Html->image('user/' . $this->request->data['image'], array('id' => 'userImage', 'width' => '100', 'height' => '100'));
                            } else {
                                echo $this->Html->image('NoImage.png', array('id' => 'vendorImage', 'width' => '100', 'height' => '100'));
                            }
                            ?>
                        </div>
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

