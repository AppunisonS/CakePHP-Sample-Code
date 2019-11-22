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
?>
<!DOCTYPE html>
<html>
    <head>
        <?php $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= SITE_TITLE ?>
            <?= $title ?>
        </title>
        <meta type="discription" content="<?= SITE_DESCRIPTION_ADMIN ?>">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <?php
        $this->Html->meta('icon');
        // admin css
        echo $this->Html->css('admin/bootstrap.min');
        echo $this->Html->css('admin/jvectormap/jquery-jvectormap-1.2.2.css');
        echo $this->Html->css('admin/AdminLTE.min');
        echo $this->Html->css('admin/dataTables.bootstrap');
        echo $this->Html->css('admin/developer');
        echo $this->Html->css('admin/pace.css');
        echo $this->Html->css('admin/jquery-ui.css');
        echo $this->Html->css('admin/iCheck/square/blue.css');
        echo $this->Html->css('admin/skins/_all-skins.min.css');
        echo $this->Html->css('admin/bootstrap-tagsinput.css');
        echo $this->Html->css('admin/app.css');
        echo $this->Html->css('admin/jquery.Jcrop.min.css');
        echo $this->Html->css('admin/jqueryerrorcss');
        echo $this->Html->css('admin/bootstrap-dialog.min');
        echo $this->Html->css('admin/jquery.multiselect');

        //admin jquery
        echo $this->Html->script('admin/jQuery/jquery-2.2.3.min.js');
        echo $this->Html->script('admin/jquery.multiselect.js');
        echo $this->Html->script('admin/img_crop_script.js');
        echo $this->Html->script('admin/jquery.Jcrop.min.js');
        echo $this->Html->script('admin/jquery-ui');
        echo $this->Html->script('admin/bootstrap.min.js');
        echo $this->Html->script('admin/bootstrap-tagsinput.min.js');
        echo $this->Html->script('admin/Chart.js');
        echo $this->Html->script('admin/pace.js');
        echo $this->Html->script('admin/app.min.js');
        echo $this->Html->script('admin/jquery.validate.min');
        echo $this->Html->script('admin/jquery-validate.bootstrap-tooltip');
        echo $this->Html->script('admin/locationpicker.jquery');
        echo $this->Html->script('admin/bootstrap-dialog.min');
        echo $this->Html->script('admin/common.js');
        echo $this->Html->script('admin/admin_validation.js');
        echo $this->Html->script('admin/jquery.multiselect.js');



        $this->fetch('meta');
        $this->fetch('css');
        $this->fetch('script');
        ?>
        <script>
            var ajax_url = "<?php echo SITE_PATH; ?>";

        </script>
    </head>
    <body  class="<?= ($authAdmin) ? 'hold-transition skin-green sidebar-mini' : 'hold-transition login-page' ?>">

        <?php if ($authAdmin) { ?>
            <div class="wrapper">
                <?php
                echo $this->element('admin/common/header');
                echo $this->element('admin/common/sidebar');
                ?>

                <div class="content-wrapper">
                    <?php
                    echo $this->Flash->render();
                    echo $this->fetch('content');
                    ?>
                </div>
                <?php echo $this->element('admin/common/loader'); ?>
                <?php echo $this->element('admin/common/footer'); ?>
            </div>
            <?php
        } else {
            echo $this->Flash->render();
            echo $this->fetch('content');
        }
        ?>
    </body>
</html>