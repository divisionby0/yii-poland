<?php

namespace backend\models\client;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use backend\models\client\ClientPpva;

/**
 * ClientPpvaSearch represents the model behind the search form about `backend\models\ClientPpva`.
 */
class ClientPpvaSearch extends ClientPpva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppva_id'], 'integer'],
            [['ppva'], 'safe'],
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
        $query = ClientPpva::find();

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
            'ppva_id' => $this->ppva_id,
        ]);

        $query->andFilterWhere(['like', 'ppva', $this->ppva]);

        return $dataProvider;
    }
}
