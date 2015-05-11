<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerTransactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="_item_detail">
    <td class="col-lg-2">
        <?= Html::activeTextInput($model, "[$key]ProdId", ['class' => 'form-control', 'required' => true]) ?>
    </td>
    <td class="col-lg-2">
        <?= Html::activeTextInput($model, "[$key]Quantity", ['class' => 'form-control', 'required' => true]) ?>
    </td>

    <td  class="col-lg-1" style="text-align: center">
        <a data-action="delete" title="Delete" href="#"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</div>
