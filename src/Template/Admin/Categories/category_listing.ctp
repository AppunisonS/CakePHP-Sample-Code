<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="box-header with-border">
                        <h2 class="box-title"><strong>Category Listing</strong></h2>
                    </div>
                    <div class="col-sm-10 pull-right" style="padding-left: 0px;padding-right: 0px;">
                        <div class="col-sm-10" >
                        </div>
                        <div class="col-sm-2">
                            <?php echo $this->Html->link(' Add New', ['controller' => 'Categories', 'action' => 'saveCategory', '_full' => true, 'prefix' => 'admin'], ['class' => 'fa fa-plus btn btn-block btn-primary', 'title' => ELEMENT_ADD]); ?>
                        </div>
                    </div>
                    <?php echo $this->element('admin/common/search'); ?>
                    <!-- /.box-header -->
                    <?php echo $this->Form->create('Admin', array('id' => 'PageViewForm')); ?>
                    <div  class="box-body table-responsive no-padding">
                        <div class="col-sm-12" id="PaggingTr">
                            <?php echo $this->element('admin/categories/index'); ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-5" style="padding-left: 0px;padding-right: 0px;">
                            <div id="bulk" class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
                                <?php
                                echo $this->Form->select('select_action', json_decode(ACTION, true), array('disabled' => !empty($Results) ? '' : 'disabled', 'modelName' => 'Categories', 'respUrl' => 'admin/categoryListing', 'alert' => 'category', 'empty' => 'Select Action', 'class' => 'actionAll form-control'));
                                echo $this->Form->input('pagingStatus', array('type' => 'hidden', 'id' => 'pagingStatus'));
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
