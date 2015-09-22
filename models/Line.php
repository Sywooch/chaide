<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "line".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $description
 */
class Line extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id'], 'integer'],
            [['description'], 'required'],
            [['description'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'description' => 'Description',
        ];
    }
}
