<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property integer $id
 * @property integer $menu
 * @property string $slug
 * @property string $name
 * @property string $body
 * @property string $meta_description
 * @property string $meta_keywords
 */
class Page extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => Slug::className(),
                'attribute' => ['name'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu', 'name', 'body'], 'required'],
            [['menu'], 'integer'],
            [['body'], 'string'],
            [['slug', 'name', 'meta_description', 'meta_keywords'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/page', 'ID'),
            'menu' => Yii::t('common/page', 'Show in menu'),
            'slug' => Yii::t('common/page', 'URL'),
            'name' => Yii::t('common/page', 'Name'),
            'body' => Yii::t('common/page', 'Body'),
            'meta_description' => Yii::t('common/page', 'Meta Description'),
            'meta_keywords' => Yii::t('common/page', 'Meta Keywords'),
        ];
    }
}
