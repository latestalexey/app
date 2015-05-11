<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerTransactions */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Customer Transactions',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-transactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
