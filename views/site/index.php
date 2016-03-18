<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>User</h2>

                <p><strong>name:</strong> admin</p>
                <p><strong>password:</strong> admin</p>
            </div>
            <div class="col-lg-4">
                <h2>Book</h2>
                <p>Follow to <?= Html::a('books',['/book/index']) ?> link</p>
            </div>
        </div>

    </div>
</div>
