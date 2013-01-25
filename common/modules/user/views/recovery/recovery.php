<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Restore");
$this->breadcrumbs = array(
    UserModule::t("Login") => array('/user/login'),
    UserModule::t("Restore"),
);
?>

<?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>
<?php $frm = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>
<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php echo $frm->textFieldRow($form, 'login_or_email', array('class' => 'span3')); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Restore"), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>
<?php endif; ?>