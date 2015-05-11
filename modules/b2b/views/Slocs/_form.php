<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Slocs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slocs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php # $form->field($model, 'SLoc')->textInput() ?>
    <?= $form->field($model, 'SLoc')->textInput(['readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'Description')->textInput() ?>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
