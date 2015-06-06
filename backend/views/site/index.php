<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categoryModel common\models\Category */
/* @var $productModel common\models\Product */

$this->title = Yii::t('yii', 'Home');
?>

<h1 class="page-header">
    <?= Yii::t('backend/site', 'New Orders') ?>
    <?= Html::a(
        Yii::t('backend/site', 'All Orders'),
        ['order/index'],
        ['class' => 'btn btn-primary pull-right']
    ) ?>
</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summaryOptions' => ['class' => 'alert alert-info'],
    'rowOptions' => function ($model) {
        /** @var $model common\models\Order */
        if ($model->status === Order::STATUS_NEW) {
            return ['class' => 'success'];
        } elseif ($model->status === Order::STATUS_REVIEWED) {
            return ['class' => 'info'];
        }

        return ['class' => 'active'];
    },
    'columns' => [
        'id',
        'name',
        'total_cost:currency',
        'date:datetime',
        [
            'attribute' => 'status',
            'value' => function ($model) {
                /** @var $model common\models\Order */
                return $model->getStatusLabel($model->status);
            }
        ],
        // 'email:email',
        // 'phone',
        // 'message:ntext',

        [
            'class' => 'common\components\ActionButtonGroupColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                        ['order/view', 'id' => $model->id], [
                            'class' => 'btn btn-xs btn-primary'
                        ]);
                },
            ],
        ],
    ],
]) ?>