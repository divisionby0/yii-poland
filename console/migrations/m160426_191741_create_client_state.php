<?php

use yii\db\Migration;

class m160426_191741_create_client_state extends Migration
{
    public function up()
    {
        // Create table
        $this->createTable('client_state', [
            'id' => $this->primaryKey(),
            'order_state' => $this->string(20)->notNull()
        ]);

        // Insert data
        $this->insert('client_state', [
            'order_state' => 'Ожидает записи'
        ]);
        $this->insert('client_state', [
            'order_state' => 'В работе'
        ]);
        $this->insert('client_state', [
            'order_state' => 'Нерабочий PTN'
        ]);
        $this->insert('client_state', [
            'order_state' => 'Записан'
        ]);
    }

    public function down()
    {
        $this->dropTable('client_state');
    }
}
