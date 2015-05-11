<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\CustomerSLocs */

$this->title = $model->CustId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-slocs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CustId',
            'SLoc',
             [
                'attribute' => 'IsActive',
                'label' => 'IsActive ?',
                'format' => 'raw',
                'value' => $model->IsActive ?
                        '<span class="label label-success">Yes</span>' :
                        '<span class="label label-danger">Not</span>',
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ]
            ],
         
        ],
    ]) ?>

</div>
