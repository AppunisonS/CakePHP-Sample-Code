<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Services.name', ['asc' => __('Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th><a herf="#">Image</a></th>
        <th><a herf="#">Background Image</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Services.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
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
                <!--<td><?php // echo $Result->service->name; ?></td>-->
                <td><?php echo $Result->name; ?></td>
                <td><?php echo $this->Html->image('service/' . $Result->image, array('id' => 'image', 'width' => '100', 'height' => '100')); ?></td>
                <td><?php echo $this->Html->image('service/' . $Result->bg_image, array('id' => 'image', 'width' => '100', 'height' => '100')); ?></td>

                
                <td>
                    <?php if ($Result->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($Result->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Services', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/servicesListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Services', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/servicesListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Services', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/servicesListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $Result->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Services', 'action' => 'saveServices', $Result->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Services Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
