<?php

use yii\db\Migration;

/**
 * Class m190908_061738_init_activity_alter
 */
class m190908_061738_init_activity_alter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','user_id', $this->integer()->notNull());

        $this->addForeignKey('activityUserFK','activity', 'user_id',

            'user', 'id', 'CASCADE', 'CASCADE') ;

        $this->createIndex('emailUserInd','user', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','user_id');

        $this->dropForeignKey('activityUserFK', 'activity');

        $this->dropIndex('emailUserInd', 'users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190908_061738_init_activity_alter cannot be reverted.\n";

        return false;
    }
    */
}
