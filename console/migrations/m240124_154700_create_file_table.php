<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m240124_154700_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),

            'label'  => $this->string(255)->notNull(),
            'uri'  => $this->string(255)->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
          'idx-file-user_id',
          '{{%file}}',
          'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
          'fk-file-user_id',
          '{{%file}}',
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
          'fk-file-user_id',
          '{{%file}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
          'idx-file-user_id',
          '{{%file}}'
        );

        $this->dropTable('{{%file}}');
    }
}
