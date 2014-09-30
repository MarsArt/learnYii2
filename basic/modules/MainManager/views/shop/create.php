<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Shop $model
 */

$this->title = 'Добавление магазина';
$this->params['breadcrumbs'][] = ['label' => 'Магазины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'listAdmin'=>$listAdmin
    ]) ?>

</div>
