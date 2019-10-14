<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

?>

<div class="place-heading">
    <div class="top">
        <div class="heading">
            <h1><?= $model->name ?></h1>
            <svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
            <span><?= $model->rating ? $model->rating : 'Нет оценок' ?></span>
        </div>
        <div class="toggle-mode">
            <button class="btn btn-upper btn-primary slider">Фото</button>
            <button class="btn btn-upper btn-default map">Карта</button>
        </div>
    </div>
    <div class="bottom">
        <?php if ($model->address): ?>
            <span>
                <svg width="10" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.884 10.708l2.07-2.52c.309-.363.554-.774.726-1.217a5.289 5.289 0 00-.637-4.848 4.915 4.915 0 00-8.085 0A5.295 5.295 0 00.32 6.97c.172.443.417.854.726 1.216l2.052 2.521.283.353L4.991 13l1.61-1.957.283-.335zm.184-6.969a2.692 2.692 0 01.248 2.44 2.61 2.61 0 01-.54.852 2.497 2.497 0 01-.814.569 2.417 2.417 0 01-2.349-.237 2.58 2.58 0 01-.92-1.163 2.697 2.697 0 01-.147-1.5c.095-.503.331-.966.679-1.33.347-.365.79-.614 1.274-.717a2.41 2.41 0 011.443.139c.457.193.849.523 1.126.947z" fill="#5B114E"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.884 10.708l2.07-2.52c.309-.363.554-.774.726-1.217a5.289 5.289 0 00-.637-4.848 4.915 4.915 0 00-8.085 0A5.295 5.295 0 00.32 6.97c.172.443.417.854.726 1.216l2.052 2.521.283.353L4.991 13l1.61-1.957.283-.335zm.184-6.969a2.692 2.692 0 01.248 2.44 2.61 2.61 0 01-.54.852 2.497 2.497 0 01-.814.569 2.417 2.417 0 01-2.349-.237 2.58 2.58 0 01-.92-1.163 2.697 2.697 0 01-.147-1.5c.095-.503.331-.966.679-1.33.347-.365.79-.614 1.274-.717a2.41 2.41 0 011.443.139c.457.193.849.523 1.126.947z" fill="#5B114E"/></svg>
                <?= $model->address ?>
            </span>
        <?php endif ?>
        <?php if ($model->metro): ?>
            <span>
                <svg width="14" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.541 0l3.01 5 2.952-5 3.6 8.72H9.68l-.826-2.208L6.552 10 4.309 6.512 3.423 8.72H0L3.541 0z" fill="#5B114E"/></svg>
                <?= implode(', ', $model->getMetroNames()) ?>
            </span>
        <?php endif ?>
        <span>
            <svg width="15" height="9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M.046 3.626L0 4.197a8.744 8.744 0 0014.895 1.177l.046-.571A8.745 8.745 0 00.046 3.626zm7.316 4.255a3.393 3.393 0 113.293-1.831 3.4 3.4 0 01-3.316 1.837l.023-.006z" fill="#5B114E"/><path d="M7.613 6.196a1.696 1.696 0 100-3.392 1.696 1.696 0 000 3.392z" fill="#5B114E"/></svg>
            <?= $model->total_views ? $model->total_views : 0 ?>
        </span>
        <span>Отзывов: <?= count($model->activeReviews) ?></span>
        <div class="votes">
            <a class="vote-down" href="#"></a>
            <span>+<?= $model->total_likes ? $model->total_likes : 0 ?></span>
            <a class="vote-up" href="#"></a>
        </div>
    </div>
</div>
