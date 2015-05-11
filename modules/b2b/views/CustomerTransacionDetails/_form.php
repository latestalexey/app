<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerTransactionDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-transaction-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TransactionNumber')->textInput() ?>

    <?= $form->field($model, 'ProdId')->textInput() ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
