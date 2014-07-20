<?php

namespace app\modules\MainManager\models;

use app\models\Users;
use Yii;


/**
 * This is the model class for table "minishop".
 *
 * @property string $id
 * @property string $Opisanie
 * @property string $Region
 * @property integer $id_Admin
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'minishop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Opisanie', 'Region', 'id_Admin'], 'required'],
            [['Opisanie','Region'], 'string'],
            [['id_Admin'], 'integer'],
            [['Region'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Opisanie' => 'Описание',
            'Region' => 'Регион',
            'id_Admin' => 'Администратор',
        ];
    }
    public function getManager(){

        return $this->hasOne(Users::className(),['id'=>'id_Admin']);
    }



}
