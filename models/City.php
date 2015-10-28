<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $canton_id
 * @property string $description
 *
 * @property BillingAddress[] $billingAddresses
 * @property Canton $canton
 * @property DeliveryAddress[] $deliveryAddresses
 * @property Locale[] $locales
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['canton_id'], 'integer'],
            [['description'], 'required'],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'canton_id' => 'Canton ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillingAddresses()
    {
        return $this->hasMany(BillingAddress::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCanton()
    {
        return $this->hasOne(Canton::className(), ['id' => 'canton_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocales()
    {
        return $this->hasMany(Locale::className(), ['city_id' => 'id']);
    }
}
