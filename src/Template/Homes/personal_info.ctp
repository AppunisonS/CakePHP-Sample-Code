<!--Page Title Section Satrt-->
<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Personal Details</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Personal Details</li>
        </ol>
    </div>
</div>
<!--Page Title Section End--> 

<!--Contact Information Start-->
<section id="contact_information">
    <div class="container">



        <!--Contact Information-->
        <div class="contact_information_left "> 

            <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
            <div class="booking_form">
                <div class="container-fluid">
                    <div class="row">
                        <!--<form method="post">-->
                        <?php echo $this->Form->create('Homes', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/personalInfo/', 'id' => 'personalInfoFrom')); ?>
                        <div class="col-md-8 col-md-offset-2">
                            <div style="background-color: #fcfcfc;
                                 border: 1px solid #dddddd;
                                 padding: 20px 30px;
                                 margin-bottom: 25px;">


                                <h2>Personal Details</h2>
                                <hr />
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="phone">Mobile Phone Number</label>
                                    <div class='input-group'>
                                        <span class="input-group-addon"> +1 </span>
                                        <?php echo $this->Form->text('mobile_number', array('id' => 'mobile_number', 'placeholder' => '(505) 555-5555', 'class' => 'form-control', 'label' => false)); ?>
                                        <!--<input type='text' name="phone" class="form-control" placeholder="(505) 555-5555" />-->
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="phone">Confirm Mobile Phone Number </label>
                                    <div class='input-group'><span class="input-group-addon"> +1 </span>
                                        <?php echo $this->Form->text('confirm_mobile_number', array('id' => 'confirm_mobile_number', 'placeholder' => '(505) 555-5555', 'class' => 'form-control', 'label' => false)); ?>
                                        <!--<input type='text' name="phone"  class="form-control" placeholder="(505) 555-5555"/>-->
                                    </div>
                                </div>

                                <p><small><i class="fa fa-info-circle"></i> You must be able to receive text messages at this number to complete the application. </small></p>
                                <div class="clearfix"></div>

                                <!--Service Address-->
                                <h2>Mailing Address</h2>
                                <hr />
                                <div class="form-group col-md-8 col-sm-8 col-xs-12 ">
                                    <?php // echo $this->Form->hidden('services_id', array('value' => $servicesId)); ?>

                                    <?php echo $this->Form->text('location', array('id' => 'location', 'placeholder' => 'Street Address*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>

                                <!--                                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                <?php // echo $this->Form->text('city', array('id' => 'city', 'placeholder' => 'City*', 'class' => 'form-control', 'label' => false)); ?>
                                                                </div>-->
                                <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                    <?php echo $this->Form->text('state', array('id' => 'state', 'placeholder' => 'State*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                                <div class="form-group col-md-8 col-sm-8 col-xs-12 padding-r">
                                    <?php echo $this->Form->select('district', $districtsList, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'district', 'empty' => 'Select District')); ?>
                                    <?php // echo $this->Form->text('zip', array('id' => 'zip', 'placeholder' => 'ZIP Code*', 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                                <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
                                    <?php echo $this->Form->hidden('vendor_id', array('value' => $id)); ?>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Scanned Background Papers from Peru</label>
                                    <?php echo $this->Form->file('scanned_background_papers_from_peru', array('id' => 'scanned_background_papers_from_peru', 'name' => 'scanned_background_papers_from_peru')); ?>
                                <!--<input type="file" name="pic" accept="image/*">-->
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Scanned Certification Papers</label>
                                    <?php echo $this->Form->file('scanned_certification_papers', array('id' => 'scanned_certification_papers', 'name' => 'scanned_certification_papers')); ?>
                              <!--<input type="file" name="pic" accept="image/*">-->
                                </div>


                                <div class=" col-xs-12"> <p><small><i class="fa fa-info-circle"></i>  You must be able to receive packages at this address. </small></p>
                                </div> <div class="clearfix"></div>
                            </div>
                            <div style="background-color: #fcfcfc;
                                 border: 1px solid #dddddd;
                                 padding: 20px 30px;
                                 margin-bottom: 25px;">


                                <!--Choose Service-->
                                <h2>Work Experience</h2>
                                <hr />
                                <div class="form-group ">
                                    <label for="" class="col-md-8"> How much paid cleaning experience do you have? </label>
                                    <div class=" col-md-4">
                                        <?php echo $this->Form->select('vendor_experience', $experience, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'experience', 'empty' => 'Select Experience')); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="col-md-8">  Are you legally eligible to work in the U.S.?  </label>
                                    <div class=" col-md-4">
                                        <?php echo $this->Form->select('legally_eligible', $legally_eligible, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'eligible', 'empty' => 'Select Eligible')); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="col-md-8"> How did you hear about Xtra Jobz? (optional)  </label>
                                    <div class=" col-md-4">
                                        <?php echo $this->Form->select('about_xetra_job', $about_xetra_job, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'about_xetra_job', 'empty' => 'Select')); ?>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                            <div style="background-color: #fcfcfc;
                                 border: 1px solid #dddddd;
                                 padding: 20px 30px;
                                 margin-bottom: 25px;">
                                <!--Select Date Time-->
                                <h2>Other Info</h2>
                                <hr />
                                <div class="form-group ">
                                    <label for="" class="col-md-4"> Gender </label><div class="col-md-4">

                                    </div>
                                    <div class=" col-md-4">

                                        <select name="gender" class="dropdown-toggle select_options">
                                            <option value="man">Man</option>
                                            <option value="woman">Woman</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="col-md-8">  How do you plan on commuting to jobs? </label>

                                    <div class=" col-md-4">
                                        <?php echo $this->Form->select('commuting', $commuting, array('class' => 'dropdown-toggle select_options', 'label' => false, 'id' => 'commuting', 'empty' => 'Select Commuting')); ?>
                                    </div>
                                </div>



                                <div class="clearfix"></div>             





                                <p>
                                    <label><input type="checkbox" class="checkbox-inline" >I agree to Xtra jobz's Terms of Use, and by clicking the box and proceeding, I agree that Xtra jobz or its representatives may contact me by email, phone, or SMS (including by automatic telephone dialing system) at the email address or number I provide, including for marketing purposes. I have read and understand the relevant Privacy Statement.</label></p>


                                <button class="btn btn-primary btn-skin btn-block" name="submit" type="submit"> SUBMIT YOUR APPLICATION</button>
                                <div class="clearfix"></div></div></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact Information--> 

    </div>
    <!--/Left Form Part-->


</section>
<!--Contact Information End--> 

