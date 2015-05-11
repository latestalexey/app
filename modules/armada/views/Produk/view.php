<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use app\modules\armada\models\Produk;
#use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\armada\models\Produk */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
      */  ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        
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
          

        ],
    ])
    ?>
  
</div>
