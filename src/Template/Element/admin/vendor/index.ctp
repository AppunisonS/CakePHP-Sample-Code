<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.first_name', ['asc' => __(' First Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('First Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.last_name', ['asc' => __(' Last Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Last Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.email', ['asc' => __(' Email') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Email') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.phone_number', ['asc' => __(' Phone') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Phone') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Vendors.services_id', ['asc' => __(' Service') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Service') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>


        <th><a herf="#">File Attached</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th>
            <?php
            echo $this->Paginator->sort('Vendors.blok_status', ['asc' => __('Block Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Block Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $vendor) {
//            pr($vendor);
            ?>
            <tr id="row_<?php echo $vendor->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $vendor->id, array('value' => $vendor->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $vendor->first_name; ?></td>
                <td><?php echo $vendor->last_name; ?></td>
                <td><?php echo $vendor->email; ?></td>
                <td><?php echo $vendor->phone_number; ?></td>
                <td><?php echo $vendor->service->name; ?></td>

                <td><?php if (isset($vendor->vendors_detail->scanned_certification_papers) && !empty($vendor->vendors_detail->scanned_certification_papers)) { ?>

                    <a href="<?php echo FETCH_SCANNED_BACKGROUND_PATH . $vendor->vendors_detail['scanned_background_papers_from_peru'];?>" class=" ">Download File</a>

                    <?php
                    } else {
                        echo "No Background File";
                    }
                    ?>


        <?php if (isset($vendor->vendors_detail->scanned_certification_papers) && !empty($vendor->vendors_detail->scanned_certification_papers)) { ?>

                       <a href="<?php echo FETCH_SCANNED_CATIFICATION_PATH . $vendor->vendors_detail['scanned_certification_papers'];?>" class=" ">, Download File</a>

                    <?php
                    } else {
                        echo ", No Catification File";
                    }
                    ?></td>

                <td>
        <?php if ($vendor->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
        <?php } ?>
                </td>

                <td>
        <?php if ($vendor->blok_status) { ?>
                        <span class="label label-danger">Block</span>

                    <?php } else { ?>
                        <span class="label label-success">Un Block</span>
        <?php } ?>
                </td>
                <td>
                    <?php if ($vendor->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Vendors', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/vendorListing', 'alert' => 'Are you sure you want to change status?', 'id' => $vendor->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Vendors', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/vendorListing', 'alert' => 'Are you sure you want to change status?', 'id' => $vendor->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>

                    <?php if ($vendor->blok_status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Vendors', 'reqUrl' => 'admin/changeBlockStatus', 'respUrl' => 'admin/vendorListing', 'alert' => 'Are you sure you want to change block status?', 'id' => $vendor->id, 'escape' => false, 'class' => "fa fa-fw fa-asterisk table-status-link custom_link", 'title' => 'click here to change block status')); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Vendors', 'reqUrl' => 'admin/changeBlockStatus', 'respUrl' => 'admin/vendorListing', 'alert' => 'Are you sure you want to change block status?', 'id' => $vendor->id, 'escape' => false, 'class' => "fa fa-fw  fa-odnoklassniki table-status-link custom_link", 'title' => 'click here to change block status')); ?></span>
        <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Vendors', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/vendorListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $vendor->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Vendors', 'action' => 'saveVendor', $vendor->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Categories Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
