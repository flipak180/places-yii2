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
    <div class="container"><a class="logo" href="/"><img src="/design/assets/img/logo.png" srcset="/design/assets/img/logo@2x.png 2x" alt="Кальянные.рф"></a>
        <nav><a href="#">TOP10</a><a href="#">Резюме</a><a href="#">О&#160;проекте</a><a href="#">Реклама</a><a href="#">Новости</a><a href="#">Это интересно</a></nav>
        <div>
            <button class="btn btn-primary btn-upper">Добавить заведение</button>
            <button class="btn btn-default"><span>Профиль</span><svg width="20" height="19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5 10l.345.362.38-.362-.38-.362L18.5 10zM12 1h.5V.5H12V1zM1 1V.5H.5V1H1zm0 17H.5v.5H1V18zm11 0v.5h.5V18H12zm3.167-4.138l3.678-3.5-.69-.724-3.678 3.5.69.724zm3.678-4.224l-3.678-3.5-.69.724 3.678 3.5.69-.724zM18.5 9.5h-12v1h12v-1zm-6-4V1h-1v4.5h1zm-.5-5H1v1h11v-1zM.5 1v17h1V1h-1zM1 18.5h11v-1H1v1zm11.5-.5v-3.5h-1V18h1z" fill="#000"/></svg></button>
        </div>
    </div>
</header>
<div class="sticky-header">
    <div class="container"><a class="logo" href="/"><img src="/design/assets/img/logo2.png" srcset="/design/assets/img/logo2@2x.png 2x" alt="Кальянные.рф"></a>
        <div class="menu"><svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#fff"/></svg><span>Меню</span>
            <div class="overlay"><a href="#">
                    <svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#5B114E"/></svg>Меню</a>
                <nav><a href="#">TOP10</a><a href="#">Резюме</a><a href="#">О&#160;проекте</a><a href="#">Реклама</a><a href="#">Новости</a><a href="#">Это интересно</a></nav>
            </div>
        </div>
        <button class="btn btn-warning btn-upper toggle-map"><svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#000"/></svg><span>Показать карту кальянных</span></button>
        <form class="search-form">
            <select name="city">
                <option value="Санкт-Петербург">Санкт-Петербург</option>
            </select>
            <input type="text" placeholder="Введите название кальянной">
            <button type="submit"><svg width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 21l-6.115-6.114m0 0c3.172-3.171 3.172-8.332 0-11.504A8.082 8.082 0 0 0 9.134 1a8.081 8.081 0 0 0-5.752 2.383A8.075 8.075 0 0 0 1 9.134c0 2.173.846 4.215 2.382 5.752a8.081 8.081 0 0 0 5.752 2.382 8.08 8.08 0 0 0 5.751-2.382z" stroke="#5B114E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        </form><a class="favorites" href="#">
            <svg width="16" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17l-5.838-4.17a2 2 0 0 0-2.324 0L1 20V3z" stroke="#FFCD18" stroke-width="2"/></svg><span>10</span>Избранные заведения</a>
    </div>
</div>
<div class="topbar">
    <div class="container">
        <button class="btn btn-warning btn-upper toggle-map"><svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#000"/></svg><span>Показать карту кальянных</span></button>
        <form class="search-form">
            <select name="city">
                <option value="Санкт-Петербург">Санкт-Петербург</option>
            </select>
            <input type="text" placeholder="Введите название кальянной">
            <button type="submit"><svg width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 21l-6.115-6.114m0 0c3.172-3.171 3.172-8.332 0-11.504A8.082 8.082 0 0 0 9.134 1a8.081 8.081 0 0 0-5.752 2.383A8.075 8.075 0 0 0 1 9.134c0 2.173.846 4.215 2.382 5.752a8.081 8.081 0 0 0 5.752 2.382 8.08 8.08 0 0 0 5.751-2.382z" stroke="#5B114E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        </form><a class="favorites" href="#">
            <svg width="16" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17l-5.838-4.17a2 2 0 0 0-2.324 0L1 20V3z" stroke="#FFCD18" stroke-width="2"/></svg><span>10</span>Избранные заведения</a>
    </div>
</div>
<main>
    <div class="container">
        <div class="top-banner"><a href="/"><img class="responsive" src="/design/assets/uploads/top-banner.jpg" alt="Баннер сверху"></a></div>
        <div class="aside-left">
            <aside>
                <button class="btn btn-default toggle-aside"><svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#000"/></svg></button>
                <div class="wrapper">
                    <form class="aside-filters" action="#">
                        <div class="box main-filter">
                            <div class="body">
                                <div class="form-row">
                                    <select class="chosen-select" name="city">
                                        <option value="Санкт-Петербург" data-data="{&quot;total&quot;: 145}">Санкт-Петербург</option>
                                        <option value="Москва" data-data="{&quot;total&quot;: 125}">Москва</option>
                                        <option value="Город 1" data-data="{&quot;total&quot;: 54}">Город 1</option>
                                        <option value="Город 2" data-data="{&quot;total&quot;: 21}">Город 2</option>
                                        <option value="Город 3" data-data="{&quot;total&quot;: 7}">Город 3</option>
                                        <option value="Город 4" data-data="{&quot;total&quot;: 11}">Город 4</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <select class="chosen-select" name="regio">
                                        <option value="Район" data-data="{&quot;total&quot;: 75}">Район</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <select class="chosen-select" name="metro">
                                        <option value="Метро" data-data="{&quot;total&quot;: 61}">Метро</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <select class="chosen-select" name="type">
                                        <option value="Тип заведения" data-data="{&quot;total&quot;: 230}">Тип заведения</option>
                                    </select>
                                </div><a class="on-map" href="#">
                                    <svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#0670EB"/></svg>Показать на&#160;карте</a>
                            </div>
                        </div>
                        <div class="box comforts-filter">
                            <div class="body">
                                <div class="form-row checkbox-row">
                                    <label for="comfort-0">
                                        <input type="checkbox" name="comforts[]" id="comfort-0"><span>Wi-fi</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-1">
                                        <input type="checkbox" name="comforts[]" id="comfort-1"><span>Оплата картами</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-2">
                                        <input type="checkbox" name="comforts[]" id="comfort-2"><span>Кухня</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-3">
                                        <input type="checkbox" name="comforts[]" id="comfort-3"><span>Бар</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-4">
                                        <input type="checkbox" name="comforts[]" id="comfort-4"><span>Парковка</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-5">
                                        <input type="checkbox" name="comforts[]" id="comfort-5"><span>Редкие виды табака</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-6">
                                        <input type="checkbox" name="comforts[]" id="comfort-6"><span>Кальян на&#160;фруктах</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-7">
                                        <input type="checkbox" name="comforts[]" id="comfort-7"><span>Vip залы</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-8">
                                        <input type="checkbox" name="comforts[]" id="comfort-8"><span>Трансляции</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-9">
                                        <input type="checkbox" name="comforts[]" id="comfort-9"><span>Настольные игры</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-10">
                                        <input type="checkbox" name="comforts[]" id="comfort-10"><span>Playstation/xbox</span><small>24</small>
                                    </label>
                                </div>
                                <div class="form-row checkbox-row">
                                    <label for="comfort-11">
                                        <input type="checkbox" name="comforts[]" id="comfort-11"><span>Детская комната</span><small>24</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="visible-desktop">
                        <div class="box top-items">
                            <div class="heading">
                                <h3>Топ-10</h3>
                                <p>Кальянные Санкт-Петербурга</p>
                            </div>
                            <div class="body"><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a></div>
                        </div>
                        <div class="box aside-news">
                            <div class="heading">
                                <h3>Новости<a href="#">Все 847</a></h3>
                            </div>
                            <div class="body">
                                <div class="item"><a href="#"><img src="/design/assets/uploads/news-1.jpg" alt=""></a>
                                    <h3><a href="#">Новая линейка от&#160;Darkside</a></h3>
                                    <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                                </div>
                                <div class="item"><a href="#"><img src="/design/assets/uploads/news-2.jpg" alt=""></a>
                                    <h3><a href="#">INFERNO Tobacco на&#160;HCS-2019 </a></h3>
                                    <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                                </div>
                                <div class="item"><a href="#"><img src="/design/assets/uploads/news-3.jpg" alt=""></a>
                                    <h3><a href="#">DUFT Hookah Tobacco</a></h3>
                                    <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                                </div>
                                <button class="btn btn-primary btn-upper btn-block">Предложить новость</button>
                            </div>
                        </div>
                        <div class="box aside-articles">
                            <div class="heading">
                                <h3>Публикации<a href="#">Все 124</a></h3>
                            </div>
                            <div class="body">
                                <div class="item"><a href="#"><img src="/design/assets/uploads/article-1.jpg" alt=""></a>
                                    <h3><a href="#">Виды кальянов.</a></h3>
                                </div>
                                <div class="item"><a href="#"><img src="/design/assets/uploads/article-2.jpg" alt=""></a>
                                    <h3><a href="#">Как выбрать кальян для дома?</a></h3>
                                </div>
                                <div class="item"><a href="#"><img src="/design/assets/uploads/article-3.jpg" alt=""></a>
                                    <h3><a href="#">Самые популярные миксы табака для кальяна.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="main-content">
                <?= $content ?>
                <div class="reviews">
                    <h2>Последние отзывы о&#160;кальянных Санкт-Петербурга (Спб) 20 из&#160;1060</h2>
                    <div class="item">
                        <div class="author"><img class="responsive" src="/design/assets/img/no-avatar.png" alt="">
                            <h4>Роман</h4>
                            <p>Критик 1-го уровня</p>
                        </div>
                        <div class="main">
                            <div class="top">
                                <h4>Feromon Zhukovskogo 22&#160;&#8212; Feromon one love</h4><span class="rating">5.0</span>
                            </div>
                            <p>О&#160;месте слышал от&#160;знакомых уверяли, что не&#160;пожалею, если зайду на&#160;Жуковского в&#160;общем так и&#160;вышло. Отличный персонал, внимательный и&#160;радушный, будто приходишь в&#160;гости к&#160;друзьям. Кухня и&#160;бар очень порадовали- широкий ассортимент и&#160;блюда/напитки на&#160;любой вкус и&#160;цвет Но&#160;главное, ради чего приходил&#160;&#8212; кальян. Кальянщик все очень толково объяснил и&#160;сделал мне кальян именно таким, какой мне и&#160;хотелось.</p>
                            <div class="bottom"><small class="date">16&#160;февр. 2019&#160;г.</small>
                                <div class="votes"> <a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="author"><img class="responsive" src="/design/assets/uploads/avatar-1.png" alt="">
                            <h4>Марина</h4>
                            <p>Критик 1-го уровня</p>
                        </div>
                        <div class="main">
                            <div class="top">
                                <h4>Полтавская 7&#160;&#8212; Не&#160;советую заходить в&#160;это заведение!</h4><span class="rating">5.0</span>
                            </div>
                            <p>О&#160;месте слышал от&#160;знакомых уверяли, что не&#160;пожалею, если зайду на&#160;Жуковского в&#160;общем так и&#160;вышло. Отличный персонал, внимательный и&#160;радушный, будто приходишь в&#160;гости к&#160;друзьям. Кухня и&#160;бар очень порадовали- широкий ассортимент и&#160;блюда/напитки на&#160;любой вкус и&#160;цвет Но&#160;главное, ради чего приходил&#160;&#8212; кальян. Кальянщик все очень толково объяснил и&#160;сделал мне кальян именно таким, какой мне и&#160;хотелось.</p>
                            <div class="bottom"><small class="date">16&#160;февр. 2019&#160;г.</small>
                                <div class="votes"> <a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="author"><img class="responsive" src="/design/assets/uploads/avatar-2.png" alt="">
                            <h4>Татьяна</h4>
                            <p>Критик 2-го уровня</p>
                        </div>
                        <div class="main">
                            <div class="top">
                                <h4>Эхо&#160;&#8212; Единственное из&#160;всех. Просто лучшее</h4><span class="rating">4.0</span>
                            </div>
                            <p>О&#160;месте слышал от&#160;знакомых уверяли, что не&#160;пожалею, если зайду на&#160;Жуковского в&#160;общем так и&#160;вышло. Отличный персонал, внимательный и&#160;радушный, будто приходишь в&#160;гости к&#160;друзьям. Кухня и&#160;бар очень порадовали- широкий ассортимент и&#160;блюда/напитки на&#160;любой вкус и&#160;цвет Но&#160;главное, ради чего приходил&#160;&#8212; кальян. Кальянщик все очень толково объяснил и&#160;сделал мне кальян именно таким, какой мне и&#160;хотелось.</p>
                            <div class="bottom"><small class="date">16&#160;февр. 2019&#160;г.</small>
                                <div class="votes"> <a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="author"><img class="responsive" src="/design/assets/img/no-avatar.png" alt="">
                            <h4>Роман</h4>
                            <p>Критик 1-го уровня</p>
                        </div>
                        <div class="main">
                            <div class="top">
                                <h4>Feromon Zhukovskogo 22&#160;&#8212; Feromon one love</h4><span class="rating">3.0</span>
                            </div>
                            <p>О&#160;месте слышал от&#160;знакомых уверяли, что не&#160;пожалею, если зайду на&#160;Жуковского в&#160;общем так и&#160;вышло. Отличный персонал, внимательный и&#160;радушный, будто приходишь в&#160;гости к&#160;друзьям. Кухня и&#160;бар очень порадовали- широкий ассортимент и&#160;блюда/напитки на&#160;любой вкус и&#160;цвет Но&#160;главное, ради чего приходил&#160;&#8212; кальян. Кальянщик все очень толково объяснил и&#160;сделал мне кальян именно таким, какой мне и&#160;хотелось.</p>
                            <div class="bottom"><small class="date">16&#160;февр. 2019&#160;г.</small>
                                <div class="votes"> <a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-block">Показать все отзывы</button>
                </div>
                <h1>Кальянные Санкт-Петербурга (Спб)</h1>
                <p>Санкт&#160;&#8212; Петербург предлагает ценителям дымных ароматов множество различных кальянных, некоторые из&#160;которых уникальны в&#160;своём роде. Гости могут найти кафе, бары, рестораны и&#160;lounge- пространства с&#160;кальяном в&#160;любом районе Петербурга.</p>
                <p>Сегодня одним из&#160;наиболее популярных форматов являются &#171;антикафе&#187; с&#160;кальяном или, как их&#160;ещё называют, &#171;тайм-кафе&#187;, где гостям бесплатно подают чай, сладости и&#160;кальян, а&#160;они, в&#160;свою очередь, платят только за&#160;время, проведённое в&#160;заведении. Актуальный список всех антикафе Питера, где предлагают кальян, Вы&#160;всегда можете найти на&#160;нашем сайте.</p>
                <p>Портал Кальянные.рф собрал в&#160;себе информацию обо всех кальянных&#160;СПб. Используя навигацию, Вы&#160;легко сможете подобрать заведение по&#160;своему вкусу, прочитать о&#160;нём отзывы, чтобы составить первое впечатление, и&#160;забронировать столик через нашу форму бронирования.</p>
                <p>Кальянные.рф&#160;&#8212; Ваш гид в&#160;мире кальянов!</p>
                <div class="hidden-desktop">
                    <div class="box top-items">
                        <div class="heading">
                            <h3>Топ-10</h3>
                            <p>Кальянные Санкт-Петербурга</p>
                        </div>
                        <div class="body"><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a><a class="item" href="#"><span>Feromon Primorskaya</span><small>Кораблестроителей 30</small><svg width="15" height="10" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M14.213 5.213l.354.354.353-.354-.353-.353-.354.353zm-3.86 4.567l4.214-4.213-.707-.707-4.214 4.213.708.707zm4.214-4.92L10.354.646l-.708.708 4.214 4.213.707-.707zm-.354-.147H0v1h14.213v-1z"/></svg></a></div>
                    </div>
                    <div class="box aside-news">
                        <div class="heading">
                            <h3>Новости<a href="#">Все 847</a></h3>
                        </div>
                        <div class="body">
                            <div class="item"><a href="#"><img src="/design/assets/uploads/news-1.jpg" alt=""></a>
                                <h3><a href="#">Новая линейка от&#160;Darkside</a></h3>
                                <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                            </div>
                            <div class="item"><a href="#"><img src="/design/assets/uploads/news-2.jpg" alt=""></a>
                                <h3><a href="#">INFERNO Tobacco на&#160;HCS-2019 </a></h3>
                                <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                            </div>
                            <div class="item"><a href="#"><img src="/design/assets/uploads/news-3.jpg" alt=""></a>
                                <h3><a href="#">DUFT Hookah Tobacco</a></h3>
                                <p>Мы&#160;расширили линейку, и&#160;теперь у&#160;нас есть не&#160;только легкий SOFT и&#160;легендарный MEDIUM, но&#160;и&#160;крепкий&#8230;</p><small class="date">16&#160;февр. 2019&#160;г.</small>
                            </div>
                            <button class="btn btn-primary btn-upper btn-block">Предложить новость</button>
                        </div>
                    </div>
                    <div class="box aside-articles">
                        <div class="heading">
                            <h3>Публикации<a href="#">Все 124</a></h3>
                        </div>
                        <div class="body">
                            <div class="item"><a href="#"><img src="/design/assets/uploads/article-1.jpg" alt=""></a>
                                <h3><a href="#">Виды кальянов.</a></h3>
                            </div>
                            <div class="item"><a href="#"><img src="/design/assets/uploads/article-2.jpg" alt=""></a>
                                <h3><a href="#">Как выбрать кальян для дома?</a></h3>
                            </div>
                            <div class="item"><a href="#"><img src="/design/assets/uploads/article-3.jpg" alt=""></a>
                                <h3><a href="#">Самые популярные миксы табака для кальяна.</a></h3>
                            </div>
                        </div>
                    </div>
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
            <div>Все материалы, размещаемые на&#160;сайте, предназначены для лиц старше 18&#160;лет. Администрация не&#160;несет ответственности за&#160;содержание информационных карточек заведений. Мы&#160;не&#160;рекламируем и&#160;не&#160;продаем табачную продукцию.</div>
            <div class="links"><a class="app-store" href="#"></a><a class="google-play" href="#"></a><a class="vk-link" href="#"></a></div>
            <div class="contacts"><span class="phone">+7&#160;999&#160;534-78-73</span><a class="mail" href="mailto:manager@kaliannye.ru">manager@kaliannye.ru</a></div>
        </div>
        <p class="copy">&#169; 2019 Кальянные.РФ</p>
    </div>
</footer>
<div id="overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>