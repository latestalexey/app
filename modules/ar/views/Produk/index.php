<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ar\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Produks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <h1><?php // Html::encode($this->title)         ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?=
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Produk',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>
    <?php
    if (Yii::$app->user->can('permission_admin'))
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Produk',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>



    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
//            'cDate',
//            'uDate',
//            'userID',
            //['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            [
                'class' => 'yii\grid\ActionColumn',
                //    'contentOptions' => ['style' => 'width:260px;'],
                'header' => 'Actions',
                'template' => '{update} {view} {delete}',
                'buttons' => [
                     'view' => function ($url, $model) {
                        return $model->status == '' ? Html::a('<span class="fa fa-paperclip fa-fw"></span>', $url, [
                                    'title' => Yii::t('app', 'view'),
                                        //'class'=>'btn btn-primary btn-xs',
                                ]) : '';
                    },
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = 'view?id=' . $model->id;
                        //   $url = Yii::$app->controller->createUrl('/ar/produk/view?id=' . $model->id);
                        return $url;
                    }
                }
                    ],
                ],
            ]);
            ?>


</div>
