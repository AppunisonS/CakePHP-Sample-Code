<?php
if (!empty($servicesUnitPrices)) {
    if (!empty($servicesUnitPrices)) {
        foreach ($servicesUnitPrices as $key1 => $val1) {
            if ($val1['type'] == 'bedroom') {
                ?>

                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-minus" aria-hidden="true" id="minus_bed"></i></div>
                        <input type="text" class="form-control" id="bedroom" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Bedroom" readonly="readonly" />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_bed"></i></div>
                    </div>
                </div>

            <?php } else if ($val1['type'] == 'bathroom') { ?>

                <div class="form-group col-md-6 col-sm-6 col-xs-12 padding-r">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-minus" aria-hidden="true" id="minus_bath"></i> </div>
                        <input type="text" class="form-control" id="bathroom" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Bathroom" readonly="readonly"  />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_bath"></i> </div>
                    </div>
                </div>
            <?php } else { ?>

                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                    <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-minus" aria-hidden="true" id="minus_hour"></i></div>
                        <input type="text" class="form-control" id="hour" value="<?php echo $val1['unit']; ?>" placeholder="<?php echo $val1['unit']; ?> Hour" readonly="readonly" />
                        <div class="input-group-addon"><i class="fa fa-plus" aria-hidden="true" id="add_hour"></i></div>
                    </div>
                </div>


                <div class="form-group col-md-4 col-sm-4 col-xs-4 select_box ">
                    <?php echo $this->Form->select('sub_services_id', @$subServicesList, array('id' => 'sub_services_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Sub Services')); ?>
                </div>

                <div class="form-group col-md-4 col-sm-4 col-xs-4 select_box ">
                    <?php echo $this->Form->select('sub_services_id', @$subServicesList, array('id' => 'sub_services_id', 'class' => 'dropdown-toggle select_options form-control', 'label' => false, 'empty' => 'Select Sub Services')); ?>
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
            <input type = "hidden" name = "select_extra"/>
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

            if (subtotalVal === '' || subtotalVal == null) {
                if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                    if (setbedroomUnitFromAdmin == num) {
                        $("#subtotal").val(setbedroomValueFromAdmin);
                        $("#total").val(setbedroomValueFromAdmin);
                    } else if (setbedroomUnitFromAdmin < num) {

                        $("#subtotal").val(setbedroomValueFromAdmin + setbedroomXetraValueFromAdmin);
                        $("#total").val(setbedroomValueFromAdmin + setbedroomXetraValueFromAdmin);
                    }
                }
            } else {
                if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                    var totalBedroomValue = parseFloat(subtotalVal) + parseFloat(setbedroomXetraValueFromAdmin);
                    if (setbedroomUnitFromAdmin == num) {
                        $("#subtotal").val(totalBedroomValue);
                        $("#total").val(totalBedroomValue);
                    } else if (setbedroomUnitFromAdmin < num) {
                        $("#subtotal").val(totalBedroomValue);
                        $("#total").val(totalBedroomValue);
                    }
                }
            }
        });

        $("#minus_bed").click(function () {
            bedroom = parseFloat($("#bedroom").val());
            if (bedroom > setbedroomUnitFromAdmin) {
                num = (bedroom - setbedroomXetraUnitFromAdmin);
                $("#bedroom").val(num);
                var subtotalVal = $("#subtotal").val();
                if (subtotalVal === '' || subtotalVal == null) {
                    if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                        if (setbedroomUnitFromAdmin == num) {
                            $("#subtotal").val(setbedroomValueFromAdmin);
                            $("#total").val(setbedroomValueFromAdmin);
                        } else if (setbedroomUnitFromAdmin < num) {
                            $("#subtotal").val(setbedroomValueFromAdmin - num);
                            $("#total").val(setbedroomValueFromAdmin - num);
                        }
                    }
                } else {
                    if (setbedroomUnitFromAdmin !== '' || setbedroomUnitFromAdmin != null) {
                        totalBedroomValue = parseFloat(subtotalVal) - parseFloat(setbedroomXetraValueFromAdmin);
                        if (setbedroomUnitFromAdmin == num) {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
                        } else if (setbedroomUnitFromAdmin < num) {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
                        } else {
                            $("#subtotal").val(totalBedroomValue);
                            $("#total").val(totalBedroomValue);
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
            subtotalVal = $("#subtotal").val();
            if (subtotalVal === '' || subtotalVal == null) {
                if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                    if (setbathroomUnitFromAdmin == num) {
                        $("#subtotal").val(setbathroomValueFromAdmin);
                        $("#total").val(setbathroomValueFromAdmin);
                    } else if (setbathroomUnitFromAdmin < num) {
                        $("#subtotal").val(setbathroomValueFromAdmin + setbathroomXetraValueFromAdmin);
                        $("#total").val(setbathroomValueFromAdmin + setbathroomXetraValueFromAdmin);
                    }
                }
            } else {
                if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                    var totalBathroomValue = parseFloat(subtotalVal) + parseFloat(setbathroomXetraValueFromAdmin);
                    if (setbathroomUnitFromAdmin == num) {
                        $("#subtotal").val(totalBathroomValue);
                        $("#total").val(totalBathroomValue);
                    } else if (setbathroomUnitFromAdmin < num) {
                        $("#subtotal").val(totalBathroomValue);
                        $("#total").val(totalBathroomValue);
                    }
                }
            }

        });

        $("#minus_bath").click(function () {

            bathroom = parseFloat($("#bathroom").val());
            if (bathroom > setbathroomUnitFromAdmin) {
                num = (bathroom - setbathroomXetraUnitFromAdmin);
                $("#bathroom").val(num);
                var subtotalVal = $("#subtotal").val();
                if (subtotalVal === '' || subtotalVal == null) {
                    if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                        if (setbathroomUnitFromAdmin == num) {
                            $("#subtotal").val(setbathroomValueFromAdmin);
                            $("#total").val(setbathroomValueFromAdmin);
                        } else if (setbathroomUnitFromAdmin < num) {
                            $("#subtotal").val(setbathroomValueFromAdmin - num);
                            $("#total").val(setbathroomValueFromAdmin - num);
                        }
                    }
                } else {
                    if (setbathroomUnitFromAdmin !== '' || setbathroomUnitFromAdmin != null) {
                        var totalBathroomValue = parseFloat(subtotalVal) - parseFloat(setbathroomXetraValueFromAdmin);
                        if (setbathroomUnitFromAdmin == num) {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
                        } else if (setbathroomUnitFromAdmin < num) {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
                        } else {
                            $("#subtotal").val(totalBathroomValue);
                            $("#total").val(totalBathroomValue);
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
            num = (hour + sethourXetraUnitFromAdmin);
            if (num > 2) {
                subtotalVal = $("#subtotal").val();
                $("#hour").val(num);
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
                    } else if (sethourUnitFromAdmin < num) {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                    }
                }
            } else {
                subtotalVal = $("#subtotal").val();
                $("#hour").val(num);
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
                    } else if (sethourUnitFromAdmin > num) {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                    } else {
                        $("#subtotal").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) + parseFloat(sethourXetraValueFromAdmin));
                    }
                }
            }

        });

        $("#minus_hour").click(function () {
            hour = parseFloat($("#hour").val());
            if (hour > sethourUnitFromAdmin) {
                num = (hour - sethourXetraUnitFromAdmin);
                $("#hour").val(num);
                var subtotalVal = $("#subtotal").val();
                if (sethourUnitFromAdmin !== '' || sethourUnitFromAdmin != null) {
                    if (sethourUnitFromAdmin == num) {
                        $("#subtotal").val(sethourValueFromAdmin);
                        $("#total").val(sethourValueFromAdmin);
                    } else if (sethourUnitFromAdmin < num) {
                        $("#subtotal").val(parseFloat(subtotalVal) - parseFloat(sethourXetraValueFromAdmin));
                        $("#total").val(parseFloat(subtotalVal) - parseFloat(sethourXetraValueFromAdmin));

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
        <?php } else if ($val2['type'] == 'bathroom') { ?>
                    $("#subtotal").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);
                    $("#total").val(setbedroomValueFromAdmin + setbathroomValueFromAdmin);

        <?php } else if ($val2['type'] == 'hour') { ?>

                    $("#subtotal").val(sethourValueFromAdmin);
                    $("#total").val(sethourValueFromAdmin);
            <?php
        }
    }
}
?>


    });

</script>

<script>
    $(document).ready(function () {
        var myarray = [];
//        $('body').on('click', '.services_img', function () {
        $('.services_img').on('click', function () {
            subtotalVal = $("#subtotal").val();
            var action = $(this).attr('subServiceXetraId');
            if (jQuery.inArray(action, myarray) !== -1) {
                myarray = $.grep(myarray, function (value) {
                    return value != action;
                });
                $.ajax({
                    type: 'GET',
                    url: ajax_url + '/homes/getXetraServicesData/' + action,
                    success: function (msgxetra) {
                        msgxetra = jQuery.parseJSON(msgxetra)
//                        console.log(msgxetra);
                        if (subtotalVal === '') {
                            $("#subtotal").val(msgxetra[0].price);
                            $("#total").val(msgxetra[0].price);
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) - parseFloat(msgxetra[0].price);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);

                        }

                    }
                })
            } else {
                myarray.push(action);
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
                        } else {
                            var totalXetraValue = parseFloat(subtotalVal) + parseFloat(msgxetra[0].price);
                            $("#subtotal").val(totalXetraValue);
                            $("#total").val(totalXetraValue);

                        }

                    }
                })
            }

        });
    });
</script>