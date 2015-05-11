<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\SlocCustomer */

$this->title = $model->SlocID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sloc Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sloc-customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'id',
            'SlocID',
            'CustID',
             [
                'attribute' => 'status',
                'label' => 'Active ?',
                'format' => 'raw',
                'value' => $model->status ?
                        '<span class="label label-success">Yes</span>' :
                        '<span class="label label-danger">Not</span>',
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => 'Yes',
                        'offText' => 'No',
                    ]
                ]
            ],
//            'cDate',
//            'uDate',
//            'userID',
        ],
    ]) ?>

</div>
