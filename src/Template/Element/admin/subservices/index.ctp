
<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
       <th>
            <?php
            echo $this->Paginator->sort('Service.name', ['asc' => __('Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('SubServices.name', ['asc' => __('SubServices Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('SubServices Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('SubServices.description', ['asc' => __(' Description') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Description') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th><a herf="#">Status</a></th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $Admin) {
            ?>
            <tr id="row_<?php echo $Admin->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $Admin->id, array('value' => $Admin->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $Admin->service->name; ?></td>
                <td><?php echo $Admin->name; ?></td>
                <td><?php echo substr($Admin->description,0,250)."...."; ?></td>
                <td>
                    <?php if ($Admin->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($Admin->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'SubServices', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/subServicesListing', 'alert' => 'Are you sure you want to change  status?', 'id' => $Admin->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'SubServices', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/subServicesListing', 'alert' => 'Are you sure you want to change  status?', 'id' => $Admin->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span>
                        <?php echo $this->Html->link('', array(), array('modelName' => 'SubServices', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/SubServicesListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $Admin->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?>
                    </span>
                    <span><?php echo $this->Html->link('', array('controller' => 'SubServices', 'action' => 'saveSubServices', $Admin->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>

            </tr>
            <?php
        }
    } else
        echo "<td>No Services Pages Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>