<?php
if (!empty($serviceDjEventPrices)) {
//    pr($serviceDjEventPrices);die;
    ?>


    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <select name="service_dj_event_prices_id" class="dropdown-toggle select_options form-control required" id='ServiceDjEventId'>&nbsp;
            <option value="">Select Event</option>
            <?php foreach ($serviceDjEventPrices as $key => $value) { ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['event']['event_name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <?php echo $this->Form->select('guest_id', $noOfPeopleList, array('id' => 'guest_id', 'class' => 'dropdown-toggle select_options form-control required', 'label' => false, 'empty' => 'Select Guest')); ?>
    </div>



    <!---------------------Get Informatation by client Extra Field ------------------------------>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <?php echo $this->Form->select('musics_id', $musicsNameList, array('id' => 'musics_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Musics')); ?>
    </div>

    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <?php echo $this->Form->select('event_place', $eventsPlaceList, array('id' => 'guest_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Event will take place')); ?>
    </div>

    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <?php echo $this->Form->select('additional_services_id', $additionalServicesNameList, array('id' => 'guest_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Additional Services')); ?>
    </div>

    <div class="form-group col-md-4 col-sm-4 col-xs-12 select_box ">
        <?php echo $this->Form->select('equipment_provided', $equipmentProvidedList, array('id' => 'guest_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Equipment Provided')); ?>
    </div>


    <!------------------For Extera--------------------->
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="hide_xetra_dj_event" style="display:none">
        <div class="input-group">
            <div class="input-group-addon"> <i class="fa fa-minus" aria-hidden="true" id="minus_hour_driver"></i></div>
            <input type="text" class="form-control required" name="hour" id="server_driver_hour" value="<?php // echo $val1['unit'];                 ?>" placeholder="<?php // echo $val1['unit'];                 ?> Hour" readonly="readonly" />
            <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_hour_driver"></i></div>
        </div>
    </div>

    </br>

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
                            <?php // echo $this->Form->hidden('subservice_id', array('value' => $val['id'], 'class' => 'subserviceId'))    ?>
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
    <?php }
    ?>



<?php } ?>
<!--------------Xetra Div End Here----------------->



<script>
    $(document).ready(function () {
        var subtotalMainVal = '';
        var xetraUnitForAdmin = '';
        var sethourUnitFromAdmin = '';
        var setXetraValueFromAdmin = '';
        var gestPersentageValue = '';
        $('#ServiceDjEventId').change(function () {
            $("#hide_xetra_dj_event").show();
            subtotalVal = $("#subtotal").val();
            $("#guest_id option[value='']").prop("selected", true);

            if ($(this).val() == '') {
                location.reload();
            }
            $.ajax({
                type: 'GET',
                url: ajax_url + '/homes/getEventPriceData/' + $(this).val(),
                success: function (msgevent) {
                    msgevent = jQuery.parseJSON(msgevent)
//                    console.log(msgevent);
                    subtotalMainVal = msgevent[0].price;
                    xetraUnitForAdmin = msgevent[0].xetra_time;
                    sethourUnitFromAdmin = msgevent[0].defult_time;
                    setXetraValueFromAdmin = msgevent[0].xetra_price;

                    $('div #time').text(msgevent[0].defult_time);
                    $("#unit_time").val(msgevent[0].defult_time);
                    $("#subtotal").val(msgevent[0].price);
                    $("#total").val(msgevent[0].price);
                    $("#hour").show();
                    $('#server_driver_hour').val(msgevent[0].defult_time);
                    // $("#subtotal").val(msgevent[0].xetra_price);

                }
            })
        });

        $('#guest_id').change(function () {
            $("#hide_xetra_dj_event").show();
            subtotalVal = $("#subtotal").val();
            serverdriverhour = $("#server_driver_hour").val();

            if (subtotalVal == '') {
                alert('please select Event First');
                location.reload();
            }

            $.ajax({
                type: 'GET',
                url: ajax_url + '/homes/getGuestPrice/' + $(this).val(),
                success: function (msggst) {
                    msggst = jQuery.parseJSON(msggst)
                    gestPersentageValue = subtotalMainVal * msggst[0].percentage / 100

                    var persentageValue = subtotalMainVal * msggst[0].percentage / 100
                    var totalEventFaireValue = parseFloat(subtotalMainVal) + parseFloat(persentageValue);
                    $("#subtotal").val(totalEventFaireValue);
                    $("#total").val(totalEventFaireValue);

                }
            })
        });

        $('input[type="radio"]').click(function () {
            if ($(this).is(':checked')) {
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getServiceDjEventPricesData/' + $(this).val(),
                    success: function (msgsdep) {
                        msgsdep = jQuery.parseJSON(msgsdep)
//                        console.log(msgsdep[0]);
                        $('div #time').text(msgsdep[0].defult_time);
                        $("#unit_time").val(msgsdep[0].defult_time);
                        $("#subtotal").val(msgsdep[0].price);
                        $("#total").val(msgsdep[0].price);
                        $("#hour").show();

                    }
                })
            }

        });

        $("#add_hour_driver").click(function () {

            if ($('#guest_id').val() == "") {
                alert('please select Guest No Please');
                return false;
            }

            hour = parseFloat($("#hour").val());
            hourXetra = parseFloat($("#server_driver_hour").val());
            timeVal = $("#time").text();
            num = (parseFloat(hourXetra) + parseFloat(xetraUnitForAdmin));
            $("#server_driver_hour").val(num);
            subtotalVal = $("#subtotal").val();
            if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                if (subtotalMainVal == num) {
//                    alert('l');
                    $("#subtotal").val(subtotalMainVal);
                    $("#total").val(subtotalMainVal);
                    $('div #time').text(subtotalMainVal);
                    $("#unit_time").val(subtotalMainVal);
                    $("#hour").show();
                } else if (sethourUnitFromAdmin > num) {
                    $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(setXetraValueFromAdmin));
                    $("#total").val(parseFloat(subtotalVal) + parseFloat(setXetraValueFromAdmin));
                    $('div #time').text(parseFloat(timeVal) + parseFloat(xetraUnitForAdmin));
                    $("#unit_time").val(parseFloat(timeVal) + parseFloat(xetraUnitForAdmin));
                    $("#hour").show();
                } else {
                    $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(setXetraValueFromAdmin));
                    $("#total").val(parseFloat(subtotalVal) + parseFloat(setXetraValueFromAdmin));
                    $('div #time').text(parseFloat(timeVal) + parseFloat(xetraUnitForAdmin));
                    $("#unit_time").val(parseFloat(timeVal) + parseFloat(xetraUnitForAdmin));
                    $("#hour").show();
                }
            }

        });


        $("#minus_hour_driver").click(function () {

            hourXetra = parseFloat($("#server_driver_hour").val());
            timeVal = $("#time").text();
            if (hourXetra > sethourUnitFromAdmin) {

                num = (hourXetra - xetraUnitForAdmin);
                subTime = (parseFloat(timeVal) - parseFloat(xetraUnitForAdmin));
                $("#server_driver_hour").val(num);
                $('div #time').text(parseFloat(subTime));
                $("#unit_time").val(parseFloat(subTime));
                var subtotalVal = $("#subtotal").val();
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {

                    if (sethourUnitFromAdmin == num) {
                        if ($('#guest_id').val() == "") {
                            $("#subtotal").val(subtotalMainVal);
                            $("#total").val(subtotalMainVal);
                        } else {
                            $("#subtotal").val(subtotalVal - gestPersentageValue);
                            $("#total").val(subtotalVal - gestPersentageValue);
                        }
//                        $("#subtotal").val(subtotalMainVal);
//                        $("#total").val(subtotalMainVal);
//                        $('div #time').text(parseFloat(sethourUnitFromAdmin));
//                        $("#hour").show();
                    } else if (sethourUnitFromAdmin < num) {
                        var totalTimeValue = parseFloat(timeVal) - parseFloat(sethourUnitFromAdmin);

                        $("#subtotal").val(parseFloat(subtotalVal) - parseFloat(setXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) - parseFloat(setXetraValueFromAdmin));
//                        $("div #time").text(parseFloat(totalTimeValue));
                        $("#hour").show();
                    }
                }
            } else {
//                alert('Sorry!');
            }

        });

    });

</script>

<!---------------------For Extera ------------------------>

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
            if (subtotalVal == '') {
                alert('please select Event First');
                location.reload();
            }
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
                            $("#unit_time").val(msgxetra[0].xetra_time);
                            $("#hour").show();


                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) - parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) - parseFloat(msgxetra[0].xetra_time);

                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $('div #time').text(totalTimeValue);
                            $("#unit_time").val(totalTimeValue);
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
                            $("#unit_time").val(msgxetra[0].xetra_time);
                            $("#hour").show();
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) + parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) + parseFloat(msgxetra[0].xetra_time);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $('div #time').text(totalTimeValue);
                            $("#unit_time").val(totalTimeValue);
                            $("#hour").show();
                        }

                    }
                })
            }

        });
    });
</script>