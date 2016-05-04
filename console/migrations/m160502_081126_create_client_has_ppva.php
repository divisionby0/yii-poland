<?php

use yii\db\Migration;

class m160502_081126_create_client_has_ppva extends Migration
{
    public function up()
    {
        $this->createTable('client_has_ppva', [
            'client_id' => $this->integer(11)->notNull(),
            'ppva_id' => $this->integer(11)->unsigned()->notNull()
        ]);

        $this->addPrimaryKey(
            'pk-client_id-ppva_id',
            'client_has_ppva',
            ['client_id', 'ppva_id']
        );

        $this->createIndex(
            'idx-has-ppva-client_id',
            'client_has_ppva',
            'client_id'
        );

        $this->addForeignKey(
            'fk-has-ppva-client_id',
            'client_has_ppva',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-has-ppva-ppva_id',
            'client_has_ppva',
            'ppva_id'
        );

        $this->addForeignKey(
            'fk-has-ppva-ppva_id',
            'client_has_ppva',
            'ppva_id',
            'client_ppva',
            'ppva_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-has-ppva-ppva_id',
            'client_has_ppva'
        );

        $this->dropIndex(
            'idx-has-ppva-ppva_id',
            'client_has_ppva'
        );

        $this->dropForeignKey(
            'fk-has-ppva-client_id',
            'client_has_ppva'
        );

        $this->dropIndex(
            'idx-has-ppva-client_id',
            'client_has_ppva'
        );

        $this->dropPrimaryKey(
            'pk-client_id-ppva_id',
            'client_has_ppva'
        );

        $this->dropTable('client_has_ppva');
    }
}
