<?php

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('backend/page', 'Update page: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/page', 'Update');
?>
<div class="page-update">

    <h1><?= $this->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
