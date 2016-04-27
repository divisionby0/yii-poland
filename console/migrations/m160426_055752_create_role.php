<?php

use yii\db\Migration;

class m160426_055752_create_role extends Migration
{
    public function up()
    {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(45)->notNull(),
            'role_value' => $this->integer(11)->notNull()
        ]);

        // Insert data
        $this->insert('client_state', [
            'role_name' => 'Администратор',
            'role_value' => '30',
        ]);
        $this->insert('client_state', [
            'role_name' => 'Пользователь',
            'role_value' => '10',
        ]);
    }

    public function down()
    {
        $this->dropTable('role');
    }
}
