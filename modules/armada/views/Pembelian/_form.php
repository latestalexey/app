<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\Pembelian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SlocustomerID')->textInput() ?>

    <?= $form->field($model, 'prodID')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?=
    DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'tglPesan',
        'language' => 'en',
        'size' => 's',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'dd MM yyyy - HH:ii',
            'todayBtn' => true
        ]
    ]);
    ?>

<?php # $form->field($model, 'tglPesan')->textInput()  ?>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
