<?php

use yii\db\Migration;

/**
 * Class m190913_114506_UuidFieldCreation
 */
class m190913_114506_UuidFieldCreation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'uuid', $this->string()->defaultValue(null));
        $this->createIndex('UserUuid','user', 'uuid', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
        $this->dropIndex('UserUuid', 'user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190913_114506_UuidFieldCreation cannot be reverted.\n";

        return false;
    }
    */
}
