<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'author_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->all(),'id','fullName'),['prompt'=>'---select author---']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeholder'=>'enter book title']) ?>

    <?= $form->field($model, 'preview')->textInput(['maxlength' => true,'placeholder'=>'type path to preview image']) ?>

    <?= $form->field($model, 'formattedDate')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99.99.9999'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
