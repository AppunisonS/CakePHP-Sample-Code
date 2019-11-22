
<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">book now</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Book Now</li>
        </ol>
    </div>
</div>
<!--Page Title Section End--> 

<!--Contact Information Start-->
<section id="contact_information">
    <div class="container">
        <div class="row"> 
            <!--Left Form Part-->
            <div class="col-md-8 col-sm-8 col-xs-12"> 

                <!--Contact Information-->
                <div class="contact_information_left "> 

                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                    <div class="booking_form">
                        <div class="container-fluid">
                            <div class="row">
                                <!--<form method="post">-->
                                <?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/bookingPage/', 'id' => 'bookingPageFrom')); ?>
                                <h2>Contact Information</h2>
                                <p>This information will be used to contact you about your service</p>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->input('first_name', array('id' => 'first_name', 'class' => 'form-control', 'label' => false, 'placeholder' => 'First Name')); ?>
                                    <?php echo $this->Form->hidden('services_id', array('value' => $services_id, 'id' => 'idField')); ?>
                                    <?php echo $this->Form->hidden('vendor_id', array('value' => $vendorId, 'id' => 'idVField')); ?>
                                      <?php echo $this->Form->hidden('vendor_availabilities_id', array('value' => $vendorAvabId, 'id' => 'idVAField')); ?>
                                    <input type="hidden"  name="unit_time" id="unit_time"/>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->input('last_name', array('id' => 'last_name', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Last Name')); ?>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->input('Email', array('id' => 'email', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Email')); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('phone_number', array('id' => 'phone_number', 'placeholder' => 'Phone Number', 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                                <div class="clearfix"></div>
                                <hr />
                                <!--Service Address-->
                                <h2>Service Address</h2>
                                <p>Where would you like us to clean?</p>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->text('location', array('id' => 'location', 'placeholder' => 'Street Address*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                    <?php echo $this->Form->text('states', array('id' => 'states', 'placeholder' => 'State*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>
<!--                                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                    <?php // echo $this->Form->text('city', array('id' => 'city', 'placeholder' => 'City*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>-->


                                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                      <?php echo $this->Form->select('district', $districtsList, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'district', 'empty' => 'Select District')); ?>
                                    <?php // echo $this->Form->text('zip', array('id' => 'zip', 'placeholder' => 'ZIP Code*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                    <?php echo $this->Form->input('services', array('class' => 'form-control', 'label' => false, 'value' => $servicesName['name'], 'readonly' => true)); ?>
                                </div>

                                <div class="clearfix"></div>
                                <hr />
                                <!--Choose Service-->
                                <h2>Choose Your Service</h2>

                                <!------------If  Sub Survices Exit ------------->
                                <?php if (!empty($subServicesList)) { ?>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 select_box ">
                                        <?php echo $this->Form->select('sub_services_id', $subServicesList, array('id' => 'sub_services_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Sub Services')); ?>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>

                                <hr />
                                <!------------If  Sub Survices Not Exit For Driver ------------->

                                <?php if (!empty($servicesDriverPricesList)) { ?>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                        <select name="services_driver_prices_id" class="dropdown-toggle select_options form-control required" id='routeId'>&nbsp;
                                            <option value="">Select Route</option>
                                            <?php foreach ($servicesDriverPricesList as $key => $value) { ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['destination_to'] . '&nbsp; to &nbsp;' . $value['destination_from'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($vehiclesList)) { ?>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                        <?php echo $this->Form->select('vehicles_id', $vehiclesList, array('class' => 'dropdown-toggle select_options form-control required', 'label' => false, 'id' => 'vehicleId', 'empty' => 'Select Vehicles')); ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr />
                                <?php } ?>


                                <?php if (!empty($servicesDriverPricesList)) { ?>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box " style="display:none" id="routeDescriptionId">
                                        <?php echo $this->Form->textarea('route_description', array('id' => 'editorRoute', 'class' => "form-control", 'readonly' => true)); ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($vehiclesList)) { ?>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box " style="display:none" id="vehicleDescriptionId">
                                        <?php echo $this->Form->textarea('vehicle_description', array('id' => 'editorVehicle', 'class' => "form-control", 'readonly' => true)); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($servicesName['id'] == '3') { ?>
                                    <input type="hidden"  name="amount" id="amount"/>
                                    <input type="hidden" value="0" name="discount_price" id="discount_price"/>
                                    <input type="hidden"  name="total_ammount" id="total_ammount"/>

                                <?php } ?>
                                <!--<div  class="box-body table-responsive no-padding">-->

                                <div id="PaggingTrFront">
                                    <?php
                                    // pr($servicesName['id']);die;
                                    if ($servicesName['id'] == '6') {
                                        echo $this->element('frontElements/servicesdjeventprice/index');
                                    } else {
                                        echo $this->element('frontElements/servicesunitprice/index');
                                    }
                                    ?>
                                </div>
                                <!--</div>-->

                                <!---------------Xetra Dive Here---------------------->

                                <!---------Xetra Div END Here----------->
                                <hr />

                                <?php if ($servicesName['id'] == '2') { ?>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                        <?php echo $this->Form->text('patient_age', array('id' => 'patient_age', 'placeholder' => 'Patient Age', 'class' => 'form-control required', 'label' => false)); ?>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                        <?php echo $this->Form->select('patient_gender', @$patientGenger, array('class' => 'dropdown-toggle select_options form-control required', 'label' => false, 'id' => 'patient_genger', 'empty' => 'Select Gender of Patient')); ?>
                                    </div>
                                    <div class="clearfix"></div>

                                <?php } ?>
                                <!-----------Tell Us About The Job--------------->
                                <h2>Tell Us About The Job</h2>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                    <?php echo $this->Form->textarea('description_about_job', array('id' => 'description_about_job', 'class' => "form-control")); ?>
                                </div>
                                <div class="clearfix"></div>
                                <hr />
                                <!-----------Tell Us About The Job END HERE --------------->

                                <!--Select Date Time-->
                                <h2>When would you like us to come?</h2>
                                <p></p>

                                
                               
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <?php echo $this->Form->text('datepicker', array('id' => 'datepicker', 'class' => 'form-control', 'label' => false, 'readonly' => true)); ?>
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class='input-group date' id='datetimepicker3'>
                                        <?php echo $this->Form->text('timepicker', array('id' => 'timepicker', 'class' => 'form-control', 'label' => false)); ?>
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span> </div>
                                </div>


                                <div class="clearfix"></div>

                                <?php if ($servicesName['id'] != '3') { ?>
                                    <hr />
                                    <!--How often?-->
                                    <h2>How often?</h2>
                                    <p>it's all about matching you with the perfect cleaner for your home.<br />
                                        Scheduling is flexible. Cancel or reschedule anytime.</p>
                                    <div class="form-group col-md-12">
                                        <input type="hidden"  name="plan_type" id="plan_type"/>
                                        <ul class="how_often" id="howselect">
                                            <?php
                                            if (!empty($planTypes) && isset($planTypes)) {
                                                foreach ($planTypes as $keyp => $valp) {
                                                    if ($valp['duration'] == 1) {
                                                        ?>
                                                        <li plan-type="<?php echo $valp['duration'] ?>" class="plan-type-section-title"><?php echo "Monthly" ?> </li>

                                                    <?php } else if ($valp['duration'] == 2) { ?>
                                                        <li plan-type="<?php echo $valp['duration'] ?>"class="plan-type-section-title"><?php echo "Biweekly" ?> </li>

                                                    <?php } else if ($valp['duration'] == 3) { ?>
                                                        <li plan-type="<?php echo $valp['duration'] ?>" class="plan-type-section-title"><?php echo "Weekly" ?></li>

                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>

                                        </ul>
                                    </div>

                                    <div id="plantypeTrFront">
                                        <?php echo $this->element('frontElements/plantype/index');
                                        ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr />
                                <?php } ?>



                                <!----------------------------Promo Code------------------------------>
                                <!--                                    <div class="form-group col-md-8 col-sm-8 col-xs-12">
                                                                        <input class="form-control" id="Promo_code" name="Promo_code" placeholder="Promo code (optional)" type="text" />
                                                                    </div> 
                                                                     <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                                        <button class="btn btn-primary promo_apply" name="Apply"  type="submit"> Apply </button>
                                                                    </div>-->

                                <!--Choose Your Service-->
                                <!--                                <h2>Choose Your Service</h2>
                                                                <p>Enter your card information below. You will be charged after service has been rendered.</p>
                                
                                
                                
                                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php // echo $this->Form->text('card_number', array('id' => 'card_number', 'placeholder' => 'Card Number', 'class' => 'form-control', 'label' => false)); ?>
                                                                </div>
                                                                <div class="form-group col-md-3 col-sm-3 col-xs-12 ">
                                <?php // echo $this->Form->text('card_month', array('id' => 'card_month', 'placeholder' => 'MM/YYYY', 'class' => 'form-control', 'label' => false)); ?>
                                                                </div>
                                                                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <?php // echo $this->Form->text('card_cvc', array('id' => 'card_cvc', 'placeholder' => 'CVC', 'class' => 'form-control', 'label' => false)); ?>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <p class="help-block">
                                                                        <img src="<?php // echo SITE_PATH . 'img/images/booking/cards.png'     ?>" alt="booking" />
                                                                        <img src="img/images/booking/cards.png" alt="booking" />
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12" >
                                                                    <p class="help-block"><i class="fa fa-lock" aria-hidden="true"></i> <span>Safe and secure 256-BIT<br />
                                                                            SSL encrypted payment.</span></p>
                                                                </div>-->
                                <div class="clearfix"></div>

                                <div class="form-group col-md-4 col-sm-12 col-xs-12 applyPromoBtn">
                                    <button class="btn btn-primary promo_apply" name="submit"  type="submit"> Place Your Order </button>
                                </div>





                                <!--                                
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab" id="headingPayment2">
                                                                        <h4 class="panel-title">
                                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment7" aria-expanded="false" aria-controls="collapsePayment7">
                                                                                <i class="fa fa-money fa-2 mr-10"></i>Payumoney</a>
                                                                        </h4>
                                                                    </div> end panel-heading 
                                
                                
                                
                                                                    <div id="collapsePayment7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2" aria-expanded="false" style="height: 0px;">
                                                                        <div class="panel-body">
                                                                            <div class="form-group">
                                
                                                                                <form action="<?php // echo $PAYU_BASE_URL;       ?>/_payment" method="post" name="payuForm">
                                <?php // echo $this->Form->hidden('key', ['name' => 'key', 'value' => $MERCHANT_KEY]); ?>
                                <?php // echo $this->Form->hidden('hash', ['name' => 'hash', 'value' => $hash]); ?>
                                <?php // echo $this->Form->hidden('txnid', ['name' => 'txnid', 'value' => $txnid]); ?>
                                <?php // echo $this->Form->hidden('amount', ['name' => 'amount', 'value' => $totalAmount]); ?>
                                <?php // echo $this->Form->hidden('firstname', ['name' => 'firstname', 'value' => $authUser['first_name']]); ?>
                                <?php // echo $this->Form->hidden('address', ['name' => 'address', 'value' => $authUser['address']]); ?>
                                <?php // echo $this->Form->hidden('email', ['name' => 'email', 'value' => $authUser['email']]); ?>
                                <?php // echo $this->Form->hidden('phone', ['name' => 'phone', 'value' => $authUser['contact_no']]); ?>
                                <?php // echo $this->Form->hidden('productinfo', ['name' => 'productinfo', 'value' => $productInfo]); ?>
                                <?php // echo $this->Form->hidden('surl', ['name' => 'surl', 'value' => SITE_PATH . "Payments/successPayment/"]); ?>
                                <?php // echo $this->Form->hidden('furl', ['name' => 'furl', 'value' => SITE_PATH . "Payments/failUrl/"]); ?>
                                <?php // echo $this->Form->hidden('service_provider', ['name' => 'service_provider', 'value' => "payu_paisa"]); ?>
                                
                                <?php // echo $this->Form->button('Order', array('type' => 'submit', 'class' => 'btn btn-default btn-md round fa fa-arrow-circle-right ml-5', 'name' => 'submit')); ?>
                                
                                <?php //echo $this->Form->button('Order', array('type' => 'submit', 'class' => 'btn btn-default btn-md round fa fa-arrow-circle-right ml-5', 'name' => 'submit', 'onClick' => 'submitPayuForm()')); ?>
                                                                                </form>
                                                                            </div> end form-group 
                                                                        </div> end panel-body 
                                                                    </div> end collapse 
                                                                </div> end panel -->




                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact Information--> 

            </div>
            <!--/Left Form Part-->
            <!--===========BOOK NOW --------------------------------------->

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="contact_information_right text-center">

                    <div class="booking_summary hidden-xs">
                        <h1>Booking Summary</h1>
                        <ul>
                            <?php
                            if (!empty($servicesName['name'])) {
//                                pr($subServicesData);die;
                                ?>
                                <li><i class="fa fa-home" aria-hidden="true"></i><?php echo $servicesName['name']; ?></li>
                            <?php } ?>
<!--<li><i class="fa fa-calendar" aria-hidden="true"></i>Cleaning date</li>-->

                            <li><i class="fa fa-calendar" aria-hidden="true"></i><span id="cleaningDate">NA</span></li>

                            <?php
                            if ($servicesName['id'] == 3) {
                                
                            } else {
                                ?>
                                <li><i class="fa fa-refresh" aria-hidden="true">

                                    </i>Time <div class="fa" id="time" aria-hidden="true">



                                    </div>

                                    <i aria-hidden="true"><span id="hour" style="display:none">Hour</span></i>

                                </li>  

                            <?php } ?>
                        </ul>


                        <div class="price_totle">
                            <div class="subtotal">
                                <div class="heading text-left">SUBTOTAL</div>
                                <div class="price text-right">
                                    <?php echo $this->Form->input('subtotal', array('id' => 'subtotal', 'class' => 'form-control', 'placeholder' => 'Subtotal', 'label' => false, 'readonly')); ?>

                                </div>
                            </div>
                            <div class="subtotal">
                                <div class="heading text-left">DISCOUNT</div>
                                <div class="price text-right">
                                    <?php echo $this->Form->input('discount', array('id' => 'discount', 'class' => 'form-control', 'placeholder' => 'Discount', 'label' => false, 'readonly')); ?>



                                </div>
                            </div>
                            <div class="subtotal">
                                <div class="heading text-left">TOTAL:</div>
                                <div class="price text-right">
                                    <?php echo $this->Form->input('total', array('id' => 'total', 'class' => 'form-control', 'placeholder' => 'Total', 'label' => false, 'readonly')); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="booking_summary">
                        <div class="icon_box_one">
                            <div class="icons">

                                <img src="<?php echo SITE_PATH . 'img/images/booking/time3.png' ?>" alt="" style=""/>


                            </div>
                            <div class="box_content">
                                <h4>SAVES YOU TIME</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="icon_box_one">
                            <div class="icons">

                                <img src="<?php echo SITE_PATH . 'img/images/booking/Safety3.png' ?>" alt="Safety3" />

                            </div>
                            <div class="box_content">
                                <h4>For Your Safety</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="icon_box_one">
                            <div class="icons">
                                <img src="<?php echo SITE_PATH . 'img/images/booking/best3.png' ?>" alt="best3" />
                                <!--<img src="img/images/booking/best3.png" alt="best3" />-->
                            </div>
                            <div class="box_content">
                                <h4>Best-Rated Professionals</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="icon_box_one">
                            <div class="icons">
                                <img src="<?php echo SITE_PATH . 'img/images/booking/Equipped3.png' ?>" alt="Equipped3" />
                               <!--<img src="img/images/booking/Equipped3.png" alt="Equipped3" />-->

                            </div>
                            <div class="box_content">
                                <h4>We Are Well Equipped</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="icon_box_one">
                            <div class="icons">
                                <img src="<?php echo SITE_PATH . 'img/images/booking/touch3.png' ?>" alt="touch3" />

      <!--<img src="img/images/booking/touch3.png" alt="touch3" />-->

                            </div>
                            <div class="box_content">
                                <h4>Always In Touch</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="icon_box_one">
                            <div class="icons">
                                <img src="<?php echo SITE_PATH . 'img/images/booking/cash3.png' ?>" alt="cash3" />

     <!--<img src="img/images/booking/cash3.png" alt="cash3" />-->

                            </div>
                            <div class="box_content">
                                <h4>Cash-Free Facility</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                            </div>
                        </div>
                        <div class="box_btn">
                            <button class="btn btn-primary booknow btn-skin" type="submit">LEARN MORE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Information End--> 
    <!--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->

<script>
    $(document).ready(function () {
        // For Selected Plan //
        $('#howselect li').click(function () {
            //   $(".plan-type-section-title").on("click", function (e) {
            // Grab current anchor value
            $('#howselect li').removeClass("ui-selected");
            subtotalVal = $("#subtotal").val();
            if (subtotalVal === '') {
                $(this).addClass("ui-selected");
                alert('please selected services frist');
            } else {
                $(this).addClass("ui-selected");
                var currentAttrValue = $(this).attr('plan-type');
                $('#plan_type').val(currentAttrValue);
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getPlanData/' + currentAttrValue,
                    success: function (msgpln) {
                        $('#plantypeTrFront').html(jQuery.parseJSON(msgpln));

                    }
                })
            }

        });





<?php if (!empty($servicesDriverPricesList) && isset($servicesDriverPricesList)) { ?>

            var subtotalMainVal = '';
            $('#routeId').change(function () {
                //alert($("#vehicleId").val());
                if ($("#vehicleId").val() != "") {
                    $("#editorVehicle").hide();
                }
                $("#vehicleId option[value='']").prop("selected", true);


                //                
                subtotalVal = $("#subtotal").val();
                if ($(this).val() == '') {
                    location.reload();
                }
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getServicesDriverPrices/ServicesDriverPrices/price/' + $(this).val(),
                    success: function (msgdrv) {
                        msgdrv = jQuery.parseJSON(msgdrv)
                        subtotalMainVal = msgdrv.price;
                        $("#subtotal").val(msgdrv.price);
                        $("#total").val(msgdrv.price);

                        $("#amount").val(msgdrv.price);
                        $('#total_ammount').val(msgdrv.price);
                    }
                })
            });
    <?php
}

if (!empty($vehiclesList) && isset($vehiclesList)) {
    ?>

            $('#vehicleId').change(function () {
                subtotalVal = $("#subtotal").val();
                if ($(this).val() == '') {
                    location.reload();
                } else {
                    $("#editorVehicle").show();
                }

                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getServicesDriverPrices/Vehicles/percentage/' + $(this).val(),
                    success: function (msgper) {
                        msgper = jQuery.parseJSON(msgper)
                        //                        console.log(msgper);
                        if (subtotalVal === '') {
                            alert('Please select Route first');
                            $("#vehicleDescriptionId").hide();
                        } else {
                            var persentageValue = subtotalMainVal * msgper.percentage / 100
                            var totalRouteFaireValue = parseFloat(subtotalMainVal) + parseFloat(persentageValue);
                            $("#subtotal").val(totalRouteFaireValue);
                            $("#total").val(totalRouteFaireValue);

                            $("#amount").val(totalRouteFaireValue);
                            $('#total_ammount').val(totalRouteFaireValue);
                        }
                    }
                })
            });
<?php } ?>
        //sub_services_id

        $('#sub_services_id').change(function () {
            if ($(this).val() == '') {
                location.reload();
            }

            $('div #time').val('NA')
            $("#subtotal").val('NA')
            $("#total").val('NA');
//            $("#hour").show();
            $.ajax({
                type: 'GET',
                url: ajax_url + '/homes/getDataToSelectedSubcat/' + $(this).val(),
                success: function (msgsup) {
//                    console.log(msgsup);
                    $('#PaggingTrFront').html(jQuery.parseJSON(msgsup));

                }
            })
        });
        // Find Description vehicles_id
        $('#vehicleId').change(function () {
            subtotalVal = $("#subtotal").val();
            if ($(this).val() == '') {
                $("#editorVehicle").hide();
            }
            $("#vehicleDescriptionId").show();
            $.ajax({
                type: 'GET',
                url: ajax_url + '/admin/getEditorList/Vehicles/description/' + $(this).val(),
                success: function (msg) {
                    $('#editorVehicle').val(msg);
                }
            })
        });

        //Find Description Route_id
        $('#routeId').change(function () {

            if ($(this).val() == '') {
                $("#editorRoute").hide();
            }
            $("#routeDescriptionId").show();
            $.ajax({
                type: 'GET',
                url: ajax_url + '/admin/getEditorList/ServicesDriverPrices/description/' + $(this).val(),
                success: function (msg) {
                    $('#editorRoute').val(msg);
                }
            })
        });

        $("#datepicker").click(function () {

        });
        $("#timepicker").click(function () {
            var cleaningDate1 = $("#datepicker").val();
//                alert(cleaningDate1);
            $("#cleaningDate").html(cleaningDate1);
        });

    });


</script>
<script>
    $('#timepicker').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#datepicker').datepicker({
        'format': 'm/d/yyyy',
        minDate: 0,
        'autoclose': true
    });

    //subserviceId
</script>

<script>
    $(document).ready(function () {
//    alert('h');

        $("#bookingPageFrom").validate({
            rules: {
                "Email":
                        {
                            email: true,
                            required: true,
                            minlength: 2,
                            maxlength: 30,
                            email: true,
                        },
                "first_name":
                        {
                            required: true,
                            minlength: 2,
                            maxlength: 60
                        },
                "last_name":
                        {
                            required: true,
                            minlength: 2,
                            maxlength: 60
                        },
                "location":
                        {
                            required: true,
                            minlength: 3,
                            maxlength: 300
                        },
                "city":
                        {
                            required: true
                        },
                "states":
                        {
                            required: true
                        },
                "district":
                        {
                            required: true
                        },
                "sub_services_id":
                        {
                            required: true
                        },
                "description_about_job":
                        {
                            required: true
                        },
                "phone_number":
                        {
                            required: true,
                            digits: true,
                            minlength: 7,
                            maxlength: 15
                        },
                "services_id": {
                    required: true
                },
                "datepicker":
                        {
                            required: true
                        },
                "timepicker":
                        {
                            required: true
                        },
//                "card_number":
//                        {
//                            required: true,
//                            digits: true
//                        },
//                "card_month":
//                        {
//                            required: true
//                        },
//                "card_cvc":
//                        {
//                            required: true,
//                            digits: true,
//                            minlength: 3,
//                            maxlength: 3
//                        },

                "service_dj_event_prices_id":
                        {
                            required: true
                        },

                "guest_id":
                        {
                            required: true
                        }
            },
            messages: {

                "Email":
                        {
                            required: "Email is required",
                            minlength: "Please enter at least 2 characters. ",
                            maxlength: "Please enter no more than 30 characters. "

                        },
                "first_name":
                        {
                            required: "First name is required",
                            minlength: "Please enter at least 2 characters. ",
                            maxlength: "Please enter no more than 60 characters. "
                        },
                "last_name":
                        {
                            required: "Last name is required",
                            minlength: "Please enter at least 2 characters. ",
                            maxlength: "Please enter no more than 60 characters. "
                        },
                "location":
                        {
                            required: "Address is required",
                            minlength: "Please enter at least 3 characters. ",
                            maxlength: "Please enter no more than 300 characters. "
                        },
                "city":
                        {
                            required: "City is required"
                        },
                "states":
                        {
                            required: "States is required"
                        },
                "district":
                        {
                            required: "District is required"
                        },
                "sub_services_id":
                        {
                            required: "Sub Services is required"
                        },
                "city":
                        {
                            required: "City is required"
                        },
                "description_about_job":
                        {
                            required: "Description is required"
                        },

                "phone_number":
                        {
                            required: "Phone No is required",
                            digits: "Please enter only numeric digits",
                            minength: "Please enter atleast 7 digits.",
                            maxength: "Please enter atleast 15 digits."
                        },
                "services_id": {
                    required: "Service is required",
                },
                "datepicker":
                        {
                            required: "Date is required"
                        },
                "timepicker":
                        {
                            required: "Time is required"
                        },
//                "card_number":
//                        {
//                            required: "Card Number is required",
//                            digits: "Please enter only numeric digits"
//                        },
//                "card_month":
//                        {
//                            required: "Card Month is required"
//                        },
//                "card_cvc":
//                        {
//                            required: "Card CVC is required",
//                            digits: "Please enter only numeric digits",
//                            minength: "Please enter atleast 3 digits.",
//                            maxength: "Please enter atleast 3 digits."
//                        },
                "service_dj_event_prices_id":
                        {
                            required: "Event required"

                        },
                "guest_id":
                        {
                            required: "Guest required"
                        }

            },
            errorElement: 'span',
            success: function (label, element) {
                label.addClass('success');

            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent("div"));
            }
        });
    });
</script>