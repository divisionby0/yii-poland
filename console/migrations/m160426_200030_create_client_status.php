<?php

use yii\db\Migration;

class m160426_200030_create_client_status extends Migration
{
    public function up()
    {
        // Create table
        $this->createTable('client_status', [
            'id' => $this->primaryKey(),
            'status_id' => $this->string(10)->notNull(),
            'status' => $this->string(10)->notNull()
        ]);

        // Insert data
        $this->insert('client_status', [
            'status_id' => 'Dr.',
            'status' => 'Dr.'
        ]);
        $this->insert('client_status', [
            'status_id' => 'Mr.',
            'status' => 'Mr.'
        ]);
        $this->insert('client_status', [
            'status_id' => 'Mrs.',
            'status' => 'Mrs.'
        ]);
        $this->insert('client_status', [
            'status_id' => 'Ms.',
            'status' => 'Ms.'
        ]);
        $this->insert('client_status', [
            'status_id' => 'Mstr.',
            'status' => 'Mstr.'
        ]);
    }

    public function down()
    {
        $this->dropTable('client_status');
    }
}
