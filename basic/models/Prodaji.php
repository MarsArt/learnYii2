<?php

namespace app\models;

use app\modules\MainManager\models\Tovari;
use Yii;

/**
 * This is the model class for table "prodaji".
 *
 * @property integer $idProdaji
 * @property integer $CountProd
 * @property double $CenaProd
 * @property integer $Brak
 * @property string $viruchki_id
 * @property integer $tovari_idtovari
 */
class Prodaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prodaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CountProd', 'Brak', 'viruchki_id', 'tovari_idtovari'], 'integer'],
            [['CenaProd','itog'], 'number'],
            [['Brak', 'viruchki_id', 'tovari_idtovari'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProdaji' => 'Id Prodaji',
            'CountProd' => 'Количество шт.',
            'CenaProd' => 'Цена р.',
            'Brak' => 'Брак',
            'itog'=>'Итого',
            'sumProd'=>'Итог',
            'viruchki_id' => 'Viruchki ID',
            'tovari_idtovari' => 'Tovari Idtovari',

        ];
    }


    public $_sumProd;

    public function  getSumProd(){
        return $this->_sumProd;
    }
    public function  setSumProd($value){

        return $this->_sumProd=$value;

    }

    public  $_itog;


    public function attributes()
    {
        // add related fields to attributes
        return array_merge(parent::attributes(), ['itog','sumProd']);
    }

    public function  getItog(){

     // return  $this->CenaProd*$this->CountProd;
        return $this->itog;
    }
    public function  setItog($value){

        return $this->_itog=$value;

    }


    public  function getAttribTovar(){
        return $this->hasOne(Tovari::className(),['idtovari'=>'tovari_idtovari']);
    }


}
