<?php

namespace app\modules\armada\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armada\models\Pembelian;

/**
 * PembelianSearch represents the model behind the search form about `app\modules\armada\models\Pembelian`.
 */
class PembelianSearch extends Pembelian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'SlocustomerID', 'qty', 'create_at', 'update_at', 'userID'], 'integer'],
            [['prodID', 'tglPesan'], 'safe'],
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
            'SlocustomerID' => $this->SlocustomerID,
            'qty' => $this->qty,
            'tglPesan' => $this->tglPesan,
            'userID' => $this->userID,
        ]);

        $query->andFilterWhere(['like', 'prodID', $this->prodID]);

        return $dataProvider;
    }
}
