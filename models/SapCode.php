<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sap_code".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $mesure_id
 * @property integer $color_id
 *
 * @property Mesure $mesure
 * @property Color $color
 * @property Product $product
 */
class SapCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sap_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'required'],
            [['id', 'product_id', 'mesure_id', 'color_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'mesure_id' => 'Mesure ID',
            'color_id' => 'Color ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesure()
    {
        return $this->hasOne(Mesure::className(), ['id' => 'mesure_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
