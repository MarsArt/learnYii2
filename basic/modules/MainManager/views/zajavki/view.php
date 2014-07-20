<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Zajavki */

$this->title ='От '.$model->userSours->Name.' для '.$model->userDest->Name.' за '. $model->Vrema_Dobavl;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zajavki-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
// var_dump($contentZajavProvider->query->all());

 /*
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idZajavki], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idZajavki], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
*/?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Status',
            [
                'label'=>'от кого',
                'value'=>$model->userSours->Name
            ],
            [
                'label'=>'кому',
                'value'=>$model->userDest->Name
            ],
            'Vrema_Dobavl',
            'Vrema_podtv',
            [
                'label'=>'Сумма по заявке',
                'value'=>$model->sumZajav,
            ],
        ],
    ]) ?>


    <?= GridView::widget([
        'dataProvider' => $contentZajavProvider,
        'filterModel' => $contentZajavSerch,
        'showFooter'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'attribTovar',
                'value'=>'attribTovar.Name',
            ],
            'CountTov',
            'Cena',
            [
                'attribute'=>'sumPos',
                'footer'=>'Итого: '.$model->sumZajav,
            ],

        ],
    ]); ?>
    <?php
    //var_dump($contentZajavProvider->models);
    ?>

</div>
