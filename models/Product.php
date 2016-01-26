<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $line_id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $3d
 * @property string $picture
 * @property string $background1
 * @property string $background2
 * @property string $background3
 * @property string $status
 * @property string $creation_date
 *
 * @property CarShop[] $carShops
 * @property Cloth[] $cloths
 * @property Detail[] $details
 * @property ProductColor[] $productColors
 */
class Product extends ActiveRecord 
{
    /**
     * @inheritdoc
     */



    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['line_id'], 'integer'],
            [['title', 'description', 'price', '3d', 'picture', 'background1', 'background2', 'background3', 'status', 'creation_date'], 'required'],
            [['description', 'status'], 'string'],
            [['price'], 'number'],
            [['creation_date'], 'safe'],
            [['title', 'picture', 'background1', 'background2', 'background3'], 'string', 'max' => 150],
            [['3d'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_id' => 'Line ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            '3d' => '3d',
            'picture' => 'Picture',
            'background1' => 'Background1',
            'background2' => 'Background2',
            'background3' => 'Background3',
            'status' => 'Status',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getCarShops()
    {
        return $this->hasMany(CarShop::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCloths()
    {
        return $this->hasMany(Cloth::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(Detail::className(), ['product_id' => 'id']);
    }
   public function getLine()
    {
        return $this->hasOne(Line::className(), ['id' => 'line_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
  
    public function getSapCodes(){
      return $this->hasMany(SapCode::className(), ['product_id' => 'id']);  
    }
    public function getMesures()
    {
        return $this->hasMany(Mesure::className(),['id' => 'mesure_id'])->viaTable('product_mesure',['product_id' => 'id']);
    }
       public function getIps()
    {
        return $this->hasMany(Ip::className(),['id' => 'ip_id'])->viaTable('product_ip',['product_id' => 'id']);
    }
       public function getColors()
    {
        return $this->hasMany(Color::className(),['id' => 'color_id'])->viaTable('product_color',['product_id' => 'id']);
    } 
       public function getCharacteristics()
    {
        return $this->hasMany(Characteristic::className(),['id' => 'characteristic_id'])->viaTable('product_characteristic',['product_id' => 'id'], function ($query) {
            $query->orderBy(['sort' => 'ASC']);
        });
    }
       public function getAdvantages()
    {
        return $this->hasMany(Advantage::className(),['id' => 'advantage_id'])->viaTable('product_advantage',['product_id' => 'id']);
    } 
       public function getClothes()
    {
        return $this->hasMany(Cloth::className(),['id' => 'cloth_id'])->viaTable('product_cloth',['product_id' => 'id']);
    }  
       public function getSells()
    {
        return $this->hasMany(Sell::className(),['id' => 'sell_id'])->viaTable('detail',['product_id' => 'id']);
    }      
}
