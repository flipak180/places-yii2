<?php

/* @var $this yii\web\View */

?>

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
                <svg width="14" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.261 13.356l.376.33.004-.006-.38-.324zm2.484-2.91l-.374-.33-.006.006.38.325zm.87-1.403l.464.187.004-.01-.467-.177zm.33-2.886l.496-.068-.495.068zM11.852 3.45l-.406.29.002.004.404-.294zm-2.11-1.8l.226-.446-.225.446zm-5.483 0l.226.446-.226-.446zm-2.11 1.8l.405.294.002-.004-.406-.29zM1.055 6.157L.56 6.09l.495.068zm.33 2.886l-.467.178.004.01.463-.188zm.87 1.404l.383-.323-.008-.009-.374.332zm2.464 2.909l.383-.32-.002-.003-.381.323zm.34.406l-.384.321.005.006.378-.327zM6.988 16l-.378.327.38.44.378-.442L6.99 16zm1.932-2.258l-.375-.33-.005.005.38.325zM10 6.974l-.5.004.5-.004zm-.518-1.66l.413-.28-.413.28zM8.13 4.222l-.188.463.188-.463zM6.4 4.061l-.1-.49.1.49zm-1.53.827l-.354-.352.355.352zm-.813 1.536l-.49-.096.49.096zm1.28 3.072l.277-.416-.277.416zM7 10v-.5.5zm1.154-.23l-.192-.462.192.461zm.976-.658l-.355-.352.355.352zm.649-.982l.463.188-.463-.188zm-.138 5.55l2.484-2.908-.76-.65-2.484 2.909.76.65zm2.478-2.901c.408-.46.733-.984.96-1.549l-.927-.373a4.344 4.344 0 0 1-.781 1.258l.748.664zm.964-1.558c.38-1 .503-2.075.358-3.132l-.99.136c.121.89.018 1.796-.303 2.641l.935.355zm.358-3.132a6.473 6.473 0 0 0-1.186-2.934l-.808.589c.538.74.882 1.59 1.004 2.48l.99-.135zm-1.183-2.93a6.305 6.305 0 0 0-2.29-1.955l-.451.892a5.306 5.306 0 0 1 1.928 1.644l.813-.581zm-2.29-1.955A6.588 6.588 0 0 0 7 .5v1c.878 0 1.742.205 2.517.596l.45-.892zM7 .5a6.588 6.588 0 0 0-2.967.704l.45.892A5.588 5.588 0 0 1 7 1.5v-1zm-2.967.704a6.306 6.306 0 0 0-2.29 1.955l.812.581a5.306 5.306 0 0 1 1.929-1.644l-.451-.892zM1.744 3.155A6.474 6.474 0 0 0 .56 6.09l.99.136a5.474 5.474 0 0 1 1.004-2.481l-.809-.589zM.56 6.09a6.383 6.383 0 0 0 .358 3.132l.935-.355a5.383 5.383 0 0 1-.303-2.641l-.99-.136zM.92 9.23c.227.565.552 1.089.96 1.549l.748-.664a4.344 4.344 0 0 1-.78-1.258L.92 9.23zm.952 1.54l2.463 2.909.763-.646-2.463-2.91-.763.647zm2.806 3.32l1.932 2.237.757-.654-1.932-2.237-.757.653zm2.69 2.235l1.932-2.258-.76-.65-1.932 2.258.76.65zm-1.928-2.883l-.34-.407-.767.641.34.407.767-.641zm3.856.63l.34-.386-.751-.66-.34.386.751.66zM10.5 6.97a3.5 3.5 0 0 0-.605-1.936l-.827.561A2.5 2.5 0 0 1 9.5 6.978l1-.008zm-.605-1.936a3.5 3.5 0 0 0-1.577-1.276l-.376.926a2.5 2.5 0 0 1 1.126.911l.827-.561zM8.318 3.758a3.5 3.5 0 0 0-2.02-.187l.201.98a2.5 2.5 0 0 1 1.443.133l.376-.926zm-2.02-.187a3.5 3.5 0 0 0-1.783.965l.71.704a2.5 2.5 0 0 1 1.274-.69l-.2-.979zm-1.783.965a3.5 3.5 0 0 0-.95 1.792l.981.192a2.5 2.5 0 0 1 .679-1.28l-.71-.704zm-.95 1.792a3.5 3.5 0 0 0 .204 2.018l.923-.384a2.5 2.5 0 0 1-.146-1.442l-.98-.192zm.204 2.018a3.5 3.5 0 0 0 1.29 1.566l.554-.832a2.5 2.5 0 0 1-.92-1.118l-.924.384zm1.29 1.566a3.5 3.5 0 0 0 1.94.588v-1a2.5 2.5 0 0 1-1.386-.42l-.554.832zm1.94.588a3.5 3.5 0 0 0 1.347-.27l-.384-.922A2.5 2.5 0 0 1 7 9.5v1zm1.347-.27a3.5 3.5 0 0 0 1.14-.766l-.71-.704a2.5 2.5 0 0 1-.814.548l.384.923zm1.14-.766a3.5 3.5 0 0 0 .756-1.146l-.926-.376a2.5 2.5 0 0 1-.54.818l.71.704zm.756-1.146A3.5 3.5 0 0 0 10.5 6.97l-1 .008a2.5 2.5 0 0 1-.184.964l.926.376z" fill="#0670EB"/></svg>Показать на карте</a>
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
                    <input type="checkbox" name="comforts[]" id="comfort-6"><span>Кальян на фруктах</span><small>24</small>
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
