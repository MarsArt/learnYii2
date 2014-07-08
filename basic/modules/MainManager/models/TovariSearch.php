<?php

namespace app\modules\MainManager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\MainManager\models\Tovari;

/**
 * TovariSearch represents the model behind the search form about `app\modules\MainManager\models\Tovari`.
 */
class TovariSearch extends Tovari
{
    public function rules()
    {
        return [
            [['idtovari'], 'integer'],
            [['Name', 'Descr'], 'safe'],
            [['CenaZak'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Tovari::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtovari' => $this->idtovari,
            'CenaZak' => $this->CenaZak,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Descr', $this->Descr]);

        return $dataProvider;
    }
}
