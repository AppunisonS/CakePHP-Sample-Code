<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                if (!empty($authAdmin['image'] && file_exists(ADMIN_IMG_PATH . $authAdmin['image']))) {
                    echo $this->Html->image(FATCH_ADMIN_IMG_PATH . $authAdmin['image'], array('class' => 'img-circle', 'alt' => 'User Image'));
                } else {
                    echo $this->Html->image('noimage.gif', ["class" => "img-circle", "alt" => "User Image"]);
                }
                ?>
            </div>
            <div class="pull-left info">
                <p><?= $authAdmin['first_name'] . ' ' . $authAdmin['last_name']; ?></p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo ($this->request->params['action'] == 'dashboard' && $this->request->params['controller'] == 'Admins') ? 'active' : ''; ?> ">
                <?php
                echo $this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['controller' => 'Admins', 'action' => 'dashboard'], ['prefix' => 'admin', 'escape' => false]);
                ?>
            </li>
            <li class="
            <?php echo (in_array($this->request->params['action'], array('employeeListing', 'saveEmployee')) && $this->request->params['controller'] == 'Employees') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-user"></i> <span>Manage Admins</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('listing', 'saveAdmin')) && $this->request->params['controller'] == 'Admins') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'listing' && $this->request->params['controller'] == 'Admins') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Listing', ['controller' => 'Admins', 'action' => 'Listing'], ['prefix' => 'admin', 'escape' => false]);
                        ?>
                    </li>             
<!--                    <li class="<?php // echo ($this->request->params['action'] == 'saveAdmin' && $this->request->params['controller'] == 'Admins') ? 'active' : ''       ?>"><?php
//                        echo $this->Html->link('<i class="fa fa-user-plus"></i> Add Admin', ['controller' => 'Admins', 'action' => 'saveAdmin'], ['prefix' => 'admin', 'escape' => false]);
                    ?>
                    </li>-->

                </ul>
            </li> 
            <li class="
            <?php echo (in_array($this->request->params['action'], array('emailTemplateListing', 'saveEmailTemplate', 'websiteSetting', 'cmsPageListing', 'saveCmsPage', 'trustAndSecuritiesListing', 'saveTrustAndSecurities', 'testimonialListing', 'saveTestimonial')) && (in_array($this->request->params['controller'], array('Emailtemplates', 'Admins', 'CmsPages', 'TrustAndSecurities', 'Testimonials')))) ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-wrench"></i> <span>Manage Website</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('emailTemplateListing', 'saveEmailTemplate')) && $this->request->params['controller'] == 'EmailTemplates') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'emailTemplateListing' && $this->request->params['controller'] == 'EmailTemplates') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Email Template Listing', ['controller' => 'EmailTemplates', 'action' => 'emailTemplateListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <!---- <li class="<?php echo ($this->request->params['action'] == 'saveEmailTemplate' && $this->request->params['controller'] == 'EmailTemplates') ? 'active' : '' ?>"><?php
                    echo $this->Html->link('<i class="fa fa-plus"></i> EmailTemplate Add', ['controller' => 'EmailTemplates', 'action' => 'saveEmailTemplate'], ['prefix' => 'admin', 'escape' => false]);
                    ?>
                    </li> --->
                    <li class="<?php echo ($this->request->params['action'] == 'cmsPageListing' && $this->request->params['controller'] == 'CmsPages') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Cms Pages Listing', ['controller' => 'CmsPages', 'action' => 'cmsPageListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <!---- <li class="<?php echo ($this->request->params['action'] == 'saveCmsPage' && $this->request->params['controller'] == 'CmsPages') ? 'active' : '' ?>"><?php
                    echo $this->Html->link('<i class="fa fa-list-alt"></i> Add Cms Pages', ['controller' => 'CmsPages', 'action' => 'saveCmsPage'], ['prefix' => 'admin', 'escape' => false]);
                    ?></li> ---->
                    <li class="<?php echo ($this->request->params['action'] == 'websiteSetting' && $this->request->params['controller'] == 'Admins') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Website Setting', ['controller' => 'Admins', 'action' => 'websiteSetting'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'trustAndSecuritiesListing' && $this->request->params['controller'] == 'TrustAndSecurities') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Trust And Securities Listing', ['controller' => 'TrustAndSecurities', 'action' => 'trustAndSecuritiesListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveTrustAndSecurities' && $this->request->params['controller'] == 'TrustAndSecurities') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Trust And Securities ', ['controller' => 'TrustAndSecurities', 'action' => 'saveTrustAndSecurities'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'testimonialListing' && $this->request->params['controller'] == 'Testimonials') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Testimonial Listing', ['controller' => 'Testimonials', 'action' => 'testimonialListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveTestimonial' && $this->request->params['controller'] == 'Testimonials') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Testimonial', ['controller' => 'Testimonials', 'action' => 'saveTestimonial'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                </ul>
            </li>


            <!---Plans Start---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('planListing', 'savePlan', 'planTypeListing', 'savePlanType')) && (in_array($this->request->params['controller'], array('Plans', 'PlanTypes')))) ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-tasks"></i> <span>Manage Plans</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('planListing', 'savePlan')) && $this->request->params['controller'] == 'Plans') ? 'style="display: block;"' : '' ?>>

                    <li class="<?php echo ($this->request->params['action'] == 'planTypeListing' && $this->request->params['controller'] == 'PlanTypes') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Plan Types Listing', ['controller' => 'PlanTypes', 'action' => 'planTypeListing'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'savePlanType' && $this->request->params['controller'] == 'PlanTypes') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Plan Types', ['controller' => 'PlanTypes', 'action' => 'savePlanType'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>

                </ul>
            </li>
            <!--Plans End--->

            <li class="
            <?php echo (in_array($this->request->params['action'], array('districtsListing', 'saveDistricts')) && (in_array($this->request->params['controller'], array('Districts')))) ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-tasks"></i> <span>Manage Districts</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('districtsListing', 'saveDistricts')) && $this->request->params['controller'] == 'Districts') ? 'style="display: block;"' : '' ?>>

                    <li class="<?php echo ($this->request->params['action'] == 'districtsListing' && $this->request->params['controller'] == 'Districts') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Districts Listing', ['controller' => 'Districts', 'action' => 'districtsListing'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveDistricts' && $this->request->params['controller'] == 'Districts') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Districts', ['controller' => 'Districts', 'action' => 'saveDistricts'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>

                </ul>
            </li>
            
            <!---Cities Start---->

<!--            <li class="
            <?php // echo (in_array($this->request->params['action'], array('citiesListing', 'saveCities')) && (in_array($this->request->params['controller'], array('Cities')))) ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-tasks"></i> <span>Manage Cities</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php // echo (in_array($this->request->params['action'], array('citiesListing', 'saveCities')) && $this->request->params['controller'] == 'Cities') ? 'style="display: block;"' : '' ?>>

                    <li class="<?php // echo ($this->request->params['action'] == 'citiesListing' && $this->request->params['controller'] == 'Cities') ? 'active' : '' ?>"><?php
//                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Cities Listing', ['controller' => 'Cities', 'action' => 'citiesListing'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>
                    <li class="<?php // echo ($this->request->params['action'] == 'saveCities' && $this->request->params['controller'] == 'Cities') ? 'active' : '' ?>"><?php
//                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Cities', ['controller' => 'Cities', 'action' => 'saveCities'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?></li>

                </ul>
            </li>-->

            <!--Cities End--->


            <!---- Manage All Master requermenr For Services ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('eventListing', 'saveEvent', 'guestListing', 'saveGuest', 'musicListing', 'saveMusic', 'additionalServicesListing', 'saveAdditionalServices')) && (in_array($this->request->params['controller'], array('Events', 'Guests', 'Musics', 'AdditionalServices')))) ? 'active' : '' ?>

                <?php // echo (in_array($this->request->params['action'], array('servicesListing', 'saveServices')) && $this->request->params['controller'] == 'Services') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-share"></i> <span>Manage Schedule</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('eventListing', 'saveEvent')) && $this->request->params['controller'] == 'Events') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'eventListing' && $this->request->params['controller'] == 'Events') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-star-o"></i> Event Place Listing', ['controller' => 'Events', 'action' => 'eventListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveEvent' && $this->request->params['controller'] == 'Events') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Event Place', ['controller' => 'Events', 'action' => 'saveEvent'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'guestListing' && $this->request->params['controller'] == 'Guests') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-user"></i>Manage Guests', ['controller' => 'Guests', 'action' => 'guestListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveGuest' && $this->request->params['controller'] == 'Guests') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Guests Number ', ['controller' => 'Guests', 'action' => 'saveGuest'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'musicListing' && $this->request->params['controller'] == 'Musics') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-music"></i>Manage Music', ['controller' => 'Musics', 'action' => 'musicListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveMusic' && $this->request->params['controller'] == 'Musics') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Music ', ['controller' => 'Musics', 'action' => 'saveMusic'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'additionalServicesListing' && $this->request->params['controller'] == 'AdditionalServices') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-navicon"></i>Manage Additional Services', ['controller' => 'AdditionalServices', 'action' => 'additionalServicesListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveAdditionalServices' && $this->request->params['controller'] == 'AdditionalServices') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Additional Services ', ['controller' => 'AdditionalServices', 'action' => 'saveAdditionalServices'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                </ul>
            </li>

            <!--------------END HERE----------------------------->





            <!---- Services ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('servicesListing', 'saveServices', 'xetrasListing', 'saveXetras', 'subServicesListing', 'saveSubServices', 'djEventsListing', 'saveDjEvents', 'driverListing', 'saveDriver', 'saveVehicle', 'vehicleListing')) && (in_array($this->request->params['controller'], array('Vehicles', 'Drivers', 'DjEvents', 'Services', 'Xetras', 'SubServices')))) ? 'active' : '' ?>

                <?php // echo (in_array($this->request->params['action'], array('servicesListing', 'saveServices')) && $this->request->params['controller'] == 'Services') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-indent"></i> <span>Manage Services</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('servicesListing', 'saveServices')) && $this->request->params['controller'] == 'Services') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'servicesListing' && $this->request->params['controller'] == 'Services') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Services Listing', ['controller' => 'Services', 'action' => 'servicesListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveServices' && $this->request->params['controller'] == 'Services') ? 'active' : '' ?>"><?php
                        //echo $this->Html->link('<i class="fa fa-plus"></i> Add Services ', ['controller' => 'Services', 'action' => 'saveServices'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'subServicesListing' && $this->request->params['controller'] == 'SubServices') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i>Manage Sub Services', ['controller' => 'SubServices', 'action' => 'subServicesListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveSubServices' && $this->request->params['controller'] == 'SubServices') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Sub Services ', ['controller' => 'SubServices', 'action' => 'saveSubServices'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'xetrasListing' && $this->request->params['controller'] == 'Xetras') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i>Manage Xetra Services', ['controller' => 'Xetras', 'action' => 'xetrasListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveXetras' && $this->request->params['controller'] == 'Xetras') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Xetra Services ', ['controller' => 'Xetras', 'action' => 'saveXetras'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <!---------------------Section for Dj Event ---------------------------------------->

                    <li class="<?php echo ($this->request->params['action'] == 'djEventsListing' && $this->request->params['controller'] == 'DjEvents') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i>Manage Events', ['controller' => 'DjEvents', 'action' => 'djEventsListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveDjEvents' && $this->request->params['controller'] == 'DjEvents') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Enemts ', ['controller' => 'DjEvents', 'action' => 'saveDjEvents'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>

                    <!------------------------------END HERE--------------------------------------------->

                    <!---------------------Section for Vehicles ---------------------------------------->

                    <li class="<?php echo ($this->request->params['action'] == 'vehicleListing' && $this->request->params['controller'] == 'Vehicles') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-car"></i>Manage Vehicle', ['controller' => 'Vehicles', 'action' => 'vehicleListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveVehicle' && $this->request->params['controller'] == 'Vehicles') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Vehicle ', ['controller' => 'Vehicles', 'action' => 'saveVehicle'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>

                    <!------------------------------Vehicles END HERE--------------------------------------------->


                    <!---------------------Section for Driver ---------------------------------------->

                    <li class="<?php echo ($this->request->params['action'] == 'driverListing' && $this->request->params['controller'] == 'Drivers') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i>Manage Route', ['controller' => 'Drivers', 'action' => 'driverListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveDriver' && $this->request->params['controller'] == 'Drivers') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Route ', ['controller' => 'Drivers', 'action' => 'saveDriver'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>

                    <!------------------------------END HERE--------------------------------------------->

                </ul>
            </li>



            <!---- Users ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('userListing', 'saveUser')) && $this->request->params['controller'] == 'Users') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-users"></i> <span>Manage Users</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('userListing', 'saveUser')) && $this->request->params['controller'] == 'Users') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'userListing' && $this->request->params['controller'] == 'Users') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> User Listing', ['controller' => 'Users', 'action' => 'userListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveUser' && $this->request->params['controller'] == 'Users') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add User ', ['controller' => 'Users', 'action' => 'saveUser'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                </ul>
            </li>




            <!---- Vendors ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('vendorListing', 'saveVendor')) && $this->request->params['controller'] == 'Vendors') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-users"></i> <span>Manage Vendors</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('vendorListing', 'saveVendor')) && $this->request->params['controller'] == 'Vendors') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'vendorListing' && $this->request->params['controller'] == 'Vendors') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Vendors Listing', ['controller' => 'Vendors', 'action' => 'vendorListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveVendor' && $this->request->params['controller'] == 'Vendors') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Vendor ', ['controller' => 'Vendors', 'action' => 'saveVendor'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                </ul>
            </li>




            <!---- Orders ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('orderListing')) && $this->request->params['controller'] == 'Orders') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-bell-o"></i> <span>Manage Orders</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('orderListing')) && $this->request->params['controller'] == 'Orders') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'orderListing' && $this->request->params['controller'] == 'Vendors') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Orders Listing', ['controller' => 'Orders', 'action' => 'orderListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
<!--                    <li class="<?php // echo ($this->request->params['action'] == 'saveVendor' && $this->request->params['controller'] == 'Vendors') ? 'active' : ''    ?>"><?php
//                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Vendor ', ['controller' => 'Vendors', 'action' => 'saveVendor'], ['prefix' => 'admin', 'escape' => false]);
                    ?></li>-->
                </ul>
            </li>



            <!---- Faqs ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('faqListing', 'saveFaq', 'servicesFaqListing', 'saveServicesFaq')) && $this->request->params['controller'] == 'Faqs') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-question"></i> <span>Manage Faqs</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('faqListing', 'saveFaq', 'servicesFaqListing', 'saveServicesFaq')) && $this->request->params['controller'] == 'Faqs') ? 'style="display: block;"' : '' ?>>
                    <li class="<?php echo ($this->request->params['action'] == 'faqListing' && $this->request->params['controller'] == 'Faqs') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> FAQ Listing', ['controller' => 'Faqs', 'action' => 'faqListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveFaq' && $this->request->params['controller'] == 'Faqs') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Faq ', ['controller' => 'Faqs', 'action' => 'saveFaq'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>


                    <li class="<?php echo ($this->request->params['action'] == 'servicesFaqListing' && $this->request->params['controller'] == 'Faqs') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-list-alt"></i> Services FAQ Listing', ['controller' => 'Faqs', 'action' => 'servicesFaqListing'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>
                    <li class="<?php echo ($this->request->params['action'] == 'saveServicesFaq' && $this->request->params['controller'] == 'Faqs') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-plus"></i> Add Services Faq ', ['controller' => 'Faqs', 'action' => 'saveServicesFaq'], ['prefix' => 'admin', 'escape' => false]);
                        ?></li>

                </ul>





            </li>


            <!---- contactUs ---->
            <li class="
            <?php echo (in_array($this->request->params['action'], array('contactUs')) && $this->request->params['controller'] == 'ContactUs') ? 'active' : '' ?>
                treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-question"></i> <span>Manage Contact Us</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-left"></i></span>
                </a>
                <ul class="treeview-menu" <?php echo (in_array($this->request->params['action'], array('contactUs')) && $this->request->params['controller'] == 'ContactUs') ? 'style="display: block;"' : '' ?>>


                    <li class="<?php echo ($this->request->params['action'] == 'contactUs' && $this->request->params['controller'] == 'ContactUs') ? 'active' : '' ?>"><?php
                        echo $this->Html->link('<i class="fa fa-phone"></i> Contact Us', ['controller' => 'ContactUs', 'action' => 'contactUs'], ['prefix' => 'appunisonadmin', 'escape' => false]);
                        ?>
                    </li>

                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
