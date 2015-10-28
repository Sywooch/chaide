<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
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
class User extends ActiveRecord implements IdentityInterface 
{
    /**
     * @inheritdoc
     */
        public $authKey;
    public $accessToken;
    public $confirmPassword;

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
            
            [['identity', 'names', 'lastnames', 'birthday', 'username', 'password', 'phone', 'cellphone', 'sex', 'creation_date'], 'required'],
            [['birthday', 'creation_date'], 'safe'],
            [['sex'], 'string'],
            [['identity', 'cellphone'], 'string', 'max' => 10],
            [['names', 'lastnames', 'address', 'billing_address', 'password'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 9],
            ['type', 'in', 'range' => ['CLIENT','ADMIN']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
           
            'identity' => 'Identity',
            'names' => 'Names',
            'lastnames' => 'Lastnames',
            'birthday' => 'Birthday',
            // 'address' => 'Address',
            // 'billing_address' => 'Billing Address',
            'username' => 'Username',
            'password' => 'Password',
            'phone' => 'Phone',
            'cellphone' => 'Cellphone',
            'sex' => 'Sex',
            'creation_date' => 'Creation Date',
        ];
    }
 public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" No está implementado.');
    }
    

        public static function isUserClient($username)
    {
      if (static::findOne(['username' => $username, 'type' => 'CLIENT'])){
 
             return true;
      } else {
 
             return false;
      }
 
    }
        public static function isUserAdmin($username)
    {
      if (static::findOne(['username' => $username, 'type' => 'ADMIN'])){
 
             return true;
      } else {
 
             return false;
      }
 
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
     public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
        public function validatePassword($password)
    {
        return $this->password === $this->hashPassword($password);
    }

    public function hashPassword($password){

        //return hash('sha256',$password);
        return md5($password);
    }
    
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getSells()
    {
        return $this->hasMany(Sell::className(), ['user_id' => 'id']);
    }
        public function getBillingAddresses()
    {
        return $this->hasMany(BillingAddress::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::className(), ['user_id' => 'id']);
    }

}
