<?php

use yii\db\Migration;

class m160502_081126_create_client_has_ppva extends Migration
{
    public function up()
    {
        $this->createTable('client_has_ppva', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('client_has_ppva');
    }
}
