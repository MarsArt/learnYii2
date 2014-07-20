<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayavSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tovari-vzayav-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtovariVZalav') ?>

    <?= $form->field($model, 'CountTov') ?>

    <?= $form->field($model, 'Cena') ?>

    <?= $form->field($model, 'Zajavki_idZajavki') ?>

    <?= $form->field($model, 'tovari_idtovari') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
