<?php

use yii\db\Migration;

/**
 * Class m190826_103236_first_user_init
 */
class m190826_103236_first_user_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username = 'admin';
        $user->password_hash = Yii::$app->security->generatePasswordHash('123456');
        $user->auth_key = 'sdd';
        $user->email = 'luka@cora.ru';
        $user->status = \common\models\User::STATUS_ACTIVE;

        if(!$user->save()){

            return false;
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190826_103236_first_user_init cannot be reverted.\n";

        return false;
    }
    */
}
