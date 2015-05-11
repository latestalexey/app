<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerTransactionDetails */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Customer Transaction Details',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Transaction Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-transaction-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
