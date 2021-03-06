<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
		$items = [
				['label' => 'Home', 'url' => ['/home/index']],
				// ['label' => 'About', 'url' => ['/home/about']],
				// ['label' => 'Contact', 'url' => ['/home/contact']],
		];
		if(Yii::$app->user->isGuest):
		$items[] = ['label' => 'Login', 'url' => ['/user/security/login']];
		$items[] = ['label' => 'Register', 'url' => ['/user/registration/register']];
		else:
		$items[] = ['label' => 'Dashboard', 'url' => ['/dashboard/index']];
		$items[] = ['label' => 'Profile', 'url' => ['/user/settings/profile']];
		$items[] = ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
							'url' => ['/user/security/logout'],
							'linkOptions' => ['data-method' => 'post']];
		endif;
            NavBar::begin([
                'brandLabel' => 'We Make WP',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <a href="<?= Yii::$app->homeUrl?>">We Make WP</a> <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
