<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Tovari $model
 */

$this->title = 'Update Tovari: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Tovaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->idtovari]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tovari-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
