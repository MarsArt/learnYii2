<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Shop $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'Opisanie')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Region')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'id_Admin')->dropDownList($listAdmin) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
