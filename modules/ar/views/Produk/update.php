<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ar\models\Produk */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Produk',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
