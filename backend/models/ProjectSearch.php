<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Projects;

/**
 * ProjectSearch represents the model behind the search form of `common\models\Projects`.
 */
class ProjectSearch extends Projects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'category_id', 'project_type_id', 'project_customer_id', 'project_partner_id'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en', 'image_id', 'link', 'images_list', 'logo_id', 'video_id', 'start_date', 'end_date', 'status'], 'safe'],
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
        $query = Projects::find();

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
            'department_id' => $this->department_id,
            'category_id' => $this->category_id,
            'project_type_id' => $this->project_type_id,
            'project_customer_id' => $this->project_customer_id,
            'project_partner_id' => $this->project_partner_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'image_id', $this->image_id])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'images_list', $this->images_list])
            ->andFilterWhere(['like', 'logo_id', $this->logo_id])
            ->andFilterWhere(['like', 'video_id', $this->video_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
