<table class="table table-bordered table-striped dataTable">

    <tr id="Sorting">
        <th><a herf="#">S.No</a></th>
        <th>
            <?php echo $this->Paginator->sort('EmailTemplates.subject', ['asc'=>__('Subject') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
            'desc'=>__('Subject') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]); ?></th>
        <th>
            <?php echo $this->Paginator->sort('EmailTemplates.description', ['asc'=>__(' Description') . ' <i class="fa fa-sort-alpha-asc pull-left"></i>',
            'desc'=>__(' Description') . ' <i class="fa fa-sort-alpha-desc pull-left"></i>'], ['escape' => false]); ?></th>
        <th><a herf="#">Action</a></th>
    </tr>

    <?php
    $i = $this->Paginator->counter('{{start}}');
    if(!empty($Results)){
    foreach ($Results as $Admin) {
        ?>
    <tr id="row_<?php echo $Admin->id; ?>">
        <td><?php echo $i; $i++;?></td>
         <td><?php echo   substr($Admin->subject,0,50); ?></td>
       
        <td><?php echo  substr($Admin->description,0,100); ?></td>
        <td>
            <span><?php echo $this->Html->link('', array('controller' => 'EmailTemplates', 'action' => 'saveEmailTemplate',$Admin->id), array('escape' => false, 'class' => "fa fa-fw fa-edit", 'title' => ELEMENT_EDIT)); ?></span>
        </td>
    </tr>
    <?php } 
    } else  echo "<td>No Email Template Found</td>"; ?>
</table>
<?php echo $this->element('admin/common/paginate'); ?>
