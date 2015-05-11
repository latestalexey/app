<?php

use yii\helpers\Html;
use yii\grid\GridView;
#use kartik\dynagrid\DynaGrid;
#use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\armada\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Produks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?=
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Produk',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            if ($model->status == '0') {
                return ['class' => 'danger'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return (($data->status) == 1) ? "Active" : "Not Active";
                        },
                      'filter' =>false,
                    ],
                    //            'create_at',
                    //            'update_at',
                    //            'userID',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
            <?php /*
              $columns = [
              ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_LEFT],
              'id',
              'name',
              // [
              //    'attribute' => 'publish_date',
              //    'filterType' => GridView::FILTER_DATE,
              //    'format' => 'raw',
              //    'width' => '170px',
              //    'filterWidgetOptions' => [
              //        'pluginOptions' => ['format' => 'yyyy-mm-dd']
              //    ],
              //],
              [
              'class' => 'kartik\grid\BooleanColumn',
              'attribute' => 'status',
              'vAlign' => 'middle',
              ],
              [
              'class' => 'kartik\grid\ActionColumn',
              'dropdown' => false,
              'order' => DynaGrid::ORDER_FIX_RIGHT
              ],
              ['class' => 'kartik\grid\CheckboxColumn', 'order' => DynaGrid::ORDER_FIX_RIGHT],
              ];

              echo DynaGrid::widget([
              'columns' => $columns,
              'storage' => DynaGrid::TYPE_COOKIE,
              'theme' => 'panel-danger',
              'gridOptions' => [
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'panel' => ['heading' => '<h3 class="panel-title">Library</h3>'],
              ],
              'options' => ['id' => 'dynagrid-1'] // a unique identifier is important
              ]);
             */ ?>
</div>
