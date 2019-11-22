<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset('utf-8') ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $WebsiteSettings['title']; ?>:
            <?php echo $this->fetch('title') ?>
        </title>

        <?php
        echo $this->Html->meta('favicon', 'img/xtrajobz-fevicon.png', ['type' => 'icon']);
        ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!------- CSS files---->
        <?php echo $this->Html->css('front/bootstrap.min.css') ?>
        <?php echo $this->Html->css('front/style.css') ?>
        <?php echo $this->Html->css('front/font-awesome.min.css') ?>
        <?php echo $this->Html->css('front/owlcarousel/owl.carousel.min.css') ?>
        <?php echo $this->Html->css('front/owlcarousel/owl.theme.default.min.css') ?>
        <?php echo $this->Html->css('front/jquery.timepicker.css') ?>
        <?php echo $this->Html->css('front/bootstrap-datepicker.standalone.css') ?>
		<?php echo $this->Html->css('front/easySelectable.css') ?>

        <!--Js  start here -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <?php //echo $this->Html->script('front/jquery.min.js') ?>
        <?php echo $this->Html->script('front/jquery.timepicker.js') ?>
        <?php echo $this->Html->script('front/bootstrap-datepicker.js') ?>
        <?php echo $this->Html->script('front/jquery-ui.min.js') ?>

        <?php echo $this->Html->script('front/bootstrap.min.js') ?>
		<?php echo $this->Html->script('front/easySelectable.js') ?>
        <?php echo $this->Html->script('front/owlcarousel/owl.carousel.min.js') ?>
        <?php echo $this->Html->script('front/custom.js') ?>
        <?php echo $this->Html->script('front/jquery.validate.min.js') ?>
        <?php echo $this->Html->script('front/front_validation.js') ?>
        <script>
            var ajax_url = "<?php echo SITE_PATH; ?>";
        </script> 
        <?php echo $this->fetch('meta') ?>
        <?php echo $this->fetch('css') ?>
        <?php echo $this->fetch('script') ?>
    </head>
    <body>
        <!--Wrapper Start--> 
        <div id="wrapper" class="<?php echo!empty($class) ? $class : ''; ?>">
            <?php echo $this->element('frontElements/header'); ?>
            <div> 
                <?php echo $this->Flash->render() ?>
                <?php echo $this->fetch('content') ?>
            </div>
            <?php echo $this->element('frontElements/footer'); ?>
            <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
        </div>
        <!--Wrapper End--> 

        <!------- JS files---->





    </body>
</html>