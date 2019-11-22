<table class="table table-bordered table-striped dataTable">

    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('ContactUs.name', ['asc' => __(' Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th>
            <?php
            echo $this->Paginator->sort('ContactUs.email', ['asc' => __(' Email') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Email') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th> 
        <th>
            <?php
            echo $this->Paginator->sort('ContactUs.message', ['asc' => __(' message') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('message') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th>
            <?php
            echo $this->Paginator->sort('ContactUs.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
        <th><a herf="#">Reply</a></th>

    </tr>
    <?php
    $i = $this->Paginator->counter('{{start}}');


    foreach ($Results as $Contact) {
        ?>
        <tr id="row_<?php echo $Contact->id; ?>">
            <td><?php echo $this->Form->checkbox('id.' . $Contact->id, array('value' => $Contact->id)); ?></td>
            <td><?php
                echo $i;
                $i++;
                ?></td>
            <td><?php echo $Contact->name; ?></td>
            <td><?php echo $Contact->email; ?></td>
            <td><?php echo $Contact->message; ?></td>
            <td>
                <?php if ($Contact->status) { ?>
                    <span class="label label-success">Pending</span>
                <?php } else { ?>
                    <span class="label label-danger">Sent</span>
                <?php } ?>
            </td>
            <td>
                <?php if ($Contact->status) { ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'ContactUs', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/contactUs', 'alert' => 'Are you sure you want to change contact status?', 'id' => $Contact->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                <?php } else { ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'ContactUs', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/contactUs', 'alert' => 'Are you sure you want to change contact status?', 'id' => $Contact->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                <?php } ?>
                <span><?php echo $this->Html->link('', array(), array('modelName' => 'ContactUs', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/contactUs', 'alert' => 'Are you sure you want to delete enquiry?', 'id' => $Contact->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>

            </td>
            <td>
                <?php echo $this->Html->link('', ['controller' => 'ContactUs', 'action' => 'sendEmail', $Contact->id, 'prefix' => 'admin'], ['class' => 'fa fa-reply btn btn-circle btn-warning', 'title' => 'MAIL FOR QUERY']); ?>
            </td>
        </tr>
    <?php } ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
