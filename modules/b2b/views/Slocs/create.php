<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Slocs */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Slocs',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slocs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
