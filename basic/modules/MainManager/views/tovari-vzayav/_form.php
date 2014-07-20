<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tovari-vzayav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CountTov')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'Zajavki_idZajavki')->textInput() ?>

    <?= $form->field($model, 'tovari_idtovari')->textInput() ?>

    <?= $form->field($model, 'Cena')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
