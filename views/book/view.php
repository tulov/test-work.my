<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
if(!Yii::$app->request->isAjax){
    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="book-view">
    <?php if(!Yii::$app->request->isAjax): ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Author',
                'value'=>$model->author->getFullName()
            ],
            'name',
            [
                'attribute'=>'date_create',
                'value'=>date('d.m.Y H:i:s',$model->date_create)
            ],
            [
                'attribute'=>'date_update',
                'value'=>date('d.m.Y H:i:s',$model->date_update)
            ],
            [
                'attribute'=>'preview',
                'value'=>Html::img($model->preview,['style'=>'max-width:200px;']),
                'format'=>'raw',
            ],
            'formattedDate',
        ],
    ]) ?>

</div>
