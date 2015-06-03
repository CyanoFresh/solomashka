<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend/search', 'Search');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-index">
    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($searchModel, 'search')->textInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend/search', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <h2><?= Yii::t('frontend/search', 'Searching results:') ?></h2>
    <?= ListView::widget([
        'layout' => "{summary}<div class=\"row\">{items}</div>\n{pager}",
        'dataProvider' => $dataProvider,
        'itemView' => '/catalog/_product',
        'viewParams' => [
            'class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
        ],
        'summaryOptions' => [
            'class' => 'alert alert-info'
        ],
    ]) ?>
</div>
