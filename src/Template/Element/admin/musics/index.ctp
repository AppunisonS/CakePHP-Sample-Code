<table class="table table-bordered table-striped dataTable">
    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Musics.music_name', ['asc' => __(' Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Musics.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>

        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $music) {
            ?>
            <tr id="row_<?php echo $music->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $music->id, array('value' => $music->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $music->music_name; ?></td>

                <td>
                    <?php if ($music->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($music->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Musics', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/musicListing', 'alert' => 'Are you sure you want to change status?', 'id' => $music->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'Musics', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/musicListing', 'alert' => 'Are you sure you want to change status?', 'id' => $music->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Musics', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/musicListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $music->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Musics', 'action' => 'saveMusic', $music->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Musics Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
