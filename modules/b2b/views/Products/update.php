<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Products */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Products',
]) . ' ' . $model->ProdId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ProdId, 'url' => ['view', 'ProdId' => $model->ProdId, 'RowVer' => $model->RowVer]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
