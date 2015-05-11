<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerTransactions */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Customer Transactions',
]) . ' ' . $model->TransactionNumber;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TransactionNumber, 'url' => ['view', 'id' => $model->TransactionNumber]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customer-transactions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
