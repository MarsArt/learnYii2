<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\MainManager\models\Tovari $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tovari-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CenaZak')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'Descr')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
