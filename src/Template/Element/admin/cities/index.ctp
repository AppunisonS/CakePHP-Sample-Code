<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Cities.city', ['asc' => __(' City') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' City') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Cities.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>

        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $city) {
            ?>
            <tr id="row_<?php echo $city->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $city->id, array('value' => $city->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo ucfirst($city->city); ?></td>

                <td>
                    <?php if ($city->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($city->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Cities', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/citiesListing', 'alert' => 'Are you sure you want to change status?', 'id' => $city->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Cities', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/citiesListing', 'alert' => 'Are you sure you want to change status?', 'id' => $city->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Cities', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/citiesListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $city->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Cities', 'action' => 'saveCities', $city->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No City Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
