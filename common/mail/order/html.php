<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('backend/order', 'Order #{orderID}', [
    'orderID' => $model->id,
]);
?>

<h1><?= $this->title ?></h1>

<b><?= $model->getAttributeLabel('name') ?>:</b> <?= Html::encode($model->name) ?><br>
<b><?= $model->getAttributeLabel('phone') ?>:</b> <?= Html::encode($model->phone) ?><br>
<b><?= $model->getAttributeLabel('email') ?>:</b> <?= Yii::$app->formatter->asEmail(
    Html::encode($model->email)
) ?><br>
<b><?= $model->getAttributeLabel('message') ?>:</b> <?= Html::encode($model->message) ?><br>

<b><?= $model->getAttributeLabel('total_cost') ?>:</b> <?= Yii::$app->formatter->asCurrency(
    $model->total_cost
) ?><br>

<h1>
    <?= Yii::t('backend/order', 'Products') ?>
</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}',
    'columns' => [
        [
            'attribute' => 'image',
            'format' => 'html',
            'value' => function ($model) {
                /** @var $model common\models\Product */
                return Html::img(Url::to(
                    '/uploads/product/' . $model->id . '/main.jpg', true
                ), [
                    'width' => 80,
                ]);
            },
            'contentOptions' => [
                'style' => 'width: 15%',
            ],
        ],
        [
            'attribute' => 'name',
            'format' => 'html',
            'value' => function ($model) {
                return Html::a($model->name, Url::to([
                    'catalog/view',
                    'category' => $model->category->slug,
                    'slug' => $model->slug
                ], true));
            },
        ],
        'price:currency',
    ],
]) ?>