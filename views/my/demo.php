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

<?php if(Yii::$app->session->hasFlash('error')):?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo Yii::$app->session->getFlash('error');?>
</div>
	<?php endif;?>


<?php $form=ActiveForm::begin(['options'=>['class'=>'add']]);?>
<?= $form->field($modelIn, 'date')->input('date', ['value'=>date('Y-m-d')]);?>
<?= $form->field($modelIn, 'value');?>
<?= $form->field($modelIn, 'opt')->dropDownList(['1'=>'Приход', '0'=>'Расход']);?>
<?= Html::submitButton('Записать', ['class'=>'btn btn-success', 'id' => 'add']);?>
<?php ActiveForm::end();?>

<!--  -->

<?php $form=ActiveForm::begin(['options'=>['class'=>'period']]);?>
<?= $form->field($modelOut, 'dateFrom')->input('date', ['value'=>date('Y-m').'-01']);?>
<?= $form->field($modelOut, 'dateTo')->input('date', ['value'=>date('Y-m-d')]);?>
<?= $form->field($modelOut, 'opt')->dropDownList(['all'=>'Все операции', '1'=>'По приходам', '0'=>'По расходам']);?>
<div id='period' class='btn btn-success'>Посмотреть</div><?php ActiveForm::end();?>



<?php $form=ActiveForm::begin(['options'=>['class'=>'total']]);?>
<?= $form->field($modelOut, 'dateFrom')->input('dateFrom', ['type'=>'date', 'value'=>date('Y').'-01-01']);?>
<?= $form->field($modelOut, 'dateTo')->input('dateTo', ['type'=>'date', 'value'=>date('Y-m-d')]);?>
<?= $form->field($modelOut, 'opt')->dropDownList(['all'=>'Все операции', '1'=>'По приходам', '0'=>'По расходам']);?>
<div id='total' class='btn btn-success'>Итого</div>
<?php ActiveForm::end();?>

<p class="result" id="result"></p>

<div class="table-container">
<table class="table table-hover">
	<thead>
		<tr>
			<th>Дата</th>
			<th>Сумма</th>
			<th>Опция</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</div>

<?php 


$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);

?>

