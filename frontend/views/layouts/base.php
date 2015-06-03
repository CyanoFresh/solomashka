<?php
use common\models\Page;
use common\models\Subscriber;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\components\NavBar;
use frontend\assets\AppAsset;
use kartik\icons\Icon;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

// FontAwesome icons
Icon::map($this, Icon::FA);

$model = new Subscriber();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'id' => 'menu',
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['site/index']],
                ['label' => Yii::t('frontend', 'Catalog'), 'url' => ['catalog/index']],
            ];
            foreach (Page::findAll(['menu' => true]) as $page) {
                $menuItems[] = [
                    'label' => $page->name,
                    'url' => ['page/view', 'slug' => $page->slug],
                ];
            }
            $menuItems[] = [
                'label' => Yii::t('frontend', 'Search'),
                'url' => ['search/index'],
            ];
            $menuItems[] = [
                'label' => \kartik\icons\Icon::show('shopping-cart') . Yii::t('frontend', 'Cart') . '&nbsp' . Html::tag('span', Yii::$app->cart->getCount(), ['class' => 'badge']),
                'url' => ['cart/index'],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'id' => 'menu-navbar',
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
        ?>

        <?= $content ?>
    </div>

    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Контакты</h3>
                        <ul>
                            <li class="supportLi">
                                <h4>
                                    <i class="fa fa-phone"></i>
                                    <?= Yii::$app->params['contactPhone'] ?>
                                </h4>
                                <h4>
                                    <i class="fa fa-envelope"></i>
                                    <?= Yii::$app->params['contactEmail'] ?>
                                </h4>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3><?= Yii::t('frontend', 'Shop') ?></h3>
                        <ul>
                            <li><?= Html::a(Yii::t('frontend', 'Home'), ['site/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Catalog'), ['catalog/index']) ?></li>
                            <?php foreach (Page::find()->all() as $page): ?>
                            <li><?= Html::a($page->name, ['page/view', 'slug' => $page->slug]) ?></li>
                            <?php endforeach ?>
                            <li><?= Html::a(Yii::t('frontend', 'Search'), ['search/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Cart'), ['cart/index']) ?></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <h3><?= Yii::t('frontend', 'Stay In Touch') ?></h3>

                        <?php $form = ActiveForm::begin([
                            'action' => ['site/subscribe'],
                        ]) ?>
                        <?= $form->field($model, 'email')->input('email') ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <?= $form->field($model, 'name')->textInput(['maxlength' => '255']) ?>
                            </div>
                            <div class="col-sm-5">
                                <?= Html::submitButton(Yii::t('frontend', 'Subscribe'), [
                                    'class' => 'btn btn-primary btn-block',
                                    'style' => 'margin-top: 25px'
                                ]) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left">
                    © <?= Yii::$app->name ?> <?= date('Y') ?>. <?= Yii::t('frontend', 'All rights reserved') ?>.
                </p>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
