<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\ViruchkiSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvide
 */

$this->title = 'Выручки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=GridView::widget([
       'dataProvider'=>$dataProvider,
       'filterModel' => $searchModel,
       //'summary'=>'Посмотреть почему не работает не приводит формат',
       'columns'=>[
          ['class' => 'yii\grid\SerialColumn'],

          [
              'label'=>'Наименование точки',
              'attribute'=>'minishop_Opisanie',
          ],
           [
               'label'=>'Администратор',
               'attribute'=>'securety_users_Name',
           ],
           [
               'label'=>'Дата',
               'attribute'=>'viruchki_Date',
           ],
           [
               'label'=>'Выручка',
               'attribute'=>'res',
           ],
           [
               'label'=>'Расходы',
               'attribute'=>'rash',
           ],
           [
               'label'=>'Прибыль',
               'attribute'=>'prib',
           ],

           ['class'=>'yii\grid\ActionColumn',
            'template'=>'{view}'
           ],

       ]
    ])
    ?>



</div>
