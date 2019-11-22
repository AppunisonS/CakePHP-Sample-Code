<header class="main-header">
    <?php  echo $this->Html->link(SITE_TITLE, ['controller' => 'Admins', 'action' => 'dashboard'], [ 'prefix' => 'admin', 'class'=>'logo']); ?>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php  
                       if(!empty($authAdmin['image']) && file_exists(ADMIN_IMG_PATH.$authAdmin['image'])) { 
                                 echo $this->Html->image(FATCH_ADMIN_IMG_PATH.$authAdmin['image'], array('class'=>'user-image','width' => '5px', 'height' => '5px'));  
                             }else{
                                 echo $this->Html->image('noimage.gif',["class"=>"user-image","alt"=>"User Image"]);   
                             } ?>

                        <span class="hidden-xs"><?= $authAdmin['first_name'].' '.$authAdmin['last_name'];?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                <?php
                       if(!empty($authAdmin['image']) && file_exists(ADMIN_IMG_PATH.$authAdmin['image'])) { 
                                 echo $this->Html->image(FATCH_ADMIN_IMG_PATH.$authAdmin['image'], array('class'=>'img-circle', 'alt'=>'User Image'));  
                             }else{
                                 echo $this->Html->image('noimage.gif',["class"=>"img-circle","alt"=>"User Image"]);   
                             } ?>

                            <p><?= $authAdmin['first_name'].' '.$authAdmin['last_name'];?></p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                  <?php echo $this->Html->link('View Profile', ['controller'=>'Admins','action' => 'profile','prefix'=>'admin'],['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                            <div class="pull-right">
                  <?php echo $this->Html->link('Sign out', ['controller'=>'Admins','action' => 'logout','prefix'=>'admin'],['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>