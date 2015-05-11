<?php

use yii\helpers\Html;
use yii\helpers\arrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use app\modules\b2b\models\Slocs;
use app\modules\b2b\models\Customers;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerSLocs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-slocs-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'CustId')->widget(Select2::classname(), [
        'data' => arrayHelper::map(Customers::find()->all(), 'CustId', 'CustName'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a customer ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'SLoc')->widget(Select2::classname(), [
        'data' => arrayHelper::map(Slocs::find()->all(), 'SLoc', 'Description'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Sloc ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

<?= $form->field($model, 'IsActive')->dropDownList(['1' => 'Yes']); ?>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
