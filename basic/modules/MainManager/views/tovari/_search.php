<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\TovariSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tovari-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtovari') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Descr') ?>

    <?= $form->field($model, 'CenaZak') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
