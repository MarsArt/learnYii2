<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TovariVZayavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tovari Vzayavs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovari-vzayav-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tovari Vzayav', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtovariVZalav',
            'CountTov',
            'Cena',
            'Zajavki_idZajavki',
            'tovari_idtovari',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
