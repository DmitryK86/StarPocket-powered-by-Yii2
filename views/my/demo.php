<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
?>

<h1>Это демо версия</h1>
<p>Все что ты здесь сделаешь не сохранится.</p>
<p>Чтобы воспользоватся полной версией, <?= Html::a('войди или зарегистрируйся', ['my/login']);?></p>

<ul class="nav nav-tabs">
  <li role="presentation"><a href="#" class="type" id="add">Добавить операцию</a></li>
  <li role="presentation"><a href="#" class="type" id="period">Операции за период</a></li>
  <li role="presentation"><a href="#" class="type" id="total">Итого</a></li>
</ul>

<?php if(Yii::$app->session->hasFlash('success')):?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo Yii::$app->session->getFlash('success');?>
</div>
	<?php endif;?>


<?php $form=ActiveForm::begin(['options'=>['class'=>'add']]);?>
<?= $form->field($model, 'date')->input('date', ['value'=>date('Y-m-d')]);?>
<?= $form->field($model, 'value');?>
<?= $form->field($model, 'option')->dropDownList(['incoming'=>'Приход', 'expence'=>'Расход']);?>
<?= Html::submitButton('Записать', ['class'=>'btn btn-success']);?>
<?php ActiveForm::end();?>

<!--  -->

<?php $form=ActiveForm::begin(['options'=>['class'=>'period']]);?>
<?= $form->field($model, 'dateFrom')->input('date', ['value'=>date('Y-m').'-01']);?>
<?= $form->field($model, 'dateTo')->input('date', ['value'=>date('Y-m-d')]);?>
<?= $form->field($model, 'option')->dropDownList(['all'=>'Все операции', 'incoming'=>'По приходам', 'expence'=>'По расходам']);?>
<?= Html::submitButton('Получить', ['class'=>'btn btn-success']);?>
<?php ActiveForm::end();?>

<!-- -->

<?php $form=ActiveForm::begin(['options'=>['class'=>'total']]);?>
<?= $form->field($model, 'dateFrom')->input('dateFrom', ['type'=>'date', 'value'=>date('Y').'-01-01']);?>
<?= $form->field($model, 'dateTo')->input('dateTo', ['type'=>'date', 'value'=>date('Y-m-d')]);?>
<?= $form->field($model, 'option')->dropDownList(['all'=>'Все операции', '+'=>'По приходам', '-'=>'По расходам']);?>
<?= Html::submitButton('Итого', ['class'=>'btn btn-success']);?>
<?php ActiveForm::end();?>



<?php 


$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);

?>

