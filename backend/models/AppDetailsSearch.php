<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AppDetails;

/**
 * AppDetailsSearch represents the model behind the search form of `common\models\AppDetails`.
 */
class AppDetailsSearch extends AppDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order', 'category_id'], 'integer'],
            [['goal_ru', 'goal_uz', 'goal_en', 'result_ru', 'result_uz', 'result_en', 'screen'], 'safe'],
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
        $query = AppDetails::find();

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
            'order' => $this->order,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'goal_ru', $this->goal_ru])
            ->andFilterWhere(['like', 'goal_uz', $this->goal_uz])
            ->andFilterWhere(['like', 'goal_en', $this->goal_en])
            ->andFilterWhere(['like', 'result_ru', $this->result_ru])
            ->andFilterWhere(['like', 'result_uz', $this->result_uz])
            ->andFilterWhere(['like', 'result_en', $this->result_en])
            ->andFilterWhere(['like', 'screen', $this->screen]);

        return $dataProvider;
    }
}
