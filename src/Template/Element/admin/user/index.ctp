<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Users.first_name', ['asc' => __(' First Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('First Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Users.last_name', ['asc' => __(' Last Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Last Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Users.email', ['asc' => __(' Email') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Email') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('Users.phone', ['asc' => __(' Phone') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Phone') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
       
        <!--<th><a href='#'>Image</a></th>-->
        <th>
            <?php
            echo $this->Paginator->sort('Users.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $user) { 
            ?>
            <tr id="row_<?php echo $user->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $user->id, array('value' => $user->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone; ?></td>
                
                <!--<td><?php // echo $this->Html->image(FETCH_USER_IMG_PATH.$user->image); ?></td>-->
                <td>
                    <?php if ($user->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($user->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Users', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/userListing', 'alert' => 'Are you sure you want to change status?', 'id' => $user->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Users', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/userListing', 'alert' => 'Are you sure you want to change status?', 'id' => $user->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Users', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/userListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $user->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Users', 'action' => 'saveUser', $user->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Categories Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
