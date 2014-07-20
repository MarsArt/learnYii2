<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayav */

$this->title = $model->idtovariVZalav;
$this->params['breadcrumbs'][] = ['label' => 'Tovari Vzayavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovari-vzayav-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtovariVZalav], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtovariVZalav], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtovariVZalav',
            'CountTov',
            'Cena',
            'Zajavki_idZajavki',
            'tovari_idtovari',
        ],
    ]) ?>

</div>
