<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $class */
?>
<div class="<?= $class ?>">
    <div class="panel panel-default panel-product">
        <div class="panel-image">
            <?= Html::a(Html::img($model->mainImage, [
                'class' => 'img-responsive',
            ]), [
                'catalog/view',
                'category' => $model->category->slug,
                'slug' => $model->slug
            ], [
                'class' => 'no-link',
            ]) ?>

            <?php if ($model->status_id): ?>
                <div class="promotion">
                    <span class="status"
                          style="color: <?= $model->status->color ?>;
                              background: <?= $model->status->background ?>">
                        <?= $model->status->name ?>
                    </span>
                </div>
            <?php endif ?>
        </div>
        <div class="panel-body">
            <h4>
                <?= Html::a(Html::encode($model->name), [
                    'catalog/view',
                    'slug' => $model->slug,
                    'category' => $model->category->slug,
                ], [
                    'class' => 'no-link'
                ]) ?>
            </h4>

            <p class="text-muted">
                <?= Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug], [
                    'class' => 'category-link',
                ]) ?>
            </p>

            <p><b><?= Yii::$app->formatter->asCurrency($model->price) ?></b></p>

            <?= Html::a(Yii::t('frontend/catalog', 'View'),
                ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug], [
                    'class' => 'btn btn-primary',
                ]) ?>
        </div>
    </div>
</div>