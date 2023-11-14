<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Content;

/**
 * ContentSearch represents the model behind the search form of `common\models\Content`.
 */
class ContentSearch extends Content
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
        $query = Content::find();

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
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'project_customer_id', $this->project_customer_id])
            ->andFilterWhere(['like', 'department_id', $this->department_id])
            ->andFilterWhere(['like', 'project_type_id', $this->project_type_id])
            ->andFilterWhere(['like', 'main_image_id', $this->main_image_id])
            ->andFilterWhere(['like', 'logo_id', $this->logo_id])
            ->andFilterWhere(['like', 'content2_ru', $this->content2_ru])
            ->andFilterWhere(['like', 'content2_uz', $this->content2_uz])
            ->andFilterWhere(['like', 'content2_en', $this->content2_en])
            ->andFilterWhere(['like', 'content3_ru', $this->content3_ru])
            ->andFilterWhere(['like', 'content3_uz', $this->content3_uz])
            ->andFilterWhere(['like', 'content3_en', $this->content3_en])
            ->andFilterWhere(['like', 'video_id', $this->video_id])
            ->andFilterWhere(['like', 'web_link', $this->web_link])
            ->andFilterWhere(['like', 'mobile_link', $this->mobile_link])
            ->andFilterWhere(['like', 'ios_link', $this->ios_link])
            ->andFilterWhere(['like', 'sub_title_uz', $this->sub_title_uz])
            ->andFilterWhere(['like', 'sub_title_ru', $this->sub_title_ru])
            ->andFilterWhere(['like', 'sub_title_en', $this->sub_title_en]);

        return $dataProvider;
    }
}
