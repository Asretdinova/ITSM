<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Aboutmedia;

/**
 * AboutmediaSearch represents the model behind the search form of `common\models\Aboutmedia`.
 */
class AboutmediaSearch extends Aboutmedia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'content_ru', 'content_uz', 'content_en', 'date', 'image_id', 'category_id', 'type', 'title', 'content'], 'safe'],
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
        $query = Aboutmedia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'is_active' => $this->is_active,
        ]);

        $query->orFilterWhere(['like', 'title_ru', $this->title])
            ->orFilterWhere(['like', 'title_uz', $this->title])
            ->orFilterWhere(['like', 'title_en', $this->title])
            ->orFilterWhere(['like', 'content_ru', $this->content])
            ->orFilterWhere(['like', 'content_uz', $this->content])
            ->orFilterWhere(['like', 'content_en', $this->content])
            ->andFilterWhere(['like', 'image_id', $this->image_id])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
