<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\Produk */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Produk',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
