<?php
$this->breadcrumbs=array(
	'Vertical Managements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List VerticalManagement', 'url'=>array('index')),
	array('label'=>'Create VerticalManagement', 'url'=>array('create')),
	array('label'=>'Update VerticalManagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VerticalManagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VerticalManagement', 'url'=>array('admin')),
);
?>

<h1>View VerticalManagement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'addtime',
		'updtime',
		'state',
	),
)); ?>
