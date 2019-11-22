
<div class="col-sm-5" style="padding-left: 0px;padding-right: 0px;">
    <div class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
        <?php echo 'Showing Page'; ?> <?php echo $this->Paginator->counter(); ?>
    </div>

</div>
<div class="col-sm-7" style="padding-left: 0px;padding-right: 0px;">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            <?php
            echo $this->Paginator->prev(__(' Previous '), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled ', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
            echo $this->Paginator->next(__(' Next '), array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>
 