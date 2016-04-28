<?php

use yii\db\Migration;

class m160426_055929_create_status extends Migration
{
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string(45)->notNull(),
            'status_value' => $this->integer(6)->notNull()
        ]);

        // Insert data
        $this->insert('status', [
            'status_value' => 1,
            'status_name' => 'Blacklisted'
        ]);
        $this->insert('status', [
            'status_value' => 5,
            'status_name' => 'Pending'
        ]);
        $this->insert('status', [
            'status_value' => 10,
            'status_name' => 'Active'
        ]);
    }

    public function down()
    {
        $this->dropTable('status');
    }
}
