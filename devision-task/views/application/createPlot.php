<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create Plot';
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= $this->title ?></h1>
    <p>Please fill out the following fields to Create Plot:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'crops')->textInput() ?>
            <?= $form->field($model, 'area')->textInput(['type' => 'number', 'step' => 'any']) ?>
            <div class="form-group">
                <?= Html::submitButton('Create Plot', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>