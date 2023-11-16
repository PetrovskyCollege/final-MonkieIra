<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Notes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_n')->textInput() ?>

    <?= $form->field($model, 'id_settings')->textInput() ?>

    <?= $form->field($model, 'id_stickers')->textInput() ?>

    <?= $form->field($model, 'id_user')->dropDownList( 
        [ 
            (\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id','name')) 
            
             
     ])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
