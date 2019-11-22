<table class="table table-bordered table-striped dataTable">

    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('ServicesFaqs.services_id', ['asc' => __(' Service Name') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Service Name') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('ServicesFaqs.title', ['asc' => __(' Title') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Title') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        
        <th>
            <?php
            echo $this->Paginator->sort('ServicesFaqs.description', ['asc' => __(' Description') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Description') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>
        <th>
            <?php
            echo $this->Paginator->sort('ServicesFaqs.image', ['asc' => __(' Answer') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Imge') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Faqs.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if (!empty($Results)) {
        foreach ($Results as $Faq) {
            ?>
            <tr id="row_<?php echo $Faq->id; ?>">
                <td><?php echo $this->Form->checkbox('id.' . $Faq->id, array('value' => $Faq->id)); ?></td>
                <td><?php
                    echo $i;
                    $i++;
                    ?></td>
                <td><?php echo $Faq->service->name; ?></td>
                <td><?php echo $Faq->title; ?></td>
                
                <td><?php echo $Faq->description; ?></td>
                <td><?php // echo $Faq->image;
                echo $this->Html->image('servicesfaq/' . $Faq->image, array('id' => 'Image', 'width' => '100', 'height' => '100'));
                ?></td>

                <td>
                    <?php if ($Faq->status) { ?>
                        <span class="label label-success">Activated</span>

                    <?php } else { ?>
                        <span class="label label-danger">In Active</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($Faq->status) { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'ServicesFaqs', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/servicesFaqListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Faq->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } else { ?>
                        <span><?php echo $this->Html->link('', array(), array('modelName' => 'ServicesFaqs', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/servicesFaqListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Faq->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                    <?php } ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'ServicesFaqs', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/servicesFaqListing', 'alert' => 'Are you sure you want to delete ?', 'id' => $Faq->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                    <span><?php echo $this->Html->link('', array('controller' => 'Faqs', 'action' => 'saveServicesFaq', $Faq->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<td>No Faqs Found</td>";
    ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
