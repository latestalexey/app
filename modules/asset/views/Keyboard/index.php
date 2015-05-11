<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\asset\models\KeyboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keyboards';

?>
<div class="keyboard-index">

    <?php 
$this->params['breadcrumbs'][] = $this->title;
// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Keyboard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          //  'no_asset',
            'name',
         //   'port',
          //  'flag',
            // 'status',
            // 'purchaseDate',
            // 'statusPeripheral',
            // 'cDate',
            // 'uDate',
            // 'idUser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
