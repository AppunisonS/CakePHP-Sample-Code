
<!--Contact Form Start-->
<section id="Contact_form" style="background:#edf5f8; background-image:url(img/slide1.jpg); background-size:cover">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="booking_form signup">
                    <div class="container-fluid">
                        <div class="row">
                            <?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/singUpPro/', 'id' => 'vendorSignupFrom')); ?>
                            <!--<form method="post" action="personalInfo">-->
                                <h2>Be a Professional with Xtra Jobz!</h2>
                                <p class="">Gain access to hundreds of jobs in your city and build your own schedule.</p>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('first_name', array('id' => 'first_name','placeholder'=>'First Name','class'=>'form-control', 'label' => false)); ?>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                   <?php echo $this->Form->text('last_name', array('id' => 'last_name','placeholder'=>'Last Name','class'=>'form-control', 'label' => false)); ?>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('email', array('id' => 'email1','placeholder'=>'Email','class'=>'form-control', 'label' => false)); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('phone_number', array('id' => 'phone_number','placeholder'=>'Phone No','class'=>'form-control', 'label' => false)); ?>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->password('password', array('id' => 'id_password','placeholder'=>'password','class'=>'form-control', 'label' => false)); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->password('confirm_password', array('id' => 'id_confirm_password','class'=>'form-control','placeholder'=>'Ccnfirm password', 'label' => false)); ?>
                                </div>
                               
                                <div class="form-group col-md-6 col-sm-6 col-xs-12 select_box ">
                                      <?php echo $this->Form->select('services_id', $servicesList, array('class' => 'dropdown-toggle select_options form-control', 'label' => false, 'id' => 'vehicleId', 'empty' => 'Select Services')); ?>
                                </div>


                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-success btn-skin" name="submit" type="submit"> Get Started</button>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <!--<p class=" pull-right"> Already registered? <a href="#">login here.</a></p>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-5 col-sm-+ col-xs-12">
              <div class="about_info text-center">
               <img class="img-responsive"  src="images/choose_us_img.png" alt="" style="max-width:350px">
              </div>
            </div>-->
        </div>
    </div>
</section>
<!--Contact Form End--> 
