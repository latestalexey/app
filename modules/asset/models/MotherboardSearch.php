<?php

namespace app\modules\asset\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\asset\models\Motherboard;

/**
 * MotherboardSearch represents the model behind the search form about `app\modules\asset\models\Motherboard`.
 */
class MotherboardSearch extends Motherboard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'port', 'status', 'statusPeripheral', 'cDate', 'uDate', 'idUser'], 'integer'],
            [['no_asset', 'name', 'flag', 'purchaseDate'], 'safe'],
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
        $query = Motherboard::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }
    /*
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
     * 
     */

        $query->andFilterWhere([
            'id' => $this->id,
            'port' => $this->port,
            'status' => $this->status,
            'purchaseDate' => $this->purchaseDate,
            'statusPeripheral' => $this->statusPeripheral,
            'cDate' => $this->cDate,
            'uDate' => $this->uDate,
            'idUser' => $this->idUser,
        ]);

        $query->andFilterWhere(['like', 'no_asset', $this->no_asset])
            ->andFilterWhere(['like',  'id', $this->id])
            ->andFilterWhere(['like',  'name', $this->name])
            ->andFilterWhere(['like', 'flag', $this->flag]);

        return $dataProvider;
    }
    
}
