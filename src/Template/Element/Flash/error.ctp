<?php if (!$authAdmin) { ?>
    <div class=" message-box-login alert alert-danger alert-dismissible" onclick="this.classList.add('hidden');">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?= h($message) ?>
    </div>


    <style>
        .message-box-login{
            margin-left: auto;
            margin-right: auto;
            width: 360px;
            margin-bottom: -6%;
            margin-top: 0%;
        }

    </style>
<?php } else { ?>
    <div class="col-md-12 centered alert">
        <div class="callout callout-danger" onclick="this.classList.add('hidden');">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?= h($message) ?>
        </div>
    </div>


    <style>
        .callout{
            margin-left: auto;
            margin-right: auto;
            line-height:  2px;
            margin-bottom: 0%;
            margin-top: 0%;
        }

    </style>
<?php } ?>

