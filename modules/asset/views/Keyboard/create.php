<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\asset\models\Keyboard */

$this->title = 'Create Keyboard';
$this->params['breadcrumbs'][] = ['label' => 'Keyboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keyboard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
