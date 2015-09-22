<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $picture
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $creation_date
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture', 'title', 'description', 'type', 'creation_date'], 'required'],
            [['description', 'type'], 'string'],
            [['creation_date'], 'safe'],
            [['picture'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 150]
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
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'creation_date' => 'Creation Date',
        ];
    }
}
