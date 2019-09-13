<?php

/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 11:02
 */

/* @var $this \yii\web\View */
/* @var $model \backend\modules\profiles\models\ProfileCreateForm */
?>

<h2><?=Yii::t('app','Create ProfileCreateForm')?></h2>

<div class="row">
    <div class="col-md-12">
        <?php $form=\yii\bootstrap\ActiveForm::begin(['method'=>'POST'])?>
        <?=$form->field($model,'username')?>
        <?=$form->field($model,'email')?>
        <?=$form->field($model,'password')?>
        <?= \yii\helpers\Html::button('Создать профиль',['class'=>'btn btn-default', 'type'=>'submit'])?>
        <?php \yii\bootstrap\ActiveForm::end()?>
    </div>
</div>
