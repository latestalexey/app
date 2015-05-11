<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\SlocCustomer */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sloc Customer',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sloc Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sloc-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
