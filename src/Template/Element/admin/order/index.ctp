<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Orders.services_name', ['asc' => __('Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Orders.sub_services_id', ['asc' => __('Sub Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Sub Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.first_name', ['asc' => __('User Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.Email', ['asc' => __('User Email') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User Email') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.phone_number', ['asc' => __('User Phone') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User Phone') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.location', ['asc' => __('User Address') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User Address') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.states', ['asc' => __('User States') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User States') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.district', ['asc' => __('User District') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('User District') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        
        
        <th>
            <?php
            echo $this->Paginator->sort('Orders.order_status', ['asc' => __('Order Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Order Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        
<!--        <th>
            <?php
//            echo $this->Paginator->sort('Orders.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
//                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>-->
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $Result) { 
//            pr($Result);
            ?>
            <tr id="row_<?php echo $Result->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $Result->id, array('value' => $Result->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $Result->services_name; ?></td>
                <td><?php echo isset($Result->sub_service->name)?$Result->sub_service->name:"NA"; ?></td>
                <td><?php echo $Result->first_name; ?></td>
                <td><?php echo $Result->Email; ?></td>
                <td><?php echo $Result->phone_number; ?></td>
                <td><?php echo $Result->location; ?></td>
                <td><?php echo $Result->states; ?></td>
                <td><?php echo $Result->district; ?></td>
               
              
                <td>
                    <?php if ($Result->order_status == 1) { ?>
                        <span class="label label-primary">Job Open</span>

                    <?php } else if($Result->order_status == 2) { ?>
                        <span class="label label-warning">Clame</span>
                    <?php } else if($Result->order_status == 3) { ?>
                        <span class="label label-info">In Progress</span>
                    <?php } else if($Result->order_status == 4) { ?>
                        <span class="label label-success">Job Complate</span>
                    <?php }  else if($Result->order_status == 5) { ?>
                        <span class="label label-danger">Job Cancel</span>
                    <?php } ?>
                </td>
                
<!--                <td>
                    <?php // if ($Result->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php // } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php // } ?>
                </td>-->
                <td>
                    <?php // if ($Result->status) { ?>
                        <!--<span><?php // echo $this->Html->link('', array(), array('modelName' => 'Orders', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/orderListing', 'alert' => 'Are you sure you want to change order status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>-->
                    <?php // } else { ?>
                        <!--<span><?php // echo $this->Html->link('', array(), array('modelName' => 'Orders', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/orderListing', 'alert' => 'Are you sure you want to change order status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>-->
                    <?php // } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Orders', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/orderListing', 'alert' => 'Are you sure you want to delete order?', 'id' => $Result->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php // echo $this->Html->link('', array('controller' => 'Services', 'action' => 'saveServices', $Result->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Order Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
