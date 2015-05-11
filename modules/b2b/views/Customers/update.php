<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Customers */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Customers',
]) . ' ' . $model->CustId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CustId, 'url' => ['view', 'id' => $model->CustId]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
