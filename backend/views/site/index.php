<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php Yii::app()->user->setFlash('success', '<strong>Well done!</strong>');?>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>