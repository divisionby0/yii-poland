<?php

use yii\db\Migration;

class m160426_055929_create_status extends Migration
{
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string(45)->notNull(),
            'status_value' => $this->string(6)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('status');
    }
}
