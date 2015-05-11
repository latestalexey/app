<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\tableexport\ButtonTableExport;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\armada\models\PembelianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pembelians');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?=
        Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Pembelian',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //     'id',
            'SlocustomerID',
             'tglPesan',
            'prodID',
            'qty',
           
            // 'cDate',
            // 'uDate',
            // 'userID',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php
    // You only need add this,
    $this->registerJs('
        var gridview_id = ""; // specific gridview
        var columns = [2, 3]; // index column that will grouping, start 1
       
        
        var column_data = [];
            column_start = [];
            rowspan = [];
 
        for (var i = 0; i < columns.length; i++) {
            column = columns[i];
            column_data[column] = "";
            column_start[column] = null;
            rowspan[column] = 1;
        }
 
        var row = 1;
        $(gridview_id+" table > tbody  > tr").each(function() {
            var col = 1;
            $(this).find("td").each(function(){
                for (var i = 0; i < columns.length; i++) {
                    if(col==columns[i]){
                        if(column_data[columns[i]] == $(this).html()){
                            $(this).remove();
                            rowspan[columns[i]]++;
                            $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                        }
                        else{
                            column_data[columns[i]] = $(this).html();
                            rowspan[columns[i]] = 1;
                            column_start[columns[i]] = $(this);
                        }
                    }
                }
                col++;
            })
            row++;
        });
    ');
    ?>

    <?=
    ButtonTableExport::widget(
            [
                'label' => 'Export Table',
                'selector' => '#tableId', // any jQuery selector
                'exportClientOptions' => [
                    'ignoredColumns' => [0, 1],
                    'useDataUri' => false,
                    'url' => \yii\helpers\Url::to('controller/download')
                ]
            ]
    );
    ?>

</div>
