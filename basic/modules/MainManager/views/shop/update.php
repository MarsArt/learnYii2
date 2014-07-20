<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Shop $model
 */

$this->title = 'Редактирование магазина: ' . ' ' . $model->Opisanie;
$this->params['breadcrumbs'][] = ['label' => 'Магазины', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Opisanie, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="shop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'listAdmin' => $listAdmin
    ]) ?>

</div>
