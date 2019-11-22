<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Registered Admins</span>
                    <span class="info-box-number"><?php
                        if (!empty($adminCount)) {
                            echo $adminCount;
                        } else {
                            echo "No User";
                        }
                        ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">All Services</span>
                    <span class="info-box-number"><?php
                        if (!empty($servicesCount)) {
                            echo $servicesCount;
                        } else {
                            echo "No Services";
                        }
                        ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">All Sub Services</span>
                    <span class="info-box-number"><?php
                        if (!empty($subServicesCount)) {
                            echo $subServicesCount;
                        } else {
                            echo "No Sub Services";
                        }
                        ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-archive"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Xetra</span>
                    <span class="info-box-number"><?php
                        if (!empty($xetrasCount)) {
                            echo $xetrasCount;
                        } else {
                            echo "No Xetra";
                        }
                        ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.row -->
    </div>
    <!-- Main row -->
    <div class="row">
        <!-- Left col ADDING-->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New Admins</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($adminList)) {
                                    foreach ($adminList as $admin) {
                                        ?>
                                        <tr>
                                            <td><?php echo $admin['first_name'] . " " . $admin['last_name']; ?></td>
                                            <td><?php echo $admin['email']; ?></td>
                                            <td>
                                                <?php echo $admin['contact_no']; ?>
                                            </td>
                                            <td> <?php if ($admin['status']) { ?>
                                                    <span class="label label-success">Activated</span>

                                                <?php } else { ?>
                                                    <span class="label label-danger">In Active</span>
                                                <?php } ?></td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <?php echo $this->Html->link('View All Admins', array('controller' => 'Admins', 'action' => 'listing'), array('escape' => false, 'class' => "uppercase"));    ?>
                </div>
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-6"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Services</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($servicesList)) {
                                    foreach ($servicesList as $services) {
                                        ?>
                                        <tr>
                                            <td><?php echo $services['name']; ?></td>
                                            <td> <?php if ($services['status']) { ?>
                                                    <span class="label label-success">Activated</span>

                                                <?php } else { ?>
                                                    <span class="label label-danger">In Active</span>
                                                <?php } ?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer text-center">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- /.col -->
        <div class="col-md-6"> 
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">SubSurvices</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Services Name</th>
                                    <th>Subservices Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($subServicesList)) {
                                    foreach ($subServicesList as $subServices) { 
                                        ?>
                                        <tr>
                                            <td><?php echo $subServices['service']['name']; ?></td>
                                            <td><?php echo $subServices['name']; ?></td>
                                            <td> <?php if ($subServices['status']) { ?>
                                                    <span class="label label-success">Activated</span>

                                                <?php } else { ?>
                                                    <span class="label label-danger">In Active</span>
                                                <?php } ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer text-center">
                   
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6"> 
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Xetra</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Services Name</th>
                                    <th>SubServices Name</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($xetraList)) {
                                    foreach ($xetraList as $xetra) {
                                        ?>
                                        <tr>
                                            <td><?php echo $xetra['service']['name']; ?></td>
                                            <td><?php echo $xetra['sub_service']['name']; ?></td>
                                            <td><?php echo $xetra['title']; ?></td>
                                            <td> <?php if ($xetra['status']) { ?>
                                                    <span class="label label-success">Activated</span>

                                                <?php } else { ?>
                                                    <span class="label label-danger">In Active</span>
                                                <?php } ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer text-center">
                </div>

            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php //echo $this->element('appunisonadmin/common/searchProductSold');    ?>
    </div>
    <!-- Main row -->
    <div class="row">
        <?php //echo $this->element('appunisonadmin/admin/graph');    ?>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
