<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

?>

<?php if ($model->description || $model->getComforts()): ?>
    <div class="box padding place-description">
        <h3>Описание</h3>
        <?= $model->description ?>
        <?php if (count($model->getComforts()->all())): ?>
            <h5>Что мы можем предложить: <?= $this->title ?></h5>
            <ul>
                <?php foreach ($model->getComforts()->all() as $comfort): ?>
                    <li><?= $comfort->name ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>
<?php endif ?>
