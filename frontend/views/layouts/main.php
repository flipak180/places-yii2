<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <div class="container">
        <a class="logo" href="/"><img src="/design/img/logo.png" srcset="img/logo@2x.png 2x" alt="Кальянные.рф"></a>
        <nav>
            <a href="/place-card.html">TOP10</a>
            <a href="/news-list.html">Резюме</a>
            <a href="/news-card.html">О проекте</a>
            <a href="#">Реклама</a>
            <a href="#">Новости</a>
            <a href="#">Это интересно</a>
        </nav>
        <div class="buttons">
            <a class="btn btn-primary btn-upper popup-link" href="#login-modal">Добавить заведение</a>
            <a class="btn btn-default popup-link" href="#signup-modal">
                <span>Профиль</span>
                <svg width="20" height="19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5 10l.345.362.38-.362-.38-.362L18.5 10zM12 1h.5V.5H12V1zM1 1V.5H.5V1H1zm0 17H.5v.5H1V18zm11 0v.5h.5V18H12zm3.167-4.138l3.678-3.5-.69-.724-3.678 3.5.69.724zm3.678-4.224l-3.678-3.5-.69.724 3.678 3.5.69-.724zM18.5 9.5h-12v1h12v-1zm-6-4V1h-1v4.5h1zm-.5-5H1v1h11v-1zM.5 1v17h1V1h-1zM1 18.5h11v-1H1v1zm11.5-.5v-3.5h-1V18h1z" fill="#000"/></svg>
            </a>
        </div>
    </div>
</header>
<div class="sticky-header">
    <div class="container"><a class="logo" href="/"><img src="/design/img/logo2.png" srcset="img/logo2@2x.png 2x" alt="Кальянные.рф"></a>
        <div class="menu"><svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#fff"/></svg><span>Меню</span>
            <div class="overlay"><a href="#">
                    <svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#5B114E"/></svg>Меню</a>
                <nav><a href="/place-card.html">TOP10</a><a href="/news-list.html">Резюме</a><a href="/news-card.html">О проекте</a><a href="#">Реклама</a><a href="#">Новости</a><a href="#">Это интересно</a></nav>
            </div>
        </div>
        <button class="btn btn-warning btn-upper toggle-map"><svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#000"/></svg><span>Показать карту кальянных</span></button>
        <form class="search-form">
            <select class="select" name="city">
                <option value="Санкт-Петербург">Санкт-Петербург</option>
            </select>
            <input type="text" placeholder="Введите название кальянной">
            <button type="submit"><svg width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 21l-6.115-6.114m0 0c3.172-3.171 3.172-8.332 0-11.504A8.082 8.082 0 0 0 9.134 1a8.081 8.081 0 0 0-5.752 2.383A8.075 8.075 0 0 0 1 9.134c0 2.173.846 4.215 2.382 5.752a8.081 8.081 0 0 0 5.752 2.382 8.08 8.08 0 0 0 5.751-2.382z" stroke="#5B114E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        </form><a class="favorites popup-link" href="#reviews-modal"><svg width="16" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17l-5.838-4.17a2 2 0 0 0-2.324 0L1 20V3z" stroke="#FFCD18" stroke-width="2"/></svg><span>10</span>Избранные заведения</a>
    </div>
</div>
<?= $this->render('blocks/topbar') ?>
<main>
    <div class="container">
        <div class="top-banner">
            <a href="/"><img class="responsive" src="/design/uploads/top-banner.jpg" alt="Баннер сверху"></a>
        </div>
        <div class="aside-cont <?= Yii::$app->markup->asidePosition ?>">
            <aside>
                <button class="btn btn-default toggle-aside"><svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#000"/></svg></button>
                <div class="wrapper">
                    <?php if (Yii::$app->markup->showFilters): ?>
                        <?= $this->render('aside/filters') ?>
                    <?php endif ?>
                    <div class="visible-desktop">
                        <?php foreach (Yii::$app->markup->asideBlocks as $blockName): ?>
                            <?= $this->render('aside/'.$blockName) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>
            <div class="main-content">
                <?= $content ?>
                <div class="hidden-desktop">
                    <?php foreach (Yii::$app->markup->asideBlocks as $blockName): ?>
                        <?= $this->render('aside/'.$blockName) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="places-map-cont">
    <button class="btn btn-white btn-close"><svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30.287.299l-15 15.25 1.426 1.402 15-15.25L30.287.3zm-15 15.25L.78 30.299 2.205 31.7l14.508-14.75-1.426-1.402zm15.934 14.75l-14.508-14.75-1.426 1.402 14.508 14.75 1.426-1.402zm-14.508-14.75l-15-15.25L.287 1.7l15 15.25 1.426-1.402z" fill="#5B114E"/></svg></button>
    <div id="places-map"></div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div>Все материалы, размещаемые на сайте, предназначены для лиц старше 18 лет. Администрация не несет ответственности за содержание информационных карточек заведений. Мы не рекламируем и не продаем табачную продукцию.</div>
            <div class="links"><a class="app-store" href="#"></a><a class="google-play" href="#"></a><a class="vk-link" href="#"></a></div>
            <div class="contacts"><span class="phone">+7(999)534 78 73</span><a class="mail" href="mailto:manager@kaliannye.ru">manager@kaliannye.ru</a></div>
        </div>
        <p class="copy">© 2019 Кальянные.РФ</p>
    </div>
</footer>
<div id="overlay"></div>
<div class="modal" id="signup-modal"><a class="close" href=""><svg width="42" height="42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.113 10.607L10.607 31.113m19.799 0L9.9 10.607" stroke="gray" stroke-width="2"/></svg></a>
    <h3>Регистрация</h3>
    <form action="" method="POST">
        <div class="form-row">
            <input type="text" placeholder="Ваше имя">
        </div>
        <div class="form-row">
            <input type="email" placeholder="Ваш E-mail">
        </div>
        <div class="form-row">
            <input type="password" placeholder="Ваш пароль">
        </div>
        <div class="form-row checkbox-row">
            <label for="signup-rules">
                <input type="checkbox" name="rules" id="signup-rules"><span>Я соглашаюсь с <a href="">пользовательским соглашением</a></span>
            </label>
        </div>
        <button class="btn btn-warning btn-block btn-upper">Зарегистрироваться</button>
    </form>
</div>
<div class="modal" id="login-modal"><a class="close" href=""><svg width="42" height="42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.113 10.607L10.607 31.113m19.799 0L9.9 10.607" stroke="gray" stroke-width="2"/></svg></a>
    <h3>Вход</h3>
    <hr>
    <p>Через соцсети <small>(рекомендуем для новых покупателей)</small></p>
    <div class="social-links">
        <div>ВКонтакте</div>
        <div>Facebook</div>
        <div>Google</div>
        <div>Почта Mail.Ru</div>
    </div>
    <hr>
    <p>С помощью аккаунта<a class="pull-right popup-link" href="#signup-modal">Создать аккаунт</a></p>
    <form action="" method="POST">
        <div class="form-row">
            <input type="email" placeholder="Ваш E-mail">
        </div>
        <div class="form-row">
            <input type="password" placeholder="Ваш пароль">
        </div>
        <div class="form-row checkbox-row">
            <label for="login-rules">
                <input type="checkbox" name="rules" id="login-rules"><span>Я соглашаюсь с <a href="">пользовательским соглашением</a></span>
            </label>
        </div>
        <button class="btn btn-warning btn-upper">Войти</button>
        <button class="btn btn-default btn-upper">Забыли пароль?</button>
    </form>
</div>
<div class="modal xl" id="reviews-modal"><a class="close" href=""><svg width="42" height="42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.113 10.607L10.607 31.113m19.799 0L9.9 10.607" stroke="gray" stroke-width="2"/></svg></a>
    <h3>Оставить отзыв</h3>
    <form action="" method="POST">
        <div class="rate-block">
            <div class="total-rating">
                <p>Общая оценка</p>
                <div class="rating-stars"><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
                </div>
            </div>
            <div class="detailed-rating">
                <div>
                    <p>Цена/Качество</p>
                    <div class="rating-stars"><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
                    </div>
                </div>
                <div>
                    <p>Доступность</p>
                    <div class="rating-stars"><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
                    </div>
                </div>
                <div>
                    <p>Обслуживание</p>
                    <div class="rating-stars"><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
                    </div>
                </div>
                <div>
                    <p>Ассортимент</p>
                    <div class="rating-stars"><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg class="active" width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <label>Заголовок</label>
            <input type="text" placeholder="Опишите заголовок отзыва">
        </div>
        <div class="two-cols">
            <div class="form-row">
                <label>Текст сообшения</label>
                <textarea>Расскажите, почему вам понравилось или не понравилось данное заведение</textarea>
            </div>
            <div class="form-row files-row">
                <label>Добавить фото</label>
                <div class="files-list">
                    <div class="file-item">
                        <div class="overlay"></div><a class="remove" href=""><svg width="25" height="25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.066 6.066l12.132 12.132m0-12.132L6.066 18.198" stroke="#fff"/></svg></a><img class="responsive" src="/design/uploads/img-file.jpg">
                    </div>
                    <div class="file-item">
                        <div class="overlay"></div><a class="remove" href=""><svg width="25" height="25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.066 6.066l12.132 12.132m0-12.132L6.066 18.198" stroke="#fff"/></svg></a><img class="responsive" src="/design/uploads/img-file.jpg">
                    </div>
                    <div class="new-file"></div>
                </div>
                <p>Размер всех фото не должен привышать Мб, формат .jpg .jpeg. Минимальный размер 525x350.</p>
            </div>
        </div>
        <div class="form-row checkbox-row">
            <label for="reviews-rules">
                <input type="checkbox" name="rules" id="reviews-rules"><span>Я соглашаюсь с <a href="">пользовательским соглашением</a></span>
            </label>
        </div>
        <button class="btn btn-warning btn-upper">Оставить отзыв</button>
    </form>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
