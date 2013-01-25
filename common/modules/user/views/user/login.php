<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = array(
    UserModule::t("Login"),
);
?>

<?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>
<h1><?php echo UserModule::t("Login"); ?></h1>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>

<div class="control-group">
    <p class="hint">
        <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?>
        | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
    </p>
</div>

<?php echo $form->checkboxRow($model, 'rememberMe'); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Login"), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>

<?php
$form = new CForm(array(
    'elements' => array(
        'username' => array(
            'type' => 'text',
            'maxlength' => 32,
        ),
        'password' => array(
            'type' => 'password',
            'maxlength' => 32,
        ),
        'rememberMe' => array(
            'type' => 'checkbox',
        )
    ),

    'buttons' => array(
        'login' => array(
            'type' => 'submit',
            'label' => 'Login',
        ),
    ),
), $model);
?>