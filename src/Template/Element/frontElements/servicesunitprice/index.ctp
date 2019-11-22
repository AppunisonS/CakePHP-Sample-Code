<?php
if (!empty($servicesUnitPrices)) {
    if (!empty($servicesUnitPrices)) {
        foreach ($servicesUnitPrices as $key1 => $val1) {
            if ($val1['type'] == 'bedroom') {
                ?>

                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-minus" aria-hidden="true" id="minus_bed"></i></div>
                        <input type="text" class="form-control required" id="bedroom" name="bedroom" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Bedroom" readonly="readonly" />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_bed"></i></div>
                    </div>
                </div>

            <?php } else if ($val1['type'] == 'bathroom') { ?>

                <div class="form-group col-md-6 col-sm-6 col-xs-12 padding-r">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-minus" aria-hidden="true" id="minus_bath"></i> </div>
                        <input type="text" class="form-control required" id="bathroom" name="bathroom" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Bathroom" readonly="readonly"  />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_bath"></i> </div>
                    </div>
                </div>
            <?php } else { ?>

                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-minus" aria-hidden="true" id="minus_hour"></i></div>
                        <input type="text" class="form-control required" name="hour" id="hour" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Hour" readonly="readonly" />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_hour"></i></div>
                    </div>
                </div>

                <?php
            }
        }
    }
    ?>

    <!------------------------------Xetra Services Start Here----------------------------------->
    <?php if (!empty($xetrasPrices) && isset($xetrasPrices)) { ?>

        <hr />
        <h2>Select Extras</h2>
        <p>Adds extra time.</p>
        <div class = "form-group col-md-12 padding-r">
            <input type = "hidden" name = "select_extra" id="select_extra"/>
            <ul class = "extras_services" id = "extrachooseother">
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
    <!--------------Xetra Div End Here----------------->


<?php }
?>

<div class="clearfix"></div>


<script>
    $(document).ready(function () {

<?php
if (!empty($servicesUnitPrices)) {

    foreach ($servicesUnitPrices as $key2 => $val2) {
//        pr($val2); die;
        if ($val2['type'] == 'bedroom') {
            ?>
                    setbedroomUnitFromAdmin = parseFloat("<?= $val2['unit']; ?>");
                    setbedroomValueFromAdmin = parseFloat("<?= $val2['price']; ?> ");
                    setbedroomXetraUnitFromAdmin = parseFloat("<?= $val2['xetra_unit']; ?>");
                    setbedroomXetraValueFromAdmin = parseFloat("<?= $val2['xetra_price']; ?> ");
                    setbedroomDefultTimeFromAdmin = parseFloat("<?= $val2['defult_time']; ?>");
                    setbedroomXetraTimeFromAdmin = parseFloat("<?= $val2['xetra_time']; ?> ");
        <?php } else if ($val2['type'] == 'bathroom') { ?>
                    setbathroomUnitFromAdmin = parseFloat("<?= $val2['unit']; ?>");
                    setbathroomValueFromAdmin = parseFloat("<?= $val2['price']; ?> ");
                    setbathroomXetraUnitFromAdmin = parseFloat("<?= $val2['xetra_unit']; ?>");
                    setbathroomXetraValueFromAdmin = parseFloat("<?= $val2['xetra_price']; ?> ");
                    setbathroomDefultTimeFromAdmin = parseFloat("<?= $val2['defult_time']; ?>");
                    setbathroomXetraTimeFromAdmin = parseFloat("<?= $val2['xetra_time']; ?> ");
        <?php } else { ?>
                    sethourUnitFromAdmin = parseFloat("<?= $val2['unit']; ?>");
                    sethourValueFromAdmin = parseFloat("<?= $val2['price']; ?> ");
                    sethourXetraUnitFromAdmin = parseFloat("<?= $val2['xetra_unit']; ?>");
                    sethourXetraValueFromAdmin = parseFloat("<?= $val2['xetra_price']; ?> ");
            <?php
        }
    }
}
?>
        $("#add_bed").click(function () {
            bedroom = parseFloat($("#bedroom").val());
            num = (bedroom + setbedroomXetraUnitFromAdmin);
            $("#bedroom").val(num);
            subtotalVal = $("#subtotal").val();
            timeVal = $("#time").text();
            if (subtotalVal === '' || subtotalVal == null) {
                if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                    if (setbedroomUnitFromAdmin == num) {
                        $("#subtotal").val(setbedroomValueFromAdmin);
                        $("#total").val(setbedroomValueFromAdmin);
                        $('div #time').text(setbedroomDefultTimeFromAdmin);
                        $("#unit_time").val(setbedroomDefultTimeFromAdmin);
                        $("#hour").show();
                    } else if (setbedroomUnitFromAdmin < num) {
                        var totalTimeValue = parseFloat(setbedroomDefultTimeFromAdmin) + parseFloat(setbedroomXetraTimeFromAdmin);
                        $("#subtotal").val(setbedroomValueFromAdmin + setbedroomXetraValueFromAdmin);
                        $("#total").val(setbedroomValueFromAdmin + setbedroomXetraValueFromAdmin);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    }
                }
            } else {
                if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                    var totalBedroomValue = parseFloat(subtotalVal) + parseFloat(setbedroomXetraValueFromAdmin);
                    var totalTimeValue = parseFloat(timeVal) + parseFloat(setbedroomXetraTimeFromAdmin);
                    if (setbedroomUnitFromAdmin == num) {
                        $("#subtotal").val(totalBedroomValue);
                        $("#total").val(totalBedroomValue);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    } else if (setbedroomUnitFromAdmin < num) {
                        $("#subtotal").val(totalBedroomValue);
                        $("#total").val(totalBedroomValue);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    }
                }
            }
        });

        $("#minus_bed").click(function () {
            bedroom = parseFloat($("#bedroom").val());
            timeVal = parseFloat($("#time").text());
            if (bedroom > setbedroomUnitFromAdmin) {
                num = (bedroom - setbedroomXetraUnitFromAdmin);
                subTime = (parseFloat(timeVal) - parseFloat(setbedroomXetraTimeFromAdmin));
                $("#bedroom").val(num);
                var subtotalVal = $("#subtotal").val();
                if (subtotalVal === '' || subtotalVal == null) {
                    if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                        if (setbedroomUnitFromAdmin == num) {
                            // alert('f');
                            $("#subtotal").val(setbedroomValueFromAdmin);
                            $("#total").val(setbedroomValueFromAdmin);
                            $('div #time').text(setbedroomDefultTimeFromAdmin);
                            $("#unit_time").val(setbedroomDefultTimeFromAdmin);
                            $("#hour").show();

                        } else if (setbedroomUnitFromAdmin < num) {
                            // alert('fc');
                            $("#subtotal").val(setbedroomValueFromAdmin - num);
                            $("#total").val(setbedroomValueFromAdmin - num);
                            $('div #time').text(parseFloat(setbedroomDefultTimeFromAdmin) - parseFloat(subTime));
                            $("#unit_time").val(parseFloat(setbedroomDefultTimeFromAdmin) - parseFloat(subTime));
                            $("#hour").show();
                        }
                    }
                } else {
                    if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                        totalBedroomValue = parseFloat(subtotalVal) - parseFloat(setbedroomXetraValueFromAdmin);
                        var totalTimeValue = parseFloat(timeVal) - parseFloat(setbedroomXetraTimeFromAdmin);
                        if (setbedroomUnitFromAdmin == num) {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        } else if (setbedroomUnitFromAdmin < num) {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        } else {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        }
                    }
                }
            } else {
//                alert('Sorry!');
            }

        });

        // Here To Bath Room Calculation //
        $("#add_bath").click(function () {
            bathroom = parseFloat($("#bathroom").val());
            num = (bathroom + setbathroomXetraUnitFromAdmin);
            $("#bathroom").val(num);
            timeVal = $("#time").text();
            subtotalVal = $("#subtotal").val();
            if (subtotalVal === '' || subtotalVal == null) {
                if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                    if (setbathroomUnitFromAdmin == num) {
                        $("#subtotal").val(setbathroomValueFromAdmin);
                        $("#total").val(setbathroomValueFromAdmin);
                        $('div #time').text(setbathroomDefultTimeFromAdmin);
                        $("#unit_time").val(setbathroomDefultTimeFromAdmin);
                        $("#hour").show();
                    } else if (setbathroomUnitFromAdmin < num) {
                        var totalTimeValue = parseFloat(setbathroomDefultTimeFromAdmin) + parseFloat(setbathroomXetraTimeFromAdmin);
                        $("#subtotal").val(setbathroomValueFromAdmin + setbathroomXetraValueFromAdmin);
                        $("#total").val(setbathroomValueFromAdmin + setbathroomXetraValueFromAdmin);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    }
                }
            } else {
                if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                    var totalBathroomValue = parseFloat(subtotalVal) + parseFloat(setbathroomXetraValueFromAdmin);
                    var totalTimeValue = parseFloat(timeVal) + parseFloat(setbathroomXetraTimeFromAdmin);

                    if (setbathroomUnitFromAdmin == num) {
                        $("#subtotal").val(totalBathroomValue);
                        $("#total").val(totalBathroomValue);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    } else if (setbathroomUnitFromAdmin < num) {
                        $("#subtotal").val(totalBathroomValue);
                        $("#total").val(totalBathroomValue);
                        $('div #time').text(totalTimeValue);
                        $("#unit_time").val(totalTimeValue);
                        $("#hour").show();
                    }
                }
            }

        });

        $("#minus_bath").click(function () {
            bathroom = parseFloat($("#bathroom").val());
            timeVal = parseFloat($("#time").text());
            if (bathroom > setbathroomUnitFromAdmin) {
                num = (bathroom - setbathroomXetraUnitFromAdmin);
                subTime = (parseFloat(timeVal) - parseFloat(setbathroomXetraTimeFromAdmin));
                $("#bathroom").val(num);
                var subtotalVal = $("#subtotal").val();
                if (subtotalVal === '' || subtotalVal == null) {
                    if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                        if (setbathroomUnitFromAdmin == num) {
                            $("#subtotal").val(setbathroomValueFromAdmin);
                            $("#total").val(setbathroomValueFromAdmin);
                            $('div #time').text(setbathroomDefultTimeFromAdmin);
                            $("#unit_time").val(setbathroomDefultTimeFromAdmin);
                            $("#hour").show();
                        } else if (setbathroomUnitFromAdmin < num) {
                            $("#subtotal").val(setbathroomValueFromAdmin - num);
                            $("#total").val(setbathroomValueFromAdmin - num);
                            $('div #time').text(parseFloat(setbathroomDefultTimeFromAdmin) - parseFloat(subTime));
                            $("#unit_time").val(parseFloat(setbathroomDefultTimeFromAdmin) - parseFloat(subTime));
                            $("#hour").show();
                        }
                    }
                } else {
                    if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                        var totalBathroomValue = parseFloat(subtotalVal) - parseFloat(setbathroomXetraValueFromAdmin);
                        var totalTimeValue = parseFloat(timeVal) - parseFloat(setbathroomXetraTimeFromAdmin);
                        if (setbathroomUnitFromAdmin == num) {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        } else if (setbathroomUnitFromAdmin < num) {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        } else {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        }
                    }
                }
            } else {
//                alert('Sorry!');
            }


        });

        // Here To Hour Calculation //
        $("#add_hour").click(function () {

            hour = parseFloat($("#hour").val());
            timeVal = $("#time").text();
            num = (hour + sethourXetraUnitFromAdmin);
            $("#hour").val(num);
            if (num > 2) {
                subtotalVal = $("#subtotal").val();
                timeVal = $("#time").text();
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
                        $('div #time').text(sethourXetraUnitFromAdmin);
                        $("#unit_time").val(sethourXetraUnitFromAdmin);
                        $("#hour").show();
                    } else if (sethourUnitFromAdmin < num) {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $('div #time').text(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#unit_time").val(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#hour").show();
                    }
                }
            } else {
                timeVal = $("#time").text();
                subtotalVal = $("#subtotal").val();
                $("#hour").val(num);
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
                        $('div #time').text(sethourXetraUnitFromAdmin);
                        $("#unit_time").val(sethourXetraUnitFromAdmin);
                        $("#hour").show();
                    } else if (sethourUnitFromAdmin > num) {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $('div #time').text(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#unit_time").val(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#hour").show();
                    } else {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $('div #time').text(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#unit_time").val(parseFloat(timeVal) + parseFloat(sethourXetraUnitFromAdmin));
                        $("#hour").show();
                    }
                }
            }

        });

        $("#minus_hour").click(function () {

            hour = parseFloat($("#hour").val());
            timeVal = $("#time").text();
//            alert(timeVal);
            if (hour > sethourUnitFromAdmin) {
                num = (hour - sethourXetraUnitFromAdmin);
                subTime = (parseFloat(timeVal) - parseFloat(sethourXetraUnitFromAdmin));
//                alert(num);
//                alert(subTime);
                $("#hour").val(num);
                $('div #time').text(parseFloat(subTime));
                $("#unit_time").val(parseFloat(subTime));
                var subtotalVal = $("#subtotal").val();
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
//                        $('div #time').text(parseFloat(sethourUnitFromAdmin));
                        $("#hour").show();
                    } else if (sethourUnitFromAdmin < num) {
                        var totalTimeValue = parseFloat(timeVal) - parseFloat(sethourUnitFromAdmin);

                        $("#subtotal").val(parseFloat(subtotalVal) - parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) - parseFloat(sethourXetraValueFromAdmin));
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


<script>
    $(document).ready(function () {
<?php
if (!empty($servicesUnitPrices)) {
    foreach ($servicesUnitPrices as $key2 => $val2) {
//        pr($val2);die;
        if ($val2['type'] == 'bedroom') {
            ?>
                    $("#subtotal").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);
                    $("#total").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);
                    $('div #time').text(parseFloat(setbedroomDefultTimeFromAdmin) + parseFloat(setbathroomDefultTimeFromAdmin));
                    $("#unit_time").val(parseFloat(setbedroomDefultTimeFromAdmin) + parseFloat(setbathroomDefultTimeFromAdmin));
                    $("#hour").show();

        <?php } else if ($val2['type'] == 'bathroom') { ?>
                    $("#subtotal").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);
                    $("#total").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);
                    $('div #time').text(parseFloat(setbedroomDefultTimeFromAdmin) + parseFloat(setbathroomDefultTimeFromAdmin));
                    $("#unit_time").val(parseFloat(setbedroomDefultTimeFromAdmin) + parseFloat(setbathroomDefultTimeFromAdmin));
                    $("#hour").show();

        <?php } else if ($val2['type'] == 'hour') { ?>

                    $("#subtotal").val(sethourValueFromAdmin);
                    $("#total").val(sethourValueFromAdmin);
                    $('div #time').text(parseFloat(sethourUnitFromAdmin));
                    $("#unit_time").val(parseFloat(sethourUnitFromAdmin));
                    $("#hour").show();
            <?php
        }
    }
}
?>


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
//        $('body').on('click', '.services_img', function () {
        $('.services_img').on('click', function () {
            subtotalVal = $("#subtotal").val();
            timeVal = parseFloat($("#time").text());
            var action = $(this).attr('subServiceXetraId');
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
                        console.log(msgxetra);
                        if (subtotalVal === '') {
                            $("#subtotal").val(msgxetra[0].price);
                            $("#total").val(msgxetra[0].price);
                            $("div #time").text(parseFloat(msgxetra[0].xetra_time));
                            $("#hour").show();
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) - parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) - parseFloat(msgxetra[0].xetra_time);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        }

                    }
                })
            } else {
                $(this).parents().addClass("es-selected");
                myarray.push(action);
                $("#select_extra").val(myarray);
//                console.log(myarray);
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getXetraServicesData/' + action,
                    success: function (msgxetra) {
                        msgxetra = jQuery.parseJSON(msgxetra)
//                        console.log(msgxetra[0]);
                        if (subtotalVal === '') {
                            $("#subtotal").val(msgxetra[0].price);
                            $("#total").val(msgxetra[0].price);
                            $("div #time").text(msgxetra[0].xetra_time);
                            $("#unit_time").val(msgxetra[0].xetra_time);
                            $("#hour").show();
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) + parseFloat(msgxetra[0].price);
                            var totalTimeValue = parseFloat(timeVal) + parseFloat(msgxetra[0].xetra_time);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);
                            $("div #time").text(parseFloat(totalTimeValue));
                            $("#unit_time").val(parseFloat(totalTimeValue));
                            $("#hour").show();
                        }

                    }
                })
            }

        }
        );
    });
</script>