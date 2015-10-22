<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "characteristic".
 *
 * @property integer $id
 * @property string $description
 * @property string $icon
 * @property string $creation_date
 *
 * @property ProductCharacteristic[] $productCharacteristics
 */
class Characteristic extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'characteristic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'icon', 'creation_date'], 'required'],
            [['description'], 'string'],
            [['creation_date'], 'safe'],
            [['icon'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'icon' => 'Icon',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristic::className(), ['characteristic_id' => 'id']);
    }
             public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_characteristic',['characteristic_id' => 'id']);
    } 
}
