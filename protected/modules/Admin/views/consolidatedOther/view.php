<?php
$this->breadcrumbs=array(
	'Consolidated Others'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConsolidatedOther', 'url'=>array('index')),
	array('label'=>'Create ConsolidatedOther', 'url'=>array('create')),
	array('label'=>'Update ConsolidatedOther', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConsolidatedOther', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConsolidatedOther', 'url'=>array('admin')),
);
?>

<h1>View ConsolidatedOther #<?php echo $model->id; ?></h1>

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
