<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locale".
 *
 * @property integer $id
 * @property integer $city_id
 * @property double $latitude
 * @property double $longitude
 * @property string $address
 *
 * @property City $city
 */
class Locale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['latitude', 'longitude', 'address'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
