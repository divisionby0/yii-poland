<?php

use yii\db\Migration;

class m160426_060435_create_gender extends Migration
{
    public function up()
    {
        $this->createTable('gender', [
            'id' => $this->primaryKey(),
            'gender_name' => $this->string(45)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('gender');
    }
}
