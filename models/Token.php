<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $status
 * @property string $creation_date
 * @property string $expiration_date
 *
 * @property User $user
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'creation_date', 'expiration_date'], 'required'],
            [['user_id'], 'integer'],
            [['status'], 'string'],
            [['creation_date', 'expiration_date'], 'safe'],
            [['id'], 'string', 'max' => 255]
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
            'status' => 'Status',
            'creation_date' => 'Creation Date',
            'expiration_date' => 'Expiration Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
