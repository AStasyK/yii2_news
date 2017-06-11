<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
/* @var $form ActiveForm */
?>
<div class="main-signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-signup -->
