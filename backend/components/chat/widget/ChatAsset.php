<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 07.09.2019
 * Time: 16:55
 */

namespace backend\components\chat\widget;


use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $sourcePath = '@backend/components/chat/widget/source';
    public $js = [
        'js/chat.js'
    ];
}