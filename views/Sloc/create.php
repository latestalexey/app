<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sloc */



$this->title = 'Create Sloc';
$this->params['breadcrumbs'][] = ['label' => 'Slocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sloc-create  panel panel-default">

    <div class="panel-heading"> 
		<div class="pull-right">
        <?=
 Html::a('<i class="fa fa-fw fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-xs btn-primary']) ?>
		</div>
		<h1 class="panel-title"><?= Html::encode($this->title) ?></h1> 
	</div>
	<div class="panel-body">
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
</div>
