<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'new-user',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>
<?php echo $form->textFieldRow($model, 'email', array('class' => 'span3')); ?>
<?php echo $form->dropDownListRow($model, 'superuser', User::itemAlias('AdminStatus'), array('class' => 'span3')); ?>
<?php echo $form->dropDownListRow($model, 'status', User::itemAlias('UserStatus'), array('class' => 'span3')); ?>

    <?php
    $profileFields = $profile->getFields();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            if ($widgetEdit = $field->widgetEdit($profile)) {
                echo $widgetEdit;
            } elseif ($field->range) {
                echo $form->dropDownListRow($profile, $field->varname, Profile::range($field->range));
            } elseif ($field->field_type == "TEXT") {
                echo CHtml::activeTextArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
            } else {
                echo $form->textFieldRow($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
            }
            ?>
            <?php echo $form->error($profile, $field->varname); ?>
            <?php
        }
    }
    ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), 'type' => 'primary')); ?>
<?php $this->endWidget(); ?>