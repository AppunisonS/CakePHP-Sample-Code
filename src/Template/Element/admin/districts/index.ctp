<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Districts.district', ['asc' => __(' District') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' District') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Districts.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>

        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $district) {
            ?>
            <tr id="row_<?php echo $district->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $district->id, array('value' => $district->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo ucfirst($district->district); ?></td>

                <td>
                    <?php if ($district->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($district->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Districts', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/districtsListing', 'alert' => 'Are you sure you want to change status?', 'id' => $district->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Districts', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/districtsListing', 'alert' => 'Are you sure you want to change status?', 'id' => $district->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Districts', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/districtsListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $district->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Districts', 'action' => 'saveDistricts', $district->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No District Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
