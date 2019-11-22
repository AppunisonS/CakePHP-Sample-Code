<?php if (!$authUser) { ?>
    <div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger! </strong> <?= h($message) ?>
  </div>
<?php } else { ?>
     <div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Danger! </strong> <?= h($message) ?>
  </div>
<?php } ?>
<style type="text/css">
.alert {
    border: 1px solid transparent;
    border-radius: 4px;
    left: 26%;
    margin-bottom: 20px;
    padding: 15px;
    position: fixed;
    top: 44px;
    width: 40%;
    z-index: 111111;
}
</style>
