<!--Banner Start-->
<section id="page_title">
    <div class="container text-center">
        <div class="panel-heading">My Account</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">My Account</li>
        </ol>
    </div>
</section>

<!--/Banner End--> 

<!--Testimonails Section Satrt-->

<section id="MyAccountPageSec">
    <div class="midContainer"> 
        <div class="full_width MyAccountPageWrap">
            <div class="MyAccountWrapLeft">
                <div class="full_width ibox">
                    <h4>Account</h4>
                    <?php echo $this->Form->create('Users', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/myAccount/', 'id' => 'myAccountPageFrom')); ?>

                    <div class="FormRow">
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">First Name </label>
                            <?php echo $this->Form->text('first_name', array('id' => 'first_name', 'placeholder' => 'First Name*', 'class' => 'form-control', 'label' => false)); ?>

                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">Last Name </label>
                            <?php echo $this->Form->text('last_name', array('id' => 'last_name', 'placeholder' => 'Last Name*', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="FormRow">
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">Contact No </label>
                            <?php echo $this->Form->text('phone', array('id' => 'phone', 'placeholder' => 'Contact No', 'class' => 'form-control', 'label' => false)); ?>

                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">states</label>
                            <?php echo $this->Form->text('states', array('id' => 'states', 'placeholder' => 'States', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="FormRow">
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">city</label>
                            <?php echo $this->Form->text('city', array('id' => 'city', 'placeholder' => 'City', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label class="form-label">zip</label>
                                <?php echo $this->Form->text('zip', array('id' => 'zip', 'placeholder' => 'Zip', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="FormRow">
                        <div class="col-sm-12 col-xs-12">
                            <label class="form-label">Address</label>
                                <?php echo $this->Form->text('location', array('id' => 'location', 'placeholder' => 'Street Address*', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="FormRow col-sm-12">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                    </form>
                </div>


            </div>
            <div class="MyAccountWrapRight">
                <?php echo $this->Form->create('Users', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/changeUserPassword/', 'id' => 'changePasswordUserForm')); ?>
                <div class="full_width ibox">
                    <h4>Change Password</h4>
                    <div class="FormRow">
                        <div class="col-sm-7">
                            <label class="form-label">Current Password</label>
                            <?php echo $this->Form->password('old_password', array('id' => 'old_password', 'placeholder' => 'Current Password', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="FormRow">
                        <div class="col-sm-7">
                            <label class="form-label">New Password</label>
                                 <?php echo $this->Form->password('new_password', array('id' => 'new_password', 'placeholder' => 'New Password', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="FormRow">
                        <div class="col-sm-7">
                            <label class="form-label">Confirm Password</label>
                                <?php echo $this->Form->password('confirm_password', array('id' => 'confirm_password', 'placeholder' => 'Confirm Password', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="FormRow col-sm-12">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
                </form>
            </div>
            
            <div class="creditCard">
                
                <div class="full_width ibox">
                    <h4>Credit Card</h4>
                    
                    
                    
                    <div class="FormRow col-sm-12">
                        <a class="btn btn-primary" href="<?php echo SITE_PATH . 'saveCard'; ?>">UPDATE CREDIT CARD INFORMATION</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>
<!--Testimonails Section End--> 
