<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create Tractor';
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= $this->title ?></h1>
    <p>Please fill out the following fields to Create Tractor:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Create Tractor', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>