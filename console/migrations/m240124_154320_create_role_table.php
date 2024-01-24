<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_roles}}`.
 */
class m240124_154320_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'name'  => $this->string(255)->notNull(),
            'label'   => $this->string(255)->notNull(),
            'description'   => $this->string(500)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
