<?php
/*Yii::app()->clientscript
    ->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.css')
    ->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css')*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }

        @media (max-width: 980px) {
            body {
                padding-top: 0px;
            }
        }
    </style>


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
    <!--Uncomment when required-->
    <!--<link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->
    <!--<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">-->
    <!--<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">-->
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"><?php echo Yii::app()->name ?></a>

            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'brand' => 'Admin',
                'type' => 'inverse',
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => array(
                            array('label' => 'Главная', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Файловый менеджер', 'url' => array('/site/fileManager'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Пользователи', 'url' => array('/user/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Права', 'url' => array('/rights'), 'visible' => !Yii::app()->user->isGuest),
                        )
                    ),
                    array(
                        'class'=>'bootstrap.widgets.TbMenu',
                        'htmlOptions'=>array('class'=>'pull-right'),
                        'items'=>array(
                            array('label' => 'Войти', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/user/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ),
                ),
            ));
            ?>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <?php if(isset($this->breadcrumbs)): ?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
    <?php endif?>
    <div class="row">
        <div class="span10">
            <?php echo $content ?>
        </div>
        <div class="span2">
            <?php if(isset($this->menu)) {
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                ));
            }
            ?>
        </div>
    </div>
</div>
<!-- /container -->
</body>
</html>
