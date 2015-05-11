<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\CustomerTransactions;

/**
 * CustomerTransactionsSearch represents the model behind the search form about `app\modules\b2b\models\CustomerTransactions`.
 */
class CustomerTransactionsSearch extends CustomerTransactions {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['CustId'], 'safe'],
            [['IsProcessed', 'IsCancelled'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
    //    $query = CustomerTransactions::find()->with('customerTransactionDetails');

        $query = CustomerTransactions::find();
        $query->leftJoin("CustomerTransactionDetails", "CustomerTransactions.TransactionNumber=CustomerTransactionDetails.TransactionNumber");
        $query->with("customerTransactionDetails"); // eager load to reduce number of queries
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
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
