<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tests;

/**
 * TestsSearch represents the model behind the search form of `frontend\models\Tests`.
 */
class TestsSearch extends Tests
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'science_id'], 'integer'],
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e', 'right_answer'], 'safe'],
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
        $query = Tests::find();

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
            'science_id' => $this->science_id,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer_a', $this->answer_a])
            ->andFilterWhere(['like', 'answer_b', $this->answer_b])
            ->andFilterWhere(['like', 'answer_c', $this->answer_c])
            ->andFilterWhere(['like', 'answer_d', $this->answer_d])
            ->andFilterWhere(['like', 'answer_e', $this->answer_e])
            ->andFilterWhere(['like', 'right_answer', $this->right_answer]);

        return $dataProvider;
    }
}
