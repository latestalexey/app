<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\b2b\models\Slocs */

$this->title = $model->SLoc;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slocs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slocs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php # Html::a(Yii::t('app', 'Update'), ['update', 'Sloc' => $model->SLoc, 'RowVer' => $model->RowVer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->SLoc], ['class' => 'btn btn-primary']) ?>       
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'Sloc' => $model->SLoc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'SLoc',
            'Description',
        //    'RowVer',
        ],
    ])
    ?>

</div>
