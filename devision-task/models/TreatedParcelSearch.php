<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.3.2018 г.
 * Time: 21:31
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class TreatedParcelSearch extends PlotTractor
{
    public $tractorName;
    public $plotName;
    public $plotCrops;

    public function rules()
    {
        return [
            [['tractor_id, plot_id', 'id', 'date', 'crops', 'tractorName', 'plotName', 'plotCrops'], 'safe'],
            [['area'], 'number']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PlotTractor::find()
            ->joinWith('tractor')
            ->joinWith('plot');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['tractorName'] = [
            'asc' => ['tractors.name' => SORT_ASC],
            'desc' => ['tractors.name' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['plotName'] = [
            'asc' => ['plots.name' => SORT_ASC],
            'desc' => ['plots.name' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['plotCrops'] = [
            'asc' => ['plots.crops' => SORT_ASC],
            'desc' => ['plots.crops' => SORT_DESC]
        ];

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'plot_tractor.date' => $this->date,
            'plot_tractor.area' => $this->area,
        ]);

        $query->andFilterWhere(['like', 'tractors.name', $this->tractorName])
            ->andFilterWhere(['like', 'plots.name', $this->plotName])
            ->andFilterWhere(['like', 'plots.crops', $this->plotCrops]);

        return $dataProvider;
    }

    public function getTotalArea($provider)
    {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item['area'];
        }

        return $total;
    }
}