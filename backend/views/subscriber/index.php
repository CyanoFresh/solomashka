<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubscriberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/subscriber', 'Subscribers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-index">

    <h1 class="page-header"><?= $this->title ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'date:datetime',
            'email:email',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>
