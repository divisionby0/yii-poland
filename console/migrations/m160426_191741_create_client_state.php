<?php

use yii\db\Migration;

class m160426_191741_create_client_state extends Migration
{
    public function up()
    {
        // Create table
        $this->createTable('client_state', [
            'id' => $this->primaryKey(),
            'client_state' => $this->string(20)->notNull()
        ]);

        // Insert data
        $this->insert('client_state', [
            'id' => 1,
            'client_state' => 'Ожидает записи'
        ]);
        $this->insert('client_state', [
            'id' => 2,
            'client_state' => 'В работе'
        ]);
        $this->insert('client_state', [
            'id' => 3,
            'client_state' => 'Нерабочий PTN'
        ]);
        $this->insert('client_state', [
            'id' => 4,
            'client_state' => 'Записан'
        ]);
        $this->insert('client_state', [
            'id' => 5,
            'client_state' => 'Удален'
        ]);
    }

    public function down()
    {
        $this->dropTable('client_state');
    }
}
