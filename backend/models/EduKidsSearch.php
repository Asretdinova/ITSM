<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EduKids;

/**
 * EduKidsSearch represents the model behind the search form of `common\models\EduKids`.
 */
class EduKidsSearch extends EduKids
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['thumb', 'video', 'title_ru', 'title_uz', 'title_en', 'date'], 'safe'],
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
        $query = EduKids::find();

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

        $query->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en]);

        return $dataProvider;
    }
}
