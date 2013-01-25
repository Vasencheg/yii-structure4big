<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'searchForm',
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'htmlOptions' => array('class' => 'well span3'),
)); ?>

<?php echo $form->textFieldRow($model, 'id'); ?>
<?php echo $form->textFieldRow($model, 'username'); ?>
<?php echo $form->textFieldRow($model, 'email'); ?>
<?php echo $form->textFieldRow($model, 'activkey'); ?>
<?php echo $form->textFieldRow($model, 'create_at'); ?>
<?php echo $form->textFieldRow($model, 'lastvisit_at'); ?>
<?php echo $form->dropDownListRow($model,'superuser',$model->itemAlias('AdminStatus')); ?>
<?php echo $form->dropDownListRow($model,'status',$model->itemAlias('UserStatus')); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => UserModule::t('Search'))); ?>

<?php $this->endWidget(); ?>