<!--Banner Start-->
<section id="service_banner">
    <div class="container text-center service_banner_layer">
        <div class="banner_content">
            <div class="row text-left">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?php
                    if (!empty($services['description'])) {
                        echo $services['description'];
                    }
                    ?>
                    <?php if (isset($authUser)) { ?>
                        <a class="btn btn-warning btn-booknow" href="<?php echo SITE_PATH . 'bookingPage/' . base64_encode($id); ?>"> Book now </a> 
        <!--<a href="<?php // echo SITE_PATH . 'bookingPage';          ?>"><button type="button" class="btn btn-primary booknow btn-skin"> Book now </button></a>-->
                    <?php } else { ?>
                        <a href="#" aria-hidden="true" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-booknow">Book now </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--/Banner End--> 

<!--How it works Section Satrt-->
<?php
if (!empty($howItWorks) && isset($howItWorks)) {
    echo str_replace('img/images', '../img/images', $howItWorks['page_content']);
}
?>
<!--How it works Section End--> 



<!--Xetra Section Satrt-->
<section id="What_offer">
    <div class="container text-center">
        <h1 class="panel-heading">What we offer</h1>
        <div class="row text-left">
            <?php
            if (isset($xetrasData) && !empty($xetrasData)) {
                foreach ($xetrasData as $xetraData) {
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="icon_box_one vAlign">
                            <div class="icons">


                                <img src="<?php echo FETCH_XETRA_IMG_PATH . $xetraData['image']; ?>" alt="cleaning" /></div>
                            <div class="box_content">
                                <h4><?php echo $xetraData['title']; ?></h4>
                                <p><?php echo $xetraData['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="icon_box_one">
                        <div class="noRecord_found full_width">
                            <h4> No Records found... </h4>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!--Xetra Section End--> 

<!--Frequently asked questions Section Satrt-->
<section id="service-faq">
    <div class="container text-center">
        <h1 class="panel-heading">
            <?php
            if (!empty($services['name'])) {
                echo $services['name'];
            }
            ?>
        </h1>

    </div>
</section>
<!--Frequently asked questions Section End--> 





<!--furniture section Satrt-->
<section id="fr_section">
    <h1 class="">
        <!--A Stress-Free Furniture Assembly Service-->
    </h1> 
    <?php
    // pr( count($servicesFaqDatas));die;
    if (isset($servicesFaqDatas) && !empty($servicesFaqDatas)) {
//        pr(count($servicesFaqDatas));

        foreach ($servicesFaqDatas as $keyFaq => $valFaq) {
            if ($keyFaq % 2 == 0) {
                ?>
                <div class="lft_img_row">
                <?php } else { ?>
                    <div class="rit_img_row">
                    <?php } ?>
                    <div class="container text-center">
                        <div class="columns description">
                            <h4><?php echo $valFaq['title']; ?></h4>
                            <p><?php echo $valFaq['description']; ?>
                                <!--<a href="#" class="more">Read More...</a>-->
                            </p>
                        </div>
                        <?php if ($keyFaq % 2 == 0) { ?>
                            <div class="img_lft">
                            <?php } else { ?>
                                <div class="img_rit">
                                <?php } ?>


                                <img src="<?php echo FETCH_FAQ_IMG_PATH . $valFaq['image']; ?>"/>
                            </div>

                        </div>

                    </div>
                    <?php
                }
            }
            ?>
            </section>
            <!--/furniture section End--> 

            <section id="FaqPageSec">
                <div class="smallContainer"> 
                    <div class="full_width">
                        <h3><?php
                            if (isset($faq_title) && !empty($faq_title)) {
                                echo $faq_title;
                            }
                            ?></h3>
                        <p>
                            <?php
                            if (isset($xetra_job_faq_contant) && !empty($xetra_job_faq_contant)) {
                                echo $xetra_job_faq_contant;
                            }
                            ?>
                        </p>
                    </div>
                    <div class="full_width faqListBlock">
                        <h5>Faq's</h5>
                        <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                        <div class="panel-group full_width">
                            <?php
                            if (isset($faqDatas) && !empty($faqDatas)) {
                                foreach ($faqDatas as $faqDat) {
                                    ?>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="javascript:void(0)" class="collapsedLink"><?php echo $faqDat['question'] ?></a> 
                                            </h4>
                                        </div>
                                        <div class="panel-collapse">
                                            <div class="panel-body"><?php echo $faqDat['answer'] ?></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>



                        </div> 
                    </div>
                    <div class="full_width text-center" style="padding: 2em 0;">
                        <a href="<?php echo SITE_PATH . 'contact' ?>" class="btn btn-primary btn-lg"> Contact-Us </a>
                    </div>
                </div>
            </section>


            <!--Tenancy Deposit Satrt-->
            <section id="tenancy_deposit">
                <div class="container text-center">
                    <!--<h1 class="panel-heading">Get your tenancy deposit backa</h1>-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="book-now-home-btn">
                                <a href="<?php echo SITE_PATH . 'bookingPage/' . base64_encode($id); ?>"><button class="btn btn-primary btn-outline active" type="button" > Book now </button></a>
                                <a href=" <?php echo SITE_PATH . 'contact' ?>"><button class="btn btn-primary btn-outline" type="button"> Request a quote </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/Tenancy Deposit Satrt End--> 








