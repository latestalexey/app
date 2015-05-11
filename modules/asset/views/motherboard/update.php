<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\asset\models\Motherboard */

$this->title = 'Update Motherboard: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Motherboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="motherboard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
