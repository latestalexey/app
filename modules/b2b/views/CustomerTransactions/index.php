<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CustomerTransactionDetails;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\b2b\models\CustomerTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer Transactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php # $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Customer Transactions',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //    'TransactionNumber',
            [
                'attribute' => 'TransactionDate',
                'value' => 'TransactionDate',
                 'format' =>  ['date', 'php:Y-m-d'],
	           'options' => ['width' => '200'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'TransactionDate',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-dd'
                    ]
                ])
            ],
            [
                'attribute' => 'IsProcessed',
                 'value' => function ($data) {
                    return (($data->IsProcessed) == 1) ? "Yes" : "No";
                },
                'filter' => array("1" => "Yes", "0" => "No"),
            ],
            [

                'attribute' => 'IsCancelled',
                'value' => function ($data) {
                    return (($data->IsCancelled) == 1) ? "Yes" : "No";
                },
                'filter' => array("1" => "Yes", "0" => "No"),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
