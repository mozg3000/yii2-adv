<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $startday
 * @property string $deadline
 * @property int $isBlocked
 * @property string $email
 * @property int $useNotification
 * @property string $createAt
 * @property int $user_id
 *
 * @property User $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'startday', 'user_id'], 'required'],
            [['description'], 'string'],
            [['startday', 'deadline', 'createAt'], 'safe'],
            [['isBlocked', 'useNotification', 'user_id'], 'integer'],
            [['title', 'email'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'startday' => Yii::t('app', 'Startday'),
            'deadline' => Yii::t('app', 'Deadline'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'email' => Yii::t('app', 'Email'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'createAt' => Yii::t('app', 'Create At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityQuery(get_called_class());
    }
}
