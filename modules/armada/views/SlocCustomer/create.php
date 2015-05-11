<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\SlocCustomer */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sloc Customer',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sloc Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sloc-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
