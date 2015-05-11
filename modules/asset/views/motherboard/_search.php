<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\asset\models\MotherboardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="motherboard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_asset') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'port') ?>

    <?= $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'purchaseDate') ?>

    <?php // echo $form->field($model, 'statusPeripheral') ?>

    <?php // echo $form->field($model, 'cDate') ?>

    <?php // echo $form->field($model, 'uDate') ?>

    <?php // echo $form->field($model, 'idUser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
