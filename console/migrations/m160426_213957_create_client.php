<?php

use yii\db\Migration;

class m160426_213957_create_client extends Migration
{
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'status_id' => $this->string(10)->notNull(),
            'birthdate' => $this->string(10)->notNull(),
            'purpose_id' => $this->integer(6)->notNull(),
            'email' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'ptn' => $this->string(14)->notNull(),
            'passport_num' => $this->string(10)->notNull(),
            'passport_expire' => $this->string(10)->notNull(),
            'back_date' => $this->string(10)->notNull(),
            'nationality_id' => $this->integer(6)->notNull(),
            'description' => $this->text(),
            'client_state_id' => $this->integer(11)->notNull()->defaultValue(1),
            'desired_date_start' => $this->string(10)->notNull(),
            'desired_date_end' => $this->string(10)->notNull(),
            'register_date' => $this->string(10)->notNull(),
            'register_time' => $this->string(5)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->createIndex(
            'idx-client-client_state_id',
            'client',
            'client_state_id'
        );

        $this->addForeignKey(
            'fk-client-client_state_id',
            'client',
            'client_state_id',
            'client_state',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-client-user_id',
            'client',
            'user_id'
        );

        $this->addForeignKey(
            'fk-client-user_id',
            'client',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-client-user_id',
            'client'
        );

        $this->dropIndex(
            'idx-client-user_id',
            'client'
        );

        $this->dropForeignKey(
            'fk-client-client_state_id',
            'client'
        );

        $this->dropIndex(
            'idx-client-client_state_id',
            'client'
        );

        $this->dropTable('client');
    }
}
