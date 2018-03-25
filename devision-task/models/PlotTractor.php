<?php

namespace app\models;

use Faker\Provider\zh_CN\DateTime;
use Yii;

/**
 * This is the model class for table "plot_tractor".
 *
 * @property int $id
 * @property int $plot_id
 * @property double $area
 * @property int $tractor_id
 * @property string $date
 *
 * @property Plot $plot
 * @property Tractor $tractor
 */
class PlotTractor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plot_tractor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plot_id', 'tractor_id'], 'integer'],
            [['area'], 'number'],
            [['date'], 'safe'],
            [['plot_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plot::className(), 'targetAttribute' => ['plot_id' => 'id']],
            [['tractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tractor::className(), 'targetAttribute' => ['tractor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plot_id' => 'Plot ID',
            'area' => 'Area',
            'tractor_id' => 'Tractor ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlot()
    {
        return $this->hasOne(Plot::className(), ['id' => 'plot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTractor()
    {
        return $this->hasOne(Tractor::className(), ['id' => 'tractor_id']);
    }

    public function getTractorName()
    {
        return $this->tractor->name;
    }

    public function getPlotName()
    {
        return $this->plot->name;
    }

    public function getPlotCrops()
    {
        return $this->plot->crops;
    }

    public function addData(int $plotId, int $tractorId, float $area, string $date)
    {
        $this->plot_id = $plotId;
        $this->tractor_id = $tractorId;
        $this->area = $area;
        $this->date = $date;
        return $this->save() ? $this : null;
    }
}
