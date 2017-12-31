<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<div class="navbar-brand">Star Pocket</div>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><?= Html::a('Главная', ['my/index']);?></li>
				<li><?= Html::a('Пробовать демо', ['my/demo']);?></li>
                <?php if (Yii::$app->user->isGuest):?>
				<li><?= Html::a('Вход', ['my/login']);?></li>
				<li><?= Html::a('Регистрация', ['my/register']);?></li>
                <?php else:?>
                <li><?= Html::a('Выход', ['my/logout']);?></li>
                <?php endif; ?>
			</ul>
		</div>
	</nav>

<div class="wrap">
	<div class="container">
		

		<?= $content ?>		
		
	</div>
</div>


	
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>