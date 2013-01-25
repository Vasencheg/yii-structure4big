<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('/user/profile'),
    UserModule::t("Change Password"),
);
$this->menu = array(
    array('label'=>'Пользователи', 'itemOptions'=>array('class'=>'nav-header')),
    ((UserModule::isAdmin())
        ? array('label' => UserModule::t('Manage Users'), 'url' => '/user/admin')
        : ''),
    array('label' => UserModule::t('List User'), 'url' => '/user'),
    array('label' => UserModule::t('Profile'), 'url' => '/user/profile'),
    array('label' => UserModule::t('Edit'), 'url' => 'edit'),
    array('label' => UserModule::t('Logout'), 'url' => '/user/logout'),
);
?>

<h1><?php echo UserModule::t("Change password"); ?></h1>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'changepassword-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('class' => 'well span3'),
)); ?>

    <?php echo $form->passwordFieldRow($model, 'oldPassword', array('class' => 'span3')); ?>

    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3', 'hint' => UserModule::t("Minimal password length 4 symbols."))); ?>

    <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('class' => 'span3')); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Save"), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>