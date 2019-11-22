<?php
echo $this->Html->css('appunisonadmin/intlTelInput.css');
echo $this->Html->script('appunisonadmin/intlTelInput.js');
?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBEZCufQ0L9qkDeOtuBBvoUdIOeQDWuZNc'></script>

<script>
    $(document).ready(function () {
        var long =<?php echo isset($this->request->data['UserAddress']['longitude']) ? $this->request->data['UserAddress']['longitude'] : $WebsiteSettings->longitude; ?>;
        var lat =<?php echo isset($this->request->data['UserAddress']['latitude']) ? $this->request->data['UserAddress']['latitude'] : $WebsiteSettings->latitude; ?>;

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
</script>

<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('WebsiteSetting', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/admin/websiteSetting', 'id' => 'websiteSettingForm')); ?>

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Website Settings</strong></h3>

                    <div class="box-body  col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Title*</label>
                            <?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Title')); ?>
                            <?php echo $this->Form->hidden('id', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Title')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Email From*</label>
                            <?php echo $this->Form->input('website_email_from', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Website Email From')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Email Contact*</label>
                            <?php echo $this->Form->input('website_email_contact', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Website Email Contact')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact No*</label>
                            <?php echo $this->Form->input('contact_no', array('id' => "mobile-number", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Contact No')); ?>
                            <span id="valid-msg" class="hide valid">✓ Valid Number</span>
                            <span id="error-msg" class="hide invalid">x Invalid Number</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Landline No</label>
                            <?php echo $this->Form->input('landline', array('id' => "landline-number", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Landline No')); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Contact Text*</label>
                            <?php echo $this->Form->input('short_text', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Website Contact Text')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Url*</label>
                            <?php echo $this->Form->input('facebook_url', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Facebook Url')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter Url*</label>
                            <?php echo $this->Form->input('twitter_url', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Twitter Url')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Google Plus Url*</label>
                            <?php echo $this->Form->input('google_plus_url', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Google Plus Url')); ?>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Logo</label>
                            <?php
                            echo $this->Form->file('logo', array('id' => 'file', 'class' => 'inputBox', 'name' => 'logo_file', "size" => "20"));
                            echo $this->Form->hidden('logo', array('class' => 'inputBox', 'name' => 'logo', "size" => "20"));
                            ?>
                            <p>&nbsp;</p>
                            <?php
                            echo $this->Html->image($this->request->data['logo'], array('id' => 'catImage', 'width' => '100', 'height' => '100'));
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Footer Logo</label>
                            <?php
                            echo $this->Form->file('footer_logo', array('id' => 'file1', 'class' => 'inputBox', 'name' => 'footer_logo_file', "size" => "20"));
                            echo $this->Form->hidden('footer_logo', array('class' => 'inputBox', 'name' => 'footer_logo', "size" => "20"));
                            ?>
                            <p>&nbsp;</p>
                            <?php
                            echo $this->Html->image($this->request->data['footer_logo'], array('id' => 'footerLogo', 'width' => '100', 'height' => '100'));
                            ?>
                        </div>
                    </div>
                    <div class="box-body  col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">SMTP Enable <?php echo $this->Form->checkbox('smtp_status', array('class' => 'inputBox SMTPEnableCheckbox')); ?>
                            </label>
                        </div>
                        <div class="SMTPEnable">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Host Name*</label>
                                <?php echo $this->Form->input('host', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter SMTP Host')); ?>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Port No*</label>
                                <?php echo $this->Form->input('port', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter SMTP Port Number')); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Timeout*</label>
                                <?php echo $this->Form->input('timeout', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter SMTP Timeout')); ?>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SMTP  UserName*</label>
                                <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter SMTP  UserName')); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SMTP Password*</label>
                                <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter SMTP Password')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputZip1">Zip*</label>
                            <?php echo $this->Form->input('zip', array('id' => "us5-zip", 'class' => 'form-control', 'label' => false, 'placeholder' => 'Zip')); ?>

                            <?php echo $this->Form->hidden('longitude', array('id' => "us2-lon", "placeholder" => "Enter Longitude", 'class' => "inputBox", 'readonly')); ?>
                            <?php echo $this->Form->hidden('latitude', array('id' => "us2-lat", "placeholder" => "Enter Latitude", 'class' => "inputBox", 'readonly')); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Address*</label>
                            <?php echo $this->Form->text('location', array('id' => "us2-address", "placeholder" => "Enter Address", 'class' => "form-control", 'minlength' => 3, 'maxlength' => 100)); ?>

                            <div style="padding-top: 10px;">
                                <div id="us2" style="width: 100%; height:330px;" class="form-group col-md-9"></div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Us Title</label>
                            <?php echo $this->Form->input('contact_us_title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Contact Us Title')); ?>

                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact Us Contant</label>
                            <?php echo $this->Form->textarea('contact_us_contant', array('class' => "form-control")); ?>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">FAQs Title</label>
                            <?php echo $this->Form->input('faq_title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter FAQs Title')); ?>

                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">FAQs - ABOUT XTRA JOBS Contant</label>
                            <?php echo $this->Form->textarea('xetra_job_faq_contant', array('class' => "form-control")); ?>
                        </div>
                        
                        <div class="form-group">
                            <div id="us2"></div>
                        </div>
                    </div>
                    <div class="box-body col-md-12">
                        <div class="form-group col-md-2">
                            <?php echo $this->Form->button(' Submit', array('type' => 'submit', 'class' => 'fa fa-save btn btn-block btn-primary')); ?>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-block btn-info fa fa-chevron-left padding-left-lg" onclick="javascript:history.go(-1);">  Back   </button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $("#mobile-number").intlTelInput({
            responsiveDropdown: true,
            utilsScript: ajax_url + "js/appunisonadmin/utils.js"
        });
        var telInput = $("#mobile-number"),
                errorMsg = $("#error-msg"),
                validMsg = $("#valid-msg");

        if ($('.SMTPEnableCheckbox').is(":checked")) {
            $('.SMTPEnable input').addClass('required');
            $('.SMTPEnable').slideDown('slow');
        } else {
            $('.SMTPEnable input').removeClass('required');
            $('.SMTPEnable').slideUp('slow');
        }
        $('.SMTPEnableCheckbox').click(function () {

            if ($(this).is(":checked")) {
                $('.SMTPEnable input').addClass('required');
                $('.SMTPEnable').slideDown('slow');
            } else {
                $('.SMTPEnable input').removeClass('required');
                $('.SMTPEnable').slideUp('slow');
            }
        })
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#catImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function () {
            readURL(this);
        });

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#footerLogo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file1").change(function () {
            readURL1(this);
        });
    })
</script>
