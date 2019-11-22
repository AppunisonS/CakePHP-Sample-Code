<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
       
        
        <th>
            <?php
            echo $this->Paginator->sort('Guests.no_of_people', ['asc' => __(' No Of People') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('  No Of People') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

         <th>
            <?php
            echo $this->Paginator->sort('Guests.percentage', ['asc' => __(' Percentage') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Percentage') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
         
        <th>
            <?php
            echo $this->Paginator->sort('Guests.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>

        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $guest) {
            ?>
            <tr id="row_<?php echo $guest->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $guest->id, array('value' => $guest->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
               
                <td><?php echo $guest->no_of_people; ?></td>
                <td><?php echo $guest->percentage; ?> &nbsp;%</td>

                <td>
                    <?php if ($guest->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($guest->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Guests', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/guestListing', 'alert' => 'Are you sure you want to change status?', 'id' => $guest->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Guests', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/guestListing', 'alert' => 'Are you sure you want to change status?', 'id' => $guest->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Guests', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/guestListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $guest->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Guests', 'action' => 'saveGuest', $guest->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Guest Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
