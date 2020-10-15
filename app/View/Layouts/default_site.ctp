<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <!--  meta info -->
        <?php
        echo $this->Html->meta(array("name" => "viewport",
            "content" => "width=device-width,  initial-scale=1.0"));
        echo $this->Html->meta(array("name" => "description",
            "content" => "this is the description"));
        echo $this->Html->meta(array("name" => "author",
            "content" => "TheHappyDeveloper.com - @happyDeveloper"))
        ?>

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
       
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- styles -->
        <?php
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-theme');
        echo $this->Html->css('theme');
        echo $this->Html->css('clndr');
        ?>
        <!-- icons -->
        <?php
        echo $this->Html->meta('icon', $this->webroot . 'img/favicon.ico');
        echo $this->Html->meta(array('rel' => 'apple-touch-icon',
            'href' => $this->webroot . 'img/apple-touch-icon.png'));
        echo $this->Html->meta(array('rel' => 'apple-touch-icon',
            'href' => $this->webroot . 'img/apple-touch-icon.png', 'sizes' => '72x72'));
        echo $this->Html->meta(array('rel' => 'apple-touch-icon',
            'href' => $this->webroot . 'img/apple-touch-icon.png', 'sizes' => '114x114'));
        ?>

        <!-- page specific scripts -->
        <?php echo $scripts_for_layout; ?>
    </head>

    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo $this->Html->link(__('Sebrae Sempre'), '/', array('class' => 'navbar-brand')); ?>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!$this->Session->check('Auth.User')): ?>
                            <li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')) ?></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php echo $this->Html->link(__('Profile'), array('controller' => 'users', 'action' => 'edit')) ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')) ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        
        <div class="container theme-showcase" role="main">
            <div id="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </div>
        </div>
        <?php // echo $this->element('sql_dump'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <?php echo $this->Html->script('json2'); ?>
        <?php echo $this->Html->script('bootstrap'); ?>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
        <?php echo $this->Html->script('moment-2.8.3.js'); ?>        
        <?php echo $this->Html->script('clndr'); ?>
        <?php echo $this->Html->script('site'); ?>

    </body>
</html>