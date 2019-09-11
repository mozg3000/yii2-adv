<?php

use yii\db\Migration;

/**
 * Class m190908_064657_init_activity_data
 */
class m190908_064657_init_activity_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('activity', ['title', 'user_id', 'startday', 'useNotification', 'email', 'description'],

            [

                ['activity 1', 1, date('Y-m-d'), 0, null, 'супер пупер активность 1'],

                ['activity 1', 1, date('Y-m-d'), 0, null, 'супер пупер активность 2'],

                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom', 'супер пупер активность 3'],

                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom', 'супер пупер активность 4'],

                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom', 'супер пупер активность 5']

            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190908_064657_init_activity_data cannot be reverted.\n";

        return false;
    }
    */
}
