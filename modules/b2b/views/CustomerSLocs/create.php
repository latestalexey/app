<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerSLocs */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Customer Slocs',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-slocs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
