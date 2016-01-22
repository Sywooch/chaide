<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing_address".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $city_id
 * @property string $street1
 * @property string $street2
 * @property string $sector
 * @property string $number
 * @property string $creation_date
 * @property string $update_date
 *
 * @property City $city
 * @property User $user
 */
class BillingAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id'], 'integer'],
            [['street1', 'street2', 'sector', 'number', 'creation_date', 'update_date'], 'required'],
            [['creation_date', 'update_date'], 'safe'],
            [['street1', 'street2'], 'string', 'max' => 250],
            [['sector'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'city_id' => 'Ciudad:',
            'street1' => 'Calle1:',
            'street2' => 'Calle2:',
            'sector' => 'Sector:',
            'number' => 'Número:',
            'creation_date' => 'Creation Date',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
