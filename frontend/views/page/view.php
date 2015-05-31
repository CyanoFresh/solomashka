<?php
/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

// Meta tags
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
?>
<div class="page-view">
    <h1 class="page-header"><?= $this->title ?></h1>

    <div class="page-body">
        <?= $model->body ?>
    </div>
</div>