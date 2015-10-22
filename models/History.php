<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "history".
 *
 * @property integer $id
 * @property string $picture
 * @property string $description
 * @property string $year
 * @property string $title
 * @property string $creation_date
 */
class History extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture', 'description', 'year', 'title', 'creation_date'], 'required'],
            [['creation_date'], 'safe'],
            [['picture', 'title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['year'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'picture' => 'Picture',
            'description' => 'Description',
            'year' => 'Year',
            'title' => 'Title',
            'creation_date' => 'Creation Date',
        ];
    }
}
