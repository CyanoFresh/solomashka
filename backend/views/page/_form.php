<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use vova07\imperavi\Widget as Imperavi;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(Imperavi::className(), [
        'settings' => [
            'minHeight' => 200,
            'plugins' => [
                'table',
                'video',
                'fontsize',
                'fontfamily',
                'fontcolor',
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'menu')->widget(SwitchInput::className(), [
        'pluginOptions' => [
            'onText' => Yii::t('backend/page', 'Yes'),
            'offText' => Yii::t('backend/page', 'No'),
        ]
    ]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend/page', 'Create') : Yii::t('backend/page',
            'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
