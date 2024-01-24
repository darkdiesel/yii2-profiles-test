<?php

use yii\db\Migration;

/**
 * Class m240124_155732_add_last_auth_date_column_to_user_table
 */
class m240124_155732_add_last_auth_date_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'last_auth_date', $this->date()->defaultValue(null)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'last_auth_date');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240124_155732_add_role_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
