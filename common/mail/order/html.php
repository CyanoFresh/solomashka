<?php
/* @var $this yii\web\View */
$this->render('@backend/views/order/view.php', [
    'model' => $model,
    'dataProvider' => $dataProvider,
]);