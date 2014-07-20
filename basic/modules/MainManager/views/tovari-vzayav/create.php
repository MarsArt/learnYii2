<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayav */

$this->title = 'Create Tovari Vzayav';
$this->params['breadcrumbs'][] = ['label' => 'Tovari Vzayavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovari-vzayav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
