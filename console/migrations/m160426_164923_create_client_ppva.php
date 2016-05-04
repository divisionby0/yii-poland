<?php

use yii\db\Migration;

class m160426_164923_create_client_ppva extends Migration
{
    public function up()
    {
        // Create table
        $this->createTable('client_ppva', [
            'id' => $this->primaryKey(),
            'ppva_id' => $this->integer(6)->unsigned()->notNull()->unique(),
            'ppva' => $this->string(65)->notNull(),
            'is_active' => $this->integer(1)->notNull()
        ]);

        // Insert data
        $this->insert('client_ppva', [
            'ppva_id' => 5,
            'ppva' => 'Польщі Івано-Франківськ'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 7,
            'ppva' => 'Польщі Львів'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 8,
            'ppva' => 'Польщі Тернопіль'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 9,
            'ppva' => 'Польщі Рівне'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 10,
            'ppva' => 'Польщі Луцьк'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 11,
            'ppva' => 'Польщі Дніпропетровськ'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 12,
            'ppva' => 'Польщі Харків'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 13,
            'ppva' => 'Польщі Київ'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 14,
            'ppva' => 'Польщі Одеса'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 15,
            'ppva' => 'Польщі Хмельницький'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 16,
            'ppva' => 'Польщі Житомир'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 17,
            'ppva' => 'Польщі Вінниця'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 19,
            'ppva' => 'Польщі Донецьк'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 20,
            'ppva' => 'Польщі Ужгород'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 21,
            'ppva' => 'Польщі Чернівці'
        ]);
        $this->insert('client_ppva', [
            'ppva_id' => 22,
            'ppva' => 'Польщі Луганськ'
        ]);
    }

    public function down()
    {
        $this->dropTable('ppva');
    }
}
