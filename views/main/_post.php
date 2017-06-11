<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="post">
    <div class="box row">
        <div class="image col-md-2">
            <?php
                if($model->image) {
                    echo Yii::$app->formatter->asImage('@web/img/news/' . $model->image, ['width' => 150]);
                } else {
                    echo Yii::$app->formatter->asImage('@web/img/news/basic.jpg');
                }
            ?>
        </div>
        <div class="image col-md-8">
            <h1 class="title"><?= $model->title ?></h1>
            <p class="date">
                <?php  Yii::$app->formatter->locale = 'ru-RU'; ?>
                <?= Yii::$app->formatter->asDate($model->date, 'long')?>
            </p>
        </div>
    </div>
    <div class="text">
        <?= $model->text ?>
    </div>
</div>