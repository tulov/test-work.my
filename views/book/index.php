<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute'=>'preview',
                'value'=>function($model){
                    return '<div class="loop"><div class="loop-content">'. Html::img($model->preview,['style'=>'max-width:100%;']).'</div></div>';
                },
                "format"=>'raw',
            ],
            [
                'attribute'=>'author',
                'value'=>'author.fullName'
            ],
            [
                'attribute'=>'date',
                'value'=>'formattedDate'
            ],
            [
                'attribute'=>'date_create',
                'value'=>function($model){
                    return date('d.m.Y H:i:s',$model->date_create);
                }
            ],
            // 'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'update' => function ($url, $model, $key) {
                        $query = Yii::$app->request->queryString;
                        return  Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . ($query ? '&_r=' .urlencode($query) :'' ));
                    },
                    'view' => function ($url, $model, $key) {
                        return  Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 'javascript:;', ['value'=>$url, 'class'=>'showModalButton','title'=>'Book view'] );
                    },
                ],
            ],
        ],
    ]); ?>
    <?php
    yii\bootstrap\Modal::begin([
        'header' => "View book",
        'id' => 'modal',
        'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE],
        'closeButton' => ['label' => 'close'],
    ]);
    echo "<div id='modalContent'><div style=\"text-align:center\"><img src=\"/web/img/loader.gif\"></div></div>";
    yii\bootstrap\Modal::end();
    ?>

</div>
