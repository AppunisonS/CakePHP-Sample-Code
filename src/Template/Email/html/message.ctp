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
           <?php echo $this->Html->image($WebsiteSettings->logo, array('alt' => '','hight'=>'100px','width'=>'100px','class'=>"logods")); ?>
<!--          <img src="img/logo.png" class="logods"/>-->
       </div>
       <div class="col-md-10">
            <div class="shipment">
                 <span class="ship_cnt">Shipment Tracking<br />
                 </span>
                 <span>Order Id: <?php echo $orderInformation[0]['orders'][0]['order_id']; ?></span>      
            </div>
       </div>
     </div>
     
     <div class="row mail">
     
     	<div class="col-md-12 detail">
           <h4>Hello <?php echo $authUser['first_name']." ".$authUser['last_name']; ?>,</h4>
           <p>We would like to inform you that your order is/are out for delivery. You will receive your shipment by the end of the day. 
           <br /><br />Your package is shipped by Amazon Transportation Services and the tracking ID is 219124707003. <br /><br />
           Please note that a signature is required for the delivery of the package. If no one will be available to sign for this package, you may wish to make alternate delivery arrangements with the carrier.

           </p>
     	</div>
     </div>
     
     <div class="row detail_add">
       <div class="col-md-3 ">
           <a href="<?php echo SITE_PATH . 'Orders/trackOrder/'.$orderId=$content[0]['orders'][0]['order_id']; ?>" class="track_btn">Track</a>
<!--            <button class="track_btn">Track Your Package</button>    -->
     	</div>
     	<div class="col-md-4 ">
            <h4>Deleivery Address:</h4>    
     	</div>
        <div class="col-md-5 address_dtl">
            <span><?php echo $authUser['first_name']." ".$authUser['last_name']; ?>
	    <?php echo $authUser['address']; ?>
            </span>
        </div>
       
     </div>
    <?php  if(isset($content)){ $total = 0; $i=0;
        foreach($content as $Order){ ?>
     <div class="row  detail_1 ">
      <h4 style="border-bottom:2px solid  #e6e6e6; ">Package Content</h4>
        <div class="col-md-3 pdct" >
            <?php $productImage = json_decode($Order['image']);
                        if (isset($productImage[0]) && !empty($productImage[0])) {
                            echo $this->Html->image(FATCH_PRODUCT_IMG_PATH . $productImage[0], ['alt' => 'CakePHP','hight'=>'100px','width'=>'100px']);
                        } else {
                            echo $this->Html->image('noimage.png', array('alt' => '','hight'=>'100px','width'=>'100px'));
                        }
                ?>
<!--         <img   src="img/blue-duck-plush-school-bag-36-gifteria-original-imaeq7fftcz2m7hk.jpg" />-->
        </div>
             <div class="col-md-9 pdt_dtl">
                 <a href="#"><?php  echo $Order['product_name']; ?></a>
                
             </div>
   </div>
    <?php } }?>
  
 <div class="bglne"></div>
</div>
