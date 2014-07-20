<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rashodi".
 *
 * @property integer $idRashodi
 * @property string $Name
 * @property string $Descr
 * @property double $val
 * @property integer $id_vir
 */
class Rashodi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rashodi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descr'], 'string'],
            [['val'], 'required'],
            [['val'], 'number'],
            [['id_vir'], 'integer'],
            [['Name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRashodi' => 'Id Rashodi',
            'Name' => 'Вид расхода',
            'Descr' => 'Описание',
            'val' => 'Сумма руб.',
            'id_vir' => 'Id Vir',
        ];
    }
}
