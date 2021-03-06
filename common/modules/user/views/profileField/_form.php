<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well span4'),
)); ?>

<?php echo (($model->id) ?
    $form->textFieldRow($model, 'varname', array('size' => 60, 'maxlength' => 50, 'readonly' => true, 'hint' => 'Allowed lowercase letters and digits.', 'class' => 'span3')) :
    $form->textFieldRow($model, 'varname', array('size' => 60, 'maxlength' => 50, 'hint' => UserModule::t('Allowed lowercase letters and digits.'), 'class' => 'span3')));
?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span3', 'hint' => UserModule::t('Field name on the language of "sourceLanguage".'))); ?>

<?php echo (($model->id) ?
    $form->textFieldRow($model, 'field_type', array('size' => 60, 'maxlength' => 50, 'readonly' => true, 'id' => 'field_type', 'himt' => UserModule::t('Field type column in the database.'))) :
    $form->dropDownListRow($model, 'field_type', ProfileField::itemAlias('field_type'), array('id' => 'field_type', 'hint' => UserModule::t('Field type column in the database.'))));
?>

<?php echo (($model->id) ?
    $form->textFieldRow($model, 'field_size', array('readonly' => true, 'hint' => UserModule::t('Field size column in the database.'))) :
    $form->textFieldRow($model, 'field_size', array('hint' => UserModule::t('Field size column in the database.'))));
?>

<?php echo $form->textFieldRow($model, 'field_size_min', array('class' => 'span3', 'hint' => UserModule::t('The minimum value of the field (form validator).'))); ?>

<?php echo $form->dropDownListRow($model, 'required', ProfileField::itemAlias('required'), array('hint' => UserModule::t('Required field (form validator).'))); ?>

<?php echo $form->textFieldRow($model, 'match', array('class' => 'span3', 'hint' => UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."))); ?>

<?php echo $form->textFieldRow($model, 'range', array('class' => 'span3', 'size' => 60, 'maxlength' => 5000, 'hint' => UserModule::t("Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five)."))); ?>

<?php echo $form->textFieldRow($model, 'error_message', array('class' => 'span3', 'size' => 60, 'maxlength' => 255, 'hint' => UserModule::t("Error message when you validate the form."))); ?>

<?php echo $form->textFieldRow($model, 'other_validator', array('class' => 'span3', 'size' => 60, 'maxlength' => 255, 'hint' => UserModule::t('JSON string (example: {example}).', array('{example}' => CJavaScript::jsonEncode(array('file' => array('types' => 'jpg, gif, png'))))))); ?>

<?php echo (($model->id) ?
    $form->textFieldRow($model, 'default', array('size' => 60, 'maxlength' => 255, 'readonly' => true, 'hint'=>UserModule::t('The value of the default field (database).'))) :
    $form->textFieldRow($model, 'default', array('size' => 60, 'maxlength' => 255, 'hint'=>UserModule::t('The value of the default field (database).'))));
?>

<?php
    list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
    echo $form->dropDownListRow($model, 'widget', $widgetsList, array('id' => 'widgetlist', 'hint' => UserModule::t('Widget name.')));
?>

<?php echo $form->textFieldRow($model, 'widgetparams', array('id' => 'widgetparams', 'class' => 'span3', 'size' => 60, 'maxlength' => 5000, 'hint' => UserModule::t('JSON string (example: {example}).', array('{example}' => CJavaScript::jsonEncode(array('param1' => array('val1', 'val2'), 'param2' => array('k1' => 'v1', 'k2' => 'v2'))))))); ?>

<?php echo $form->textFieldRow($model, 'position', array('class' => 'span3', 'hint' => UserModule::t("Display order of fields."))); ?>

<?php echo $form->dropDownListRow($model, 'visible', ProfileField::itemAlias('visible')); ?><br />

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), 'type' => 'primary')); ?>

<?php $this->endWidget(); ?>

<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
    <form>
        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all"/>
            <label for="value">Value</label>
            <input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all"/>
        </fieldset>
    </form>
</div>
