<?php

use yii\helpers\Html;
use yii\helpers\arrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use app\modules\armada\models\Sloc;
use app\modules\armada\models\Customer;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\SlocCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sloc-customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'SlocID')->widget(Select2::classname(), [
        'data' => arrayHelper::map(Sloc::find()->all(), 'id', 'name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Sloc ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'CustID')->widget(Select2::classname(), [
        'data' => arrayHelper::map(Customer::find()->all(), 'id', 'name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a customer ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?php # $form->field($model, 'status')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
