<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\Carousel;
use yii\widgets\Breadcrumbs;

appAsset::register($this);

?>
<!-- Page hook-->
<?= $this->beginPage() ?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
        <title><?= Yii::$app->name ?></title>
		
		<!-- Head hook-->
		<?= $this->head() ?>
    </head>
    <body>
	<!-- Body hook-->
	<?= $this->beginBody() ?>
	

<!--Navigation bar-->
<?php
    #до nav widget
    $menu = [
        ['label' => 'Главная', 'url' => ['/main/index']],
        ['label' => 'О нас', 'url' => ['/main/about']],
        ['label' => 'Лента новостей', 'url' => ['/main/news/']],
        ['label' => 'Контакты', 'url' => ['#'],
			 'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#contacts']],
    ];

    if (Yii::$app->user->isGuest) {
        $menu[] = ['label' => 'Авторизация', 'url' => ['/main/login']];
    } else {
        $menu[] = ['label' => Yii::$app->user->identity->first_name, 'url' => ['/main/profile']];
        $menu[] = ['label' => 'Выход', 'url' => ['/main/logout'], /*'linkOptions' => ['data-method' => 'post']*/];
    }

	NavBar::begin([
        'brandLabel' => 'MySite',
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class'  => 'navbar navbar-default navbar-custom navbar-fixed-top',
        ],
		]);
	echo Nav::widget([
		'items' => $menu,
		'options' => ['class' => 'navbar-nav navbar-right'],
	]);
	NavBar::end();

	
	Modal::begin([
		'header' => '<h2>Contacts</h2>',
		'id' => 'contacts',
	]);

	echo '<p>Phone: 345-34-45</p>';
    echo '<p>Email: email@rmail.com</p>';
    echo '<p>Fax: 234-23-34</p>';
    echo '<p>Address: Saint-Petersburg, Street, 5, 5</p>';

	Modal::end();

    
?>
        <header class="intro-header">
        <?php
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    [
                        'content' => '<img src="' . Yii::$app->homeUrl . 'img/cosmos1.jpg"/>',
                        'caption' => '<h4>Blog</h4><p>Best articles</p>',
                    ],                // equivalent to the above
                      [
                        'content' => '<img src="' . Yii::$app->homeUrl . 'img/cosmos2.jpg"/>',
                        'caption' => '<h4>Blog</h4><p>Best articles</p>',
                    ],                // the item contains both the image and the caption
                    [
                        'content' => '<img src="' . Yii::$app->homeUrl . 'img/cosmos3.jpg"/>',
                        'caption' => '<h4>Blog</h4><p>Best articles</p>',
                    ],
                ],
                'options' => ['data-interval' => '5000' /*можно указать класс*/],
                'controls' => [
                    '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
            ]
            ]);
        ?>
		</header>

		<main>
			<div class="container">
				<!-- Main Content -->
				<?= $content ?>
			</div>
		</main>
		<footer class="footer">
			<div class="container">
				<p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
			</div>
		</footer>
		<?= $this->endBody() ?>
    </body>
</html>
<?= $this->endPage() ?>