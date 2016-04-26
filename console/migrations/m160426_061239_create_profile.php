<?php

use yii\db\Migration;

class m160426_061239_create_profile extends Migration
{
    public function up()
    {
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

//        $this->createIndex(
//            'idx-profile-gender_id',
//            'profile',
//            'gender_id'
//        );
//
//        $this->addForeignKey(
//            'fk-profile-gender_id',
//            'profile',
//            'gender_id',
//            'gender',
//            'id',
//            'CASCADE'
//        );
    }

    public function down()
    {
//        // drops foreign key for table `user`
//        $this->dropForeignKey(
//            'fk-profile-gender_id',
//            'profile'
//        );
//
//        // drops index for column `author_id`
//        $this->dropIndex(
//            'idx-profile-gender_id',
//            'profile'
//        );

        $this->dropTable('profile');
    }
}
