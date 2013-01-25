<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
    UserModule::t("Login") => array('/user/login'),
    UserModule::t("Change Password"),
);
?>

<?php $frm = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>
<h1><?php echo UserModule::t("Change Password"); ?></h1>

<?php echo $frm->passwordFieldRow($form, 'password', array('class' => 'span3')); ?>
<?php echo $frm->passwordFieldRow($form, 'verifyPassword', array('class' => 'span3')); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Save"), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>