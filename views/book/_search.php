<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id'=>'bookSearchForm',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'author_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->all(),'id','fullName'),['prompt'=>'---select author---'])
            ->label(false)?>

        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput(['placeholder'=>'type name'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 line-content">
            <?= $form->field($model, 'dateFrom')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99.99.9999',
                'options'=>[
                    'class'=>'form-control line',
                    'placeholder'=>'12.12.1990'
                ]
            ])->label('date from') ?>
            <?= $form->field($model, 'dateTo')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99.99.9999',
                'options'=>[
                    'class'=>'form-control line',
                    'placeholder'=>'12.12.2016'
                ]
            ])->label('to') ?>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
