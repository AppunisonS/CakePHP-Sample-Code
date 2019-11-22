<style>
    .icon-area .icon_box_one{
        margin-bottom: 15px;
    }
    .select-drop{
        padding: 10px;
        margin-bottom: 5px;
        border: 1px solid;
        font-size: 20px !important;
        background-color: #fff;
    }
    @media(max-width: 440px){
        .icon-area .icon_box_one{
            text-align: center;
        }
        .icon-area .icon_box_one img.tsh{
            display: block;
            margin: 0 auto 5px;
        }
    }
    @media(max-width: 440px){
        .icon-area .icon_box_one span.tsh{
            font-size: 12px;
        }
    }
</style>
<!--Banner Start-->
<section id="banner" class="home-one" >
    <div class="container text-center parallax-section">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="panel-heading">Ready to Live Smarter?</h1>
                <p class="caption">Book Expert home cleaners and handymen at a moment's notice. just pick a<br/>
                    time and we'll do the rest</p>
                <!--<form class="form-inline book-now-home">-->
                <?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'class' => 'form-inline book-now-home vAlign justify_space', 'novalidate' => true, 'url' => '/index/', 'id' => 'findBooking')); ?>

                <div class="form-group">
                    <div class="input-group"> 
                        <select  name="services_id" class="fa fa-list select-drop service ">
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
                </div>
                <div class="form-group location">
                    <div class="input-group location-code">
                        <select  name="city" class="fa fa-list select-drop">
                            <?php
                            if (isset($cities) && !empty($cities)) {
                                foreach ($cities as $city) {
                                    ?>
                                    <option value="<?php echo $city['city']; ?>"><?php echo ucfirst($city['city']); ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php if (isset($authUser)) { ?>
                    <button class="btn btn-primary booknow btn-skin" name="submit" type="submit"> Book now</button>
                            <!--<a href="<?php // echo SITE_PATH . 'bookingPage';      ?>"><button type="button" class="btn btn-primary booknow btn-skin"> Book now </button></a>-->
                <?php } else { ?>
                    <a href="#" aria-hidden="true" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-primary booknow btn-skin"> Book now </button></a>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>

<!--/Banner End--> 

<section id="trust-security-header">
    <div class="container text-center">
        <div class="row text-left icon-area">
            <?php
            if (isset($trustAndSecurities) && !empty($trustAndSecurities)) {
                foreach ($trustAndSecurities as $trustAndSecurity) {
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="icon_box_one vAlign"> 
                            <img src="<?php echo FETCH_TAS_IMG_PATH . $trustAndSecurity['image']; ?>" alt="SAVES" height="10%" width="15%" class="tsh">
                            <span class="tsh">
                                <?php echo $trustAndSecurity['name']; ?>
                            </span>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>



<!--How it works Section Satrt-->
<?php
if (!empty($howItWorks) && isset($howItWorks)) {
    echo $howItWorks['page_content'];
}
?>
<!--How it works Section End--> 

<!--Our services Section Satrt-->
<section id="services">
    <div class="container text-center">
        <h1 class="panel-heading">Our services</h1>
        <ul class="services-list">
            <?php
            if (isset($services) && !empty($services)) {
                foreach ($services as $service) {
                    ?>
                    <li style="background-image: url('<?php echo FETCH_SERVICE_IMG_PATH . $service['bg_image']; ?>')">
                        <a href="<?php echo SITE_PATH . 'services/' . $service['id']; ?>" class="ourservicanc">
                            <img src="<?php echo FETCH_SERVICE_IMG_PATH . $service['image']; ?>" alt="cleaning" />
                            <span><?php echo $service['name']; ?></span></a>
                    </li>
                    <?php
                }
            }
            ?>
            </br>

        </ul>
        <div class="full_width">
            <a href="#" class="btn btn-primary btn-skin" style="width:120px">View All</a>
        </div>
    </div>
</section>
<!--Our services Section End--> 

<!--Trust Security Section Satrt-->
<section id="trust-security">
    <div class="container text-center">
        <h1 class="panel-heading">Your Trust and Security</h1>
        <div class="row text-left">
            <?php
            if (isset($trustAndSecurities) && !empty($trustAndSecurities)) {
                foreach ($trustAndSecurities as $trustAndSecurity) {
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="icon_box_one">
                            <div class="icons"><img src="<?php echo FETCH_TAS_IMG_PATH . $trustAndSecurity['image']; ?>" alt="SAVES" /></div>
                            <div class="box_content">
                                <h4><?php echo $trustAndSecurity['name']; ?></h4>
                                <p><?php echo $trustAndSecurity['description']; ?></p>
                                <a href="#" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> 
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!--Trust Security Section End--> 

<!--Features Section Satrt-->
<?php
if (!empty($features) && isset($features)) {
//    pr($howItWorks);
    echo $features['page_content'];
}
?>


<!-- Testimonials Section Start -->
<section id="testimonails">
    <div class="container text-center">
        <h1 class="panel-heading">Testimonials</h1>
        <div class="row">
            <div class="col-md-12">

                <ul class="trusted_logo owl-carousel" id="Testimonials1">
                    <?php
                    $flag = 1;
                    if (isset($testimonials) && !empty($testimonials)) {
                        foreach ($testimonials as $testimonial) {
//                            pr($testimonial); 
                            if ($flag == 1) {
                                $flag = 0;
                                ?>
                                <li class="item active">  
                                <?php } else { ?>
                                <li class="item">
                                <?php } ?>
                                <div class="avatar text-center"><img class="img-circle"   style="width:100px;" src="<?php echo FETCH_TESTIMONIAL_IMG_PATH . $testimonial['image'] ?>"   alt="testimonial"/></div>
                                <h3><?php echo $testimonial['author']; ?></h3>
                                <p><?php echo $testimonial['testimonial']; ?></p>
                            <center>
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
                            </center>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Testimonails Section End--> 

<!--Downlod app Section Satrt-->
<section id="downlod_app">
    <div class="container text-center">
        <div class="row text-left">
            <div class="col-md-5 col-sm-12 col-xs-12 responsive-look"> <img src="img/mobile.png" alt="DOWNLOAD APP NOW"/> </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="downlod_text text-center">
                    <h2><strong>DOWNLOAD</strong> APP NOW</h2>
                    <p>Slect your device platform and get<br />
                        download start</p>
                    <button type="button" class="btn btn-primary btn-outline"><i class="fa fa-apple" aria-hidden="true"></i> APPLE USER</button>
                    <button type="button" class="btn btn-primary btn-outline"><i class="fa fa-android" aria-hidden="true"></i> ANDROAID USER</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Features Section End--> 
<!--Call To Action Start-->


<?php
//                    
if (isset($authUser) && !empty($authUser)) {
    ?>
          <!-- <section id="call-to-action">
            <div class="container free_consultation">
                <div class="row vAlign">
                                 <div class="col-md-8 col-sm-8 col-xs-12 text-left">
                                        <h3 id="heading">Are you a professional looking to grow your service business?</h3>
                                        <p>we are always ready to welcome you!</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 m-text-center text-right"> <a class="btn btn-primary btn-outline">Join Now </a> </div>

                </div>
            </div>
        </section>-->

<?php } else { ?>
    <section id="call-to-action">
        <div class="container free_consultation">
            <div class="row vAlign">
                <div class="col-md-8 col-sm-8 col-xs-12 text-left">
                    <h3 id="heading">Are you a professional looking to grow your service business?</h3>
                    <!--<p>we are always ready to welcome you!</p>-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 m-text-center text-right">
                    <a href="singUpPro" class="btn btn-primary btn-outline">Join Now </a> </div>

            </div>
        </div>
    </section>
<?php } ?>
<!--Call To Action End--> 

<style>

    @media(max-width: 767px){
        #trust-security .icon_box_one .icons{
            margin-bottom: 20px;
            margin-top: 0px;
            float: unset;
        }
        #trust-security .icon_box_one .box_content {
            margin-bottom: 20px;
            text-align: center;
            margin-left: 0px;
            max-width: 70%;
            margin-left: 15%;
        }
    }
    @media(max-width: 448px){
        #trust-security .icon_box_one .box_content {
            max-width: 100%;
            margin-left: 0px;
        }
    }
    #heading{
        color:#fff;
    }

    #trust-security-header {
        background-color: #45aee8;
        color: #FFF;
        padding-top: 15px;
    }
</style>

<script>
    $(document).ready(function () {

        $(".owl-carousel").owlCarousel({
            autoPlay: 3000,
            items: 1, // THIS IS IMPORTANT
            responsive: {
                480: {items: 1}, // from zero to 480 screen width 4 items
                768: {items: 2}, // from 480 screen widthto 768 6 items
                1024: {items: 2   // from 768 screen width to 1024 8 items
                }
            },
        });
    });
</script>
