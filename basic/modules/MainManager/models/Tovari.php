<?php

namespace app\modules\MainManager\models;

use string;
use Yii;

/**
 * This is the model class for table "tovari".
 *
 * @property integer $idtovari
 * @property string $Name
 * @property string $Descr
 * @property double $CenaZak
 */
class Tovari extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tovari';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CenaZak'], 'number'],
            [['Name', 'Descr'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtovari' => 'Idtovari',
            'Name' => 'Наименование',
            'Descr' => 'Описание',
            'CenaZak' => 'Цена закупки грн.',
        ];
    }

}
