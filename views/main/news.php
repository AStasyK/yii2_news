<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
?>

<h1>Актуальные новости</h1>

<?php
    echo ListView::widget([
        'dataProvider' => $data,
        'itemView'     => '_news',
        'pager' => [
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
            'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
            'maxButtonCount' => 3,
        ],
    ]);

?>