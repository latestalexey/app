<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\CustomerTransactions;

/**
 * CustomerTransactionsSearch represents the model behind the search form about `app\modules\b2b\models\CustomerTransactions`.
 */
class CustomerTransactionsSearch extends CustomerTransactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TransactionNumber', 'TransactionDate', 'SLoc', 'CustId'], 'safe'],
            [['IsProcessed', 'IsCancelled'], 'integer'],
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
        $query = CustomerTransactions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'TransactionDate' => $this->TransactionDate,
            'IsProcessed' => $this->IsProcessed,
            'IsCancelled' => $this->IsCancelled,
        ]);

        $query->andFilterWhere(['like', 'TransactionNumber', $this->TransactionNumber])
            ->andFilterWhere(['like', 'SLoc', $this->SLoc])
            ->andFilterWhere(['like', 'CustId', $this->CustId]);

        return $dataProvider;
    }
}
