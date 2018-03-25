<?php
use yii\helpers\Html;

$this->title = 'application';
$this->params['breadcrumbs'][] = $this->title;
$messageKeys = [
    'createTractor',
    'createPlot',
    'plotTractorData'
];
?>

<?php foreach ($messageKeys as $value) : ?>
    <?php if (Yii::$app->FlashMessage->isSetMessage($value)): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i><?php echo Yii::$app->FlashMessage->getMessage($value);?></h4>
        </div>
    <?php endif; ?>
<?php endforeach ?>

<div class="container">
    <div class="row">
        <?= Html::a('Create Tractor', ['application/createTractor'], ['class' => 'profile-link']) ?>
        <br>
        <?= Html::a('Create Plot', ['application/createPlot'], ['class' => 'profile-link']) ?>
        <br>
        <?= Html::a('Treated Parcel', ['application/treatedParcel'], ['class' => 'profile-link']) ?>
        <br>
        <?= Html::a('Treated Parcel Data', ['application/treatedParcelData'], ['class' => 'profile-link']) ?>
    </div>
</div>