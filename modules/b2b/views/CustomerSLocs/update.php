<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerSLocs */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Customer Slocs',
]) . ' ' . $model->CustId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CustId, 'url' => ['view', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customer-slocs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
