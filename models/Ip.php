<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "ip".
 *
 * @property integer $id
 * @property string $description
 *
 * @property ProductIp[] $productIps
 */
class Ip extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 11]
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
    public function getProductIps()
    {
        return $this->hasMany(ProductIp::className(), ['ip_id' => 'id']);
    }
             public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_ip',['ip_id' => 'id']);
    } 
}
