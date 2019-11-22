<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Admin Profile
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <?php
                    if (!empty($authAdmin['image']) && file_exists(ADMIN_IMG_PATH . $authAdmin['image'])) {
                        ?>
                        <?php echo $this->Html->image(FATCH_ADMIN_IMG_PATH . $authAdmin['image'], array('class' => 'profile-user-img img-responsive img-circle', 'width' => '50', 'height' => '50')); ?>
                    <?php } else { ?>
                        <?php echo $this->Html->image('noimage.gif', array('class' => 'profile-user-img img-responsive img-circle', 'width' => '50', 'height' => '50')); ?>
                    <?php } ?>
                    <h3 class="profile-username text-center"> <?php echo $authAdmin['first_name']; ?></h3>

                    <p class="text-muted text-center"><?php echo $authAdmin['last_name']; ?></p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <span class="username">
                                    <a href="#">Name: <?php echo $authAdmin['first_name']; ?> <?php echo $authAdmin['last_name']; ?></a>
                                    <a href="#" class="pull-right btn-box-tool"></a>
                                </span>
                                <span class="description">Email: <?php echo $authAdmin['email']; ?></span>
                                <span class="description">Contact No: <?php echo $authAdmin['contact_no']; ?></span>
                                <!--<span class="description">Last Login: <?php /* echo $authAdmin['last_login']; */ ?></span>-->

                            </div>
                            <!-- /.user-block -->
                        </div>
                        <!-- /.post -->
                    </div>
                    <div class="tab-pane" id="settings">
                        <?php echo $this->Form->create('Admin', array('novalidate' => true, 'url' => '/admin/changePassword', 'id' => 'changePasswordAdminForm', 'class' => 'form-horizontal')); ?>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php echo $this->Form->input('old_password', array('id' => 'old_password', 'class' => 'form-control', 'type' => 'password', 'placeholder' => 'Old Password')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php echo $this->Form->input('new_password', array('class' => 'form-control', 'type' => 'password', 'id' => 'new_password', 'placeholder' => 'Password')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php echo $this->Form->input('confirm_password', array('class' => 'form-control', 'id' => 'confirm_password', 'type' => 'password', 'placeholder' => 'Confirm Password',)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <?php echo $this->Form->hidden('id', array('id' => 'idField')); ?>
                                <?php
                                echo $this->Form->button('Submit', array('class' => 'fa fa-save btn btn-block btn-primary'));
                                echo $this->Form->end();
                                ?> 
                            </div>
                        </div>
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    <!-- /.row -->
</section>
<!-- /.content -->