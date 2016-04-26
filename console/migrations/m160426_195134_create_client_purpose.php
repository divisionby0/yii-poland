<?php

use yii\db\Migration;

class m160426_195134_create_client_purpose extends Migration
{
    public function up()
    {
        // Create table
        $this->createTable('client_purpose', [
            'id' => $this->primaryKey(),
            'purpose_id' => $this->integer(6)->unsigned()->notNull(),
            'purpose' => $this->string(20)->notNull()
        ]);

        // Insert data
        $this->insert('client_purpose', [
            'purpose_id' => 1,
            'purpose' => 'Подача документів'
        ]);
        $this->insert('client_purpose', [
            'purpose_id' => 2,
            'purpose' => 'Консультація'
        ]);
    }

    public function down()
    {
        $this->dropTable('client_purpose');
    }
}
