<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

use himiklab\thumbnail\EasyThumbnailImage;

?>

<?php if (count($model->images)): ?>
    <div class="place-slider">
        <div class="big-images">
            <?php foreach ($model->images as $image): ?>
                <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@frontend_web').$image->path, 858, 450, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
            <?php endforeach; ?>
        </div>
        <div class="small-images">
            <?php foreach ($model->images as $image): ?>
                <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@frontend_web').$image->path, 110, 80, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif ?>
