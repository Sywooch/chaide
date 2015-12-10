<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\base\Security;
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
            ['sex', 'in', 'range' => ['MALE','FEMALE']],
            [['cellphone'], 'string', 'max' => 10],
            [['identity'], 'string', 'max' => 10, 'min'=>10],
            [['identity','cellphone','phone'],'number', 'message'=>"Solo se aceptán números"],
            [['names', 'lastnames', 'password'], 'string', 'max' => 255],
            [['username'], 'email'],
            [['username'], 'unique', 'message'=>"Ya existe ese email en el sistema."],
            [['phone'], 'string', 'max' => 9],
            ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'on' => 'create', 'message'=>"Las contraseñas deben ser iguales" ],
            ['type', 'in', 'range' => ['CLIENT','ADMIN']],
            ['status', 'in', 'range' => ['ACTIVE','INACTIVE']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
           
            'identity' => 'Cédula',
            'names' => 'Nombres',
            'lastnames' => 'Apellidos',
            'birthday' => 'Fecha de Nacimiento',
            'confirmPassword' => 'Confirmar Contraseña',
            // 'billing_address' => 'Billing Address',
            'username' => 'Email',
            'password' => 'Contraseña',
            'phone' => 'Teléfono',
            'cellphone' => 'Celular',
            'sex' => 'Sexo',
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
    
    public function beforeSave($insert) {

         if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                    if(isset($this->password)) 
                    $this->password = $this->hashPassword($this->password);
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
        }
        return parent::beforeSave($insert);
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
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
        public function validatePassword($password)
    {
         return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function hashPassword($password){

        //return hash('sha256',$password);
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }
    
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->getSecurity()->generateRandomKey() . '_' . time();
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
