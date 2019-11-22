<style>
.my_mail {
	width:50%;
	margin-top:20px;
	margin-bottom:20px;}

.mail {margin:0px;
       font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}

.shipment {
		  border-top:2px solid  #e6e6e6;
		  margin-top:20px;
		  text-align-last: end;}

.ship_cnt {
	 		font-size: 23px;
			}

.detail {
	  padding: 6px 8px 0px 15px;}

.detail h4 {
	  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	   color:#F66;}
	
.detail p  {
	 
	 border-bottom:2px solid #000;
	 padding-bottom: 13px;
	  }
	  
.logods {
	width:180px;
	margin-left: -18px;}
	
.address_dtl {
	width: 36%;
	float: right;
	font-size: 15px;
	font-weight: bold;
	 }
.detail_add {    margin: -9px 7px 0px 15px;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    background:#EFEFEF;
    padding: 15px;
}

.pdct{
	text-align:center;}

.pdt_dtl {
	font-size:20px;
	margin-top: 13px;}
	
.detail_1 {
	     font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	     padding: 6px 23px 0px 28px;
		  }
		
.detail_1 h4 {
		color:#F66;
		padding-bottom:12px;}
		
.bglne {
	 border-bottom: 2px solid #e6e6e6;
		padding: 5px;
		margin: 10px;}
.track_btn {border:none;
		padding: 8px 6px;
		font-size: 15px;
		color:white !important;
		background-color:#FF4940 !important;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
		border-radius: 3px;}
</style>

<div class="container my_mail">
     <div class="row mail">
       <div class="col-md-2">
           <?php //echo $this->Html->image($logo, array('alt' => '','hight'=>'100px','width'=>'100px','class'=>"logods")); die; ?>
           <img src="http://localhost/globalghaziabad/webroot/img/logoNew.png" style="display:block" hight='100px' width='100px'>
       </div>
       <div class="col-md-10">
            <div class="shipment">
                 <span class="ship_cnt">Shipment Tracking<br />
                 </span>
                 <span>Order Id: <?php echo $orderId; ?></span>      
            </div>
       </div>
     </div>
     
     <div class="row mail">
     
     	<div class="col-md-12 detail">
           <h4>Hello <?php echo $name; ?>,</h4>
           <p>We would like to inform you that your order is/are out for delivery. You will receive your shipment by the end of the day. 
           <br /><br />Your package is shipped by Amazon Transportation Services and the tracking ID is <?php echo $orderId; ?>. <br /><br />
           Please note that a signature is required for the delivery of the package. If no one will be available to sign for this package, you may wish to make alternate delivery arrangements with the carrier.

           </p>
     	</div>
     </div>
     
     <div class="row detail_add">
       <div class="col-md-3 ">
           <a href="<?php echo $link; ?>" class="track_btn">Track</a>
<!--            <button class="track_btn">Track Your Package</button>    -->
     	</div>
     	<div class="col-md-4 ">
            <h4>Deleivery Address:</h4>    
     	</div>
        <div class="col-md-5 address_dtl">
            <span><?php echo $name; ?>
	    <?php echo $address; ?>
            </span>
        </div>
       
     </div>
    <?php  if(isset($content)){ 
        foreach($content as $Order){ ?>
     <div class="row  detail_1 ">
      <h4 style="border-bottom:2px solid  #e6e6e6; ">Package Content</h4>
        <div class="col-md-3 pdct" >
            <?php $productImage = json_decode($Order['image']);
                        if (isset($productImage[0]) && !empty($productImage[0])) { ?>
<!--                            echo $this->Html->image(FATCH_PRODUCT_IMG_PATH . $productImage[0], ['alt' => 'CakePHP','hight'=>'100px','width'=>'100px']);-->
                            <img src="https://localhost/globalghaziabad/webroot/img/Products/<?php echo $productImage[0]; ?>" style="display:block" hight='100px' width='100px'>
                       <?php  } else { ?>
                            <img src="https://localhost/globalghaziabad/webroot/img/noimage.png" hight='100px' style="display:block" width='100px'>
<!--                            echo $this->Html->image('noimage.png', array('alt' => '','hight'=>'100px','width'=>'100px'));-->
                       <?php }
                ?>

        </div>
             <div class="col-md-9 pdt_dtl">
                 <a href="#"><?php  echo $Order['product_name']; ?></a>
                
             </div>
   </div>
    <?php } }?>
  
 <div class="bglne"></div>
</div>
