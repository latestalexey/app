<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustId')->textInput(['readonly' => !$model->isNewRecord]) ?>
    
     <?= $form->field($model, 'CustPassword')->textInput() ?>

    <?= $form->field($model, 'CustName')->textInput() ?>

    <?= $form->field($model, 'Address')->textInput() ?>

    <?= $form->field($model, 'City')->textInput() ?>

    <?= $form->field($model, 'PhoneNumber')->textInput() ?>

    <?= $form->field($model, 'ContactPerson')->textInput() ?>

    <?= $form->field($model, 'MobileNumber')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
