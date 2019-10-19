<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\widgets\ListView;

$this->title = 'Кальянные';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '
        <div class="top">
            <span>{summary}</span>
            <div style="display: none">{sorter}</div>
        </div>
        <div class="list">{items}</div>
        {pager}
    ',
    'itemView' => '_list-item',
    'itemOptions' => ['class' => 'item'],
    'options' => ['class' => 'places list-view'],
    'summary' => $searchModel->getSummaryText($dataProvider->totalCount),
    'sorter' => [

    ],
    'pager' => [
        'options' => [
            'tag' => 'div',
            'class' => 'pagination'
        ],
        'linkContainerOptions' => [
            'tag' => false,
        ],
        'prevPageLabel' => '
            <svg width="6" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.213L.646 4.86l-.353.353.353.354L1 5.213zM4.86.646L.646 4.86l.708.707 4.213-4.214L4.86.646zM.646 5.566L4.86 9.78l.707-.707L1.354 4.86l-.708.707z" fill="#000"/></svg>
            <span>Назад</span>
        ',
        'nextPageLabel' => '
            <span>Вперед</span>
            <svg width="6" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.213 5.213l.354-.353.353.353-.353.354-.354-.354zM1.353.646L5.568 4.86l-.707.707L.646 1.353l.708-.707zm4.214 4.92L1.354 9.78l-.708-.707L4.86 4.86l.707.707z" fill="#000"/></svg>
        ',
    ]
]); ?>

<!--<div class="places">
    <div class="top">
        <span>Найдено: 860 кальянных</span>
        <div class="sort">
            <span>Сортировать по:</span>
            <select class="simple" name="sort">
                <option value="rating" selected="selected">Рейтингу</option>
                <option value="distance">Расстоянию</option>
            </select>
        </div>
    </div>
    <div class="list">
        <div class="item">
            <div class="main" style="background-image: url(/design/uploads/place-1.jpg)">
                <div class="rating active"><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><span>4.8</span></div>
                <h2><a href="#">Feromon Primorskaya</a></h2><span class="btn btn-success">Открыто</span><a class="address" href="#"><svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#fff"></path></svg><span>Кораблестроителей 30</span></a>
            </div>
            <div class="bottom"><span>Отзывов: 203</span>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
        <div class="item">
            <div class="main" style="background-image: url(/design/uploads/place-2.jpg)">
                <div class="rating"><svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.077 4.935c.409.058.742.333.87.717a1.03 1.03 0 0 1-.273 1.08L12.617 9.65l.722 4.12c.07.397-.094.792-.428 1.03a1.086 1.086 0 0 1-1.133.08L8 12.934l-3.778 1.945c-.359.184-.809.15-1.133-.08a1.037 1.037 0 0 1-.429-1.03l.722-4.12L.325 6.734a1.033 1.033 0 0 1-.272-1.08c.128-.385.46-.659.87-.718l4.223-.6L7.036.586C7.217.225 7.586 0 8 0c.412 0 .782.225.965.587l1.889 3.747 4.223.601z"/></svg><span>3.2</span></div>
                <h2><a href="#">Feromon Lounge Bar</a></h2><span class="btn btn-default">Закрыто</span>
            </div>
            <div class="bottom"><span>Отзывов: 145</span>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
    </div>
    <button class="btn btn-warning btn-block btn-upper">Показать карту кальянных</button>
    <div class="pagination">
        <a class="prev" href="#">
            <svg width="6" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.213L.646 4.86l-.353.353.353.354L1 5.213zM4.86.646L.646 4.86l.708.707 4.213-4.214L4.86.646zM.646 5.566L4.86 9.78l.707-.707L1.354 4.86l-.708.707z" fill="#000"/></svg>
            <span>Назад</span>
        </a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a class="next" href="#">
            <span>Вперед</span>
            <svg width="6" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.213 5.213l.354-.353.353.353-.353.354-.354-.354zM1.353.646L5.568 4.86l-.707.707L.646 1.353l.708-.707zm4.214 4.92L1.354 9.78l-.708-.707L4.86 4.86l.707.707z" fill="#000"/></svg>
        </a>
    </div>
</div>-->




<div class="reviews">
    <h2>Последние отзывы о кальянных Санкт-Петербурга (Спб) 20 из 1060</h2>
    <div class="item">
        <div class="author"><img class="responsive" src="/design/img/no-avatar.png" alt="">
            <h4>Роман</h4>
            <p>Критик 1-го уровня</p>
        </div>
        <div class="main">
            <div class="top">
                <h4>Feromon Zhukovskogo 22 - Feromon one love</h4><span class="rating">5.0</span>
            </div>
            <p>О месте слышал от знакомых уверяли, что не пожалею, если зайду на Жуковского в общем так и вышло. Отличный персонал, внимательный и радушный, будто приходишь в гости к друзьям. Кухня и бар очень порадовали- широкий ассортимент и блюда/напитки на любой вкус и цвет Но главное, ради чего приходил - кальян. Кальянщик все очень толково объяснил и сделал мне кальян именно таким, какой мне и хотелось.</p>
            <div class="bottom"><small class="date">16 февр. 2019 г.</small>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="author"><img class="responsive" src="/design/uploads/avatar-1.png" alt="">
            <h4>Марина</h4>
            <p>Критик 1-го уровня</p>
        </div>
        <div class="main">
            <div class="top">
                <h4>Полтавская 7 - Не советую заходить в это заведение!</h4><span class="rating">5.0</span>
            </div>
            <p>О месте слышал от знакомых уверяли, что не пожалею, если зайду на Жуковского в общем так и вышло. Отличный персонал, внимательный и радушный, будто приходишь в гости к друзьям. Кухня и бар очень порадовали- широкий ассортимент и блюда/напитки на любой вкус и цвет Но главное, ради чего приходил - кальян. Кальянщик все очень толково объяснил и сделал мне кальян именно таким, какой мне и хотелось.</p>
            <div class="bottom"><small class="date">16 февр. 2019 г.</small>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="author"><img class="responsive" src="/design/uploads/avatar-2.png" alt="">
            <h4>Татьяна</h4>
            <p>Критик 2-го уровня</p>
        </div>
        <div class="main">
            <div class="top">
                <h4>Эхо - Единственное из всех. Просто лучшее</h4><span class="rating">4.0</span>
            </div>
            <p>О месте слышал от знакомых уверяли, что не пожалею, если зайду на Жуковского в общем так и вышло. Отличный персонал, внимательный и радушный, будто приходишь в гости к друзьям. Кухня и бар очень порадовали- широкий ассортимент и блюда/напитки на любой вкус и цвет Но главное, ради чего приходил - кальян. Кальянщик все очень толково объяснил и сделал мне кальян именно таким, какой мне и хотелось.</p>
            <div class="bottom"><small class="date">16 февр. 2019 г.</small>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="author"><img class="responsive" src="/design/img/no-avatar.png" alt="">
            <h4>Роман</h4>
            <p>Критик 1-го уровня</p>
        </div>
        <div class="main">
            <div class="top">
                <h4>Feromon Zhukovskogo 22 - Feromon one love</h4><span class="rating">3.0</span>
            </div>
            <p>О месте слышал от знакомых уверяли, что не пожалею, если зайду на Жуковского в общем так и вышло. Отличный персонал, внимательный и радушный, будто приходишь в гости к друзьям. Кухня и бар очень порадовали- широкий ассортимент и блюда/напитки на любой вкус и цвет Но главное, ради чего приходил - кальян. Кальянщик все очень толково объяснил и сделал мне кальян именно таким, какой мне и хотелось.</p>
            <div class="bottom"><small class="date">16 февр. 2019 г.</small>
                <div class="votes"><a class="vote-down" href="#"></a><span>+567</span><a class="vote-up" href="#"></a></div>
            </div>
        </div>
    </div>
    <button class="btn btn-warning btn-block btn-upper">Показать все отзывы</button>
</div>
<h1>Кальянные <?= Yii::$app->cityDetector->city->padezh_rodit ?></h1>
<?= Yii::$app->cityDetector->city->seo_text ?>
