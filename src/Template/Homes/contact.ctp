
<!--Banner Start-->
<section id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Contact</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Contact</li>
        </ol>
    </div>
</section>

<!--/Banner End--> 

<!--Testimonails Section Satrt-->
<?php if(isset($websiteSettings) && !empty($websiteSettings)){?>
    
 
<section id="contactPageSec">
    <div class="smallContainer"> 
        <div class="full_width">
            <h3><?php echo $websiteSettings['contact_us_title'];?></h3>
            <p><?php echo $websiteSettings['contact_us_contant'];?></p>
        </div>
        <div class="contactPage_sec full_width" id="contactUs">
            <div class="contactPage full_width materialShadow vAlign">
                <div class="contactPage_left">
                    <h3>Let's get in touch</h3>
                    <p>We are open for any suggestion or any enquiry from your side.</p>
                    <ul class="full_width">
                        <li class="full_width">
                            <div class="contact_img">
                                <img src="http://appunison.com/projects/Xetra_Job/img/phone-call.svg" alt="icon">
                            </div>
                            <div class="contact_content">
                                <p><strong> +91 &nbsp;</strong> <?php echo $websiteSettings['contact_no'];?></p>
                                <p><strong> +91 &nbsp;</strong> <?php echo $websiteSettings['landline'];?></p>
                            </div>
                        </li>
                        <li class="full_width">
                            <div class="contact_img">
                                <img src="http://appunison.com/projects/Xetra_Job/img/envelope.svg" alt="icon">
                            </div>
                            <div class="contact_content">
                                <p><?php echo $websiteSettings['website_email_contact'];?></p>
                                
                            </div>
                        </li>
                        <li class="full_width">
                            <div class="contact_img">
                                <img src="http://appunison.com/projects/Xetra_Job/img/placeholder.svg" alt="icon">
                            </div>
                            <div class="contact_content">
                                <h6><?php echo $websiteSettings['location'];?></h6>
                                <h6>Pin: <?php echo $websiteSettings['zip'];?></h6>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="contactPage_right">
                    <h3>Get In Touch With Us</h3>
                     <?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'class' => 'full_width', 'url' => '/contact/')); ?>
                    <!--<form class="full_width" method="POST" action="https://formspree.io/rahulchaudhary0303@gmail.com">-->
                        <label> Enter Your Name</label>
                        <?php echo $this->Form->text('name', array('id' => 'name', 'placeholder' => 'Please Enter your Name', 'full_width' => false, 'label' => false,'required'=>true)); ?>
                        <!--<input type="text" name="userName" autocomplete="off" required="">-->
                        <label>Enter Your Email</label>
                          <?php echo $this->Form->text('email', array('id' => 'email', 'placeholder' => 'Please Enter the correct Email', 'full_width' => false, 'label' => false,'required'=>true)); ?>
                        <!--<input type="email" name="email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter the correct Email" required="">-->
                        <label>Phone Number</label>
                            <?php echo $this->Form->text('phone', array('id' => 'phone', 'placeholder' => '(505) 555-5555', 'full_width' => false, 'label' => false,'required'=>true)); ?>
                        <!--<input type="text" name="phone" autocomplete="off" required="">-->
                        <label>Description</label>
                        
                         <?php echo $this->Form->textarea('message', array('id' => 'message', 'placeholder' => 'Description', 'label' => false,'required'=>true)); ?>
                        
                        <!--<textarea name="comment"></textarea>-->
                        <div class="full_width submitBtn_sec">
                            <button type="submit" class="btnSubmit">Submit</button>
                        </div>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</section>

<?php } ?>
<!--Testimonails Section End--> 
