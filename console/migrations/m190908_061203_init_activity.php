<?php

use yii\db\Migration;

/**
 * Class m190908_061203_init_activity
 */
class m190908_061203_init_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [

            'id'=>$this->primaryKey(),

            'title'=>$this->string(150)->notNull(),

            'description'=>$this->text(),

            'startday'=>$this->date()->notNull(),

            'deadline'=>$this->date(),

            'isBlocked'=>$this->tinyInteger()->notNull()->defaultValue(0),

            'email'=>$this->string(150),

            'useNotification'=>$this->tinyInteger()->notNull()->defaultValue(0),

            'createAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190908_061203_init_activity cannot be reverted.\n";

        return false;
    }
    */
}
