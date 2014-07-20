<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZajavkiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zajavki-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Сформировать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'Status',
                'contentOptions'=>function ($model){
                        return($model->Status=='YES')?['bgcolor'=>'green']:['bgcolor'=>'red'];
                        }
            ],
            'userSours.Name',

            [
                'attribute'=>'userDest.Name',
                'filter'=>Html::activeTextInput($searchModel,'userDest.Name'),
                'value'=>'userDest.Name'
            ],

            'Vrema_Dobavl',
            'Vrema_podtv',
            'sumZajav',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
