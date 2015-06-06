<?php
namespace frontend\controllers;

use common\models\Product;
use common\models\Subscriber;
use Yii;
use yii\bootstrap\Alert;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'fullwide';
        $dataProvider = new ArrayDataProvider([
            'allModels' => Product::find()->limit(8)->orderBy('date DESC')->all()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Handle Subscribe Form via Ajax
     *
     * @return array|Response json result
     */
    public function actionSubscribe()
    {
        $model = new Subscriber();
        $model->date = date('Y-m-d H:i');

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
            if ($model->validate() && $model->save()) {
                $msg =
                    Yii::t('frontend', 'You have successfully subscribed to our updates and news!');

                $type = 'success';

                Yii::$app->session->set('subscribed', $msg);
            } else {
                $msg =
                    Yii::t('frontend', 'This email is already subscribed');

                $type = 'danger';
            }

            Yii::$app->response->format = Response::FORMAT_JSON;

            $body = Alert::widget([
                'body' => $msg,
                'options' => ['class' => 'alert-' . $type]
            ]);

            return [
                'body' => $body,
                'type' => $type,
            ];
        }

        return $this->redirect(['site/index']);
    }
}
