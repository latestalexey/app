<?php

namespace app\modules\ar\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ar\models\Produk;

/**
 * ProdukSearch represents the model behind the search form about `app\modules\ar\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'safe'],
            [['cDate', 'status', 'uDate', 'userID'], 'integer'],
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
        $query = Produk::find();

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
            'cDate' => $this->cDate,
            'uDate' => $this->uDate,
            'userID' => $this->userID,
            'status' => $this->status,
        ]);

        
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
