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
use yii\db\Query;

class TreatedParcelSearch extends PlotTractor
{
    public function rules()
    {
        return [
            [['tractor_id, plot_id', 'id', 'area'], 'safe'],
            [['area'], 'number'],
            [['date'], 'date']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PlotTractor::find();
        $query->joinWith('tractor');
        $query->joinWith('plot');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date
        ]);

        $query->andFilterWhere(['like', 'tractor.name', $this->tractor_id])
            ->andFilterWhere(['like', 'plot.name', $this->plot_id])
            ->andFilterWhere(['like', 'plot.crops', $this->plot_id]);

        return $dataProvider;
    }
}