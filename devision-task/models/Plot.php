<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "plots".
 *
 * @property int $id
 * @property string $name
 * @property string $crops
 * @property double $area
 *
 * @property PlotTractor[] $plotTractors
 */
class Plot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'crops', 'area'], 'required'],
            [['area'], 'number'],
            [['name', 'crops'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'crops' => 'Crops',
            'area' => 'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlotTractors()
    {
        return $this->hasMany(PlotTractor::className(), ['plot_id' => 'id']);
    }

    public function createPlot(string $name, string $crops, float $area)
    {
        $this->name = $name;
        $this->crops = $crops;
        $this->area = $area;
        return $this->save() ? $this : null;
    }

    public static function getPlotsInfoDropDown()
    {
         $data = (new Query())->select([
            'p.id',
            'CONCAT(\'Name: \', p.name, \' Crops: \', p.crops, \' Max Area: \', p.area) info'
        ])
            ->from('plots p')
            ->all();

        return ArrayHelper::map($data, 'id', 'info');
    }
}
