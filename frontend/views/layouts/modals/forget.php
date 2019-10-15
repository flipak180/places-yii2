<?php

/* @var $this yii\web\View */

?>

<div class="modal" id="forget-modal">
    <a class="close" href="">
        <svg width="42" height="42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.113 10.607L10.607 31.113m19.799 0L9.9 10.607" stroke="gray" stroke-width="2"/></svg>
    </a>
    <h3>Восстановление пароля</h3>
    <form action="" method="POST">
        <div class="form-row">
            <input type="email" placeholder="Ваш E-mail">
        </div>
        <div class="form-row checkbox-row">
            <label for="signup-rules">
                <input type="checkbox" name="rules" id="signup-rules"><span>Я соглашаюсь с <a href="">пользовательским соглашением</a></span>
            </label>
        </div>
        <button class="btn btn-warning btn-block btn-upper">Восстановить</button>
    </form>
</div>
