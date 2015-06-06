<?php

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
               aria-controls="collapseOne">
                <?= Yii::t('backend/page', 'Search Pages') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="page-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'slug') ?>

                <?= $form->field($model, 'menu')->widget(SwitchInput::className()) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend/page', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend/page', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

