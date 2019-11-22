<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.services_id', ['asc' => __('Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.sub_services_id', ['asc' => __('Sub Services Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Sub Services Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.title', ['asc' => __(' Title') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Title') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.xetra_time', ['asc' => __(' Time') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Time') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.price', ['asc' => __(' Price') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Price') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.description', ['asc' => __(' Description') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Description') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Xetras.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
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
                <td><?php echo $Result->service->name; ?></td>
                <td><?php echo @$Result->sub_service->name; ?></td>
                <td><?php echo $Result->title; ?></td>
                <td><?php echo $Result->xetra_time; ?></td>
                <td><?php echo $Result->price; ?></td>
                <td><?php echo $Result->description; ?></td>
                <td>
                    <?php if ($Result->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($Result->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Xetras', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/xetrasListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Xetras', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/xetrasListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Result->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Xetras', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/xetrasListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $Result->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Xetras', 'action' => 'saveXetras', $Result->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Sub Services Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
