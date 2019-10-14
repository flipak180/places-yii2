<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

?>

<div class="box padding purple booking-form">
    <h3>Бронировать столик<small>Кальянная Лаборатория WHITE SMOKE</small></h3>
    <form class="inline" action="#">
        <div class="form-row">
            <label>Имя</label>
            <input type="text" placeholder="Ваше имя">
        </div>
        <div class="form-row">
            <label>Телефон</label>
            <input type="text" placeholder="Ваше имя">
        </div>
        <div class="form-row">
            <label>Дата и время</label>
            <input type="text" placeholder="Ваше имя">
        </div>
        <div class="form-row">
            <label>Человек</label>
            <select class="select">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <div class="form-row">
            <label>&nbsp;</label>
            <button class="btn btn-warning btn-upper">Бронировать</button>
        </div>
    </form>
</div>
