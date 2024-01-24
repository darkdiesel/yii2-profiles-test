<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_profile}}`.
 */
class m240124_151623_create_user_profile_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_profile}}', [
          'id' => $this->primaryKey(),

          'user_id' => $this->integer()->notNull(),

          'first_name'  => $this->string(255)->defaultValue(null),
          'last_name'   => $this->string(255)->defaultValue(null),
          'middle_name' => $this->string(255)->defaultValue(null),

          'birthday' => $this->date()->defaultValue(null),

          'profession' => $this->string(255)->defaultValue(null),

          'photo' => $this->string(255)->defaultValue(null),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
          'idx-user-profile-user_id',
          '{{%user_profile}}',
          'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
          'fk-user-profile-user_id',
          '{{%user_profile}}',
          'user_id',
          '{{%user}}',
          'id',
          'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
          'fk-user-profile-user_id',
          '{{%user_profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
          'idx-user-profile-user_id',
          '{{%user_profile}}'
        );

        $this->dropTable('{{%user_profile}}');
    }

}
