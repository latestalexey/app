<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\ar\models\Pembelian */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="form">
    <?php $form = ActiveForm::begin(); ?>

    <div id="block-0">
        <?= $form->field($model, '[0]prodID')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, '[0]qty')->textInput(['maxlength' => 45]) ?>

    </div>

    <div id="additional"></div>

    <?php # Html::button("Add Another", ['class' => 'btn btn-primary'], 'id' => 'button-add-another'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div><!-- form -->