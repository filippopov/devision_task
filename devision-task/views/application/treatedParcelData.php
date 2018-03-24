<?php

use yii\grid\GridView;

$this->title = 'Treated Parcel Data';
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plot-index">
    <h1><?= $this->title ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Plot Name',
                'attribute' => 'plot_id',
                'value' => 'plot.name'
            ],
            [
                'label' => 'Tractor Name',
                'attribute' => 'tractor_id',
                'value' => 'tractor.name'
            ],
            [
                'label' => 'Crops',
                'attribute' => 'plot_id',
                'value' => 'plot.crops'
            ],
            'area',
            'date',
        ],
    ]); ?>
</div>