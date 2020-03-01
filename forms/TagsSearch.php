<?php

namespace abdualiym\slider\forms;

use abdualiym\slider\entities\Tags;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class TagsSearch extends Tags
{
    public function rules()
    {
        return [
            [['title_0', 'slug'], 'safe'],
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
        $query = Tags::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_DESC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title_0', $this->title_0])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
