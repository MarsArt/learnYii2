<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Users $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'Type')->dropDownList([ 'main_manager' => 'Main manager', 'manager' => 'Manager', 'shop_manager' => 'Shop manager', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
