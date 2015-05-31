<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
        <div class="btn-group pull-right">
            <?= Html::a(
                '<span class="glyphicon glyphicon-eye-open"></span>',
                Yii::$app->urlManagerFrontEnd->createUrl(['page/view', 'slug' => $model->slug]),
                [
                    'class' => 'btn btn-success',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('backend/page', 'View on site'),
                ]
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span>',
                ['update', 'id' => $model->id],
                [
                    'class' => 'btn btn-primary',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('backend/page', 'Update'),
                ]
            ) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'title' => Yii::t('backend/page', 'Delete'),
                'data' => [
                    'toggle' => 'tooltip',
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'menu',
                'fromat' => 'html',
                'value' => $model->menu ? Yii::t('backend/page', 'Yes') : Yii::t('backend/page', 'No'),
            ],
            'slug',
            'name',
            'body:html',
            'meta_description',
            'meta_keywords',
        ],
    ]) ?>

</div>
