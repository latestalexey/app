<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\TransactionDetails */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Transaction Details',
]) . ' ' . $model->ProdId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaction Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ProdId, 'url' => ['view', 'ProdId' => $model->ProdId, 'TransactionNumber' => $model->TransactionNumber]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="transaction-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
