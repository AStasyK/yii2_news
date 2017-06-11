<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>
		</div>
	</div>
	<hr>
	<div class="row">
<?php
    use yii\bootstrap\Carousel;
	echo Carousel::widget([
		'items' => [
			// the item contains only the image
			[
				'content' => '<img src="' . Yii::$app->homeUrl . 'img/2.jpg"/>',
				'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
			],
			// equivalent to the above
			[
				'content' => '<img src="' . Yii::$app->homeUrl . 'img/3.jpg"/>',
				'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
			],
			// the item contains both the image and the caption
			[
				'content' => '<img src="' . Yii::$app->homeUrl . 'img/4.jpg"/>',
				'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
				//'options' => [...],
			],
		]
	]);
?>
	</div
	
	
</div>
