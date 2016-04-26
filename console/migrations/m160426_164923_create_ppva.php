<?php

use yii\db\Migration;

class m160426_164923_create_ppva extends Migration
{
    public function up()
    {
        $this->createTable('ppva', [
            'id' => $this->primaryKey(),
            'ppva' => $this->string(65)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('gender');
    }
}
