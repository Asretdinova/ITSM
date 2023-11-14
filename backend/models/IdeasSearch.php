<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ideas;

/**
 * IdeasSearch represents the model behind the search form of `common\models\Ideas`.
 */
class IdeasSearch extends Ideas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'likes', 'views', 'category_id', 'is_active'], 'integer'],
            [['title', 'text', 'author_name', 'author_surname', 'date', 'user_details', 'order', 'status', 'sort'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $order = [
            'date' => SORT_DESC
        ];

        $query = Ideas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => $order
            ]
        ]);

        $this->load($params);

        if (!in_array($this->status, Ideas::getStatusDefinition('keys'))) {
            $this->status = null;
        }

        if ($this->sort == 'popularity') {
            $order = [
                'likes' => SORT_DESC,
                'views' => SORT_DESC,
            ];
        }

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->orFilterWhere(['like', 'title', $this->title])
            ->orFilterWhere(['like', 'text', $this->title])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
