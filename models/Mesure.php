<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mesure".
 *
 * @property integer $id
 * @property string $description
 *
 * @property ProductMesure[] $productMesures
 */
class Mesure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mesure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 100]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductMesures()
    {
        return $this->hasMany(ProductMesure::className(), ['mesure_id' => 'id']);
    }
             public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_mesure',['mesure_id' => 'id']);
    } 
}
