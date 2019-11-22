<!--Banner Start-->
<section id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Save Card</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li> <a href="#">My Account</a></li>
            <li class="active">Save Card</li>

        </ol>
    </div>
</section>

<!--/Banner End-->

<div class="form_wrapper"><div class="cc_form">
        <h4>Secure Credit Card Form</h4>
        <!--<form class="credit_card">-->
        <?php echo $this->Form->create('Users', array('enctype' => 'multipart/form-data', 'novalidate' => true, 'url' => '/saveCard/', 'id' => 'userCardDetailsForm', 'class' => 'credit_card')); ?>
        <div class="row row1">
            <div class="cc_number"><label>Credit Card Number</label>
                <!--<input type="text" />-->
            <?php echo $this->Form->text('card_number', array('id' => 'card_number', 'placeholder' => 'Card Number', 'class' => 'form-control', 'label' => false)); ?>
            </div>
            <div class="card_type">
                <div class="visa">
                    
                    <input name="card_type" value="1" id="visa" type="radio" required="required">
                    <!--<input name="visa" type="radio" value="" />-->
                </div>
                <div class="master activate">
                    <input name="card_type" value="2" id="master" type="radio" required="required">
                    <!--<input name="master" type="radio" value="" />-->
                </div>
                <div class="amex">
                    <input name="card_type" value="3" id="amex" type="radio" required="required">
                    <!--<input name="amex" type="radio" value="" />-->
                </div>
                <div class="discover">
                    <input name="card_type" value="4" id="discover" type="radio" required="required">
                    <!--<input name="discover" type="radio" value="" />-->
                </div>
            </div>
        </div>
        <div class="row row2">
            <div class="expiry">
                <label>Expiration</label>
                <?php echo $this->Form->hidden('first_name', array('id' => 'first_name', 'class' => 'form-control', 'label' => false)); ?>
                <!--<input type="text" placeholder="MM/YY" />-->
                <?php echo $this->Form->text('expiration', array('id' => 'expiration', 'placeholder' => 'MM/YY', 'class' => 'form-control', 'label' => false)); ?>
            </div>

            <div class="securty_code">
                <label>Security Code </label>
                <?php echo $this->Form->text('security_code', array('id' => 'security_code', 'placeholder' => 'CVC', 'class' => 'form-control', 'label' => false)); ?>
                <!--<input type="text" placeholder="CVC" />-->
            
            </div>

            <div class="billing_zip">
                <label>Billing Zip Code</label>
                <?php echo $this->Form->text('billing_zip_code', array('id' => 'billing_zip_code', 'placeholder' => '', 'class' => 'form-control', 'label' => false)); ?>
                <!--<input type="text" />-->
            </div>
        </div>
        <div class="row row_submit">
            
            <button type="submit" class="btn btn-primary">UPDATE</button>
            
            <!--<input type="submit" value="UPDATE" />-->
        </div>
        </form>

    </div></div>