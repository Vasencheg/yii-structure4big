<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
    UserModule::t("Registration"),
);
?>

<?php if (Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
    <?php $form = $this->beginWidget('UActiveForm', array(
        'id' => 'registration-form',
        'enableAjaxValidation' => true,
        'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'well span3'),
    )); ?>
    <h1><?php echo UserModule::t("Registration"); ?></h1>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>
    <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span3')); ?>

    <?php
    $profileFields = $profile->getFields();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            ?>
                <?php
                if ($widgetEdit = $field->widgetEdit($profile)) {
                    echo $widgetEdit;
                } elseif ($field->range) {
                    echo $form->dropDownListRow($profile, $field->varname, Profile::range($field->range));
                } elseif ($field->field_type == "TEXT") {
                    echo$form->textAreaRow($profile, $field->varname, array('rows' => 6, 'cols' => 50, 'class' => 'span3'));
                } else {
                    echo $form->textFieldRow($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255), 'class' => 'span3'));
                }
                ?>
                <?php echo $form->error($profile, $field->varname); ?>
            <?php
        }
    }
    ?>
    <?php if (UserModule::doCaptcha('registration')): ?>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textFieldRow($model, 'verifyCode'); ?>
        <?php echo $form->error($model, 'verifyCode'); ?>
    <?php endif; ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Register"), 'type' => 'primary')); ?>

    <?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>