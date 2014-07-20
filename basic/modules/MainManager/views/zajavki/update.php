<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zajavki */

$this->title = 'Update Zajavki: ' . ' ' . $model->idZajavki;
$this->params['breadcrumbs'][] = ['label' => 'Zajavkis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idZajavki, 'url' => ['view', 'id' => $model->idZajavki]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zajavki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
