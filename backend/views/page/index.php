<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1 class="page-header">
        <?= $this->title ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'],
            ['class' => 'btn btn-success pull-right']) ?>
    </h1>

    <?= $this->render('_search', [
        'model' => $searchModel
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'columns' => [
            'id',
            'name',
            'slug',
            [
                'attribute' => 'menu',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->menu ? Yii::t('backend/page', 'Yes') : Yii::t('backend/page', 'No');
                }
            ],
            // 'body:ntext',
            // 'meta_description',
            // 'meta_keywords',

            ['class' => 'common\components\ActionButtonGroupColumn'],
        ],
    ]); ?>

</div>
