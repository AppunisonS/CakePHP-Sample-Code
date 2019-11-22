<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create(' ', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/saveVendor/' . $id, 'id' => 'addVendorForm')); ?>
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
                        <?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'label' => false, 'placeholder' => 'xxxxxx')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services</label>
                        <?php echo $this->Form->select('services_id', $servicesList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Category')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <?php echo $this->Form->input('vendors_detail.mobile_number', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Mobile Number')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">How much paid cleaning experience do you have?</label>
                        <?php echo $this->Form->select('vendors_detail.vendor_experience', $experience, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Experience')); ?>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Are you legally eligible to work in the U.S.?</label>
                        <?php echo $this->Form->select('vendors_detail.legally_eligible', $legally_eligible, array('class' => 'form-control', 'label' => false, 'empty' => 'Select')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">How did you hear about Xtra Jobz? (optional)</label>
                        <?php echo $this->Form->select('vendors_detail.about_xetra_job', $about_xetra_job, array('class' => 'form-control', 'label' => false, 'empty' => 'Select')); ?>
                    </div>


                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Gender</label>
                        <?php echo $this->Form->select('vendors_detail.gender', $gender, array('class' => 'form-control', 'label' => false, 'empty' => 'Select')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">How do you plan on commuting to jobs? </label>
                        <?php echo $this->Form->select('vendors_detail.commuting', $commuting, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Category')); ?>
                    </div>

                    <div class="form-group  col-md-9">
                        <label for="exampleInputZip1">Districts*</label>
                        <?php echo $this->Form->select('vendors_detail.city', $districtsList, array('class' => 'form-control', 'label' => false, 'empty' => 'Select Districts')); ?>
                        <?php // echo $this->Form->input('vendors_detail.city', array('id' => "city", 'class' => 'form-control', 'label' => false, 'placeholder' => 'City')); ?>
                    </div>
                    <div class="form-group  col-md-9">
                        <label for="exampleInputZip1">State*</label>
                        <?php echo $this->Form->input('vendors_detail.state', array('id' => "state", 'class' => 'form-control', 'label' => false, 'placeholder' => 'State')); ?>
                    </div>

                    <div class="box-body col-md-6">

<!--                        <div class="form-group">
                            <label for="exampleInputZip1">Zip*</label>
                            <?php // echo $this->Form->input('vendors_detail.zip', array('id' => "zip", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Zip')); ?>

                            <?php // echo $this->Form->input('vendors_detail.zip', array('id' => "us5-zip", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Zip')); ?>
                            <?php // echo $this->Form->hidden('vendors_detail.longitude', array('id' => "us2-lon", "placeholder" => "Enter Longitude", 'class' => "inputBox", 'readonly')); ?>
                            <?php // echo $this->Form->hidden('vendors_detail.latitude', array('id' => "us2-lat", "placeholder" => "Enter Latitude", 'class' => "inputBox", 'readonly')); ?>

                        </div>                        <div class="form-group">-->
                            <label for="exampleInputAddress1">Address*</label>
                            <?php echo $this->Form->hidden('vendors_detail.id', array('id' => "vendors_detail_id")); ?>

                            <?php echo $this->Form->text('vendors_detail.location', array('id' => "address", "placeholder" => "Enter Address", 'class' => "form-control", 'minlength' => 3, 'maxlength' => 100)); ?>
                            <?php //echo $this->Form->text('vendors_detail.location', array('id' => "us2-address", "placeholder" => "Enter Address", 'class' => "form-control", 'minlength' => 3, 'maxlength' => 100)); ?>

                            <!--                            <div style="padding-top: 10px;">
                                                            <div id="us2" style="width: 100%; height:330px;" class="form-group col-md-9"></div>
                                                        </div>-->
                        </div>
                        <!--                        <div class="form-group">
                                                    <div id="us2"></div>
                                                </div>-->

                        <div class="form-group col-md-9">
                            <label for="exampleInputPassword1">Vendor Image</label>
                            <?php echo $this->Form->file('vendor_image', array('id' => 'file', 'class' => 'inputBox', 'name' => 'vendor_image', "size" => "20")); ?>
                            <p>&nbsp;</p>
                            <?php
                            if (!empty($id)) {
                                echo $this->Html->image('vendor/' . $this->request->data['image'], array('id' => 'vendorImage', 'width' => '100', 'height' => '100'));
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

