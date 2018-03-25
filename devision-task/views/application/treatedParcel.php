<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

$this->title = 'Treated Parcel';
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'plotId')->label('Plot Data')->dropDownList($allPlots, ['prompt' => '-- Please select --']) ?>
            <?= $form->field($model, 'tractorId')->label('Tractor name')->dropDownList($allTractors, ['prompt' => '-- Please select --']) ?>
            <?= $form->field($model, 'area')->textInput(['type' => 'number', 'step' => 'any']) ?>
            <?= '<label>Start Date/Time</label>'; ?>
                <?= DateTimePicker::widget([
                    'name' => 'TreatedParcelForm[date]',
                    'id' => 'treatedparcelform-date',
                    'options' => ['placeholder' => 'Select date'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy hh:ii',
                        'autoclose'=>true,
                    ]
                ]); ?>
            <br>
            <div class="form-group">
                <?= Html::submitButton('Add Data', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>