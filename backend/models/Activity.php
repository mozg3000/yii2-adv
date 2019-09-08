<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 08.09.2019
 * Time: 20:11
 */

namespace backend\models;


use common\models\ActivityBase;

class Activity extends ActivityBase
{
    public function fields()
    {
        return [
          'id',
          'title',
          'description',
          'startday'=>function($model){
            return \Yii::$app->formatter->asDate($model->startday,'php:d.m.Y');
          },
          'deadline',
          'email',
          'fulldescription'=>function($model){
            return $model->title.' '.$model->description;
          }
        ];
    }
    public function extraFields()
    {
        return [
            'user'=>function($model){
                return $model->user;
            }
        ];
    }
}