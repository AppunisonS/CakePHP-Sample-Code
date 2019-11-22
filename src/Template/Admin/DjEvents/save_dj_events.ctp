<section class="content">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="box box-primary">
                <?php echo $this->Form->create('DjEvents', array('enctype' => 'multipart/form-data', 'url' => '/admin/saveDjEvents/' . $id, 'id' => 'addDjEventsForm')); ?>
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?php echo ($id) ? 'Edit' : 'Add'; ?> Events</strong></h3>
                </div>
                <div class="box-body">

                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Services Name</label>
                        <?php echo $this->Form->input('service_name', array('id' => 'service_name', 'value'=>'Party And Event Services','class' => 'form-control', 'label' => false, 'placeholder' => 'Name','readonly'=>true)); ?>
                     <?php echo $this->Form->hidden('services_id', array('id' => 'services_id', 'value'=>'6')); ?>
                
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Sub Service</label>
                        <?php // echo $this->Form->input('sub_services', array('id' => 'name', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Name')); ?>
                    <?php echo $this->Form->select('sub_services_id', $subServicesList, array('class' => 'form-control', 'id' => 'sub_services_id', 'label' => false, 'empty' => 'Select Sub Service')); ?>
               
                    </div>
                    
                    
                    
                    
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Type of Event</label>
                        <?php echo $this->Form->select('event_id', $eventsNameList, array('class' => 'form-control', 'id' => 'type_of_event', 'label' => false, 'empty' => 'Select type of event')); ?>
                    </div>
                    
<!--                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Number of Guests</label>
                        <?php // echo $this->Form->select('guests_id', $noOfPeopleList, array('class' => 'form-control', 'id' => 'number_of_guests', 'label' => false, 'empty' => 'Select number of guests')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Music</label>
                        <?php // echo $this->Form->select('musics_id', $musicsNameList, array('class' => 'form-control', 'id' => 'music', 'label' => false, 'empty' => 'Select music')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Event Place</label>
                        <?php // echo $this->Form->select('event_place_name', $eventsPlaceList, array('class' => 'form-control', 'id' => 'event_place', 'label' => false, 'empty' => 'Select event place')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Sound Provided By</label>
                        <?php // echo $this->Form->select('equipment_provided', $equipmentProvidedList, array('class' => 'form-control', 'id' => 'Sound_provided_by', 'label' => false, 'empty' => 'Select sound provided by')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Additional Services</label>
                        <?php // echo $this->Form->select('additional_services_id', $additionalServicesNameList, array('class' => 'form-control', 'id' => 'additional_services', 'label' => false, 'empty' => 'Select additional services')); ?>
                    </div>
                    -->
                    
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Time</label>
                        <?php echo $this->Form->input('defult_time', array('id' => 'defult_time',  'class' => 'form-control', 'label' => false, 'placeholder' => 'Time')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Price</label>
                        <?php echo $this->Form->input('price', array('id' => 'price',  'class' => 'form-control', 'label' => false, 'placeholder' => 'Price')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Xetra Time Name</label>
                        <?php echo $this->Form->input('xetra_time', array('id' => 'xetra_time' ,'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Time')); ?>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="exampleInputEmail1">Xetra Price</label>
                        <?php echo $this->Form->input('xetra_price', array('id' => 'xetra_price' ,'class' => 'form-control', 'label' => false, 'placeholder' => 'Xetra Price')); ?>
                    </div>
                    

<!--                    <div class="form-group col-md-9">
                        <label for="exampleInputPassword1">Description</label>
                        <?php // echo $this->Form->textarea('description', array('id' => 'editor', 'class' => "form-control")); ?>
                    </div>-->

                </div>
                <div class="box-body">
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->hidden('id', array('value' => isset($id) ? $id : '', 'id' => 'idField')); ?>
                        <?php echo $this->Form->button(' Submit', array('type' => 'submit', 'class' => 'fa fa-save btn btn-block btn-primary')); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-block btn-info fa fa-chevron-left padding-left-lg" onclick="javascript:history.go(-1);">  Back   </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    $(document).ready(function () {
        
     

       


        $('#hourchek').click(function () {
            $('#hourList').toggle();
            $('#hourPrice').toggle();
            $('#hourXetraList').toggle();
            $('#hourXetraPrice').toggle();

            $('.checkboxuncheck').removeAttr('checked');

            $('#bathroomList').hide();
            $('#bathroomPrice').hide();
            $('#bathroomXetraList').hide();
            $('#bathroomXetraPrice').hide();
            $('#bathroomDefultTime').hide();
            $('#bathroomXetraTime').hide();

            $('#bedroomList').hide();
            $('#bedroomPrice').hide();
            $('#bedroomXetraList').hide();
            $('#bedroomXetraPrice').hide();
            $('#bedroomDefultTime').hide();
            $('#bedroomXetraTime').hide();


<?php if (!empty($id)) { ?>
                $.ajax({
                    type: 'GET',
                    url: ajax_url + 'admin/deleteSubServiceUnit/' + <?= $id; ?>,

                    success: function (msg) {

                        hideLoder('#loaderID');
                    }
                })
<?php } ?>
        });




    });

</script>

