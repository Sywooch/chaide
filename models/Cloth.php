<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cloth".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $description
 * @property string $icon
 *
 * @property Product $product
 */
class Cloth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cloth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'description', 'icon'], 'required'],
            [['product_id'], 'integer'],
            [['description'], 'string', 'max' => 150],
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
            'product_id' => 'Product ID',
            'description' => 'Description',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
             public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_cloth',['cloth_id' => 'id']);
    } 
}
