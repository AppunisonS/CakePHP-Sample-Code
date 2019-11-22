<style>
    footer h4{
        margin: 0px;
    }
    footer ul{
        margin-bottom: 15px;
    }
    .about_info .logo-dark{
        width: 150px;
    }
</style>

<!--Footer-->
<footer>
    <div class="container-fluid footerbg">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-3"> <a href="#" class="footer-logo"> <img class="logo-dark"  src="<?php echo FETCH_WEBSITE_LOGO_PATH . $WebsiteSettings['footer_logo'] ?>" alt="" /> </a>
                        <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                    <div class="about_info">
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $WebsiteSettings['location']; ?></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $WebsiteSettings['website_email_contact']; ?></p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><?php echo $WebsiteSettings['contact_no']; ?></p>
                        <a style="width: 201px; height: 109px;" href="<?php echo SITE_PATH; ?>"><img class="logo-dark" src="img/google-play-store-logo.svg" alt="" /></a>  
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <h4>Services</h4>
                    <ul>
                        <?php
                        if (isset($footerServices) && !empty($footerServices)) {
                            foreach ($footerServices as $footerService) {
                                ?>
                                <li><a href="<?php echo SITE_PATH . 'services/' . $footerService['id']; ?>"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $footerService['name']; ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 mobileClear">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="<?php echo SITE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo SITE_PATH . 'about'; ?>">About us</a></li>
                        <!--<li><a href="#">Services</a></li>-->
                        <li><a href="<?php echo SITE_PATH . 'contact'; ?>">Contact</a></li>
                        <li><a href="<?php echo SITE_PATH . 'listingPage'; ?>">Block List Professionals</a></li>
                        <!--<li><a href="<?php // echo SITE_PATH . 'faq'; ?>">Faq</a></li>-->
                        <!--<li><a href="<?php // echo SITE_PATH . 'saveCard'; ?>">saveCard</a></li>-->
                        <!--<li><a href="vendorDetails">Vendor Details</a></li>-->
                        <!--<li><a href="myAccount">My Account</a></li>-->

                    </ul>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h4>Singn up Newsletter</h4>
                    <form action="#" method="post" class="newsletter">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </span> </div>
                        <!-- /input-group -->
                    </form>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
            <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
        </div>
    </div>

    <!--Boottom Footer-->
    <div class="container-fluid bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="copyright pull-left">&copy; <?php echo date("Y"); ?> All Right Reserved</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="#" class="links-center">Privacy</a> | 
                    <a href="#">Terms</a> |
                    <a href="#">Cancellation Policy</a> 
                </div>
                <div class="col-md-4 text-center">
                    <ul class="footer-scoails pull-right">
                        <li><a href="<?php echo $WebsiteSettings['facebook_url']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $WebsiteSettings['facebook_url']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $WebsiteSettings['google_plus_url']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $WebsiteSettings['you_tube_url']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/Footer-->

