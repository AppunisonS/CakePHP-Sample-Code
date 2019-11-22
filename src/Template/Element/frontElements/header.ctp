<!--Header Section Start-->
<header id= "header" data-spy="affix" data-offset-top="60" data-offset-bottom="60">
    <div class="container">
        <div class="row">
            <div class="col-md-7  col-sm-12 col-xs-12 col-sm-12">
                <nav class="navbar"> 
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="<?php echo SITE_PATH; ?>">
                            <img class="logo-dark hidden-xs"  src="<?php echo FETCH_WEBSITE_LOGO_PATH . $WebsiteSettings['logo']; ?>" alt="" style=""/>
                            <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="img/logo.png" alt="" />
                        </a> </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">

                            <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Services <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($footerServices) && !empty($footerServices)) {
                                        foreach ($footerServices as $service) {
                                            ?>
                                            <li><a href="<?php echo SITE_PATH . 'services/' . $service['id']; ?>"><?php echo $service['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="professional">Professionals</a></li>
                            <li><a href="#">Help</a></li>
                            <li class="visible-xs"><a href="singUpPro">Become A Pro</a></li>
                            <li class="visible-xs"><a href="#" aria-hidden="true" data-toggle="modal" data-target="#myModal">Login / Register</a></li>
                            <li  class="visible-xs">
                                <a href="<?php echo SITE_PATH; ?>">Download on : <img  style=" max-width:100%;" src="img/Google_Play_Store_logo_block.png" height="50" alt="" /></a>  
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse --> 
                </nav>
            </div>
            <div class="col-md-5  col-sm-12 col-xs-12 col-sm-12 hidden-xs">
                <ul class="right-contact">
                    <!--<li><i class="fa " aria-hidden="true">Download App</i></li>-->
                    <?php
//                    
                    if (isset($authUser) && !empty($authUser)) {
                        ?>
                        <li class="userDropDown_link">
                            <a href="#" class=" " aria-hidden="true" > <?php echo $authUser['first_name'] . '&nbsp;&nbsp;' . $authUser['last_name']; ?> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </a>
                            <ul class="userDropDown_menu">
                                <li><a href="javascript:void(0)">My Bookings</a></li>

                                <li><a href="myAccount">My Account</a></li>
                                <!--<li><a href="javascript:void(0)">Get Free Cleanings</a></li>-->
                                <li>
                                    <?php echo $this->Html->link('Sign out', ['controller' => 'Users', 'action' => 'logout']); ?>
                                </li>
                            </ul>
                        </li>

                    <?php } else {
                        ?>
                        <li><a href="#"><img  style=" max-width:100%;" src="img/Google_Play_Store_logo_block.png" height="50" alt="" /></a></li>
                        <li><a href="#" class=" " aria-hidden="true" data-toggle="modal" data-target="#myModal">Login / Register</a></li>
                        &nbsp;
                        <li><a href="singUpPro" class="btn btn-primary btn-skin">Become A Pro</a></li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </div>
    <!-- /.container --> 
</header>
<!--/Header Section End--> 

<!-- Large modal -->

<div class="modal fade loginpopup centered-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×</button>
            <?php /* ?><div class="modal-header">


              </div><?php */ ?>
            <div class="modal-body">

                <!--                 Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                    <li><a href="#Registration1" data-toggle="tab">Registration</a></li>
                </ul>
                <!--                 Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Login">
                        <div class="row">
                            <div class="col-md-7" style="border-right: 1px dotted #C2C2C2;padding: 30px;">
                                <?php echo $this->Form->Create(null, ['url' => ['controller' => 'Users', 'action' => 'login'], "id" => "userLoginFrom"]); ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->input('email', ["class" => "form-control", "label" => false, "placeholder" => "Username / Email Address"]); ?>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->password('password', ["class" => "form-control", "placeholder" => "Password"]); ?>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->button('Login', ["type" => "submit", "class" => "btn btn-success btn-skin"]); ?>
                                </div>
                                <?php echo $this->Form->end(); ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <p c> Forgot Password? <a href="#Forgot" data-toggle="tab" href="#">click here.</a></p>

                                </div>

                                <div id="OR" class="hidden-xs">
                                    OR</div>
                            </div>

                            <div class="col-md-5">
                                <div class="row text-center sign-with">
                                    <div class="col-md-12">
                                        <h3>
                                            Sign in with</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary btn-block" style="margin-bottom:10px;">Facebook</a>

<!--                                            <a href="#" class="btn btn-danger btn-block">
                                                Google</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Forgot">
                        <div class="row">
                            <div class="col-md-12 o" style=" padding: 30px;">
                                <?php echo $this->Form->Create('', ['url' => ['controller' => 'Users', 'action' => 'forgotPassword'], 'id' => 'userForgotFrom']); ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->text('email', ["class" => "form-control", "placeholder" => "Enter Email Address"]); ?>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                                    <?php echo $this->Form->button('Reset Password', ['type' => 'submit', 'class' => "btn btn-success btn-skin"]); ?>
                                </div> <?php echo $this->Form->end(); ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <p> Go back to Login? <a href="#Login" data-toggle="tab" href="#">click here.</a></p>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane" id="Registration1">
                        <div class="row">
                            <div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding: 30px;">
                                <?php echo $this->Form->Create('', ['url' => ['controller' => 'Users', 'action' => 'registration'], 'id' => 'userSignupFrom']); ?>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('first_name', ["class" => "form-control", "placeholder" => "First Name"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('last_name', ["class" => "form-control", "placeholder" => "Last Name"]); ?>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('email', ["class" => "form-control", "placeholder" => "Email Address"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('phone', ["class" => "form-control", "placeholder" => "Phone Number"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->password('password', ['id' => "pass", "class" => "form-control", "placeholder" => "Password"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->password('confirm_password', ["class" => "form-control", "placeholder" => "Confirm Password"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('location', ["class" => "form-control", "placeholder" => "Address"]); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->text('states', ["class" => "form-control", "placeholder" => "States"]); ?>

                                </div>
<!--                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php // echo $this->Form->text('city', ["class" => "form-control", "placeholder" => "City"]); ?>
                                </div>-->

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $this->Form->select('district', $districtsList, array('class' => 'form-control', 'label' => false, 'id' => 'district', 'empty' => 'Select District')); ?>
                                    <?php // echo $this->Form->text('zip', ["class" => "form-control", "placeholder" => "ZipCode"]); ?>
                                </div>
                                <?php echo $this->Form->hidden('id', array('id' => 'idField')); ?>
                                <?php /* ?><div class="form-group col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control" id="Email" name="Subject" placeholder="Email Address" type="text"/>
                                  </div>
                                  <div class="form-group col-md-6 col-sm-6 col-xs-12 select_box ">
                                  <input type="hidden"  name="state" id="state"/>
                                  <a  class="dropdown-toggle select_options" data-toggle="dropdown" href="#"> <span class="change-text pull-left">Select Service</span> <i class="fa fa-angle-down pull-right"></i> </a>
                                  <ul class="dropdown-menu">
                                  <li><a href="#">Option one</a></li>
                                  <li><a href="#">Option two</a></li>
                                  <li><a href="#">Option three</a></li>
                                  </ul>
                                  </div><?php */ ?>

                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->button('Get Started', ['type' => 'submit', "class" => "btn btn-success btn-skin"]); ?>
                                </div>
                                <?php echo $this->Form->end(); ?>
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <p style="padding-left:15px"> Already registered? <a href="#Login" data-toggle="tab">login here.</a></p>
                                </div>
                                <?php /* ?><div id="OR" class="hidden-xs">
                                  OR</div><?php */ ?>
                            </div>

                            <?php /* ?><div class="col-md-4">
                              <div class="row text-center sign-with">
                              <div class="col-md-12">
                              <h3>
                              Register with</h3>
                              </div>
                              <div class="col-md-12">
                              <div class="btn-group btn-group-justified">
                              <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
                              Google</a>
                              </div>
                              </div>
                              </div>
                              </div><?php */ ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
