<h5><?php echo $model->seoData->translator->translate('seo', 'SEO settings for model'); ?></h5>
<div class="control-group">
    <?php echo CHtml::activeLabel($model->seoData, 'title', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo CHtml::activeTextArea($model->seoData, 'title', array('cols'=>60, 'rows'=>'1')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo CHtml::activeLabel($model->seoData, 'keywords', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo CHtml::activeTextArea($model->seoData, 'keywords', array('cols'=>60, 'rows'=>'3')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo CHtml::activeLabel($model->seoData, 'description', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo CHtml::activeTextArea($model->seoData, 'description', array('cols'=>60, 'rows'=>'3')); ?>
    </div>
</div>