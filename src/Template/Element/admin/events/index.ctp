<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Events.event_name', ['asc' => __(' Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Events.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>

        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $event) {
            ?>
            <tr id="row_<?php echo $event->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $event->id, array('value' => $event->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $event->event_name; ?></td>

                <td>
                    <?php if ($event->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($event->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Events', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/eventListing', 'alert' => 'Are you sure you want to change status?', 'id' => $event->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Events', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/eventListing', 'alert' => 'Are you sure you want to change status?', 'id' => $event->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Events', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/eventListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $event->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Events', 'action' => 'saveEvent', $event->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Events Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
