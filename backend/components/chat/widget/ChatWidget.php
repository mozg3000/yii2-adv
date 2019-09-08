<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 07.09.2019
 * Time: 16:43
 */

namespace backend\components\chat\widget;


use yii\base\Widget;

class ChatWidget extends Widget
{
    public $directoryAsset;
    public function run()
    {
        return $this->render('index',['directoryAsset' => $this->directoryAsset]);
    }

}