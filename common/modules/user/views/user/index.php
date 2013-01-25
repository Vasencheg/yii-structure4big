<?php
$this->breadcrumbs = array(
    UserModule::t("Users"),
);
if (UserModule::isAdmin()) {
    $this->layout = '//layouts/column2';
    $this->menu = array(
        array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')),
        array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    );
}
?>

<h1><?php echo UserModule::t("List User"); ?></h1>

<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'user-grid',
    'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
    'type'=>'striped bordered',
    'dataProvider' => $dataProvider,
    'template' => "{items}{pager}",
    'columns' => array(
        array(
            'name' => 'username',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
        ),
        'create_at',
        'lastvisit_at',
    ),
));
