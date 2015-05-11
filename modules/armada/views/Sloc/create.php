<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\Sloc */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sloc',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sloc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
