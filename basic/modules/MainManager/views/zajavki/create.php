<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zajavki */

$this->title = 'Сформировать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zajavki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
