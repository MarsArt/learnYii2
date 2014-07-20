<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\Prodaji $model
 */

$this->title = 'Продажи магазина "'.$ViruchInfo->shop->Opisanie.'" за '.$ViruchInfo->Date;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $ViruchInfo->shop->Opisanie.'('.$ViruchInfo->Date.')';
?>
<div class="shop-view">

    <h1><?= Html::encode($this->title) ?></h1>




    <? GridView::widget([
        'dataProvider' => $dataProviderInfoProd,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'attribTovar.Name',
                'label'=>'Наименование товара',
                'value' => 'attribTovar.Name',
            ],
            'CenaProd',
            'CountProd',
            'Brak',
            'itog'
        ],
    ]); ?>


    <?= GridView::widget([
        'dataProvider'=>$dataProviderInfoRash,
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            'Name',
            'Descr',
            'val'

        ]
    ]) ?>



</div>
