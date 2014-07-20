<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zajavki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zajavki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'securety_users_id_dest')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
