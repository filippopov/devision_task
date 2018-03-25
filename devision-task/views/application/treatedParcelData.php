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
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'plotName',
            'plotCrops',
            'tractorName',
            'date',
            [
                'attribute' => 'area',
                'footer' => 'Sum Area: ' . $areaSum
            ]
        ],
    ]); ?>
</div>