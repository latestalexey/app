<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Slocs */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Slocs',
]) . ' ' . $model->SLoc;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SLoc, 'url' => ['view', 'id' => $model->SLoc]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="slocs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
