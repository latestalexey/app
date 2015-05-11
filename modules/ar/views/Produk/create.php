<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ar\models\Produk */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Produk',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
