<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\asset\models\MotherboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Motherboards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motherboard-index">

    <h1><?php #= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Motherboard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(['id' => 'pjax-gridview']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'no_asset',
            'name',
            //'port',
            //'flag',
            // 'status',
            // 'purchaseDate',
            // 'statusPeripheral',
            // 'cDate',
            // 'uDate',
            // 'idUser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>
