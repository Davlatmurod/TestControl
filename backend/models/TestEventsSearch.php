<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TestEvents;

/**
 * TestEventsSearch represents the model behind the search form of `backend\models\TestEvents`.
 */
class TestEventsSearch extends TestEvents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'test_id', 'action_id'], 'integer'],
            [['showed_answers', 'selected_answer'], 'safe'],
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
        $query = TestEvents::find();

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
            'test_id' => $this->test_id,
            'action_id' => $this->action_id,
        ]);

        $query->andFilterWhere(['like', 'showed_answers', $this->showed_answers])
            ->andFilterWhere(['like', 'selected_answer', $this->selected_answer]);

        return $dataProvider;
    }
}
