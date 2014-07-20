<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ZajavkiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zajavki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idZajavki') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'securety_users_id_dest') ?>

    <?= $form->field($model, 'securety_users_id_sours') ?>

    <?= $form->field($model, 'Vrema_Dobavl') ?>

    <?php // echo $form->field($model, 'Vrema_podtv') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
