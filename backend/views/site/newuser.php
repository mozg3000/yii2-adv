<?php
$this->title = 'New user creation';
?>
<div class="row">
    <div class="col-md-6">
        <h2>
            Регистрация
        </h2>
        <?php
        $form = \yii\bootstrap\ActiveForm::begin();
        ?>
        <?=
        $form->field($model, 'email')
        ?>
        <?=
        $form->field($model, 'password')
        ?>
        <div class="form-group">
            <button class="btn btn-defaul" type="submit">
                Регистрация
            </button>
        </div>
        <?php
        $form = \yii\bootstrap\ActiveForm::end();
        ?>
    </div>
</div>
