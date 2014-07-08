<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Tovari $model
 */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Tovaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovari-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtovari], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtovari], [
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
            'idtovari',
            'Name',
            'Descr',
            'CenaZak',
        ],
    ]) ?>

</div>
