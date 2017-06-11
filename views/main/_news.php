<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="post">
    <div class="box row">
        <div class="image col-md-3">
            <?php
                if($model->image) {
                    echo Yii::$app->formatter->asImage('@web/img/news/' . $model->image, ['width' => 200]);
                } else {
                    echo Yii::$app->formatter->asImage('@web/img/news/basic.jpg');
                }
            ?>
        </div>
        <div class="text col-md-6">
            <p class="date">
                <?php  Yii::$app->formatter->locale = 'ru-RU'; ?>
                <?= Yii::$app->formatter->asDate($model->date, 'long')?>
            </p>
            <p class="title">
                <?= Html::a($model->title, Url::to('news/' . $model->id))?>
            </p>
        </div>
    </div>
</div>