<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('profile'),
    UserModule::t("Edit"),
);
$this->menu = array(
    array('label'=>'Пользователи', 'itemOptions'=>array('class'=>'nav-header')),
    ((UserModule::isAdmin())
        ? array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin'))
        : array()),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
    array('label' => UserModule::t('Profile'), 'url' => array('/user/profile')),
    array('label' => UserModule::t('Change password'), 'url' => array('changepassword')),
    array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
);
?><h1><?php echo UserModule::t('Edit profile'); ?></h1>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'profile-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('class' => 'well span3', 'enctype' => 'multipart/form-data'),
)); ?>

    <?php
    $profileFields = $profile->getFields();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            if ($widgetEdit = $field->widgetEdit($profile)) {
                echo $widgetEdit;
            } elseif ($field->range) {
                echo $form->dropDownListRow($profile, $field->varname, Profile::range($field->range));
            } elseif ($field->field_type == "TEXT") {
                echo $form->textAreaRow($profile, $field->varname, array('rows' => 6, 'cols' => 50));
            } else {
                echo $form->textFieldRow($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
            }
        }
    }
    ?>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span3', 'size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span3', 'size' => 60, 'maxlength' => 128)); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>
