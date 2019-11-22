

<!-- Banner section -->

<!--Banner Start-->
<section id="service_banner">
    <div class="container text-center service_banner_layer">
        <div class="banner_content">
            <div class="row text-left">
                <div class="col-md-12">
                    <h1 class="service-heading">Professional Page</h1>
                    <p> We understand that trust takes years to build and forever to repair. </p>
                    <br />
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    <p>These cases are taken very seriously and almost always lead to the blacklisting of the professional from the platform and changes to our processes to prevent repeat occurence. Here is a list of occurences where we have blacklisted professionals from the platform for breaking your trust.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--/Banner End--> 

<!-- Booking start time section -->
<section id="bookingStart">
    <div class="container"> 
        <h3 class="search-page-title">Pick your pro and booking start time.</h3>
        <div class="edit-section">
            <p>
                Showing
                <span class="edit-section__field" id="serviceCategory">Electrical</span>
                professionals for
                <span class="edit-section__field" id="serviceSubCategory">Smart Security Cam Installation</span>
                near
                <span class="edit-section__field" id="selectZipCodeValue">90043</span>
                <a class="fa fa-edit edit-section__link"></a>
                <span class="advancedFilter">Advanced Filters</span>
            </p>
        </div>
    </div>
    <div class="neighborhood-banner vAlign">
        <div class="container">
            <div class="vAlign">
                <div class="colSmLeft">
                    <p> Electrical Pros Available in South Los Angeles </p>
                </div>
                <div class="colSmRight">
                    <div class="sliderNavWrap">
                        <a href="javascript:void(0)" id="Prof_nextClick"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)" id="Prof_prevClick"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <ul class="dateSlider" id="Prof_dateSlider">

                            <?php
                            if (isset($restDate) && !empty($restDate)) {
                                for ($i = 1; $i <= $restDate; $i++) {  //echo $i;
                                    ?>

                                    <li>
                                        <h4> <?php echo date('M', strtotime(+$i . ' day', strtotime(date("Y-m-d")))); ?></h4>
                                        <p>

                                            <?php echo date('d', strtotime(+$i . ' day', strtotime(date("Y-m-d")))); ?>
                                            <?php echo date('D', strtotime(+$i . ' day', strtotime(date("Y-m-d")))); ?>
                                        </p>
                                    </li>
                                    <?php
                                }
                            }///die;
                            ?>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Booking start time End-->

<!-- Service available list Start here -->

<section id="serviceListSec">
    <div class="container">
        <ul class="full_width">


            <!-----------Quick Assign Sart Here--------------->
            <li class="row">
                <div class="col-sm-12 col-xs-12 quickBookingForm">
                    <h3>Quick Assign</h3>
                    <P>Pick a date and time and we'll find a great pro for your booking. You can always change pros up to 24 hours before the booking starts.</P>
                    <form class="full_width vAlign">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </form>
                </div>
            </li>

            <!-----------Quick Assign END Here--------------->

            <?php
            if (isset($vendorsDeatils) && !empty($vendorsDeatils)) {
//                pr($value);die;
                foreach ($vendorsDeatils as $keyValue => $value) {
//                     pr($value);
                    ?>
                    <li class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="userIcon">
                                <?php
                                if (isset($value['image']) && !empty($value['image'])) {
                                    echo $this->Html->image(FETCH_VENDOR_IMG_PATH . $value['image'], array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                } else {
                                    echo $this->Html->image('noimage.gif', array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                }
                                ?>
                            </div>
                            <div class="userRating">
                                <!--<h4><?php // echo $value['first_name'] . $value['last_name'];  ?></h4>-->






                                <a href="<?php echo SITE_PATH . 'vendorDetails/' . $value['id']; ?>" class="ourservicanc">

                                    <h4><?php echo $value['first_name'] . $value['last_name']; ?></h4></a>



                                <div class="rating-stars-display flex-cols cross-centered" data-rating="4.6">
                                    <div class="star">
                                        <div class="fa fa-star fa-star-o star-under"></div>
                                        <div class="fa fa-star star-over" style="width: 100%"></div>
                                    </div>
                                    <div class="star">
                                        <div class="fa fa-star fa-star-o star-under"></div>
                                        <div class="fa fa-star star-over" style="width: 100%"></div>
                                    </div>
                                    <div class="star">
                                        <div class="fa fa-star fa-star-o star-under"></div>
                                        <div class="fa fa-star star-over" style="width: 100%"></div>
                                    </div>
                                    <div class="star">
                                        <div class="fa fa-star fa-star-o star-under"></div>
                                        <div class="fa fa-star star-over" style="width: 100%"></div>
                                    </div>
                                    <div class="star">
                                        <div class="fa fa-star fa-star-o star-under"></div>
                                        <div class="fa fa-star star-over" style="width: 60.0%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="full_width locationArea">
                                <p> <i class="fa fa-shield" aria-hidden="true"></i> Vetted and background-checked</p>
                                <p> <i class="fa fa-home" aria-hidden="true"></i> Vetted and background-checked</p>
                            </div>
                        </div>
                        <!-------Client Rewiev-------->
                        <div class="col-sm-4 col-xs-12">
                            <div class="reviewMoreSec">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                <span class="review-date">October 2018</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                <div class="knowMoreLink">
                                    <a href="javascript:void(0)">Read More</a>
                                </div>
                            </div>
                        </div>

                        <!------------------------Start Time Div--------------------------------->

                        <div class="col-sm-4 col-xs-12">
                            <div class="availabilityCntr">
                                <ul class="Prof_dateSlider">

                                    <?php
                                    if (isset($restDate) && !empty($restDate)) {
                                        for ($i = 1; $i <= $restDate; $i++) {  //echo $i;
                                            ?>
                                            <li>
                                                <div class="dateCol">
                                                    <a href="javascript:void(0)" class="dateColArrow" data-click="dateColArrowUp"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                                    <div class="dateColWrap">

                                                        <div class="dateItem active">
                                                            <?php
                                                            $normalWeekDay = date('Y-m-d', strtotime(+$i . ' day', strtotime(date("Y-m-d"))));
                                                            foreach ($value['vendor_availabilities'] as $keyDate => $vaDate) {
//                                                                pr($vaDate);   
//                                                                if (empty($vaDate['order']) || $vaDate['order']['order_status']=='1') {
                                                                if (empty($vaDate['order'])) {
                                                                    if ($normalWeekDay == date('Y-m-d', strtotime($vaDate['availabilities_date']))) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary gettime_class" data-toggle="modal" vendor_id="<?php echo $value['id']; ?>" vendor_availabilities_id="<?php echo $vaDate['id']; ?>" data-target="#bookVendorModel<?php echo $value['id']; ?>"><?php echo $vaDate['time']; ?></button>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
//                                                            die;
                                                            ?>
                                                        </div> 
                                                    </div>
                                                    <a href="javascript:void(0)" class="dateColArrow downArrow_v" data-click="dateColArrowDown"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                        <!-------------------------END TIME DIV--------------------------------------->



                    </li>

                    <?php
                }
            }
            ?>


        </ul>
    </div>
</section>

<!-- Service available list End here -->

<!--  pop up section  -->

<div id="ProfessionalModel" class="modal fade selectProfessionalModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content full_width">
            <div class="modal-body full_width">
                <label class="stepCount">Step <span class="currentStep">1</span> of 1</label>
                <div class="full_width popUpslide activeStep" id="professionalPopUp1">
                    <h3>Which Type of Professional?</h3>
<?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/professional/', 'id' => 'findBooking')); ?>

                    <div class="form-group">
                        <select  name="city" class="form-control popUpServiceSelect" data-select="ciyuCategory">
                            <?php
                            if (isset($cities) && !empty($cities)) {
                                foreach ($cities as $city) {
                                    ?>
                                    <option value="<?php echo $city['district']; ?>"><?php echo ucfirst($city['district']); ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">

                        <select  name="services_id" class="form-control popUpServiceSelect" data-select="serviceSubCategory">
                            <?php
                            if (isset($services) && !empty($services)) {
                                foreach ($services as $service) {
                                    ?>
                                    <option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit"> Continue</button>
                    <!--<button type="button" class="btn btn-primary formBtnNext">Continue</button>-->
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Book Vendor pop up -->
<?php
if (isset($vendorsDeatils) && !empty($vendorsDeatils)) {
//                pr($value);die;
    foreach ($vendorsDeatils as $keyValue => $value) {
//                     pr($value);
        ?>
        <div id="bookVendorModel<?php echo $value['id']; ?>" class="modal fade selectProfessionalModal in" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
        <?php // echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/bookingPage/', 'id' => 'proBookPageFrom'));  ?>
                <div class="modal-content full_width">
                    <div class="modal-body full_width">
                        <div class="full_width bookVendorModel_box">
                            <h3>Confirm Details</h3>
                            <div class="vendorProfilePic full_width">
                                <?php
                                if (isset($value['image']) && !empty($value['image'])) {
                                    echo $this->Html->image(FETCH_VENDOR_IMG_PATH . $value['image'], array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                } else {
                                    echo $this->Html->image('noimage.gif', array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                }
                                ?>
                                <?php echo $this->Form->hidden('vendor_id', array('value' => $value['id'], 'class' => 'vendor_id')); ?>
                                <?php echo $this->Form->hidden('services_id', array('value' => $click, 'class' => 'services_id')); ?>
        <?php echo $this->Form->hidden('vendorAvailabilitiesId', array('class' => 'vendorAvailabilitiesId')); ?>
                                <!--<img src="http://appunison.com/projects/Xetra_Job/img/vendorProfile.jpg" alt="img">-->
                            </div>
                            <h4><?php echo $value['first_name'] . $value['last_name']; ?></h4>
                            <div class="rating-stars-display flex-cols cross-centered" data-rating="4.6">
                                <div class="star">
                                    <div class="fa fa-star fa-star-o star-under"></div>
                                    <div class="fa fa-star star-over" style="width: 100%"></div>
                                </div>
                                <div class="star">
                                    <div class="fa fa-star fa-star-o star-under"></div>
                                    <div class="fa fa-star star-over" style="width: 100%"></div>
                                </div>
                                <div class="star">
                                    <div class="fa fa-star fa-star-o star-under"></div>
                                    <div class="fa fa-star star-over" style="width: 100%"></div>
                                </div>
                                <div class="star">
                                    <div class="fa fa-star fa-star-o star-under"></div>
                                    <div class="fa fa-star star-over" style="width: 100%"></div>
                                </div>
                                <div class="star">
                                    <div class="fa fa-star fa-star-o star-under"></div>
                                    <div class="fa fa-star star-over" style="width: 60.0%"></div>
                                </div>
                            </div>
                            <p>Smart Home Hub Setup</p>
                            <p>Sunday, December 02 at 2:30 PM</p>
                            <div class="full_width">
                                <!--<button type="submit" class="btn btn-primary getVendorPrice" >Get the Price</button>-->
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary getVendorPrice" >Get the Price</a>
        <?php // echo $this->Html->link('Get the Price', array('class' => 'btn btn-primary getVendorPrice'));  ?>

                                        <!--<a href="javascript:void(0)" class="closeModal" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>-->
                    </div>
                </div>
                <!--</form>-->
            </div>
        </div>

        <?php
    }
}
?>
<script type="text/javascript">

    $(document).ready(function () {

        $('.gettime_class').click(function () {
            var serviceId = $('.services_id').val();
            var vendorId = $(this).attr('vendor_id');
            var vanderAblityId = $(this).attr('vendor_availabilities_id');
//        alert(ajax_url + "Homes/bookingPage/" + serviceId +"/"+ vendorId +"/"+ vanderAblityId);
            $(".getVendorPrice").attr("href", ajax_url + "Homes/bookingPage/" + btoa(serviceId) + "/" + btoa(vendorId) + "/" + btoa(vanderAblityId));
//             $("#w3s").attr("href", "http://localhost/Xetra_Job/bookingPage/MQ==/3/7");
//            var text = $(this).text();
//            $('.idTime').val(text);
        });


<?php
if (!empty($click)) {
    
} else {
    ?>
            $(document).find("#ProfessionalModel").modal('show');

<?php } ?>
    });
</script>