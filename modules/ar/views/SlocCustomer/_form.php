<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\ar\models\Sloc;
use app\modules\ar\models\Customer;


use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\ar\models\SlocCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sloc-customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php # $form->field($model, 'SlocID')->textInput(['maxlength' => 5]) ?>
   
    <?php
    $dataPost=ArrayHelper::map(Sloc::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'SlocID')
        ->dropDownList(
            $dataPost,           
            ['id'=>'id']
        );
    ?>
    
    <?= $form->field($model, 'CustID')->dropDownList(ArrayHelper::map(Customer::find()->all(), 'id', 'id'))  ?>

    <?php # $form->field($model, 'CustID')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
