<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\asset\models\Motherboard */

$this->title = 'Create Motherboard';
$this->params['breadcrumbs'][] = ['label' => 'Motherboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motherboard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
