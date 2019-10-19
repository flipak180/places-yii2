<?php

/* @var $this yii\web\View */

use common\models\Place;

?>

<div class="box top-items">
    <div class="heading">
        <h3>Топ-10</h3>
        <p>Кальянные Санкт-Петербурга</p>
    </div>
    <div class="body">
        <?php foreach (Place::getBestList(10) as $model): ?>
            <a class="item" href="<?= $model->link ?>">
                <span><?= $model->name ?></span>
                <small><?= $model->address ?></small>
                <svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg>
            </a>
        <?php endforeach; ?>
    </div>
</div>
