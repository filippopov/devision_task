<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tractors".
 *
 * @property int $id
 * @property string $name
 *
 * @property PlotTractor[] $plotTractors
 */
class Tractor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tractors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlotTractors()
    {
        return $this->hasMany(PlotTractor::className(), ['tractor_id' => 'id']);
    }

    public function createTractor($name)
    {
        $this->name = $name;
        return $this->save() ? $this : null;
    }
}
