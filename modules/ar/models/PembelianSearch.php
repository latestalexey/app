<?php

namespace app\modules\ar\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ar\models\Pembelian;

/**
 * PembelianSearch represents the model behind the search form about `app\modules\ar\models\Pembelian`.
 */
class PembelianSearch extends Pembelian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'CustID', 'qty', 'cDate', 'uDate', 'userID'], 'integer'],
            [['SlocID', 'prodID', 'tglPesan'], 'safe'],
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
        $query = Pembelian::find();

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
            'id' => $this->id,
            'CustID' => $this->CustID,
            'qty' => $this->qty,
            'tglPesan' => $this->tglPesan,
            'cDate' => $this->cDate,
            'uDate' => $this->uDate,
            'userID' => $this->userID,
        ]);

        $query->andFilterWhere(['like', 'SlocID', $this->SlocID])
            ->andFilterWhere(['like', 'prodID', $this->prodID]);

        return $dataProvider;
    }
}
