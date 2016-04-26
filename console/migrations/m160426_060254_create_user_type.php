<?php

use yii\db\Migration;

class m160426_060254_create_user_type extends Migration
{
    public function up()
    {
        $this->createTable('user_type', [
            'id' => $this->primaryKey(),
            'user_type_name' => $this->string(45)->notNull(),
            'user_type_value' => $this->string(6)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('user_type');
    }
}
