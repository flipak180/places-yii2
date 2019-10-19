<?php

/* @var $this yii\web\View */

use common\models\Place;

?>

<div class="box aside-items">
    <div class="heading">
        <h3>Новые заведения</h3>
    </div>
    <div class="body">
        <?php foreach (Place::getNewList(3) as $model): ?>
            <div class="item">
                <a href="<?= $model->link ?>">
                    <img class="responsive" src="<?= $model->mainImage ?>" alt="<?= $model->name ?>">
                </a>
                <h3>
                    <a href="<?= $model->link ?>"><?= $model->name ?></a>
                    <small><?= $model->address ?></small>
                </h3>
            </div>
        <?php endforeach; ?>
    </div>
</div>
