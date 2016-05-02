<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Client;

/**
 * ClientSearch represents the model behind the search form about `frontend\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'purpose_id', 'nationality_id', 'client_state_id', 'user_id'], 'integer'],
            [['first_name', 'last_name', 'status_id', 'birthdate', 'email', 'password', 'ptn', 'passport_num', 'passport_expire', 'back_date', 'register_date', 'register_time', 'created_at', 'updated_at'], 'safe'],
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
        $query = Client::find();

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
            'purpose_id' => $this->purpose_id,
            'nationality_id' => $this->nationality_id,
            'client_state_id' => $this->client_state_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'status_id', $this->status_id])
            ->andFilterWhere(['like', 'birthdate', $this->birthdate])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'ptn', $this->ptn])
            ->andFilterWhere(['like', 'passport_num', $this->passport_num])
            ->andFilterWhere(['like', 'passport_expire', $this->passport_expire])
            ->andFilterWhere(['like', 'back_date', $this->back_date])
            ->andFilterWhere(['like', 'register_date', $this->register_date])
            ->andFilterWhere(['like', 'register_time', $this->register_time]);

        return $dataProvider;
    }
}
