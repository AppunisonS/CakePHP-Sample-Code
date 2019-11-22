<!--Banner Start-->
<section id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Vendor Details</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Vendor details</li>
        </ol>
    </div>
</section>

<!--/Banner End--> 

<!--Testimonails Section Satrt-->

<section id="VendorDetailsPage">
    <div class="midContainer"> 
        <div class="full_width vendorPageWrap">

            <?php
            if (isset($vendorsDeatils) && !empty($vendorsDeatils)) {
//                pr($value);die;
                foreach ($vendorsDeatils as $keyValue => $value) {
//                     pr($value);
                    ?>
                    <div class="MyAccountWrapLeft">
                        <div class="vendorProfile vAlign">
                            <div class="vendorProfileLeft">
                                <?php
                                if (isset($value['image']) && !empty($value['image'])) {
                                    echo $this->Html->image(FETCH_VENDOR_IMG_PATH . $value['image'], array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                } else {
                                    echo $this->Html->image('noimage.gif', array('width' => '100', 'height' => '100', 'alt' => 'img'));
                                }
                                ?>
                                <!--<img src="http://appunison.com/projects/Xetra_Job/img/vendorProfile.jpg" alt="img">-->
                            </div>
                            <div class="vendorProfileRight">
                                <h4><?php echo $value['first_name'] . $value['last_name']; ?></h4>
                                <p>Handyman serving Los Angeles 16 repeat clients</p>
                            </div>
                        </div>
                        <div class="vendorRating">
                            <div class="vendorRatingLeft">
                                <h5>Overall Rating</h5>
                                <h6>4.8</h6>
                            </div>

                        </div>



                        <div class="full_width commentHead">
                            <div class="commentHeadLeft">
                                <h4><strong>Positive Reviews </strong></h4>
                            </div>
                            <div class="commentHeadRight">
                                <h4><i class="fa fa-check" aria-hidden="true"></i> All reviews from verified customers</h4>
                            </div>
                        </div>

                        <ul class="full_width commentList">
                            <li class="full_width">
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
                                <p>benjamin did a fantastic job mounting my new mirror in our living room!</p>
                                <h4>October 2018 - Los Angeles, CA</h4>
                            </li>
                            <li class="full_width">
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
                                <p>benjamin did a fantastic job mounting my new mirror in our living room!</p>
                                <h4>October 2018 - Los Angeles, CA</h4>
                            </li>
                            <li class="full_width">
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
                                <p>benjamin did a fantastic job mounting my new mirror in our living room!</p>
                                <h4>October 2018 - Los Angeles, CA</h4>
                            </li>
                        </ul>


                    </div>
                <?php }
            } ?>
            <div class="MyAccountWrapRight">
                <div class="full_width iboxSideBar">
                    <div class="bookVendor">
                        <h5>Book Benjamin</h5>
                    </div>
                    <div class="sliderNavWrap">
                        <a href="javascript:void(0)" id="nextClick"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)" id="prevClick"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <ul class="dateSlider" id="dateSlider">

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

                    <?php
                    if (isset($vendorsDeatils) && !empty($vendorsDeatils)) {
//                pr($value);die;
                        foreach ($vendorsDeatils as $keyValue => $value) {
//                     pr($value);
                            ?>

                            <div class="availabilityCntr full_width">
                                <div class="availabilityDate">
                                    <ul class="dateSlider2" id="dateSlider2">



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
//                                                                pr($vaDate);die;
                                                                    if ($normalWeekDay == date('Y-m-d', strtotime($vaDate['availabilities_date']))) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary gettime_class" data-toggle="modal" vendor_id="<?php echo $value['id']; ?>" vendor_availabilities_id="<?php echo $vaDate['id']; ?>" data-target="#bookVendorModel<?php echo $value['id']; ?>"><?php echo $vaDate['time']; ?></button>
                                                                        <?php
                                                                    }
                                                                }
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
                        <?php }
                    }
                    ?>
                </div>
            </div>



        </div>
    </div>
</section>
<!--Testimonails Section End--> 

<!-- Book Vendor pop up -->

<!--<div id="bookVendorModel" class="modal fade selectProfessionalModal in" role="dialog">
    <div class="modal-dialog">
         Modal content
        <div class="modal-content full_width">
            <div class="modal-body full_width">
                <div class="full_width bookVendorModel_box">
                    <h3>Confirm Details</h3>
                    <div class="vendorProfilePic full_width">
                        <img src="http://appunison.com/projects/Xetra_Job/img/vendorProfile.jpg" alt="img">
                    </div>
                    <h4>Benjamin A.</h4>
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
                        <button type="button" class="btn btn-primary">Get the Price</button>
                    </div>
                </div>

                <a href="javascript:void(0)" class="closeModal" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>

    </div>
</div>-->
