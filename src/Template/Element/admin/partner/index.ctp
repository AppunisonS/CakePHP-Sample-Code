<table class="table table-bordered table-striped dataTable">

    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Partners.name', ['asc' => __(' Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Partners.category_id', ['asc' => __(' Category') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Category') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Partners.duartion', ['asc' => __(' Time') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Time') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Partners.commission', ['asc' => __(' Commission') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Commission') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Partners.price', ['asc' => __(' Price') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Price') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Partners.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $Category) {
            ?>
            <tr id="row_<?php echo $Category->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $Category->id, array('value' => $Category->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $Category->name; ?></td>
                <td><?php echo $Category->category->name; ?></td>
                <td><?php echo $Category->duration; ?></td>
                <td><?php echo $Category->commission; ?></td>
                <td><?php echo $Category->price; ?></td>
                <td>
                    <?php if ($Category->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($Category->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Partners', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/partnerListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Category->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Partners', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/partnerListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Category->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Partners', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/partnerListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $Category->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Partners', 'action' => 'savePartner', $Category->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Categories Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
