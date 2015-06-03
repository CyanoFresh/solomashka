<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%subscriber}}".
 *
 * @property integer $id
 * @property string $date
 * @property string $email
 * @property string $name
 */
class Subscriber extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscriber}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'unique', 'message' => Yii::t('frontend', 'This email is already subscribed')],
            ['email', 'email'],
            [['email', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/subscribe', 'ID'),
            'date' => Yii::t('common/subscribe', 'Date'),
            'email' => Yii::t('common/subscribe', 'Email'),
            'name' => Yii::t('common/subscribe', 'Name'),
        ];
    }
}
