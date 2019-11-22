<table class="table table-bordered table-striped dataTable">

    <tr id="Sorting">
        <th><?php echo $this->Form->checkbox('bulk', array('disabled' => !empty($Results) ? '' : 'disabled')); ?></th>
        <th><a herf="#">S.No</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Testimonials.auhtor', ['asc' => __(' Author') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __(' Author') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>

        <th>
            <?php
            echo $this->Paginator->sort('Testimonials.testimonial', ['asc' => __(' Testimonial') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Testimonial') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?></th>  
        <th><a herf="#">Image</a></th>
        <th>
            <?php
            echo $this->Paginator->sort('Testimonials.status', ['asc' => __(' Status') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
                'desc' => __('Status') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]);
            ?>
        </th>
        <th><a herf="#">Action</a></th>
    </tr>
    <?php
    $i = $this->Paginator->counter('{{start}}');
    foreach ($Results as $Testimonial) {
        ?>
        <tr id="row_<?php echo $Testimonial->id; ?>">
            <td><?php echo $this->Form->checkbox('id.' . $Testimonial->id, array('value' => $Testimonial->id)); ?></td>
            <td><?php
                echo $i;
                $i++;
                ?></td>
            <td><?php echo $Testimonial->author; ?></td>
            <td><?php echo $Testimonial->testimonial; ?></td>

            <td><?php
                if (!empty($Testimonial->image)) {
                    echo $this->Html->image(FETCH_TESTIMONIAL_IMG_PATH . $Testimonial->image, ['height' => '102', 'width' => '102']);
                } else {
                    echo $this->Html->image('noimage.png', ['height' => '102', 'width' => '102']);
                }
                ?></td>
            <td>
                <?php if ($Testimonial->status) { ?>
                    <span class="label label-success">Approved</span>
                <?php } else { ?>
                    <span class="label label-danger">Not Approved</span>
                <?php } ?>
            </td>
            <td>
                <?php if ($Testimonial->status) { ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Testimonials', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/testimonialListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Testimonial->id, 'escape' => false, 'class' => "fa fa-fw fa-ban table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                <?php } else { ?>
                    <span><?php echo $this->Html->link('', array(), array('modelName' => 'Testimonials', 'reqUrl' => 'admin/changeStatus', 'respUrl' => 'admin/testimonialListing', 'alert' => 'Are you sure you want to change status?', 'id' => $Testimonial->id, 'escape' => false, 'class' => "fa fa-fw fa-check table-status-link custom_link", 'title' => ELEMENT_CHANGE_STATUS)); ?></span>
                <?php } ?>
                <span><?php echo $this->Html->link('', array(), array('modelName' => 'Testimonials', 'reqUrl' => 'admin/delete', 'respUrl' => 'admin/testimonialListing', 'alert' => 'Are you sure you want to delete testimonial?', 'id' => $Testimonial->id, 'class' => 'table-delete-link fa fa-fw fa-close', 'title' => ELEMENT_DELETE, 'escape' => false)); ?></span>
                <span><?php echo $this->Html->link('', array('controller' => 'Testimonials', 'action' => 'saveTestimonial', $Testimonial->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
            </td>
        </tr>
    <?php } ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
