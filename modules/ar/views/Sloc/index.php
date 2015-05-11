<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

#use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ar\models\SlocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slocs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sloc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php #echo $this->render('_search', ['model' => $searchModel]);  ?>


    <p>
        <?=
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Sloc',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>

    </p>
   <?php Pjax::begin(['id' => 'pjax-gridview']) ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            // 'cDate',
            // 'uDate',
            // 'idUser',
            // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]);
    ?>
    <?php Pjax::end() ?>
</div>