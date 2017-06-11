<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

?>

<?php
    echo ListView::widget([
        'dataProvider' => $data,
        'itemView'     => '_post',
        'summary'      => '', 
    ]);

?>