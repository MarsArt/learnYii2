<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TovariVZayav */
/* @var $form ActiveForm */
?>
<div class="addTovar">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'CountTov') ?>
        <?= $form->field($model, 'Zajavki_idZajavki') ?>
        <?= $form->field($model, 'tovari_idtovari') ?>
        <?= $form->field($model, 'Cena') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addTovar -->
