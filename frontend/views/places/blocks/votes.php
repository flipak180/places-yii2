<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

use yii\helpers\Url;

?>

<div class="votes">
    <a class="vote-down" href="<?= Url::to(['places/dislike', 'id' => $model->id]) ?>"></a>
    <span>+<?= count($model->likes) ?></span>
    <a class="vote-up" href="<?= Url::to(['places/like', 'id' => $model->id]) ?>"></a>
</div>
