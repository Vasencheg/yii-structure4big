<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-form',
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>

    <?php echo $form->textFieldRow($model,'id'); ?>
    <?php echo $form->textFieldRow($model,'varname',array('size'=>50,'maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->dropDownListRow($model,'field_type',ProfileField::itemAlias('field_type')); ?>
    <?php echo $form->textFieldRow($model,'field_size'); ?>
    <?php echo $form->textFieldRow($model,'field_size_min'); ?>
    <?php echo $form->dropDownListRow($model,'required',ProfileField::itemAlias('required')); ?>
    <?php echo $form->textFieldRow($model,'match',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'range',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'error_message',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'other_validator',array('size'=>60,'maxlength'=>5000)); ?>
    <?php echo $form->textFieldRow($model,'default',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'widget',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'widgetparams',array('size'=>60,'maxlength'=>5000)); ?>
    <?php echo $form->textFieldRow($model,'position'); ?>
    <?php echo $form->dropDownListRow($model,'visible',ProfileField::itemAlias('visible')); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t("Search"))); ?>

<?php $this->endWidget(); ?>