<?php

namespace app\models;

use app\modules\MainManager\models\Shop;
use app\modules\MainManager\models\Tovari;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "viruchki".
 *
 * @property string $id
 * @property string $Date
 * @property integer $id_minishop
 * @property string $Coment
 */
class Viruchki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'viruchki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Date','Coment'], 'safe'],
            [['id', 'id_minishop'], 'integer'],
            [['Coment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Date' => 'Дата',
            'id_minishop' => 'Магазин',
            'Coment' => 'Комментарий',
        ];
    }





    /**
     * @return \yii\db\ActiveQuery
     */
    public  function getShop(){
        return $this->hasOne(Shop::className(),['id'=>'id_minishop']);
    }

    public  function getProdaji(){

        return $this->hasMany(Prodaji::className(),['viruchki_id'=>'id']);

    }


    public  function getRashodi(){

        return $this->hasMany(Rashodi::className(),['id_vir'=>'id']);

    }

    public  function getTovVProd(){

        return $this->hasMany(Tovari::className(),['idtovari'=>'tovari_idtovari'])
            ->viaTable('prodaji',['viruchki_id'=>'id']);
    }

    /***********************relationsEnd***********************/
    /***********************userFunctions***********************/

    /**
     *
     * @return ActiveDataProvider contain data about detail prodaji.
     */
    public function getDataProviderInfoVir(){
             $query=$this->getProdaji()->select('prodaji.*, (CountProd*CenaProd) as itog')->JoinWith([
                    'attribTovar'=>function($query){
                            $query->select('idtovari, Name');
                        }
                ]);
        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
        ]);
        return $dataProvider;
    }


    /**
     *
     *
     * @return ActiveDataProvider contain data about detail rashodi.
     */
    public function getDataProviderInfoRash(){
        $query=$this->getRashodi();
        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
        ]);
        return $dataProvider;
    }






}


