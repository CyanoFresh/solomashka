<?php

namespace frontend\widgets;

use common\models\Subscriber;
use kartik\form\ActiveForm;
use Yii;
use yii\base\Widget;
use yii\bootstrap\Alert as BootstrapAlert;
use yii\helpers\Html;

/**
 * Class Form
 *
 * Widget for displaying subscription form
 *
 * @package frontend\widgets
 * @author Alex Solomaha <cyanofresh@gmail.com>
 */
class Form extends Widget
{
    /**
     * Main action
     */
    public function run()
    {
        $model = new Subscriber();

        if (Yii::$app->session->get('subscribed') == null) {
            $this->renderSubscribeForm($model);
        } else {
            $this->renderMessage(Yii::$app->session->get('subscribed'));
        }
    }

    /**
     * @param $model Subscriber
     */
    public function renderSubscribeForm($model)
    {
        $form = ActiveForm::begin([
            'id' => 'subscribe-form',
            'action' => ['site/subscribe'],
        ]);

        echo $form->field($model, 'email')->input('email');

        echo Html::submitButton(Yii::t('frontend', 'Subscribe'), [
            'class' => 'btn btn-primary btn-block',
        ]);

        ActiveForm::end();
    }

    /**
     * @param $message string
     * @throws \Exception
     */
    public function renderMessage($message)
    {
        echo BootstrapAlert::widget([
            'body' => $message,
            'closeButton' => false,
            'options' => [
                'class' => 'alert-success',
            ],
        ]);
    }
}