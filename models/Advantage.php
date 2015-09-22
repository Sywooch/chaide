<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advantage".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $creation_date
 *
 * @property ProductAdvantage[] $productAdvantages
 */
class Advantage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advantage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'creation_date'], 'required'],
            [['description'], 'string'],
            [['creation_date'], 'safe'],
            [['title'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAdvantages()
    {
        return $this->hasMany(ProductAdvantage::className(), ['advantage_id' => 'id']);
    }
         public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_advantage',['advantage_id' => 'id']);
    } 
}
