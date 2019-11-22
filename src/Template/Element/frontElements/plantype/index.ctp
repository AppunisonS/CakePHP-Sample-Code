<?php
if (!empty($planWiseData)) {
    if (!empty($planWiseData)) {
        foreach ($planWiseData as $key4 => $val4) {
//            pr($val4);die;
            ?>

            <div class="form-group col-md-12 padding-r">
                <input type="hidden"  name="selected_plan_duration" id="selected_plan_duration"/>
                <input type="hidden"  name="amount" id="amount"/>
                <input type="hidden"  name="discount_price" id="discount_price"/>
                <input type="hidden"  name="total_ammount" id="total_ammount"/>

                <ul class="how_often" id="howselectplan">

                    <li selected_plan_type_duration="<?php echo "per_3_month" ?>" selected_plan_type_duration_value="<?php echo $val4['per_3_month'] ?>" class="plan-type-duration-section-title"><?php echo "3 Monthly" ?> </li>

                    <li selected_plan_type_duration="<?php echo "per_6_month" ?>" selected_plan_type_duration_value="<?php echo $val4['per_6_month'] ?>"  class="plan-type-duration-section-title"><?php echo "6 Monthly" ?> </li>

                    <li selected_plan_type_duration="<?php echo "per_12_month" ?>" selected_plan_type_duration_value="<?php echo $val4['per_12_month'] ?>"  class="plan-type-duration-section-title"><?php echo "12 Monthly" ?> </li>
                </ul>
            </div>

            <?php
        }
    }
}
?>

<div class="clearfix"></div>


<script>
    $(document).ready(function () {
      //  $(".plan-type-duration-section-title").on("click", function (e) {
            $('#howselectplan li').on("click", function () {
                $('#howselectplan li').removeClass("ui-selected");
            subtotalVal = $("#subtotal").val();
            if (subtotalVal === '') {
                alert('please selected services frist');
            } else {
                $(this).addClass("ui-selected");
                var currentPlnDur = jQuery(this).attr('selected_plan_type_duration');
                var currentPlnDurValue = jQuery(this).attr('selected_plan_type_duration_value');
                $('#selected_plan_duration').val(currentPlnDur);
                $('#selected_plan_duration_value').val(currentPlnDurValue);

                $("#discount").val(currentPlnDurValue);
                TotalDiscount = subtotalVal * currentPlnDurValue / 100;
               
                $("#total").val(subtotalVal - TotalDiscount);
                $("#amount").val(subtotalVal);
                $("#discount_price").val(currentPlnDurValue);
                $('#total_ammount').val(subtotalVal - TotalDiscount);

            }
            // Grab current anchor value


        });


    });
</script>