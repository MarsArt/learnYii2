<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TovariVZayav;

/**
 * TovariVZayavSearch represents the model behind the search form about `app\models\TovariVZayav`.
 */
class TovariVZayavSearch extends TovariVZayav
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtovariVZalav', 'CountTov', 'Zajavki_idZajavki', 'tovari_idtovari'], 'integer'],
            [['Cena'], 'number'],
            [['attribTovar', 'sumPos'],'safe']
        ];
    }

   public $attribTovar;
   public $sumPos;




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
        $query = TovariVZayav::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtovariVZalav' => $this->idtovariVZalav,
            'CountTov' => $this->CountTov,
            'Cena' => $this->Cena,
            'Zajavki_idZajavki' => $this->Zajavki_idZajavki,
            'tovari_idtovari' => $this->tovari_idtovari,
        ]);

        return $dataProvider;
    }

   /* static public function getSumModel(ActiveDataProvider $dataProvider, array $arrayAttr){
       $sumModel= clone $dataProvider->getModels()[0];
        $Models=$dataProvider->getModels();
        $sumModel->{$arrayAttr[1]}=100;//Не работает свойства из search модели
        /*foreach($arrayAttr as $attrib){
            foreach($Models as $model){
                $sumModel[$attrib]+=$model[$attrib];
            }
        }
        return $sumModel;

    }*/

    public function searchToShow($params, $idZajav)
    {
        $query = TovariVZayav::find()->andWhere(['Zajavki_idZajavki'=>$idZajav]);
        $query->joinWith(['attribTovar']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['attribTovar']=[
        'asc' => ['tovari.Name' => SORT_ASC],
        'desc' => ['tovari.Name' => SORT_DESC],
    ];

        $dataProvider->sort->attributes['sumPos']=[
            'asc' => ['(CountTov*Cena)' => SORT_ASC],
            'desc' => ['(CountTov*Cena)' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return ['dataProvider'=>$dataProvider,''];
        }

        $query->andFilterWhere([
            'CountTov' => $this->CountTov,
            'Cena' => $this->Cena,
        ]);
        $query->andFilterWhere(['LIKE','tovari.Name',$this->attribTovar])
              ->andFilterWhere(['LIKE','(CountTov*Cena)',$this->sumPos]);
        ;

        return ['dataProvider'=>$dataProvider,''];
    }
}
