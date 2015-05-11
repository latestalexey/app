<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\Module;
use mdm\admin\components\MenuHelper;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Leimportant@gmail.com'
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-default navbar-fixed-top',
                ],
            ]);

            $items = [
                ['label' => 'Home', 'url' => ['/site/index']],
//                ['label' => 'About', 'url' => ['/site/about']],
//                ['label' => 'Contact', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            ];
            // if (Yii::$app->user->can('permission_admin'))
            //     $items[] = ['label' => 'Data Peripheral', 'url' => ['/asset/motherboard/index']];

            if (Yii::$app->user->can('permission_admin'))
                $items[] = ['label' => 'Permissions', 'url' => ['/admin/assignment']];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);

            NavBar::end();
            ?>

            <div class="jumbroton">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
<!--                <div class="col-md-3">
                    <div class="left-menu">

                        <?php  /*
                        echo Nav::widget([
                            'activateParents' => true,
                            'items' => $this->context->leftMenu,
                                ]
                        );
                        ?>

                        <?php
                        echo Nav::widget([
                            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
                        ]);
                         * 
                         */
                        ?>
                    </div>
                </div>-->
            </div>
            <div class="col-md-12" role="main">
                <?= $content ?>
            </div>

        </div>

        <?php $this->endBody() ?>




    </body>
    <?php $this->endPage() ?>
    <div class = "container"></div>

    <footer class = "footer">
        <div class = "container">
            <p class = "pull-left">&copy;
                PT. Stanli Trijaya Mandiri <? = date('Y')
                ?></p>
        </div>
    </footer>
</html>


