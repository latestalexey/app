<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'CustomerTransactionDetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ProdId',
            'Quantity',
            'TransactionNumber',
        ],
    ]); ?>
</div>