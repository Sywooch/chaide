<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $identity
 * @property string $names
 * @property string $lastnames
 * @property string $birthday
 * @property string $address
 * @property string $billing_address
 * @property string $username
 * @property string $password
 * @property string $phone
 * @property string $cellphone
 * @property string $sex
 * @property string $creation_date
 *
 * @property Sell[] $sells
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['identity', 'names', 'lastnames', 'birthday', 'address', 'billing_address', 'username', 'password', 'phone', 'cellphone', 'sex', 'creation_date'], 'required'],
            [['birthday', 'creation_date'], 'safe'],
            [['sex'], 'string'],
            [['identity', 'cellphone'], 'string', 'max' => 10],
            [['names', 'lastnames', 'address', 'billing_address', 'password'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'identity' => 'Identity',
            'names' => 'Names',
            'lastnames' => 'Lastnames',
            'birthday' => 'Birthday',
            'address' => 'Address',
            'billing_address' => 'Billing Address',
            'username' => 'Username',
            'password' => 'Password',
            'phone' => 'Phone',
            'cellphone' => 'Cellphone',
            'sex' => 'Sex',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSells()
    {
        return $this->hasMany(Sell::className(), ['user_id' => 'id']);
    }
}
