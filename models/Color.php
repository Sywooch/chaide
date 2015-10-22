<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "color".
 *
 * @property integer $id
 * @property string $description
 * @property string $icon
 * @property string $creation_date
 */
class Color extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'icon', 'creation_date'], 'required'],
            [['creation_date'], 'safe'],
            [['description', 'icon'], 'string', 'max' => 100]
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
             public function getProducts()
    {
        return $this->hasMany(Product::className(),['id' => 'product_id'])->viaTable('product_color',['color_id' => 'id']);
    } 
}
