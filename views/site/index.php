<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Portal';
$this->params['breadcrumbs'][] = $this->title;
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
           <img src="<?= Yii::$app->request->baseUrl ?>/web/images/carosol_3.png" style="width: 1319px; height: 500px;">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
             <img src="<?= Yii::$app->request->baseUrl ?>/web/images/carosol_2.jpg" style="width: 1319px; height: 500px;">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/images/carosol_1.jpg" style="width: 1319px; height: 500px;">
           <br/>
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/images/truk.jpg" style="width: 140px; height: 140px;">
            <h2></h2>   
            <div> 
                <p><a class="btn btn-default" href="<?= Url::toRoute('#') ?>">
                        Pembelian  </a>  
                </p>
            </div>
        </div><!-- /.col-lg-4 -->


        <div class="col-lg-4">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/images/report.png" style="width: 140px; height: 140px;">
            <h2></h2>   
            <div> 
                <p><a class="btn btn-default" href="<?= Url::toRoute('#') ?>">
                        Laporan  </a>  
                </p>
            </div>
        </div><!-- /.col-lg-4 -->



        <div class="col-lg-4">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/images/img1.jpg"  style="width: 140px; height: 140px;">
            <h2></h2>   
            <div> 
                <p><a class="btn btn-default" href="<?= Url::toRoute('#') ?>">
                        Administration  </a>  
                </p>
            </div>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->






