<?php

use yii\db\Migration;
use yii\db\Schema;

class m150603_195415_create_subscribers_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscriber}}', [
            'id' => Schema::TYPE_PK,
            'date' => Schema::TYPE_DATETIME,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%subscriber}}');
    }
}
