<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayav */

$this->title = 'Update Tovari Vzayav: ' . ' ' . $model->idtovariVZalav;
$this->params['breadcrumbs'][] = ['label' => 'Tovari Vzayavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtovariVZalav, 'url' => ['view', 'id' => $model->idtovariVZalav]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tovari-vzayav-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
