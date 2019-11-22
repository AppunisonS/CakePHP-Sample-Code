<div class="box-body " style="padding-left: 0px;padding-right: 0px;">

    <div class="col-sm-10 ">
        <?php  echo $this->Form->create('Admin', array("id" => "search-form-2","class"=>"form-horizontal")); ?>
        <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
            <?php echo $this->Form->input('search', array('maxlength' => '80', "placeholder" => "Search Keyword", 'label' => false, 'id' => 'search-box-2','class'=>'form-control', 'div' => false)); ?>
        </div>
        <div class="col-sm-6"></div>
         <?php echo $this->Form->end(); ?>  
        
    </div>
    <div class="col-sm-2 ">
       
    </div>
    
             

</div>




