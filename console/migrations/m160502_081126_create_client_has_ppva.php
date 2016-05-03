<?php

use yii\db\Migration;

class m160502_081126_create_client_has_ppva extends Migration
{
    public function up()
    {
        $this->createTable('client_has_ppva', [
            'client_id' => $this->integer(11)->notNull(),
            'ppva_id' => $this->integer(11)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('client_has_ppva');
    }
}
