<?php

use yii\db\Migration;
use yii\db\Schema;

class m150601_202439_create_page_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page}}', [
            'id' => Schema::TYPE_PK,
            'menu' => Schema::TYPE_INTEGER . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'body' => Schema::TYPE_TEXT,
            'meta_description' => Schema::TYPE_STRING . ' NOT NULL',
            'meta_keywords' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
