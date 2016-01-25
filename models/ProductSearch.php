<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'line_id', 'scale', 'warranty', 'support'], 'integer'],
            [['title', 'description', 'render', 'picture', 'background1', 'background2', 'background3', 'status', 'creation_date'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'line_id' => $this->line_id,
            'price' => $this->price,
            'creation_date' => $this->creation_date,
            'scale' => $this->scale,
            'warranty' => $this->warranty,
            'support' => $this->support,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'render', $this->render])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'background1', $this->background1])
            ->andFilterWhere(['like', 'background2', $this->background2])
            ->andFilterWhere(['like', 'background3', $this->background3])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
