<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_characteristic".
 *
 * @property integer $product_id
 * @property integer $characteristic_id
 * @property integer $sort
 *
 * @property Characteristic $characteristic
 */
class ProductCharacteristic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_characteristic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'characteristic_id', 'sort'], 'required'],
            [['product_id', 'characteristic_id', 'sort'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'characteristic_id' => 'Characteristic ID',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['id' => 'characteristic_id']);
    }
        public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
