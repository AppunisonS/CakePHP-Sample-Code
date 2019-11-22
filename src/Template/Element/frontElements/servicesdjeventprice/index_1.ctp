<?php if (!empty($serviceDjEventPrices)) { ?>

    <table class="table table-bordered table-striped dataTable">
        <tr id="Sorting">
            <th><?php //echo $this->Form->checkbox('bulk', array('disabled' => !empty($serviceDjEventPrices) ? '' : 'disabled'));                   ?></th>

            <th>Event Name</th>

            <th>Music Name</th>

            <th>Additional Service Name</th>

            <th>Guest Number</th>

            <th>Event Place</th>

            <th>Equipment Provided</th>
        </tr>

        <?php
        if (!empty($serviceDjEventPrices)) {
            foreach ($serviceDjEventPrices as $Admin) {
                ?>
                <tr id="row_<?php //echo $Admin['id'];                   ?>">
                    <td>

                        <input  type="radio" name="service_dj_event_prices_id" value="<?php echo $Admin['id']; ?>" id="favorite-color-u" class="required">  
                        <?php //echo $this->Form->radio('id' . $Admin['id'], array('value' => $Admin['id'])); ?></td>
                    <td><?php echo $Admin['event']['event_name']; ?></td>
                    <td><?php echo isset($Admin['music']['music_name']) ? $Admin['music']['music_name'] : 'NA'; ?></td>
                    <td><?php echo isset($Admin['additional_service']['additional_services_name']) ? $Admin['additional_service']['additional_services_name'] : 'NA'; ?></td>
                    <td><?php echo isset($Admin['guest']['no_of_people']) ? $Admin['guest']['no_of_people'] : 'NA'; ?></td>
                    <td><?php echo isset($Admin['event_place_name']) ? $Admin['event_place_name'] : 'NA'; ?></td>
                    <td><?php
                        if (!empty($Admin['equipment_provided'])) {
                            echo $Admin['equipment_provided'];
                        } else {
                            echo "NA";
                        }
                        ?></td>
            <!--                <td><?php // echo substr($Admin->description,0,250)."....";                   ?></td>-->



                </tr>
                <?php
            }
        } else
            echo "<td>No Event Found</td>";
        ?>
    </table>

    <!------------------------------Xetra Services Start Here----------------------------------->
    <?php if (!empty($xetrasPrices) && isset($xetrasPrices)) { ?>

        <hr />
        <h2>Select Extras</h2>
        <p>Adds extra time.</p>
        <div class = "form-group col-md-12 padding-r">
            <input type = "hidden" name = "select_extra" id="select_extra"/>
            <ul class = "extras_services" id = "extrachoose">
                <?php
//                if (!empty($xetrasPrices) && isset($xetrasPrices)) {
                foreach ($xetrasPrices as $key => $val) {
                    ?>
                    <li> 
                        <div class="services_img" subServiceXetraId="<?php echo $val['id'] ?>">
                            <i class="fa fa-check"></i>
                            <?php echo $this->Html->image(FETCH_XETRA_IMG_PATH . $val['image'], array('alt' => 'Booking')); ?>
                            <?php // echo $this->Form->hidden('subservice_id', array('value' => $val['id'], 'class' => 'subserviceId'))   ?>
                        </div>
                        <br/>
                        <?php echo $val['title']; ?> 

                    </li>
                <?php } ?>

            </ul>
        </div>

    <?php } else { ?>
        <hr />
        <h2> Extras Services Not Available</h2>
        </li><?php }
    ?>
<?php } ?>
<!--------------Xetra Div End Here----------------->



<script>
    $(document).ready(function () {

//        if ($('input[name=service_dj_event_prices_id]:checked').length <= 0)
//        {
//            alert("No radio checked")
//        }

        $('input[type="radio"]').click(function () {
            if ($(this).is(':checked')) {
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getServiceDjEventPricesData/' + $(this).val(),
                    success: function (msgsdep) {
                        msgsdep = jQuery.parseJSON(msgsdep)
//                        console.log(msgsdep[0]);
                        $('div #time').text(msgsdep[0].defult_time);
                        $("#subtotal").val(msgsdep[0].price);
                        $("#total").val(msgsdep[0].price);
                        $("#hour").show();

                    }
                })
            }

        });
    });

</script>

<script>

    $(document).ready(function () {

        Array.prototype.remove = function () {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };

        var myarray = [];
        $('.services_img').on('click', function () {
            subtotalVal = $("#subtotal").val();
            timeVal = parseFloat($("#time").text());
            var action = $(this).attr('subServiceXetraId');
//            console.log(myarray);
            if (jQuery.inArray(action, myarray) !== -1) {
                $(this).parents().removeClass("es-selected");
                myarray.remove(action);
                $("#select_extra").val(myarray);
                myarray = $.grep(myarray, function (value) {
                    return value != action;
                });

                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getXetraServicesData/' + action,
                    success: function (msgxetra) {
                        msgxetra = jQuery.parseJSON(msgxetra)
                        if (subtotalVal === '') {
                            $("#subtotal").val(msgxetra[0].price);
                            $("#total").val(msgxetra[0].price);
                            $('div #time').text(msgxetra[0].xetra_time);
                            $("#hour").show();
                          

                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) - parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) - parseFloat(msgxetra[0].xetra_time);

                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $('div #time').text(totalTimeValue);
                            $("#hour").show();
                        }

                    }
                })
            } else {
                $(this).parents().addClass("es-selected");
                myarray.push(action);
                $("#select_extra").val(myarray);
                console.log(myarray);

                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getXetraServicesData/' + action,
                    success: function (msgxetra) {
                        msgxetra = jQuery.parseJSON(msgxetra)
//                        console.log(msgxetra[0]);
                        if (subtotalVal === '') {
                            $("#subtotal").val(msgxetra[0].price);
                            $("#total").val(msgxetra[0].price);
                            $('div #time').text(msgxetra[0].xetra_time);
                            $("#hour").show();
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) + parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) + parseFloat(msgxetra[0].xetra_time);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $('div #time').text(totalTimeValue);
                            $("#hour").show();
                        }

                    }
                })
            }

        });
    });
</script>