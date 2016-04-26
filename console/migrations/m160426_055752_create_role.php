<?php

use yii\db\Migration;

class m160426_055752_create_role extends Migration
{
    public function up()
    {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(45)->notNull(),
            'role_value' => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('role');
    }
}
