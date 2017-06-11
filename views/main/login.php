<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
?>
<div class="main-login">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Авторизация', ['class' => 'btn btn-primary']) ?>
            <p> Нет учётной записи? 
                <a href="<?= Yii::$app->homeUrl ?>main/signup">Зарегистрируйтесь</a>
            </p>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-login -->
