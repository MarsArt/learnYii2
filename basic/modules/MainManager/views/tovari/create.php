<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Tovari $model
 */

$this->title = 'Добавление товара';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovari-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
