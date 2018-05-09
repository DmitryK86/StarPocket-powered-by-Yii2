<?php

use yii\helpers\Html;

/**
 * @var $user app\models\User
 */
?>
<?php $user = Yii::$app->user; ?>

<h1>Приветсвую тебя, <?= $user->isGuest ? 'гость' : $user->identity->getUserName();?>!</h1>
<?php if ($user->isGuest): ?>
<p><?= Html::a('Войди', ['my/login']);?> или <?= Html::a('зарегистрируйся', ['my/register']);?>, чтобы получить все преимущества Star Pocket&#174;</p>
<p>Если ты еще знаешь что это, пробуй <?=Html::a('демо', ['my/demo']);?>.</p>
<?php else:?>
<p><?= Html::a('Воспользоваться', ['my/real']);?></p>
<?php endif; ?>

