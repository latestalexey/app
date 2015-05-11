<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\tableexport\ButtonTableExport;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\Pembelian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembelians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'SlocustomerID',
            'prodID',
            'qty',
            'tglPesan',
           
        ],
    ]) ?>
    
    <?= ButtonTableExport::widget(
    [
        'label' => 'Export Table',
        'selector' => '#tableId', // any jQuery selector
        'exportClientOptions' => [
            'ignoredColumns' => [0, 7],
            'useDataUri' => false,
            'url' => \yii\helpers\Url::to('controller/download')
        ]
    ]
);?>

</div>
